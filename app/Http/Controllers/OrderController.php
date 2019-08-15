<?php

namespace App\Http\Controllers;

use App\Models\OrderPayments;
use App\Models\OrderProductQty;
use App\Models\Orders;
use App\Models\OrdersAddresses;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Session;
use DB;
use Mail;
use Stripe\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function cart(Request $request)
    {
        $userid = Session::get('userid');

        $products = Products::join('product_cart', 'product_cart.product_id', '=', 'products.id')
                    ->select('product_cart.*', 'products.name', 'products.imagepath', 'products.sale_price', 'products.product_data')
                    ->where('product_cart.created_by',$userid)
                    ->get();
        return view("order.cart",compact("products"));
    }

    public function buynow(Request $request)
    {

        $userid = Session::get('userid');
        $id = $request->product_id;
        DB::table('product_cart')->insert(['product_id' => $id, 'qty' => 1,'created_by' => $userid,'updated_by' => $userid]);
        return redirect('/cart');
    }

    public function checkout()
    {
         $userid = Session::get('userid');
         $products = DB::table('products')
            ->join('product_cart', 'products.id', '=', 'product_cart.product_id')
            ->select('products.*', 'product_cart.qty', 'product_cart.id as cartid ')
            ->where('product_cart.created_by',$userid)
            ->get();
        return view("order.checkout",compact("products"));
    }


    public function changeqty(Request $request)
    {
        $userid = Session::get('userid');
        if($request->ajax())
        {
          $id = $request->get('id');
          $qty = $request->get('qty');

          DB::table('product_cart')->where('id', '=', $id)->update([ 'qty' => $qty, 'updated_by' => $userid]);

        }
        echo 'ok';
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    { 

        //print_r($msgcontent); exit();

        $userid = Session::get('userid');
        $username = Session::get('username');


        $total_amount = $request->get('total_amount');
        $row_count = $request->get('product_count');
        $order_id = $request->get('order_id');

        $oOrder = Orders::updateOrCreate([ 'order_no' => 'xx',
                                           'amount' => $total_amount,
                                           'status' => 'Pending',
                                           'created_by' => $userid], ['id' => $order_id]);

        $oOrderAddress = OrdersAddresses::create(['order_id' => $oOrder->id,
                                                  'firstname' => $request->get('firstname'),
                                                  'lastname' => $request->get('lastname'),
                                                  'companyname' => $request->get('companyname'),
                                                  'email' => $request->get('email'),
                                                  'phone' => $request->get('phone'),
                                                  'country' => $request->get('country'),
                                                  'address' => $request->get('address'),
                                                  'appartmentno' => $request->get('appartmentno'),
                                                  'city' => $request->get('city'),
                                                  'state' => $request->get('state'),
                                                  'zipcode' => $request->get('zipcode'),
                                                  'notes' => $request->get('order_comments','-'),
                                                  'created_by' => $userid,
                                                  'updated_by' => $userid], ['id' => $order_id]);


        if($order_id == ''){
            for ($i=1; $i <=$row_count ; $i++) {

                $product_id = $request->get('product_id'.$i);
                $product_qty = $request->get('product_qty'.$i);
                $product_amount = $request->get('product_amount'.$i);

                OrderProductQty::create(['order_id' => $oOrder->id,
                    'product_id' => $product_id,
                    'product_price' => $product_amount,
                    'qty' => $product_qty], ['id' => $order_id]);

            }
        }

        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        try{
            $charge = \Stripe\Charge::create([
//                'amount' => $total_amount*100,
                'amount' => $total_amount,
                'currency' => 'usd',
                'description' => 'order from : '.$username,
                'source' => $token,
                "expand" =>array("balance_transaction")
            ]);

            $sTransactionId = $charge->id;
            $iStripeFee = $charge->balance_transaction->fee;
            $iAmount = $charge->balance_transaction->net;
            $status = 'charged';
            $sFailedReason = '';
            $sOrderStatus = 'Payment Successfull';

        }catch (\Exception $e) {
            $sTransactionId = '';
            $iStripeFee = 0;
            $iAmount = 0;
            $status = 'failed';
            $sFailedReason = $e->getMessage();
            $sOrderStatus = 'Payment Failed';
        }

        OrderPayments::create(['provider' => 'Stripe',
                                'order_id' => $oOrder->id,
                                'transaction_id' => $sTransactionId,
                                'order_total' => $total_amount,
                                'provider_fee' => $iStripeFee,
                                'amount' => $iAmount,
                                'status' => $status,
                                'failed_reason' => $sFailedReason]);

        $oOrder->status = $sOrderStatus;
        $oOrder->save();

        if($sOrderStatus == 'Payment Failed'){
            return redirect('/checkout')->with(['order_id' => $oOrder->id, 'order_no' => $oOrder->order_no]);
        }

        $products = DB::table('products')
            ->join('product_cart', 'products.id', '=', 'product_cart.product_id')
            ->select('products.*', 'product_cart.qty', 'product_cart.id as cartid ')
            ->where('product_cart.created_by',$userid)
            ->get();

        $useremail = Session::get('useremail');
        $subject = "Thank you for your order";
        $messagecontent = "";
            $msgcontent = '<div style="width:100%px;text-align:center;margin: 0;">';
            $msgcontent .='<table width="100%" border="0" cellspacing="0" cellpadding="0"><tbody>';
            $msgcontent .='<tr><td style="background:#cdcdcd; font-family:Helvetica, Arial;font-size:14px;padding-top:15px;padding-bottom:15px;">';
            $msgcontent .='<table width="500" border="0" cellspacing="0" cellpadding="0" style="background: #ffffff;margin:0 auto; width:500px;"><tbody>';
            $msgcontent .='<tr><td style="background:#94c440; color:#FFF; text-align:center;padding:30px 15px; font-size:18px;"><strong>Africa Innovation Market</strong></td></tr></tbody></table>';
            $msgcontent .='<p><b>Dear '.$request->firstname.' '.$request->lastname.', </b></p>';
            $msgcontent .='<table>';
            $msgcontent .='<thead>';
            $msgcontent .='<tr>';
            $msgcontent .='<td>Name</td><td>Description</td><td>Price</td><td>Quantity</td><td>Total</td>';
            $msgcontent .='</tr><tbody>';
            foreach ($products as $product) {
                $msgcontent .= '<tr>';
                $msgcontent .='<td>'.$product->name.'</td><td>'.$product->short_desc.'</td><td>$ '.$product->sale_price.'</td><td>'.$product->qty.'</td><td>$ '.($product->sale_price * $product->qty).'</td>';
                $msgcontent .= '</tr>';
            }
            $msgcontent .='</tbody></thead>';
            $msgcontent .='</table>';
            $msgcontent .='<p>Thank you for your order! ';
            $msgcontent .='<p>Your order with AIM marketplace is successfully added. </p>';
            $msgcontent .='<br><br>
                Kind Regards,<br><b>AIM Team</b>
                </p>';



        $toemailid= $useremail;
        $toemailid1= $request->email;
        $data = array( 'replytoemail' => 'aim@acropolisinfotech.com', 'subject' => $subject, 'content' => $msgcontent);


        Mail::send('home.reminder', $data, function ($m) use ($data, $toemailid, $toemailid1)  {
            $m->from('aim@acropolisinfotech.com', 'Africa Innovation Market');
            $m->replyTo($data['replytoemail'], $username = null);
            if($toemailid != null) {
                $m->bcc($toemailid);
            }
            $m->to($toemailid1, '')->subject($data['subject']);
        });

        DB::table('product_cart')->where('created_by',$userid)->delete();
            //dd("payment successfully!");
            return view('order.placeorder');

    }

    public function funding(Request $request)
    { 

        //print_r($request->all()); exit();

        $userid = Session::get('userid');
        $groupid = Session::get('groupid');
        $username = Session::get('username');
        $amount = $request->amount;
        if($groupid == '4'){
        $id = DB::table('project_funding')->insertGetId(['project_from' => $request->project_id, 'amount' => $request->amount, 'pay_type' => $request->pay_type, 'comments' => $request->comments,'created_by' => $userid,'updated_by' => $userid,'created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
        }
        else if($groupid == '3'){
        $id = DB::table('project_donations')->insertGetId(['project_from' => $request->project_id, 'amount' => $request->amount, 'pay_type' => $request->pay_type, 'comments' => $request->comments,'created_by' => $userid,'updated_by' => $userid,'created_at' => Carbon::now(),'updated_at' => Carbon::now()]);
        }
        $transactionsid = DB::table('transactions')->insertGetId(['money_from' => $userid, 'amount' => $request->amount, 'money_to' => $request->project_id,'created_by' => $userid,'updated_by' => $userid]);


            // Set your secret key: remember to change this to your live secret key in production
            // See your keys here: https://dashboard.stripe.com/account/apikeys

            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];
            $charge = \Stripe\Charge::create([
//            'amount' => $amount*100,
            'amount' => $amount,
            'currency' => 'usd',
            'description' => 'funding from : '.$username,
            'source' => $token,
            ]);

            //dd("payment successfully!");
            return view('order.donation');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Orders::find($id);
        return view('order.view',['order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delcart($id)
    {
        DB::table('product_cart')->where('id',$id)->delete();
        return redirect('/cart');
    }

    public function destroy($id)
    {
        //
    }
}

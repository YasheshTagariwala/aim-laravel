<?php

namespace App\Http\Controllers;

use App\Models\BankAccountDetails;
use App\Models\MarketPlaceMedia;
use App\Models\MarketPlaceSettings;
use App\Models\MarketPlaceSocialLinks;
use App\Models\OrderProductQty;
use App\Models\Orders;
use App\Models\Products;
use App\Models\UserDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Session;
use DB;

class MarketplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        ini_set('max_execution_time','0');
        $sCategory = '';
        $sName = '';
        $sCategory = $request->category;
        $sName = $request->searchterm;
        //print_r($category); exit();
        $oProducts = Products::where('delete_status','0')->orderBy('created_at','desc')->where('categories','like','%'.$sCategory.'%')->where('name','like','%'.$sName.'%')->get();
        $top_seller = OrderProductQty::select(DB::raw('product_id,sum(qty) as qty'))->groupBy('product_id')->orderBY('qty','desc')->limit(5)->pluck('product_id');
        $top_seller = Products::whereIn('id',$top_seller)->pluck('userid');
        if($top_seller) {
            $top_seller = array_unique($top_seller->toArray());
        }else {
            $top_seller = [];
        }
        $top_seller = UserDetails::whereIn('id',$top_seller)->get();
        //$recent = DB::table('products')->where('delete_status','0')->orderBy('created_at','desc');
        //print_r($products); exit();
        return view("marketplace.index", ["products" => $oProducts, "category" => $sCategory
            , "name" => $sName ,'top_seller' => $top_seller]);
    }

    public function dashboard()
    {
        return view("marketplace.dashboard");
    }

    public function settings()
    {
        $userid = Session::get('userid');
        $oMarketPlace = MarketPlaceSettings::where('org_id', '=', $userid)->first();

        return view("marketplace.setting", ['marketplace' => $oMarketPlace]);
    }

    public function account()
    {
        $userid = Session::get('userid');
        $oBankAccountDetails = BankAccountDetails::where('marketplace_id', '=', $userid)->first();
        return view("marketplace.account", ['bankAccountDetails' => $oBankAccountDetails]);
    }

    public function accountUpdate(Request $request)
    {
        $userid = Session::get('userid');
        $oBankAccountDetails = BankAccountDetails::updateOrCreate(['marketplace_id' => $userid],
                                                                       ['account_type' => $request->vendor_bank_account_type,
                                                                        'account_number' => $request->vendor_bank_account_number,
                                                                        'account_holder' => $request->vendor_account_holder_name,
                                                                        'bank_name' => $request->vendor_bank_name,
                                                                        'abn_routing_number' => $request->vendor_aba_routing_number,
                                                                        'bank_address' => $request->vendor_bank_address,
                                                                        'destination_currency' => $request->vendor_destination_currency,
                                                                        'bank_iban' => $request->vendor_iban,
                                                                        'created_by' => $userid,
                                                                        'updated_by' => $userid] );

        return redirect('/market-place/account')->with(['status' => 'success', 'message' => 'Bank Account Details Saved Successfully.']);
    }

    public function product()
    {
        return view("marketplace.product");
    }

    public function product_list()
    {
        $oProducts = Products::all();
        return view("marketplace.product-list", ['products' => $oProducts]);
    }

    public function orders()
    {
        $mStartDate = Carbon::now()->startOfMonth();
        $mEndDate = Carbon::now()->endOfMonth();
        $userid = Session::get('userid');

        $oOrders = Orders::where('created_by', '=', $userid)->where('delete_status', '=', 0)->get();
        //$oOrders->whereBetween('created_at', [$mStartDate, $mEndDate])->get();
        return view("marketplace.orders", ['orders' => $oOrders]);
    }

    public function report()
    {
        return view("marketplace.report");
    }

    public function requirment()
    {
        return view("marketplace.requirment");
    }

    public function requirment_details()
    {
        return view("marketplace.requirment-r");
    }

    public function messages()
    {
        return view("marketplace.messages");
    }

    public function payment()
    {
        return view("marketplace.payment");
    }

    public function exeleadmen()
    {
        return view("marketplace.exeleadmen");
    }

    public function sellerDetails(Request $request,$userid) {
        $user = UserDetails::find($userid);
        $products = Products::where('userid',$userid)->get();
        return view("marketplace.seller_details",['user' => $user,'products' => $products]);
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

        // $product_img = Input::file('product_img');
        $userid = Session::get('userid');

        $uploadFolder = 'org_'. $userid;
        $newLogoFIleUrl = '';
        if ($request->hasFile('marketPlaceLogoUpload')) {
            $logo = $request->file('marketPlaceLogoUpload');
            $name = 'logo-'.time().'.'.$logo->getClientOriginalExtension();
            $newLogoFIleUrl = $uploadFolder.'/'.$name;

            $oMarketPlace = MarketPlaceSettings::where('org_id', '=', $userid)->first();
            if($oMarketPlace){
                if(Storage::exists($oMarketPlace->logopath)){
                    Storage::delete($oMarketPlace->logopath);
                }
            }
            Storage::putFileAs($uploadFolder, $logo, $name, 'public');
        }


        for($i = 0; $i <= $request->numberOfFiles; $i++){
            if($request->has('mktuploadmediatype_'.$i)){
                $sMktuploadType = $request->{'mktuploadmediatype_'.$i};
                $sMktUploadTitle = $request->{'fileuploadTitle_'.$i};
                switch ($sMktuploadType){
                    case 'videos':
                        if($request->{'videoembed_'.$i}){
                            MarketPlaceMedia::create(['marketplace_id' => $userid,
                                                      'media_type' => $sMktuploadType,
                                                      'media_title' => $sMktUploadTitle,
                                                      'media_content' => $request->{'videoembed_'.$i} ]);
                        }
                        break;
                    default:
                        $this->uploadMarketPlaceMedia($request, $sMktuploadType, $sMktUploadTitle, $i);
                        break;

                }
            }
        }



        $oMarketPlace = MarketPlaceSettings::updateOrCreate(['org_id' => $userid],
                                                            ['storename' => $request->store_name,
                                                             'store_slug' => $request->store_slug,
                                                             'description' => $request->description,
                                                             'phone' => $request->phone,
                                                             'email' => $request->email,
                                                             'buyer_msg' => $request->buyer_msg,
                                                             'addressline1' => $request->address_1,
                                                             'addressline2' => $request->address_2,
                                                             'country' => $request->country,
                                                             'state' => $request->state,
                                                             'city' => $request->city,
                                                             'zipcode' => $request->zipcode,
                                                             'created_by' => $userid,
                                                             'updated_by' => $userid] );

        if($newLogoFIleUrl){
            $oMarketPlace->logopath = $newLogoFIleUrl;
            $oMarketPlace->save();
        }

        Session::put('storelogo',$oMarketPlace->getLogoUrl());
        Session::put('storename',$oMarketPlace->storename);

        $oMarketPlaceSocialLinks = MarketPlaceSocialLinks::updateOrCreate(['org_id' => $userid],
                                                                          ['fb_link' => $request->fb_link,
                                                                           'tw_link' => $request->tw_link,
                                                                           'linked_link' => $request->linked_link,
                                                                           'gp_link' => $request->gp_link,
                                                                           'yt_link' => $request->yt_link,
                                                                           'insta_link' => $request->insta_link]);
         

        return redirect('/market-place/settings')->with(['status' => 'success', 'message' => 'Market Place Settings Details Saved Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }

    public function deleteMarketPlaceMedia($id){
        $oMarketPlaceMedia = MarketPlaceMedia::find($id);
        if($oMarketPlaceMedia){
            $sTitle = $oMarketPlaceMedia->media_title;
            if($oMarketPlaceMedia->media_type=='videos'){
                $oMarketPlaceMedia->delete();
                $sMessage = "Video Deleted Successfully";
            }else{
                if(Storage::exists($oMarketPlaceMedia->media_content)){
                    Storage::delete($oMarketPlaceMedia->media_content);
                }
                $oMarketPlaceMedia->delete();
                $sMessage = "Media File $sTitle Deleted Successfully";
            }
            return redirect('market-place/settings')->with(['status' => 'success', 'message' => $sMessage]);
        }

        return redirect('market-place/settings')->with(['status' => 'danger', 'message' => 'No Such Media Attachment Exists.']);
    }

    private function uploadMarketPlaceMedia($request, $sMktuploadType, $sMktUploadTitle, $i){

        $userid = Session::get('userid');
        $uploadFolder = 'org_'. $userid.'/marketplacemedia';

        if ($request->hasFile('fileuploadBox_'. $i)) {
            $mediaFile = $request->file('fileuploadBox_'. $i);
            $sNewName = time().'.'.$mediaFile->getClientOriginalExtension();
            $newFIleUrl = $uploadFolder.'/'.$sNewName;
            Storage::putFileAs($uploadFolder, $mediaFile, $sNewName, 'public');

            MarketPlaceMedia::create(['marketplace_id' => $userid,
                                      'media_type' => $sMktuploadType,
                                      'media_title' => $sMktUploadTitle,
                                      'media_content' => $newFIleUrl]);
        }
    }

    public function customEnquiryStore(Request $request) {
        $customEnquiry['email'] = $request->email;
        $customEnquiry['category_id'] = $request->cat;
        $customEnquiry['category_name'] = $request->cat_text;
        $customEnquiry['requirement'] = $request->requirement;
        $customEnquiry['created_at'] = date('Y-m-d H:i:s');
        $customEnquiry['updated_at'] = date('Y-m-d H:i:s');

        DB::table('custom_product_enquiries')->insert($customEnquiry);

        return redirect('market-place')->with(['status' => 'success', 'message' => 'Enquiry Sent Successfully']);
    }

}

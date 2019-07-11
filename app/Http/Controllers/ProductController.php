<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Session;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $oProduct = Products::find($id);
        return view("product.index", ['product' => $oProduct]);
    }

    public function recent()
    {
        return view("product.recent");
    }

    public function requirement_lists()
    {
        $oProducts = Products::where('delete_status','0')->get();
        return view("product.requirements", ["products" => $oProducts]);
    }

    public function requirement_new()
    {
        return view("product.requirement-new");
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

        $userid = Session::get('userid');
        $category = implode(',', $request->category);


        $aData = ['name' => $request->name,
                  'short_desc' => $request->short_message,
                  'description' => $request->message,
                  'categories' => $category,
                  'product_data' => $request->product_data,
                  'sale_price' => $request->price,
                  'start_date' => $request->start_date,
                  'end_date' => $request->end_date,
                  'tags' => $request->tags,
                  'userid' => $userid,
                  'created_by' => $userid];
         
        $oProduct = Products::create($aData);

        $iProductId= $oProduct->id;
        $uploadFolder = 'org_'. $userid.'/products/product-'.$iProductId;
        if ($request->hasFile('product_img')) {
            $oProductImg = $request->file('product_img');
            $name = time().'.'.$oProductImg->getClientOriginalExtension();
            $sProductImageUrl = $uploadFolder.'/'.$name;

            Storage::putFileAs($uploadFolder, $oProductImg, $name, 'public');

            $oProduct->imagepath = $sProductImageUrl;
            $oProduct->save();
        }

        return redirect( '/product/' . $iProductId .'/edit');

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
        $oProduct = Products::find($id);
        return view("marketplace.product-edit", ['product' => $oProduct, 'categories' => explode(',', $oProduct->categories)]);
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
        $userid = Session::get('userid');
        $category = implode(',', $request->category);

        $aData = [  'name' => $request->name,
                    'short_desc' => $request->short_message,
                    'description' => $request->message,
                    'categories' => $category,
                    'product_data' => $request->product_data,
                    'sale_price' => $request->price,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'tags' => $request->tags,
                    'userid' => $userid,
                    'updated_by' => $userid];

        $oProduct = Products::where('id', '=', $id)->update($aData);

        $oProduct = Products::find($id);

        $iProductId= $oProduct->id;
        $uploadFolder = 'org_'. $userid.'/products/product-'.$iProductId;
        if ($request->hasFile('product_img')) {
            $oProductImg = $request->file('product_img');
            $name = time().'.'.$oProductImg->getClientOriginalExtension();
            $sProductImageUrl = $uploadFolder.'/'.$name;

            Storage::putFileAs($uploadFolder, $oProductImg, $name, 'public');

            $oProduct->imagepath = $sProductImageUrl;
            $oProduct->save();
        }

        return redirect( '/product/' . $iProductId .'/edit');
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
}

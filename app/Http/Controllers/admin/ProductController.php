<?php

namespace App\Http\Controllers\admin;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $oProducts = Products::where('delete_status','0')->paginate(10);
        return view('admin.products.index', ['products' => $oProducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = DB::table('categories')->where('groupid','1')->get();
      return view('admin.products.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $imagepath = Input::file('imagepath');
        if($imagepath)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $imagepath->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('imagepath')->move($destinationPath, $recfilename);
              $certificatePath = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }

        
        DB::table('products')->insert([
        ['name' => $request->name, 'short_desc' => $request->short_desc,'description' => $request->description, 'product_data' => $request->product_data,  'sale_price' => $request->sale_price, 'start_date' => $request->start_date, 'end_date' => $request->end_date, 'categories' => $request->category, 'tags' => $request->tags, 'imagepath' => $certificatePath, 'userid' => $request->userid  ]
        ]);
        return redirect('/admin/products');
        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $oProduct = Products::where('id',$id)->where('delete_status','0')->first();
        return view('admin.products.show', ['product' => $oProduct]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
      $categories = DB::table('categories')->where('groupid','1')->get();
        $mydetails = DB::table('products')->where('id',$id)->get();
        return view('admin.products.edit',compact('mydetails','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
       $imagepath = Input::file('imagepath');
        if($imagepath)
         {
  
              $destinationPath = $_SERVER['DOCUMENT_ROOT'].'/files/logo';           
              $timestamp = str_replace([' ', ':'], '-', date("YmdHis"));
              $namefile = $imagepath->getClientOriginalName();    
              $recfilename1 = preg_replace('/\s+/', '', $namefile);
              $recfilename = $timestamp."_123_".$recfilename1;
              $upload_success = Input::file('imagepath')->move($destinationPath, $recfilename);
              $certificatePath = ('http://'.$_SERVER['HTTP_HOST']."/files/logo/".$recfilename);

         }

        DB::table('products')->where('id',$request->id)->update([
    'name' => $request->name, 'short_desc' => $request->short_desc,'description' => $request->description, 'product_data' => $request->product_data,  'sale_price' => $request->sale_price, 'start_date' => $request->start_date, 'end_date' => $request->end_date, 'categories' => $request->category, 'tags' => $request->tags, 'imagepath' => $certificatePath, 'userid' => $request->userid  
        ]);
        return redirect('/admin/products');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
      DB::table('products')->where('id',$id)->
       update([ 'delete_status' => '1' ]);
        return redirect('/admin/products');
    }
}

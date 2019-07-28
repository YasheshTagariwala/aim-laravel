<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use App\Models\ProductsFavorite;
use App\Models\ProductsRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
        $userid = Session::get('userid');
        $oProduct = Products::find($id);
        $product_ratings = ProductsRating::where('product_id',$id)->get();
        $rating = Orders::whereHas('orderProducts',function($query) use ($id){
            $query->where('product_id',$id);
        })->where('created_by', '=', $userid)->where('delete_status', '=', 0)->get();
        return view("product.index", ['product' => $oProduct,'product_ratings' => $product_ratings,'rating' => $rating]);
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

        $video = $request->product_video;
        if($video) {
            $namefile = $video->getClientOriginalName();
            $recfilename = time().".".$namefile;
            $video_path = $uploadFolder .'/'.$recfilename;
            Storage::putFileAs($uploadFolder,$video,$recfilename,'public');

            $oProduct->video_link = $video_path;
            $oProduct->save();
        }

        if($request->product_youtube_link) {
            $youtube_link = $request->product_youtube_link;
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

            if (preg_match($longUrlRegex, $youtube_link, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            $youtube_link = 'https://www.youtube.com/embed/' . $youtube_id;
            $oProduct->youtube_link = $youtube_link;
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

        $video = $request->product_video;
        if($video) {
            $namefile = $video->getClientOriginalName();
            $recfilename = time().".".$namefile;
            $video_path = $uploadFolder .'/'.$recfilename;
            Storage::putFileAs($uploadFolder,$video,$recfilename,'public');

            $oProduct->video_link = $video_path;
            $oProduct->save();
        }

        if($request->product_youtube_link) {
            $youtube_link = $request->product_youtube_link;
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

            if (preg_match($longUrlRegex, $youtube_link, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            $youtube_link = 'https://www.youtube.com/embed/' . $youtube_id;
            $oProduct->youtube_link = $youtube_link;
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

    public function ratingStore(Request $request) {
        $userid = Session::get('userid');
        $rating = ProductsRating::where('userid',$userid)->where('product_id',$request->get('product_id'))->first();
        if(!$rating) {
            $rating = new ProductsRating();
        }
        $rating->product_id = $request->get('product_id');
        $rating->rating = $request->get('rating');
        $rating->userid = $userid;
        $rating->review = $request->get('review');
        $rating->save();

        return redirect( '/product/' . $request->get('product_id'));
    }

    public function addToFavorite(Request $request) {
        $userid = Session::get('userid');
        $product_favorite = ProductsFavorite::where('product_id',$request->id)->where('userid',$userid)->first();
        if($product_favorite) {
            $product_favorite->delete_status = 0;
            $product_favorite->save();
            return redirect()->back()->with('message','Product added to your favorites');
        }else {
            $product_favorite = new ProductsFavorite();
            $product_favorite->product_id = $request->id;
            $product_favorite->userid = $userid;
            $product_favorite->save();
            return redirect()->back()->with('message','Product added to your favorites');
        }
    }

    public function deleteFavorite(Request $request) {
        $userid = Session::get('userid');
        ProductsFavorite::where('product_id',$request->id)
            ->where('userid',$userid)
            ->update(['delete_status' => 1]);
        return response()->json(['status' => true],200);
    }
}

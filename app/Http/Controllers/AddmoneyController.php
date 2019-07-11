<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class AddmoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.addmoney');
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
    // public function store(Request $request)
    // {
    //     //print_r($request->all()); exit();

    // \Stripe\Stripe::setApiKey ( 'pk_test_5n726IGSPr6fUut6JPKdj5cj' );
    // try {
    //     \Stripe\Charge::create ( array (
    //             "amount" => 300 * 100,
    //             "currency" => "usd",
    //             "source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
    //             "description" => "Test payment." 
    //     ) );
    //     return redirect('/addmoney')->with('message', 'Payment done successfully !' );
    //     //return Redirect::back ();
    // } catch ( \Exception $e ) {
    //     return redirect('/addmoney')->with('message', 'Error! Please Try again.' );
    //     //Session::flash('fail-message', "Error! Please Try again." );
    //     //return Redirect::back ();
    // }
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    { 
            // Set your secret key: remember to change this to your live secret key in production
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey("sk_test_x72DLrJsBn6pvMgpvtEHJ4xp");

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];
            $charge = \Stripe\Charge::create([
            'amount' => 999,
            'currency' => 'usd',
            'description' => 'Example charge',
            'source' => $token,
            ]);

            dd("payment successfully!");

    }
    
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
}

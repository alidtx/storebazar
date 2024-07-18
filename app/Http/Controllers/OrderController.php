<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\User;
use App\Models\Product;
use App\Models\Notifications;

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd('test');
        $orderDetails = Orders::with("orderItems")->where("id",$id)->first();
        $sellerInfo = User::where('id',$orderDetails->seller_id)->first();
        $buyerInfo = User::where("id",$orderDetails->customer_id)->first();
        $productInfo = Product::where("id", $orderDetails->product_id)->first();
        
        return view("pages.order-details",[
            'details'=>$orderDetails,
            'seller'=>$sellerInfo,
            'buyer'=>$buyerInfo,
            'product'=>$productInfo,
            'area_list' => $this->divisional_areas(),
            'notifications'=> Notifications::where(["notifiable_id"=>0,'read_at'=>NULL])->latest()->get()
        ]);
    }

    private function divisional_areas()
    {
        return [
            'ctg' => "চট্টগ্রাম",
            'dhk' => "ঢাকা",
            'bar' => "বরিশাল",
            'raj' => "রাজশাহী",
            'rang' => "রংপুর",
            'mym' => "ময়মনসিংহ",
            'mym' => "খুলনা",
        ];
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

<?php

namespace App\Http\Controllers;

use App\Pesanan;
use App\Barang;
use Auth;
use App\PesanaDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesananController extends Controller
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
    public function store(Request $request,$id)
    {
        $item = Barang::where('id',$id)->first();

        $cek_order = Pesanan::where('user_id',Auth::user()->id)->first();

        if(empty($cek_order)){
            $order = new Pesanan();
            $order->user_id = Auth::user()->id;
            $order->order_date = Carbon::now();
            $order->status = 0;
            $order->total_price = 0;
            $order->save();
        }

        $new_order = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();

        $cek_order_detail = PesanaDetail::where('item_id',$item->id)->where('order_id',$new_order->id)->first();

        if(!$cek_order_detail){
            $order_detail = new PesanaDetail();
            $order_detail->item_id = $item->id;
            $order_detail->order_id = $new_order->id;
            $order_detail->total = $request->quantity;
            $order_detail->total_price = $item->price * $request->quantity;
            $order_detail->save();
        }else{
            $order_detail = PesanaDetail::where('item_id',$item->id)->where('order_id',$new_order->id)->first();
            $order_detail->total = $order_detail->total + $request->quantity;
            $new_price = $item->price * $request->quantity;
            $order_detail->total_price = $order_detail->price + $new_price;
            $order_detail->update();
        }
        
        $order = Pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $order->total_price = $order->total_price + $item->price * $request->quantity;
        $order->update();

        return redirect('home');

         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Barang::where('id',$id)->first();
        return view('pesan.index',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}

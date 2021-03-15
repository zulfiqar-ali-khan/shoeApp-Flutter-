<?php

namespace App\Http\Controllers;

use App\Order;
use App\Stock;
use Illuminate\Http\Request;

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
        try {

            $orders = Order::with('customer','brand','shoedetails','store')->get();
            return response()->json([
                'success' => true,
                'data' => $orders,
            ]);


        } catch (\Exception $e) {

             return response()->json([
                'success' => false,
                'data' => $e->getMessage(),
            ]);

        }
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

       try {

            $stock = $request->validate([
                'brand_id' => 'required',
                'store_id'    => 'required',
                'shoe_id'  => 'required',
                'quantity'  => 'required',
            ]);

            $stock['sale_stock'] = $request->quantity;
            $stock['add_stock'] = 0;
            $stocks = Stock::create($stock);

            $data = $request->validate([
                'brand_id'     => 'required',
                'store_id'     => 'required',
                'shoe_id'      => 'required',
                'customer_id'  => 'required',
                'quantity'     => 'required',
                'total_amount' => 'required',
            ]);


            $orders = Order::create($data);

            return response()->json([
                'success' => true,
                'Message' => 'Order Created',
            ]);


       } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ]);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

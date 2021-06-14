<?php

namespace App\Http\Controllers;

use App\OrderInv;
use App\Brand;
use App\Stock;
use App\Customer;
use App\Store;
use App\Order;
use Illuminate\Http\Request;

class OrderInvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orderinvs = OrderInv::with('customer')->get();
        return view('order.multiorder', compact('orderinvs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brands = Brand::all();
        $customers = Customer::all();
        $stores = Store::all();
        return view('order.multiorderform', compact('brands','customers','stores'));
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

        // dd($request->all());

        try {
            $inv = OrderInv::max('inv')+1;
            $data = array(
                'customer_id' => $request->customer_id,
                'total_amount' => $request->total_amount,
                'date' => $request->date,
                'inv' => $inv,
            );

            $invs = OrderInv::create($data);

            if($invs){
                foreach ($request->store_id as $key => $store) {
                    
                    $details =  array(
                        'customer_id'  => $request->customer_id,
                        'store_id'     => $store,
                        'brand_id'     => $request->brand_id[$key],
                        'shoe_id'      => $request->shoe_id[$key],
                        'quantity'     => $request->quantity[$key],
                        'total_amount' => $request->total_amount,
                        'date'         => $request->date,
                        'inv_id'       => $invs->id,
                   );
                   $orders = Order::create($details);
                  if($orders){

                    // $mix = $orders->id;
                   
                    $datastock = array(
                     'store_id'   => $store,
                     'brand_id'   => $request->brand_id[$key],
                     'shoe_id'    => $request->shoe_id[$key],
                     'date'       => $request->date,
                     'sale_stock' => $request->quantity[$key],
                     'add_stock'  => 0,
                     'order_id'   => $invs->id,
                    ); 
                    $stock = Stock::create($datastock);
                  }

                }
            }

            if($stock){
                return redirect()->route('orderinv.index')->with('message','Order Added');
            }
            
            
        } catch (\Exception $e) {

            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderInv  $orderInv
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $orders = Order::where('inv_id',$id)->with('customer','brand','shoedetails','store')->orderBy('id','DESC')->get();
        return view('order.showorder', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderInv  $orderInv
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderInv $orderInv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderInv  $orderInv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderInv $orderInv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderInv  $orderInv
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // return $id;
        $row = OrderInv::find($id);
        $res = $row->delete();
        $res3 = Order::where('inv_id',$id)->delete();
        $res2 = Stock::where('order_id',$id)->delete();
        if($res && $res2 && $res3){
            return  redirect()->route('orderinv.index')->with('Message','Order Deleted');
        }
        
    }
}

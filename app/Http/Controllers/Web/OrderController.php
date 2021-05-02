<?php

namespace App\Http\Controllers\Web;

use App\Brand;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Order;
use App\ShoeDetails;
use App\Store;
use App\Stock;

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
        $orders = Order::with('customer','brand','shoedetails','store')->orderBy('id','DESC')->get();
        $brands = Brand::all();
        $customers = Customer::all();
        $stores = Store::all();
        // return $orders;
        return view('order.index',compact('orders','brands','customers','stores'));
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
    //    dd($request->all());
        try {

             $row =  array(
                 'customer_id'  => $request->customer_id,
                 'store_id'     => $request->store_id,
                 'brand_id'     => $request->brand_id,
                 'shoe_id'      => $request->shoe_id,
                 'quantity'     => $request->quantity,
                 'total_amount' => $request->total_amount,
                 'date'         => $request->date,
            );
             $orders = Order::create($row);

           

            $max = $orders->id;
            
            if($orders){
                
               $data = $request->validate([
                    'brand_id' => 'required',
                    'store_id' => 'required',
                    'shoe_id'  => 'required',
                    'quantity' => 'required',
                    'date'     => 'required',
                ]);
    
                $data['sale_stock'] = $request->quantity;
                $data['add_stock'] = 0;
                $data['order_id'] = $max;

                $stock = Stock::create($data);
            }

            if($stock){
                return redirect()->route('order.index')->with('message','Order Added');
            }

       } catch (\Exception $e) {

            return $e->getMessage();
       }
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
        $id2 = Order::find($id);
        $result = $id2->delete();
        if(Stock::where('order_id',$id)->delete()){
            return redirect()->route('order.index')->with('message','Order Deleted');
        }
    }


    // Ajaxes
    public function takeshoes(Request $request){
        
        $brands = ShoeDetails::where('brand_id',$request->brand_id)->get();
        return response()->json($brands);
    }


    // public function takestock(Request $request){
    //     $brands = ShoeDetails::where('brand_id',$request->brand_id)->get();
    //     return response()->json($brands);
    // }


    public function datebetween(Request $request)
    {
        $orders = Order::whereBetween('date', [$request->from, $request->to])->with('customer','brand','shoedetails','store')->get();
        return view('order.datebetween',compact('orders'));  
    }
}

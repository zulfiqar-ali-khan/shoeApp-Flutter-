<?php

namespace App\Http\Controllers;

use App\Brand;
use App\store;
use App\ShoeDetails;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StockController extends Controller
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

        $stocks = Stock::with('brand','store','shoedetails')->get();
        // // return $stocks;
        // $brands = Brand::all();
        // $stores = store::all();
        // return view('stock.index',compact('brands','stores','stocks'));
           
            // $data = Stock::all();

            return response()->json([
                'success' => true,
                'data' => $stocks
            ]);


       } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
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

            $data = $request->validate([
                'brand_id' => 'required',
                'store_id' => 'required',
                'shoe_id'  => 'required',
                'quantity' => 'required',
            ]);

            $data['add_stock'] = $request->quantity;
            $data['sale_stock'] = 0;

            $result = Stock::create($data);
            
            return response()->json([
                'success' => true,
                'Message' => 'Stock Created'
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    try {
        $filter = CustomOrder::where('brand_name',$id)->sum('quantity');
        $stock = stock::where('brand_name',$id)->sum('shoe_quantity');
        $tstock = $stock - $filter;
        // $filter = Stock::where('brand_name',$id)->get();
        return response()->json([
            'success' => true,
            'data' => $tstock
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage()
        ]);
    }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Store;
use App\ShoeDetails;
use App\Stock;

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
        $stocks = Stock::with('brand','store','shoedetails')->get();
        // return $stocks;
        $brands = Brand::all();
        $stores = Store::all();
        return view('stock.index',compact('brands','stores','stocks'));
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
        // dd($request->all());
        try
        {
            
            $data = $request->validate([
                'brand_id' => 'required',
                'store_id'    => 'required',
                'shoe_id'  => 'required',
                'quantity'  => 'required',
                'date'  => 'required',
            ]);

            $data['add_stock'] = $request->quantity;
            $data['sale_stock'] = 0;
            $data['order_id'] = 0;

            


            $stock = Stock::create($data);

            if($stock){
                return redirect()->route('stock.index')->with('message','Stock added');

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
        $id = Stock::find($id);
        $result = $id->delete();
        if($result){
            return redirect()->route('stock.index')->with('message','Stock Deleted');
        }
    }

    public function takeshoesstock(Request $request){
        
        $brands = ShoeDetails::where('brand_id',$request->brand_id)->get();
        return response()->json($brands);
    }


    public function datebetweenstock(Request $request)
    {
        $stocks = Stock::where('brand_id',$request->brand_id)->whereBetween('date', [$request->from, $request->to])->with('brand','store','shoedetails')->get();
        // return $stocks;
        return view('stock.stockbetween',compact('stocks'));  
    }
}

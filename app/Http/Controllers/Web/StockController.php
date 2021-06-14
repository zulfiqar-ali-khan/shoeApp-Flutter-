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
        $brands = Brand::all();
        $stores = Store::all();
        return view('stock.multistock',compact('brands','stores'));
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
                'store_id' => 'required',
                'shoe_id'  => 'required',
                'quantity' => 'required',
                'date'     => 'required',
            ]);

            foreach ($request->shoe_id as $key => $shoe) {
                if($request->quantity[$key] != 0){
                    $data = array(
                        'brand_id'   => $request->brand_id,
                        'store_id'   => $request->store_id,
                        'shoe_id'    => $request->shoe_id[$key],
                        'add_stock'  => $request->quantity[$key],
                        'sale_stock' => 0,
                        'order_id'   => 0,
                        'date'       => $request->date,
                    );

                    $stock = Stock::create($data);
                    
                }
            }

            // $data['add_stock'] = $request->quantity;
            // $data['sale_stock'] = 0;
            // $data['order_id'] = 0;

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
        $stock = Stock::with('shoedetails')->find($id);
        $brands = Brand::all();
        $stores = Store::all();
        return view('stock.edit', compact('stock','brands','stores'));
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
        // dd($request->all());
        try {
            
            $row = Stock::find($id);
            $row->brand_id  = $request->brand_id;
            $row->store_id  = $request->store_id;
            $row->shoe_id   = $request->shoe_id;
            $row->add_stock = $request->quantity;
            $row->date      = $request->date;
            $result = $row->update();
            if($result){
                return  redirect()->route('stock.index');
            }
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }
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

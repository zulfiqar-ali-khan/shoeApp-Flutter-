<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Store;
use App\Stock;
use App\Brand;
use App\ShoeDetails;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stores = Store::all();
        return view('store.index',compact('stores'));
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
        try {
            $data = array(
                'store_name' => $request->name,
            );

            $save = Store::create($data);
            if($save){
                return redirect()->route('store.index')->with('message','Store Added');
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
        $store = Store::find($id);
        $brands = brand::with(['stock' => function($q) use ($id){
            $q->where('store_id',$id)->selectRaw('SUM(add_stock) - SUM(sale_stock)  as totalstock , brand_id')->groupBy('brand_id');
        }])->get();
        // return $store;
        return view('store.storedetails',compact('brands','store'));
    }

    public function articalstock($store, $brand)
    {
        $articals = Stock::where(['store_id' => $store,'brand_id' => $brand])->selectRaw('SUM(add_stock) - SUM(sale_stock)  as articalStock, shoe_id')->groupBy('shoe_id')->with('shoedetails')->get();
        //    return $articals; 

        return view('store.articalstock',compact('articals'));
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
        $id = Store::find($id);
        $result = $id->delete();
        if($result){
            return redirect()->route('store.index')->with('message','Store Deleted');
        }
    }
}

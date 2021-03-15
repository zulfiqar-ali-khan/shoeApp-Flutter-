<?php

namespace App\Http\Controllers\Web;

use App\Brand;
use App\Http\Controllers\Controller;
use App\ShoeDetails;
use App\Store;
use Illuminate\Http\Request;

class ShowDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shoes = ShoeDetails::with('brand','store')->get();
        $brands = Brand::all();
        $stores = Store::all();
        return view('shoes.index',compact('shoes','brands','stores'));
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
                // 'image'    => 'required',
                'quantity' => 'required',
                'color'    => 'required',
                'artical'  => 'required',
                'store_id'  => 'required',
            ]);

            // $destination = 'images';
            // $image = $request->file('image');
            // $image_uploaded_path = $image->store($destination, 'public');

            // $data['image'] = basename($image_uploaded_path);


            $shoe = ShoeDetails::create($data);

            if($shoe){
                return redirect()->route('shoedetails.index')->with('message','ShoeDetails added');

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
    }
}

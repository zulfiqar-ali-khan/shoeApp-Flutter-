<?php

namespace App\Http\Controllers;

use App\ShoeDetails;
use Illuminate\Http\Request;

class ShoeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $shoes = ShoeDetails::with('brand')->get();
        return response()->json($shoes);
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

        $data = $request->validate([
            'brand_id' => 'required',
            'image'    => 'required',
            'quantity' => 'required',
            'color'    => 'required',
            'artical'  => 'required',
        ]);

        $destination = 'public/images';
        $image = $request->image;
        $image_name = $image->getClientOriginalName(); // insert this into database
        $path = $request->image->storeAs($destination,$image_name);

        $data['image'] = $image_name;


        $shoe = ShoeDetails::create($data);

        return response()->json([
            'Message' => 'Add SuccesFull',
            'data'    => $shoe
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShoeDetails  $shoeDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ShoeDetails $shoeDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShoeDetails  $shoeDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoeDetails $shoeDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShoeDetails  $shoeDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShoeDetails $shoeDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShoeDetails  $shoeDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoeDetails $shoeDetails)
    {
        //
    }
}

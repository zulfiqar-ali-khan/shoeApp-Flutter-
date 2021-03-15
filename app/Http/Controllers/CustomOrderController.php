<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomOrder;

class CustomOrderController extends Controller
{
    //


    public function store(Request $request){

        try {
            $data = $request->validate([
                'brand_name'    => 'required',
                'name'        => 'required',
                'quantity'    => 'required',
                'number'      => 'required',
                'location'    => 'required',
                'total_price' => 'required',
                'date' => 'required',
            ]);


            $orders = CustomOrder::create($data);

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


    public function index(){

       try {
            $data = CustomOrder::with('brand')->get();

            return response()->json([
                'success' => true,
                'data' => $data
            ]);
       } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'Mwssage' => $e->getMessage()
        ]);
       }

    }
}

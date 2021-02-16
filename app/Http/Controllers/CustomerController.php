<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
           
            $customers = Customer::all();
            return response()->json([
                'success' => true,
                'data' => $customers,
            ]);

       } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
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

            $validata = $request->validate([
                'name'     => 'required',
                'contact'  => 'required|max:11',
                'location' => 'required',
                'city'     => 'required',
            ]);

            $customer = Customer::create($validata);

            return response()->json([
                'success' => true,
                'Message'    => 'Customer Created'

            ]);

       } catch (\Exception $e) {

            return response()->json([

                'success' => false,
                'error'   => $e->getMessage(),

            ]);

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}

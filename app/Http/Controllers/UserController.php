<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user =  Auth::user();

        return response()->json($user);
        
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

        $validateData = $request->validate([
            'name'     => 'required',
            'email'    => 'email|required|unique:users,email',
            'password' => 'required',
            'role'     => 'required'
        ]);  

        $validateData['password']   = bcrypt($request->password);

        
        $user                       = User::create($validateData);
        
        $accessToken                = $user->createToken('authToken')->accessToken;
        

        return response()->json([
            'success'        => true,
            'Message' => 'Register SuccessFull'
        ]);
    }

    public function login(Request $request){

        $loginData = $request->validate([
            'email'    => 'email|required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($loginData)) {
            return response()->json([
                'code'    => 403,
                'Message' => "Unauthurized..!"
            ]);
        }

        $user           = User::where("email", $request->email)->first();
        
        if (!Hash::check($request->password, $user->password, [])) {
            throw new \Exception("Error in Login");
        }

        $tokenResult    = $user->createToken("authToken")->accessToken;

        return response()->json([
            'data'    => $user,
            'Message' => 'SuccessFull',
        ]);



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

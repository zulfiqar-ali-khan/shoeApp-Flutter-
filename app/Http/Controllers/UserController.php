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
        $users = User::where('role',0)->get();
        return view('user.users',compact('users'));

        
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
            $validateData = $request->validate([
                'name'     => 'required',
                'email'    => 'email|required|unique:users,email',
                'password' => 'required',
            ]);  
    
            $validateData['password']   = bcrypt($request->password);
            $validateData['role']   = 0;
            
            $user                       = User::create($validateData);            
    
            if($user){
                return redirect()->route('user.index')->with('message','user Created');
            }

        } catch (\Exception $e) {
            
            return $e->getMessage();
        }




    }

    public function login(Request $request){

        try {
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
                'success' => true,
                'data'    => $user,
            ]);

        } catch (\Exception $e) {
            //throw $th;
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

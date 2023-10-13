<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        // dd($request->all());
        $this->checkValidation($request);
        $user = [
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
        ];
        User::create($user);
        return redirect()->route("loginPage");
    }
    public function login(Request $request){
        $email = $request->email;
        $user = User::where("email",$email)->first();
        // dd($user->password);
        if($user){
            $password = $user->password;
            if(Hash::check($request->password, $password)){
                return redirect()->route("tests.index");
            }else{
                return back();
            }
        }
    }
    private function checkValidation(Request $request){
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required|min:8|max:15',
            'confirmPassword'=>'required|min:6|max:15|same:password'
        ])->validate();
    }
}

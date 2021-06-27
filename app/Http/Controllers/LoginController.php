<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; //for password encryption--

class LoginController extends Controller
{
    function usersignin(Request $req)
    {
         $req->validate([
            'email'=>'required | email | max:30 ',
            'password'=>'required | min:4 '
         ]);

            //  return $req->input();
         
         $user = User::where('email', '=', $req->email)->first();
         if($user){
            //  return 'hi';
            if(Hash::check($req->password,$user->password)){
                // return 'hi';
                $req->session()->put('loggeduser',$user->id);
                return redirect('studentlist');
            }
            else{
                // return 'hello';
                return back()->with('passfail','Invalid Password');
            }
         }else{
             return back()->with('loginfail','this account does not exist');
         }

    }

    function logout(){
        if(session()->has('loggeduser')){
            session()->pull('loggeduser',null);
            return redirect('/');
        }
    }
    //logout using auth package-----------------------
    // use Illuminate\Support\Facades\Auth;
    // finction logout(Request $req){
    //     Auth::logout();
    //     $req->session()->flush();
    //     return redirect('/');
    // }

    //get logined user data using session--------
    // function profile(){
    //     if(session()->has('loggeduser')){
    //         $user = User::where('id', '=', session('loggeduser'))->first();
    //         $data = [
    //             'loggedinfouser' = $user
    //         ];
    //     }
    // }
}

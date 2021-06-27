<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash; //for password encryption--
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\MailController;

class RegisterController extends Controller
{
    //signup user---------------------
    function usersignup(Request $req)
    {
        $validator = $req->validate([
            'name'=>'required | max:255',
            'email'=>'required | max:30 | unique:users',
            'password'=>'required | min:4 | confirmed'
        ]);
        // return $req->input();
        $user = new User();
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->verification_code = sha1(time());
        $user->save();
        if($user){
            MailController::sendsignupEmail($user->name, $user->email, $user->verification_code);
            return redirect('/')->with('signup','you have successfully Signed Up!');
        }else{
            return redirect('signup')->with('fail','something went wrong');
        }
        
    }

   
}

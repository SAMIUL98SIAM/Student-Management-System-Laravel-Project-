<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Http\Requests\RegRequest;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration.signup');
    }
    public function signup(RegRequest $req)
    {
        // print_r($req->all());
        $newImageName=time().'-'.$req->name.'.'.$req->image->extension();
        $test=$req->image->move(public_path('profile_img'),$newImageName);
        $user = new User;
        $user->image=$newImageName;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->type = $req->type;
        $user->password =$req->password;
        $user->save();
        return redirect('/login');
    }       
       

}

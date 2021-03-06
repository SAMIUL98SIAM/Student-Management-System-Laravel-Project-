<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests\UserRequest;
use App\Models\User ;


class LoginController extends Controller
{
    public function index(){
        return view('login.index');

    }

    public function login(UserRequest $req){
            $validation = Validator::make($req->all(), [
                'email' => 'required',
                'password'=> 'required|min:5'
            ]);
                $user = User::where('email', $req->email)
                ->where('password', $req->password)
                ->where('type', $req->type)
                ->first();
            if($user['type'] =='student' && $user['active']=='1'){
                $req->session()->put('email', $req->email);
                $req->session()->put('type', $req->type);
                $req->session()->put('id', $user->id);
                // $active = '1';
                // $req->session()->put('active', $user->active);
                return redirect('/studentHome');
            }
            elseif($user["type"] =='faculty' && $user['active']=='1'){
                $req->session()->put('email', $req->email);
                $req->session()->put('type', $req->type);
                $req->session()->put('id', $user->id);
                // $req->session()->put('active', $user->active);
                return redirect('/facultyHome');
            }
            elseif($user["type"] =='admin' && $user['active']=='1'){
                $req->session()->put('email', $req->username);
                $req->session()->put('type', $req->type);
                $req->session()->put('id', $user->id);
                return redirect('/Admin');
            }
            else
            {
                $req->session()->flash('msg', 'invaild username or password');
                return redirect('/login');
            }
    }

}

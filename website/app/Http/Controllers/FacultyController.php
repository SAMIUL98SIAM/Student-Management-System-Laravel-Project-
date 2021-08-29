<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\DB;
use Validator;


class FacultyController extends Controller
{
    public function index()
    {
        return view('teacher.dashboard');
    }

    public function poststudent()
    {
      $users = User::all();  
      //  $id = session('id');
      // $projects = Buyer::where('buyer_id',$req->id)->first();
      return view('teacher.poststudent')->with('users',$users);
    }

    public function store_student(StudentRequest $req)
    {
        // print_r($req->all());
        $newImageName=time().'-'.$req->name.'.'.$req->image->extension();
        $test=$req->image->move(public_path('profile_img'),$newImageName);
        $user = new User;
        $user->image=$newImageName;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->type = "student";
        $user->password =$req->password;
        $user->save();
        return redirect('/faculty/postStudent');  
           
    }

}

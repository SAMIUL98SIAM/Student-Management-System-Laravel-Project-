<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\DB;
use Validator;


class FacultyController extends Controller
{
    public function index()
    {
        return view('teacher.dashboard');
    }


    public function profile(){
        $id = session('id');
        $user=User::where('id',$id)->first();
        return view('teacher.profile')->with('user',$user);
    // return view('teacher.profile');      
   }
  
   
   public function profile_update(ProfileRequest $req)
    {
        $id = session('id');
        $user = User::find($id);
        $newImageName=time().'-'.$req->name.'.'.$req->image->extension();
        $test=$req->image->move(public_path('profile_img'),$newImageName);
        $user->image=$newImageName;
        $user->username = $req->username;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->type = "faculty";
        $user->password =$req->password;
        $user->save();
        return redirect('/faculty/profile');//->route('/Admin/profile');
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
        $user->active = 1;
        $user->password =$req->password;
        $user->save();
        return redirect('/faculty/postStudent');  
           
    }

}

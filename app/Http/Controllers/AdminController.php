<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index()
   {
    $users=User::all();
    return view('dashboard.index',['users'=>$users]);
   }
   public function user()
   {
    return view('dashboard.addUser');
   }
   public function editUser($id)
   {
     $users=User::find($id);
     $roles=Role::all();

    return view('dashboard.editUser',['users'=>$users,'roles'=>$roles]);
   }
   
   public function updateUser(Request $request){
$validate=$request->validate([
   'name'=>'required',
   'email'=>'required|email',
   'pass'=>'min:8|required',
   'role'=>'',
]);
      $user=User::find($request->id);
 
     
         $user['name']=$validate['name'];
         $user['email']=$validate['email'];
         $user['password']=bcrypt($validate['pass']);
         $user->save();
         return redirect()->route('admin');
         
      
    
   
      return redirect()->route('admin');



   }


   public function delete(Request $req)
   {
    $user=User::find($req->id);
    $user->delete();
    return redirect()->route('admin');
   }
}

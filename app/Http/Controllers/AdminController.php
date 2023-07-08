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
   public function editUser()
   {
     
    return view('dashboard.editUser');
   }


   public function delete(Request $req)
   {
    $user=User::find($req->id);
    $user->delete();
    return redirect()->route('admin');
   }
}

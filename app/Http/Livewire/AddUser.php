<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;

class AddUser extends Component
{
    public $name;
    public $email;
    public $pass;
    public $role='';
public $roles;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'pass'=>'required|min:8',
        'role'=>'required'
    ];

    public function store()
    {
       $this->validate();
       $user=new User();
       $user['name']=$this->name;
       $user['email']=$this->email;
       $user['password']=bcrypt($this->pass);
       $user['role_id']=$this->role;
       $user->save();
       return redirect()->route('admin');
    }

    public function mount(){
$this->roles=Role::all();
    }

    public function render()
    {
        return view('livewire.add-user');
    }
}

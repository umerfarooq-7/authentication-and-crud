<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Role;
use Livewire\Component;

class EditUser extends Component
{
    public $name;
    public $email;
    public $pass;
    public $role;
    public $roles;
    protected $listeners=['init'=>'init'];
    public function render()
    {
        return view('livewire.edit-user');
    }
    public function init($id)
    {
$user=User::find($id);
$this->name=$user['name'];
$this->email=$user['email'];
$this->role=$user['role'];

    }
    public function mount(){
        $this->roles=Role::all();
            }
}

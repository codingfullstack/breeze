<?php

namespace App\Http\Livewire\Admin;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UsersList extends Component
{
    public $users, $me, $selected, $seen;


    public function __construct(){
        $this->me = Auth::user();
    }
    public function render()
    {
        $this->users= User::all();
        return view('livewire.admin.users-list');
    }

    public function select(User $user)
    {
        $this->selected = $user;

        $this->emit('userSelected', $user);
    }



}

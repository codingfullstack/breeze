<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class ContactWithAdmin extends Component
{
    public $modalShow = false;

    public function modal()
    {
        $this->modalShow = true;
    }
    public function modalFalse()
    {
        $this->modalShow = false;
    }
    public function render()
    {
        return view('livewire.users.contact-with-admin');
    }
    public function selectUser(User $user)
    {
        $this->user = $user;
        $this->emit('userSelected',$user );
    }
}

<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Message;
use App\Models\User;

class Write extends Component
{
    public $text, $me, $user;
    protected $listeners = ['userSelected' => 'selectUser'];

    public function __construct()
    {
        $this->me = Auth::user();
    }
    public function render()
    {
        return view('livewire.admin.write');
    }
    public function selectUser(User $user){
        $this->user = $user;
    }
    public function writeMessage()
    {
        $this->validate([
            'text' => 'required'
        ]);
        // dd($this->text);
        Message::create([
            'sender_id'=> $this->me->id,
            'recipient_id' => $this->user->id,
            'text' => $this->text
        ]);
        $this->reset('text');
        $this->emit('newMessage');
    }
}

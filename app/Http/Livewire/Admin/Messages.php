<?php

namespace App\Http\Livewire\Admin;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Messages extends Component
{
    public $user, $me, $message, $seen;
    protected $listeners = [
        'userSelected' => 'selectUser',
        'newMessage' => 'render',
        'updateMessage' => 'render'
    ];
    public function fireMessage(){
        $this->emit('updateMessage');
    }

    public function __construct()
    {
        $this->me = Auth::user();
    }
    public function render()
    {
        if ($this->user) {
            $this->message = Message::where(function ($q) {
                $q->where('sender_id', $this->me->id)
                    ->where('recipient_id', $this->user->id);
            })->orWhere(function ($q) {
                $q->where('sender_id', $this->user->id)
                    ->where('recipient_id', $this->me->id);
            })->get();
        }

        return view('livewire.admin.messages');
    }
    public function selectUser(User $user)
    {
        $this->user = $user;
    }

}

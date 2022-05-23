<?php

namespace App\Http\Livewire\Likes;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HeartLike extends Component
{

    public $post;


    public function render()
    {

        return view('livewire.likes.heart-like', [
            'count' => Like::where('post_id', $this->post->id)->count()
        ]);
    }
    public function save($id)
    {

        $q=Like::where('user_id',Auth::user()->id)->where('post_id', $id)->get();
        if($q->count() === 0){
            Like::create(['post_id'=>$id, 'user_id'=> Auth::user()->id]);
        }else{
            Like::where('user_id',Auth::user()->id)->where('post_id', $id)->delete();
        }

    }

}

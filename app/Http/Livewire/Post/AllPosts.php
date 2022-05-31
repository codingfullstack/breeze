<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class AllPosts extends Component
{

    public  $sortBy;

    public function render()
    {

        $posts =  $this->sort();


        return view('livewire.post.all-posts', ['posts' => $posts]);
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
    public function sort()
    {
        if($this->sortBy == 'latest'){
          $posts =  Post::with(['categories', 'likes'])->withCount('likes')->latest()->get();
        }else if($this->sortBy == 'oldest'){
            $posts =  Post::with(['categories', 'likes'])->withCount('likes')->oldest()->get();
        }else if($this->sortBy == 'mostLike'){
            $posts =  Post::with(['categories', 'likes'])->withCount('likes')->latest('likes_count')->get();
        }else if($this->sortBy == 'atLeast'){
            $posts =  Post::with(['categories', 'likes'])->withCount('likes')->oldest('likes_count')->get();
        }else{
            $posts =  Post::with(['categories', 'likes'])->withCount('likes')->get();
        }
        return $posts;

    }

}

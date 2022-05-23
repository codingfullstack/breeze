<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use App\Models\Post;

class MostLike extends Component
{
    public $count;

    public function render()
    {
        $this->count = Post::with('categories')->withcount('likes')->latest('likes_count')->limit(1)->get();

        return view('livewire.post.most-like');
    }


}

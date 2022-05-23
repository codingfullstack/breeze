<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\post_category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageUrl = $this->storeImage($request);
        // dd($imageUrl);
        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'category_id' => 'array|required',
            'photo' => 'required|image'
        ]);

        $data = Post::create([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'photo' => $imageUrl,
            'user_id' => Auth::user()->id,
        ]);
        foreach ($request->get('category_id') as $cat) {
            post_category::create([
                "category_id" => $cat,
                "post_id" => $data->id,
            ]);
        }
        return redirect()->route('home');
    }
    protected function storeImage(Request $request)
    {
        $path = $request->file('photo')->store('public/post');
        return substr($path, strlen('public/'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('Post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post_category = Post::with('post_category')->where('id', $post->id)->get();

        $categories = Category::all();
        $this->authorize('update', $post);

        return view('Post.edit', compact('post', 'categories', 'post_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post,  post_category $post_category)
    {
        $this->authorize('update', $post);
        if ($request->file('photo')) {
            $imageUrl = $this->storeImage($request);
        } else {
            $imageUrl = $post->photo;
        }
        $request->validate([
            'title' => 'required',
            'text' => 'required',

        ]);

        $post->update([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'photo' => $imageUrl,
            'user_id' => Auth::user()->id,
        ]);

        // foreach ($request->get('category_id') as $cat) {
        //     post_category::updateOrCreate([
        //         'post_id' => $post->id,
        //         'category_id' => $cat
        //     ]);
        // }


        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('home');
    }
}

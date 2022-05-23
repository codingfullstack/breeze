<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\post_category;
use App\Models\Like;

class Post extends Model
{
    protected $fillable = [ 'user_id', 'title', 'text', 'photo'];
    use HasFactory;

    public function categories(){
        return $this->belongsToMany(Category::class, 'post_category', 'post_id', 'category_id');
    }
    public function likes()
    {
        return $this->hasMany(Like::class, 'post_id');
    }
    public function post_category()
    {
        return $this->hasMany(post_category::class, 'post_id');
    }
}

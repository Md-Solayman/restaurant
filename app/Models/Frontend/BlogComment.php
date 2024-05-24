<?php

namespace App\Models\Frontend;

use App\Models\Admin\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }
}

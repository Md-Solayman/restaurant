<?php

namespace App\Models\Admin;

use App\Models\Frontend\BlogComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;


    protected $guarded = ['id'];


    public function admin()
    {
        return $this->belongsTo(Admin::class, 'added_by', 'id');
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }


    public function comments()
    {
        return $this->hasMany(BlogComment::class, 'blog_id', 'id');
    }
}

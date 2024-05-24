<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Frontend\BlogComment;
use Auth;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function commentStore(Request $request, $blogId)
    {


        $data = $request->validate([
            'comment'           => 'required',
        ]);


        try {

            $data['user_id'] = Auth::id();
            $data['blog_id'] = $blogId;


            BlogComment::create($data);

            $notification = array(
                'alert-type'    => 'success',
                'message'       => 'Comment has been submitted for approve',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

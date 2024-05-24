<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewsletterMail;
use App\Models\Admin\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    public function index()
    {
        try {
            $subscribes = Subscribe::orderBy('id', 'DESC')->get();

            return view('admin.newsletter.index', [
                'subscribes' => $subscribes,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        try {
            $subscribers = Subscribe::pluck('email')->toArray();

            Mail::to($subscribers)->send(new NewsletterMail($request->subject, $request->message));

            $notification = array(
                'alert-type'        => 'success',
                'message'           => 'Succesfully Submitted',
            );

            return back()->with($notification);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'email'             => 'required|unique:subscribes,email',
            ]

        );

        try {
            Subscribe::create($data);

            return response(['message' => 'Subscribed Successfully']);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

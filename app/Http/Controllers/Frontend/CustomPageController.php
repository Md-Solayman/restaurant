<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\CustomPageBuilder;
use Illuminate\Http\Request;

class CustomPageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(String $slug)
    {
        try {
            $page = CustomPageBuilder::where(['slug' => $slug, 'status'  => 1])->firstOrFail();

            return view('frontend.pages.custom-page', [
                'page' => $page,
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

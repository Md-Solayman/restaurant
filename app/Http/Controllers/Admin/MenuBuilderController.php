<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuBuilderController extends Controller
{
    public function menuBuilder()
    {
        try {
            return view('admin.menu-builder.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

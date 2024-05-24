<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userList(UsersDataTable $dataTable)
    {
        try {
            return $dataTable->render('user');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}

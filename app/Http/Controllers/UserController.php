<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(Request $req)
    {
        return $req->all();
    }
}

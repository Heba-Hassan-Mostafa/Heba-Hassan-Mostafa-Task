<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->is_admin == 1)
        {
        return view('admin.index');
        }
        else{
            return view('client.index');
        }

    }
}
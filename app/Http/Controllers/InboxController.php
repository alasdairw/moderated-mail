<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InboxController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function read()
    {
        return view('inbox.index');
    }
}

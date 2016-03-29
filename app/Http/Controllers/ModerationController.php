<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ModerationController extends Controller
{
    public function index()
    {
        return view('moderation.index');
    }

    public function read()
    {
        return view('moderation.read');
    }

    public function moderation()
    {
        return view('moderation.index');
    }
}

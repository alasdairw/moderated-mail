<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ComposerController extends Controller
{
    public function index()
    {
        return view('compose.index');
    }

    public function compose()
    {
        return view('compose.compose');
    }

    public function drafts()
    {
        return view('compose.drafts');
    }
}

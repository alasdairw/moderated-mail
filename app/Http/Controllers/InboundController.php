<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Log;

class InboundController extends Controller
{
    //
    public function recieve(Request $request)
    {
        Log::info('request recieved: ',$request->toArray()); 

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EmailRequest;
use App\Http\Requests;
use App\Email;
use Log;
use Carbon\Carbon;

class InboundController extends Controller
{
    //
    public function recieve(Request $request)
    {
        Log::info('request recieved: ',$request->toArray()); 
        $email = Email::create([
                'subject' => $request->subject,
                'date'    => new Carbon($request->date),
                'from'    => $request->from,
                'to'      => $request->to,
                'sender'  => $request->sender,
                'recipient'  => $request->recipient,
                'message_id'  => $request->{'Message-Id'},
                'reply_to_message_id'  => $request->reply_to_message_id,
                'body_html' => $request->{'body-html'},
                'body_plain' => $request->{'body-text'},
                'direction' => 'Recieved',
                'moderation_status' => 'Queued',
                'additional_headers' => $request->{'message-headers'}
            ]);
        dd($email);


    }
}

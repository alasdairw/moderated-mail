<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\EmailRequest;
use App\Http\Requests;
use App\Email;
use Log;

class InboundController extends Controller
{
    //
    public function recieve(EmailRequest $request)
    {
        Log::info('request recieved: ',$request->toArray()); 
        $email = Email::create([
                'subject' => $request->subject,
                'date'    => $request->date,
                'from'    => $request->from,
                'to'      => $request->to,
                'sender'  => $request->sender,
                'recipient'  => $request->recipient,
                'message_id'  => $request->message_id,
                'reply_to_message_id'  => $request->reply_to_message_id,
                'body_html' => $request->{body-html},
                'body_text' => $request->{body-text},
                'direction' => 'Recieved',
                'moderation_status' => 'Queued',
                'additional_headers' => $request->message-headers
            ]);


    }
}

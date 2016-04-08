<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Email;

class InboxController extends Controller
{
    public function index()
    {
        $emails = Email::recieved()->accepted()->get();
        return view('mailbox.index',compact('emails'));
    }

    public function read(Email $email)
    {
        return view('mailbox.email',compact('email'));
    }

    public function raw_inbox_data()
    {
        $emails = Email::recieved()->accepted()->get();
        return $emails;
    }
}

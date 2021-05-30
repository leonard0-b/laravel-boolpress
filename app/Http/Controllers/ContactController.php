<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();

        Mail::to('clientservice@boolpress.it')->send(new ContactMail($data['name'], $data['email'], $data['object'], $data['content']));
        return redirect()->route('index');
    }
}

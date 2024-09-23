<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    // Email View Template
    public function index()
    {
        return view('sendingEmails.index');
    }
}

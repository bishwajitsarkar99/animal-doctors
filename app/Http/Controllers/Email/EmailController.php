<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LogicBild\Email\EmailServiceProvider;

class EmailController extends Controller
{
    protected $emailServiceProvider;

    // inject EmailServiceProvider
    public function __construct(EmailServiceProvider $emailServiceProvider)
    {
        return $this->emailServiceProvider = $emailServiceProvider;
    }

    // Email View Template
    public function index(Request $request)
    {
        return $this->emailServiceProvider->viewEmailTemplate($request);
    }
    
    // Sending Mail
    public function sendEmail(Request $request)
    {
        return $this->emailServiceProvider->sending($request);
    }
}

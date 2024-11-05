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

    // Send Fetch Mail
    public function sendFetchEmail(Request $request)
    {
        return $this->emailServiceProvider->sendFetchUserEmail($request);
    }

    // Inbox Fetch Mail
    public function inboxFetchEmail(Request $request)
    {
        return $this->emailServiceProvider->inboxFetchUserEmail($request);
    }

    // Forward Mail
    public function forwardEmail(Request $request, $id)
    {
        return $this->emailServiceProvider->forwardUserEmail($request, $id);
    }
 
    // Draft Fetch Mail
    public function getDraftFetchEmail(Request $request)
    {
        return $this->emailServiceProvider->getDraftFetchUserEmail($request);
    }

    // Draft Update Mail
    public function draftEmailUpdate(Request $request, $id)
    {
        return $this->emailServiceProvider->draftUpdateUserEmail($request, $id);
    }

    // Delete Mail
    public function deleteEmail(Request $request)
    {
        return $this->emailServiceProvider->deleteUserEmail($request);
    }
}

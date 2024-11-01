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

    // Send List Fetch Mail
    public function getSendEmail(Request $request)
    {
        return $this->emailServiceProvider->sendFetchUserEmail($request);
    }

    // Send Forward Mail
    public function sendForwardEmail(Request $request, $id)
    {
        return $this->emailServiceProvider->sendForwardUserEmail($request, $id);
    }

    // Inbox List Fetch Mail
    public function inboxFetchEmail(Request $request)
    {
        return $this->emailServiceProvider->inboxFetchUserEmail($request);
    }

    // Inbox Forward Mail
    public function inboxForwardEmail(Request $request, $id)
    {
        return $this->emailServiceProvider->inboxForwardUserEmail($request, $id);
    }
 
    // Draft List Fetch Mail
    public function getDraftFetchEmail(Request $request)
    {
        return $this->emailServiceProvider->getDraftFetchUserEmail($request);
    }
    
    // Draft Forward Mail
    public function draftEmailForward(Request $request, $id)
    {
        return $this->emailServiceProvider->draftForwardUserEmail($request, $id);
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

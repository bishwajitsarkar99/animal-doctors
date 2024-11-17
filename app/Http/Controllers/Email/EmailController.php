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
    
    // Fetch User Email
    public function getUserEmail(Request $request, $selectedRole)
    {
        return $this->emailServiceProvider->fetchUserEmail($request, $selectedRole);
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

    // Forward Mail Send
    public function sendForwardedEmail(Request $request)
    {
        return $this->emailServiceProvider->sendForwardedUserEmail($request);
    }
 
    // Draft Fetch Mail
    public function getDraftFetchEmail(Request $request)
    {
        return $this->emailServiceProvider->getDraftFetchUserEmail($request);
    }

    // Mail View Status
    public function emailView(Request $request)
    {
        return $this->emailServiceProvider->viewStatusUserEmail($request);
    }

    // Delete Mail
    public function deleteEmail(Request $request)
    {
        return $this->emailServiceProvider->deleteUserEmail($request);
    }

    // Delete Email Permission Store
    public function store(Request $request)
    {
        return $this->emailServiceProvider->deleteUserEmailPermissionStore($request);
    }

    // Delete Email Permission Edit
    public function permissionEdit($id)
    {
        return $this->emailServiceProvider->deleteUserEmailPermissionEdit($id);
    }

    // Delete Email Permission Update
    public function permissionUpdate(Request $request, $id)
    {
        return $this->emailServiceProvider->deleteUserEmailPermissionUpdate($request, $id);
    }

    // Delete Email Permission Delete
    public function deletePermissionEmail($id)
    {
        return $this->emailServiceProvider->deleteUserEmailPermissionDelete($id);
    }
}

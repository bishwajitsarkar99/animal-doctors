@component('mail::message')

# Dear User!
You are receiving this email because we received a request to verify your account.

@component('mail::panel')
This email verification link will expire in 60 minutes. 
If you did not request this, no further action is required.
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/', 'color' => 'success'])
Email Verified
@endcomponent

### With best regards,<br>
### Admin
<!-- {{ config('app.name') }} -->
@endcomponent

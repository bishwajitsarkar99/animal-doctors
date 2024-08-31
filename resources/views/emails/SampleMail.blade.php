@component('mail::message')
# Dear User!
You are receiving this email because we received a password reset request for your account.

@component('mail::panel')
This password reset link will expire in 60 minutes.
If you did not request a password reset, no further action is required.
@endcomponent

@component('mail::button', ['url' => '', 'color' => 'success'])
Reset Password
@endcomponent

### With best regards,<br>
### Admin
<!-- {{ config('app.name') }} -->
@endcomponent

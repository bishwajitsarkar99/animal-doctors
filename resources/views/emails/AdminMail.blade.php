@component('mail::message')

# Hello User!
You are receiving this email because we received a request to verify your account.

@component('mail::panel')
This email verification link will expire in 60 minutes. 
If you did not request this, no further action is required.
@endcomponent

@component('mail::button', ['url' => $loginLink, 'color' => 'success'])
Email Verified
@endcomponent

### Thank you and best regards,<br>
#### Admin
### {{setting('company_name')}}
@endcomponent

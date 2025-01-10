@component('mail::message')
<a class="image-area" href="#" style="display: inline-block;">
<img src="{{asset('backend_asset/main_asset/img')}}/{{setting('update_company_logo')}}" class="logo" alt="Laravel Logo">
</a><br><br>
<span style="font-size:13px;font-weight:500;color:cornflowerblue;">
<span class="plantform">
    <span class="serv">
        <?php
        $timezone = date_default_timezone_get();
        echo "Date :";
        ?>
    </span>
    <?php
    date_default_timezone_set('Asia/Dhaka');
    echo date('d l M Y') . " ; ";
    echo date("h:i:sA");
    ?>
</span> 
</span><br>
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello User!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::panel')
<span style="font-size:14px;font-weight:500;color:#718096;">
This password reset link will expire in 60 minutes.
If you did not request a password reset, no further action is required.
</span><br><br>
@endcomponent
<table style="border-collapse: collapse; margin: 0 auto;">
    <tr>
        <td>
            <a href="{{ $actionUrl }}" style="
                display: inline-block;
                background-color: #28a745;
                color: white;
                font-size: 14px;
                font-weight: 700;
                transition: .5s ease;
                letter-spacing: 0.5px;
                -mdb-box-shadow-color-rgb: 0, 0, 0;
                box-shadow: 0 4px 9px -4px rgba(var(--mdb-box-shadow-color-rgb), 0.35);
                text-shadow: 0px 1px 1px #fff, 0px 0px 0px #000;
                padding: 5px 18px;
                text-decoration: none;
                border-radius: 4px;
                text-align: center;">
                {{ $actionText }}
            </a>
        </td>
    </tr>
</table><br><br><br>
@endisset
<span style="font-size:14px;font-weight:600;color:#242424cc;">Thank you and best regards,</span><br>
<span style="font-size:14px;font-weight:600;color:#242424cc;">Admin</span><br>
<span style="font-size:14px;font-weight:600;color:#242424cc;">{{setting('company_name')}}</span><br><br><br><br>

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
<table style="border-collapse: collapse; margin: 0 auto;">
    <tr>
        <td>
            <span style="font-size:13px;font-weight:500;color:cornflowerblue;">{{setting('company_address')}}</span>
        </td>
    </tr>
</table>
@endisset
@endcomponent

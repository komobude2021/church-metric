@component('mail::message')
# Hello {{ strtoupper($emailArray['surname'] . " " . $emailArray['firstname'] . " " . $emailArray['othername'] . ",") }}

Thank you for registering with RCCG Power Connections.<br/><br/> Kindly click on the button below to verify your account
and get full Access to Power Connections Interactive Dashboard, Events Notifications, Hands-on Church Calendar 
and many more.

@component('mail::button', ['url' => '/verifyemail/' . $emailArray['id'] . '/' . $emailArray['token'] ])
Verify My Account
@endcomponent

If you are unable to click on the button above, kindly copy and paste this link to verify your account <br/>
<a href="{{ url('/verifyemail/' . $emailArray['id'] . '/' . $emailArray['token']) }}" target="_new">
    {{ url('/verifyemail/' . $emailArray['id'] . '/' . $emailArray['token']) }}
</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

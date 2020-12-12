@component('mail::message')
# Matching requests

Hello {{$toUser->name}}!

{{$fromUser->name}}, a dear friend, want to practice with you in matching room!

Would you like to come with us?

@component('mail::button', ['url' => ''])
    Yes, of course
@endcomponent

@component('mail::button', ['url' => ''])
    Nope, may later
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

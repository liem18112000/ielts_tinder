@component('mail::message')
# Matching requests

Hello {{$to->name}}!

{{$from->name}}, a dear friend, want to practice with you in matching room!

Would you like to come with us?

@component('mail::button', ['url' => '', 'color' => 'green'])
    Yes, of course
@endcomponent

@component('mail::button', ['url' => '', 'color' => 'red'])
    Nope, may later
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

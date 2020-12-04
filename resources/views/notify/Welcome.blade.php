@component('mail::message')
# Welcome to our family

IELTS TINDER is a wonderfull partner who will help you enhance your IELTS Speaking!.

@component('mail::button', ['url' => config('app.url')])
Home
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent

@component('mail::message')
# {{ $data['subject'] }} <br>

{{ $data['message'] }}

@component('mail::button', ['url' => 'https://webartys.com'])
Voir le site
@endcomponent

Très cordialement,<br>
WEB ARTYS
@endcomponent

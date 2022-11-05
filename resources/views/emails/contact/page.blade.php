@component('mail::message')
# Message envoyé du site webartys.com<br>
<p style="margin-bottom:40px">{{ $data['message'] }}</p>
<br>
<p style="text-align:center"><a href="tel:{{ $data['tel'] }}" style="margin-top:50px; padding: 10px 20px; color:#fff; background-color:#a252a3; border-radius: 5px;text-decoration:none">Appeler</a></p> 


@component('mail::button', ['url' => "mailto:" . $data['email']])
Repondre
@endcomponent


{{ $data['firstname']. " " . $data['lastname'] }} <br>
{{ $data['email'] }} <br>
{{ $data['tel'] }}
@endcomponent

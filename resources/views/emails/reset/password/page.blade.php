@component('mail::message')
# Réinitialiser le mot de passe
Vous pouvez réinitialiser votre mot de passe en cliquant sur le bouton ci-dessous.

@component('mail::button', ['url' => route('reset.password.form', ['token' => $data['token']]) ])
Réinitialiser
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent

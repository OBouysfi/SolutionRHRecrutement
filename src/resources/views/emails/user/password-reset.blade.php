@component('mail::message')
# Bonjour {{ __($user->name) }},

Vous avez demandé à réinitialiser votre mot de passe. Voici un mot de passe temporaire :

@component('mail::panel')
**{{ __($password) }}**
@endcomponent

Vous pouvez également cliquer sur le lien suivant pour définir un nouveau mot de passe :

@component('mail::button', ['url' => $resetLink])
Réinitialiser mon mot de passe
@endcomponent

Merci,<br>
{{ config('app.name') }}
@endcomponent

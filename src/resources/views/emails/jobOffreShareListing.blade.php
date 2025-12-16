<!DOCTYPE html>
<html>
<head>
    <title>{{ __($data['subject']) }}</title>
</head>
<body>
    <p>Bonjour,</p>
    <p>On vient de partager avec vous un lien pour la page : <strong>Offres d'emploi</strong>.</p>
    <p>Cliquez sur ce lien pour découvrir les fonctionnalités dédiées :</p>
    <a href="{{ __($data['page_url']) }}">{{ __($data['page_url']) }}</a>
    <p>Bonne navigation.</p>
</body>
</html>
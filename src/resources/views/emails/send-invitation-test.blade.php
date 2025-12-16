<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>
    <h2>Bienvenue, {{ $name }} !</h2>
    <p>Vous êtes invité(e) à passer le test suivant : {{ $testName }}.</p>
    <p>Pour commencer, veuillez vous connecter à votre compte.</p>

    <p>Pour y accéder, cliquez sur le lien ci-dessous :</p>

    <a href="{{ $inviteUrl }}"
       style="padding:10px 15px; background-color:#007bff; color:white; text-decoration:none; border-radius:5px;">
       Passer le test
    </a>


    <p>Il est recommandé d’utiliser les navigateurs internet Mozilla Firefox ou Google Chrome pour une meilleure expérience.</p>

    <p>Pour toute question ou difficulté technique, merci de nous écrire à <a href="support@humanjobs.ma">support@humanjobs.ma</a>.</p>

    <p>Bien cordialement,</p>

    <p>L'équipe Human JOBS.</p>
</body>
</html>

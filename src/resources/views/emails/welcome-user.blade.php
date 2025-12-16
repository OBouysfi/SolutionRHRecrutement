<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue</title>
</head>
<body>
    <h2>Bienvenue, {{ __($name) }} !</h2>
    <p>Un compte a été créé pour vous sur Human JOBS.</p>
    
    <p>Voici vos identifiants de connexion :</p>
    <p><strong>Email :</strong> {{ __($email) }}</p>
    <p><strong>Mot de passe temporaire :</strong> {{ __($password) }}</p>
    
    <p>Veuillez cliquer sur le bouton ci-dessous pour vous connecter et changer votre mot de passe :</p>

    <a href="{{ __($loginUrl) }}" 
       style="padding:10px 15px; background-color:#007bff; color:white; text-decoration:none; border-radius:5px;">
       Se connecter
    </a>

    <p>Une fois connecté(e), veuillez modifier votre mot de passe dans votre espace utilisateur.</p>
    
    <p>Merci et à bientôt !</p>
    
    <p>L'équipe de support</p>
</body>
</html>

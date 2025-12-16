<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Demande de recommandation</title>
</head>
<body>
    <p>Bonjour, <B>{{ $nomDuContact }}</B></p>

    <p>
       <B>{{ $profile->first_name }} {{ $profile->last_name }} </B> vous a désigné pour le recommander dans le cadre de son parcours professionnel.
    </p>

    <p>
        Vous pouvez effectuer la recommandation en vous connectant directement via le lien suivant :
    </p>

    <p>
        <a href="{{ $url }}">{{ $url }}</a>
    </p>

    <p>Nous vous remercions pour votre contribution.</p>

    <p>Bien cordialement,</p>
    <p>L’équipe <B>HumanJobs</B> </p> 
</body>
</html>

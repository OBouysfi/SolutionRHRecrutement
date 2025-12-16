<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __($data['subject']) }}</title>
</head>
<body>
<p>{!! nl2br(e($data['content'])) !!}</p>
<p>Cordialement,</p>
<p>L'équipe de recrutement</p>
</body>
</html>

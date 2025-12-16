<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Request</title>
</head>
<body>
    <h2>Nouveau message de support</h2>
    <p><strong>Prénom:</strong> {{ __($body['first_name']) }}</p>
    <p><strong>Nom:</strong> {{ __($body['last_name']) }}</p>
    <p><strong>Email:</strong> {{ __($body['email']) }}</p>
    <p><strong>Sujet:</strong> {{ __($body['subject']) }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ __($body['message']) }}</p>
</body>
</html>

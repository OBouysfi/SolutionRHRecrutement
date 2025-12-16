<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Code OTP</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; padding: 20px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #333;">Bonjour {{ __($user->name) }},</h2>
        <p style="color: #555;">Voici votre code OTP pour vous connecter à votre compte <strong>HumanJobs</strong> :</p>
        <div style="font-size: 24px; font-weight: bold; text-align: center; color: #2d89ef; margin: 20px 0;">
            {{ __($otp) }}
        </div>
        <p style="color: #555;">Ce code est valide pendant <strong>3 minutes</strong>.</p>
        <p style="color: #555;">Si vous n'avez pas demandé ce code, veuillez ignorer cet email.</p>
        <p style="color: #555;">Merci,<br>L'équipe HumanJobs</p>
    </div>
</body>
</html>

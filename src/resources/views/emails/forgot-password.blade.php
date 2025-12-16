<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation de mot de passe</title>
</head>


<body style="font-family: Arial, sans-serif; background-color: #eaebee; padding: 40px; text-align: center;">
          
    <!-- Email Container -->
    <div style="max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">

        <!-- Header -->
        <h2 style="color: #27b6ea; margin-bottom: 20px;">Réinitialisation de votre mot de passe</h2>

        <!-- Message -->
        <p style="font-size: 16px; color: #333;  text-align: left;">Bonjour, <strong>{{ auth()->user()->name ?? 'Utilisateur' }}</strong></p>
        <p style="font-size: 16px; color: #555; line-height: 1.6;  text-align: left;">
            Vous recevez cet e-mail parce que nous avons reçu une demande de réinitialisation de mot de passe pour votre compte.
        </p>
        <br>
        <!-- Reset Password Button -->
        <p style="margin: 30px 0; text-align: center;">
            <a href="{{ route('reset-password') }}" 
               style="background-color: #27b6ea; color: #fff; text-decoration: none; 
                      padding: 10px 15px; border-radius: 5px; 
                      font-size: 14px; font-weight: bold; 
                      display: inline-block; text-align: center; 
                      min-width: 120px;">
                Réinitialiser
            </a>
        </p>
        
        
         <br>

        <!-- Signature -->
        <p style="font-size: 16px; color: #333; text-align: left;">
            Merci,<br> 
            <strong>L'équipe {{ config('app.name') }}</strong>
        </p>
        
    </div>
    <br>

    <!-- Footer Section (Outside the Body) -->
    <div style="text-align: center; font-size: 14px; color: #777;">
        &copy; {{ date('Y') }} {{ config('app.name') }}. Tous droits réservés.
    </div>
</body>


</html>

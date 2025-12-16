<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvel événement créé</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
        }

        .email-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 600px;
            margin: auto;
        }

        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
        }

        .content {
            margin-top: 20px;
        }

        .content h3 {
            color: #333;
        }

        .button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>{{ __($event->title) }}</h1>
        </div>
        <div class="content">
            <h3>Détails de l'événement :</h3>
            <p><strong>Date :</strong> {{ __($event->date) }}</p>
            <p><strong>Heure :</strong> {{ __($event->start_time) }} à {{ __($event->end_time) }}</p>
            @if ($event->event_type == 'telephonique')
                <p><strong>Lieu :</strong> {{ __($event->location) }}</p>
            @endif
            @if ($event->event_type == 'presentiel')
                <p><strong>Le lien de l'événement :</strong> {{ __($event->event_url) }}</p>
            @endif
            <p><strong>Description :</strong> {{ __($event->description) }}</p>
        </div>
        {{-- <a href="{{ url('event/' . $event->id) }}" class="button">Voir l'événement</a> --}}
        <div class="footer">
            <p>&copy; {{ date('Y') }} Human Jobs. Tous droits réservés.</p>
        </div>
    </div>
</body>

</html>

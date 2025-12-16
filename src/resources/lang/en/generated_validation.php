<?php
return [
    'profession_id_required' => 'Le champ "Intitulé du poste" est obligatoire.',
    'contract_type_required' => 'Le champ "Type de contrat" est obligatoire.',
    'contract_type_string' => 'Le type de contrat doit être une chaîne de caractères.',
    'contract_type_max' => 'Le type de contrat ne doit pas dépasser 255 caractères.',

    'activity_area_id_required' => 'Le champ "Secteur d\'activité" est obligatoire.',

    'company_size_required' => 'Le champ "Taille de l\'entreprise" est obligatoire.',
    'company_size_string' => 'La taille de l\'entreprise doit être une chaîne de caractères.',
    'company_size_max' => 'La taille de l\'entreprise ne doit pas dépasser 255 caractères.',

    'has_driving_license_required' => 'Veuillez indiquer si vous avez un permis de conduire.',

    'min_expected_salary_required' => 'Le salaire minimum attendu est obligatoire.',
    'min_expected_salary_min' => 'Le salaire minimum doit être au moins de 0.',
    'min_expected_salary_max' => 'Le salaire minimum ne doit pas dépasser 99999999.99.',

    'max_expected_salary_required' => 'Le salaire maximum attendu est obligatoire.',
    'max_expected_salary_min' => 'Le salaire maximum doit être au moins de 0.',
    'max_expected_salary_max' => 'Le salaire maximum ne doit pas dépasser 99999999.99.',
    'max_expected_salary_gte' => 'Le salaire maximum doit être supérieur ou égal au salaire minimum.',

    'license_types_required' => 'Veuillez sélectionner au moins un type de permis.',
    'license_types_array' => 'Le type de permis doit être un tableau.',
    'license_types_string' => 'Chaque type de permis doit être une chaîne de caractères.',
    'license_types_max' => 'Chaque type de permis ne doit pas dépasser 50 caractères.',

    'mobility_weight_integer' => 'Le poids de la mobilité doit être un entier.',
    'mobility_weight_min' => 'Le poids de la mobilité doit être au moins de 0.',
    'mobility_weight_max' => 'Le poids de la mobilité ne doit pas dépasser 100.',

    'work_mode_weight_integer' => 'Le poids du mode de travail doit être un entier.',
    'work_mode_weight_min' => 'Le poids du mode de travail doit être au moins de 0.',
    'work_mode_weight_max' => 'Le poids du mode de travail ne doit pas dépasser 100.',

    'work_time_weight_integer' => 'Le poids du temps de travail doit être un entier.',
    'work_time_weight_min' => 'Le poids du temps de travail doit être au moins de 0.',
    'work_time_weight_max' => 'Le poids du temps de travail ne doit pas dépasser 100.',

    'availability_type_required' => 'Le type de disponibilité est obligatoire.',
    'availability_type_in' => 'Le type de disponibilité sélectionné est invalide.',
    'availability_notice_duration_required_if' => 'La durée du préavis est obligatoire si le type de disponibilité est "Préavis".',
    'availability_notice_duration_integer' => 'La durée du préavis doit être un entier.',
    'availability_notice_duration_min' => 'La durée du préavis doit être au moins de 1 mois.',
    'availability_notice_duration_max' => 'La durée du préavis ne doit pas dépasser 12 mois.',
        'logo_image' => 'Le logo doit être une image valide.',
    'logo_max' => 'Le logo ne peut pas dépasser 10 Mo.',

    'organisme_required' => 'Le champ organisme est obligatoire.',
    'organisme_string' => 'Le champ organisme doit être une chaîne de caractères.',
    'organisme_max' => 'Le champ organisme ne peut pas dépasser 255 caractères.',

    'numero_accreditation_string' => 'Le numéro d’accréditation doit être une chaîne de caractères.',
    'numero_accreditation_max' => 'Le numéro d’accréditation ne peut pas dépasser 255 caractères.',

    'adresse_string' => 'L’adresse doit être une chaîne de caractères.',
    'adresse_max' => 'L’adresse ne peut pas dépasser 255 caractères.',

    'city_id_exists' => 'La ville sélectionnée est invalide.',

    'pays_string' => 'Le pays doit être une chaîne de caractères.',
    'pays_max' => 'Le pays ne peut pas dépasser 255 caractères.',

    'telephone_1_string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
    'telephone_1_max' => 'Le numéro de téléphone ne peut pas dépasser 20 caractères.',

    'telephone_2_string' => 'Le numéro de téléphone secondaire doit être une chaîne de caractères.',
    'telephone_2_max' => 'Le numéro de téléphone secondaire ne peut pas dépasser 20 caractères.',

    'email_email' => 'Le champ email doit contenir une adresse e-mail valide.',
    'email_max' => 'L’adresse e-mail ne peut pas dépasser 255 caractères.',

    'nom_certification_required' => 'Le nom de la certification est obligatoire.',
    'nom_certification_string' => 'Le nom de la certification doit être une chaîne de caractères.',
    'nom_certification_max' => 'Le nom de la certification ne peut pas dépasser 255 caractères.',

    'criteres_evaluation_string' => 'Les critères d’évaluation doivent être une chaîne de caractères.',

    'theme_certification_string' => 'Le thème de la certification doit être une chaîne de caractères.',
    'theme_certification_max' => 'Le thème de la certification ne peut pas dépasser 255 caractères.',

    'score_resultat_string' => 'Le score du résultat doit être une chaîne de caractères.',
    'score_resultat_max' => 'Le score du résultat ne peut pas dépasser 255 caractères.',

    'niveau_certification_string' => 'Le niveau de la certification doit être une chaîne de caractères.',
    'niveau_certification_max' => 'Le niveau de la certification ne peut pas dépasser 255 caractères.',

    'date_obtention_date' => 'La date d’obtention doit être une date valide.',
    'volume_horaire_string' => 'Le volume horaire doit être une chaîne de caractères.',
    'volume_horaire_max' => 'Le volume horaire ne peut pas dépasser 255 caractères.',
    'date_expiration_date' => 'La date d’expiration doit être une date valide.',
    'subject_required' => 'Le champ objet est obligatoire.',
    'subject_string' => 'Le champ objet doit être une chaîne de caractères.',
    'subject_max' => 'Le champ objet ne peut pas dépasser 150 caractères.',
    'description_required' => 'Le champ description est obligatoire.',
    'logo_file' => 'Le logo doit être un fichier valide.',


    'company_required' => 'Le champ entreprise est obligatoire.',
    'company_string' => 'Le champ entreprise doit être une chaîne de caractères.',
    'company_max' => 'Le champ entreprise ne peut pas dépasser 255 caractères.',

    'profession_id_exists' => 'La profession sélectionnée est invalide.',

    'started_at_required' => 'La date de début est obligatoire.',
    'started_at_date' => 'La date de début doit être une date valide.',

    'finished_at_date' => 'La date de fin doit être une date valide.',
    'finished_at_after_or_equal' => 'La date de fin doit être postérieure ou égale à la date de début.',

    'project_name_required' => 'Le champ projet est obligatoire.',
    'project_name_string' => 'Le champ projet doit être une chaîne de caractères.',
    'project_name_max' => 'Le champ projet ne peut pas dépasser 255 caractères.',

    'skills_tech_required' => 'Le champ compétences techniques est obligatoire.',
    'skills_tech_string' => 'Le champ compétences techniques doit être une chaîne de caractères.',
    'skills_tech_max' => 'Le champ compétences techniques ne peut pas dépasser 255 caractères.',

    'date_required' => 'Le champ date est obligatoire.',
    'date_date' => 'Le champ date doit être une date valide.',

    'description_string' => 'La description doit être une chaîne de caractères.',

    'name_required' => 'Le champ nom est obligatoire.',
    'name_string' => 'Le champ nom doit être une chaîne de caractères.',
    'name_max' => 'Le champ nom ne peut pas dépasser 255 caractères.',


    'address_string' => 'L’adresse doit être une chaîne de caractères.',
    'address_max' => 'L’adresse ne peut pas dépasser 255 caractères.',

    'phone_string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
    'phone_max' => 'Le numéro de téléphone ne peut pas dépasser 20 caractères.',

    'secondary_phone_string' => 'Le numéro de téléphone secondaire doit être une chaîne de caractères.',
    'secondary_phone_max' => 'Le numéro de téléphone secondaire ne peut pas dépasser 20 caractères.',


    'level_id_exists' => 'Le niveau sélectionné est invalide.',
    'diploma_id_exists' => 'Le diplôme sélectionné est invalide.',

    'option_id_exists' => 'L’option de diplôme sélectionnée est invalide.',

    'option_string' => 'Le champ option doit être une chaîne de caractères.',
    'option_max' => 'Le champ option ne peut pas dépasser 255 caractères.',

    'mention_string' => 'Le champ mention doit être une chaîne de caractères.',
    'mention_max' => 'Le champ mention ne peut pas dépasser 255 caractères.',

    'civility_required' => 'Le champ civilité est obligatoire.',
    'civility_integer' => 'La civilité doit être un entier valide.',

    'first_name_required' => 'Le prénom est obligatoire.',
    'first_name_string' => 'Le prénom doit être une chaîne de caractères.',
    'first_name_max' => 'Le prénom ne peut pas dépasser 255 caractères.',

    'last_name_required' => 'Le nom de famille est obligatoire.',
    'last_name_string' => 'Le nom de famille doit être une chaîne de caractères.',
    'last_name_max' => 'Le nom de famille ne peut pas dépasser 255 caractères.',

    'family_situation_string' => 'La situation familiale doit être une chaîne de caractères.',
    'family_situation_max' => 'La situation familiale ne peut pas dépasser 255 caractères.',

    'birth_date_date' => 'La date de naissance doit être une date valide.',
    'birth_date_before_or_equal' => 'Vous devez avoir au moins 18 ans.',

    'birth_place_string' => 'Le lieu de naissance doit être une chaîne de caractères.',
    'birth_place_max' => 'Le lieu de naissance ne peut pas dépasser 255 caractères.',

    'nationality_string' => 'La nationalité doit être une chaîne de caractères.',
    'nationality_max' => 'La nationalité ne peut pas dépasser 255 caractères.',


    'postal_code_string' => 'Le code postal doit être une chaîne de caractères.',
    'postal_code_max' => 'Le code postal ne peut pas dépasser 20 caractères.',

    'city_id_integer' => 'La ville doit être un identifiant valide.',

    'phone_primary_required' => 'Le numéro de téléphone principal est obligatoire.',
    'phone_primary_string' => 'Le numéro de téléphone principal doit être une chaîne de caractères.',
    'phone_primary_max' => 'Le numéro de téléphone principal ne peut pas dépasser 40 caractères.',
    'phone_primary_unique' => 'Le numéro de téléphone principal est déjà utilisé.',

    'phone_secondary_string' => 'Le numéro de téléphone secondaire doit être une chaîne de caractères.',
    'phone_secondary_max' => 'Le numéro de téléphone secondaire ne peut pas dépasser 40 caractères.',

    'email_required' => 'L’adresse e-mail est obligatoire.',
    'email_unique' => 'L’adresse e-mail est déjà utilisée.',

    'url_facebook_url' => 'L’URL Facebook doit être une URL valide.',
    'url_facebook_max' => 'L’URL Facebook ne peut pas dépasser 255 caractères.',

    'url_linkedin_url' => 'L’URL LinkedIn doit être une URL valide.',
    'url_linkedin_max' => 'L’URL LinkedIn ne peut pas dépasser 255 caractères.',

    'url_twitter_url' => 'L’URL Twitter doit être une URL valide.',
    'url_twitter_max' => 'L’URL Twitter ne peut pas dépasser 255 caractères.',

    'salary_expectation_numeric' => 'Le salaire attendu doit être un nombre valide.',

    'profession_id_integer' => 'Le métier doit être un identifiant valide.',

    'cv_mimes' => 'Le CV doit être un fichier de type : pdf, doc ou docx.',
    'cv_max' => 'Le CV ne peut pas dépasser 10 Mo.',

    'cover_letter_mimes' => 'La lettre de motivation doit être un fichier de type : pdf, doc ou docx.',
    'cover_letter_max' => 'La lettre de motivation ne peut pas dépasser 10 Mo.',

    'video_mimes' => 'La vidéo doit être un fichier de type : mp4, mov, avi ou wmv.',
    'video_max' => 'La vidéo ne peut pas dépasser 50 Mo.',
    'language_required' => 'Le champ langue est obligatoire.',
    'language_integer' => 'Le champ langue doit être un identifiant valide.',

    'skills_skill_required' => 'La compétence est obligatoire.',
    'skills_skill_string' => 'La compétence doit être une chaîne de caractères.',
    'skills_skill_max' => 'La compétence ne peut pas dépasser 250 caractères.',

    'skills_level_required' => 'Le niveau de compétence est obligatoire.',
    'skills_level_string' => 'Le niveau de compétence doit être une chaîne de caractères.',
    'skills_level_max' => 'Le niveau de compétence ne peut pas dépasser 2 caractères.',

    'skills_weight_required' => 'L’échelle de compétence est obligatoire.',
    'skills_weight_integer' => 'L’échelle de compétence doit être un entier valide.',
    'skills_weight_between' => 'L’échelle de compétence doit être comprise entre 1 et 5.',
    'photo_image' => 'La photo doit être une image valide.',
    'photo_mimes' => 'La photo doit être au format jpeg, png, jpg ou gif.',
    'photo_max' => 'La photo ne peut pas dépasser 10 Mo.',


    'poste_required' => 'Le poste est obligatoire.',
    'poste_integer' => 'Le poste doit être un identifiant valide.',
    'poste_exists' => 'Le poste sélectionné est invalide.',

    'message_required' => 'Le message est obligatoire.',
    'message_string' => 'Le message doit être une chaîne de caractères.',

    // Technical skills
    'technical_skills_required' => 'Les compétences techniques sont obligatoires.',
    'technical_skills_array' => 'Les compétences techniques doivent être un tableau.',
    'technical_skills_category_required' => 'La catégorie de compétence technique est obligatoire.',
    'technical_skills_category_string' => 'La catégorie de compétence technique doit être une chaîne de caractères.',
    'technical_skills_category_max' => 'La catégorie de compétence technique ne peut pas dépasser 250 caractères.',
    'technical_skills_skill_required' => 'Le détail de la compétence technique est obligatoire.',
    'technical_skills_skill_string' => 'Le détail de la compétence technique doit être une chaîne de caractères.',
    'technical_skills_skill_max' => 'Le détail de la compétence technique ne peut pas dépasser 500 caractères.',
    'technical_skills_level_required' => 'Le niveau de compétence technique est obligatoire.',
    'technical_skills_level_integer' => 'Le niveau de compétence technique doit être un entier.',
    'technical_skills_weight_required' => 'L’échelle de compétence technique est obligatoire.',
    'technical_skills_weight_integer' => 'L’échelle de compétence technique doit être un entier valide.',
    'technical_skills_weight_between' => 'L’échelle de compétence technique doit être comprise entre 1 et 5.',

    // Personal skills
    'personal_skills_required' => 'Les compétences personnelles sont obligatoires.',
    'personal_skills_array' => 'Les compétences personnelles doivent être un tableau.',
    'personal_skills_category_required' => 'La catégorie de compétence personnelle est obligatoire.',
    'personal_skills_category_string' => 'La catégorie de compétence personnelle doit être une chaîne de caractères.',
    'personal_skills_category_max' => 'La catégorie de compétence personnelle ne peut pas dépasser 250 caractères.',
    'personal_skills_skill_required' => 'Le détail de la compétence personnelle est obligatoire.',
    'personal_skills_skill_string' => 'Le détail de la compétence personnelle doit être une chaîne de caractères.',
    'personal_skills_skill_max' => 'Le détail de la compétence personnelle ne peut pas dépasser 500 caractères.',
    'personal_skills_level_required' => 'Le niveau de compétence personnelle est obligatoire.',
    'personal_skills_level_integer' => 'Le niveau de compétence personnelle doit être un entier.',
    'personal_skills_weight_required' => 'L’échelle de compétence personnelle est obligatoire.',
    'personal_skills_weight_integer' => 'L’échelle de compétence personnelle doit être un entier valide.',
    'personal_skills_weight_between' => 'L’échelle de compétence personnelle doit être comprise entre 1 et 5.',
    'civility_string' => 'La civilité doit être une chaîne de caractères.',

    'sexe_required' => 'Le sexe est obligatoire.',
    'sexe_string' => 'Le sexe doit être une chaîne de caractères.',

    'nationality_required' => 'La nationalité est obligatoire.',

    'address_required' => 'L\'adresse est obligatoire.',

    'postal_code_required' => 'Le code postal est obligatoire.',

    'city_id_required' => 'La ville est obligatoire.',

    'family_situation_required' => 'La situation familiale est obligatoire.',

    'birth_place_required' => 'Le lieu de naissance est obligatoire.',


    'birth_date_required' => 'La date de naissance est obligatoire.',
   
    'status_required' => 'Le statut est obligatoire.',
    'status_string' => 'Le statut doit être une chaîne de caractères.',

    'language_string' => 'La langue doit être une chaîne de caractères.',

    'path_picture_image' => 'La photo de profil doit être une image.',
    'path_picture_mimes' => 'La photo de profil doit être au format jpeg, png ou jpg.',
    'path_picture_max' => 'La photo de profil ne doit pas dépasser 2 Mo.',

    'cover_photo_image' => 'La photo de couverture doit être une image.',
    'cover_photo_mimes' => 'La photo de couverture doit être au format jpeg, png ou jpg.',
    'cover_photo_max' => 'La photo de couverture ne doit pas dépasser 5 Mo.',

    'user_id_nullable' => 'L\'identifiant utilisateur peut être vide.',

    'overtime_nullable' => 'Le champ heures supplémentaires peut être vide.',
    'overtime_string' => 'Le champ heures supplémentaires doit être une chaîne de caractères.',

    'group_nullable' => 'Le champ groupe peut être vide.',
    'group_string' => 'Le champ groupe doit être une chaîne de caractères.',
    'title_required' => 'Le titre de l\'événement est obligatoire.',
    'event_type_required' => 'Le type d\'événement est obligatoire.',
    'event_type_in' => 'Le type d\'événement doit être "présentiel", "téléphonique" ou "visioconférence".',

    'date_after_or_equal' => 'La date doit être égale ou postérieure à aujourd\'hui.',
    'start_time_required' => 'L\'heure de début est obligatoire.',
    'start_time_date_format' => 'L\'heure de début doit être au format HH:MM.',
    'end_time_required' => 'L\'heure de fin est obligatoire.',
    'end_time_date_format' => 'L\'heure de fin doit être au format HH:MM.',
    'end_time_after' => 'L\'heure de fin doit être après l\'heure de début.',
    'reminder_integer' => 'Le rappel doit être un nombre entier.',
    'reminder_in' => 'Le rappel doit être de 0, 5, 10, 15, 30, 45, 60 ou 120 minutes.',
    'high_importance_boolean' => 'Le champ "importance élevée" doit être vrai ou faux.',
    'is_favorite_boolean' => 'Le champ "favori" doit être vrai ou faux.',
    'is_draft_boolean' => 'Le champ "brouillon" doit être vrai ou faux.',
    'participants_array' => 'Les participants doivent être une liste d\'utilisateurs.',
    'participants_exists' => 'Un ou plusieurs participants ne sont pas valides.',
    'destinataires_array' => 'Les destinataires doivent être une liste d\'utilisateurs.',
    'destinataires_exists' => 'Un ou plusieurs destinataires ne sont pas valides.',
    'attachments_array' => 'Les pièces jointes doivent être une liste de fichiers.',
    'attachments_file' => 'Chaque pièce jointe doit être un fichier valide.',
    
  
    'title_string' => 'Le titre doit être une chaîne de caractères.',
    'title_max' => 'Le titre ne peut pas dépasser 255 caractères.',
    'event_url_url' => 'L\'URL de l\'événement doit être valide.',

    'location_string' => 'Le lieu doit être une chaîne de caractères.',
    'location_max' => 'Le lieu ne peut pas dépasser 255 caractères.',

    'reminder_min' => 'Le rappel doit être supérieur ou égal à 0.',

    'attachments_max' => 'Chaque pièce jointe ne peut pas dépasser 2 Mo.',
    'client_id_required' => 'Le champ client est requis.',

    'contract_type_id_required' => 'Le type de contrat est requis.',
    'nbr_profiles_required' => 'Le nombre de profils est requis.',
    'mission_started_at_required' => 'La date de début de la mission est requise.',
    'mission_finished_at_required' => 'La date de fin de la mission est requise.',
    'client_evaluator_required' => 'Le champ Évaluateur client est requis.',
    'company_evaluator_required' => 'Le champ Évaluateur d’entreprise est requis.',

    // Formation
    'formations_required' => 'Veuillez ajouter au moins une formation.',
    'formations_array' => 'Les formations doivent être un tableau.',
    'formations_diploma_id_required' => 'Le diplôme est obligatoire pour chaque formation.',
    'formations_option_id_required' => 'L\'option est obligatoire pour chaque formation.',
    'formations_weight_formation_required' => 'Le pourcentage de tolérance formation est obligatoire pour chaque formation.',
    'formations_weight_option_required' => 'Le pourcentage de tolérance option est obligatoire pour chaque formation.',

    // Expérience
    'experiences_required' => 'Veuillez ajouter au moins une expérience professionnelle.',
    'experiences_array' => 'Les expériences doivent être un tableau.',
    'experiences_profession_id_required' => 'Le titre du poste est obligatoire pour chaque expérience.',
    'experiences_years_required' => 'Le nombre d\'expérience est obligatoire pour chaque expérience.',
    'experiences_weight_profession_required' => 'Le pourcentage de tolérance poste est obligatoire pour chaque expérience.',
    'experiences_weight_experience_required' => 'Le pourcentage de tolérance Nombre d\'expérience est obligatoire pour chaque expérience.',

    // Compétences techniques
    'technical_skills_label_skill_types_required' => 'La catégorie est obligatoire pour chaque compétence.',
    'technical_skills_label_skills_required' => 'Le détail est obligatoire pour chaque compétence.',

    // Compétences personnelles
    'personal_skills_label_skill_types_required' => 'La catégorie est obligatoire pour chaque compétence personnelle.',
    'personal_skills_label_skills_required' => 'Le détail est obligatoire pour chaque compétence personnelle.',

    // Compétences linguistiques
    'language_skills_required' => 'Le champ "compétences linguistiques" est obligatoire.',
    'language_skills_array' => 'Le champ "compétences linguistiques" doit être un tableau.',
    'language_skills_label_skill_types_required' => 'Le champ "types de compétences" est obligatoire.',
    'language_skills_multiple_skills_required' => 'Le champ "compétences multiples" est obligatoire.',
    'language_skills_multiple_skills_array' => 'Le champ "compétences multiples" doit être un tableau.',
    'language_skills_label_skills_required' => 'Le champ "libellé des compétences" est obligatoire.',
    'language_skills_level_required' => 'Le champ "niveau des compétences pour les offres d\'emploi" est obligatoire.',
    'language_skills_weight_required' => 'Le champ "poids des compétences pour les offres d\'emploi" est obligatoire.',

    // Mobilité
    'mobilitys_availabilitys_type_required' => 'Le champ "Disponibilité" est requis.',
    'mobilitys_availabilitys_notice_duration_required_if' => 'Le champ "Durée de préavis" est requis lorsque la disponibilité est définie sur "Préavis".',

    'profile_id_required' => 'Le champ candidat est obligatoire.',
    'profile_id_array' => 'Les candidats doivent être envoyés sous forme de tableau.',
    'profile_id_each_required' => 'Chaque candidat est obligatoire.',
    'profile_id_each_integer' => 'L\'identifiant de chaque candidat doit être un entier.',
    'profile_id_each_exists' => 'Un ou plusieurs candidats sélectionnés n\'existent pas dans la base de données.',

    'test_id_required' => 'Le champ test est obligatoire.',
    'test_id_integer' => 'L\'identifiant du test doit être un entier.',
    'test_id_exists' => 'Ce test n\'existe pas dans la base de données.',

    'job_offer_id_integer' => 'L\'identifiant de l\'offre doit être un entier.',
    'job_offer_id_exists' => 'L\'offre sélectionnée n\'existe pas dans la base de données.',
    'language_max' => 'La langue ne doit pas dépasser 255 caractères.',

    'status_in' => 'Le statut doit être soit "brouillon", soit "final".',

    'score_integer' => 'Le score doit être un entier.',

    'date_test_date' => 'La date du test doit être une date valide.',

    'nee_ful_scr_boolean' => 'Le champ nee_ful_scr doit être vrai ou faux.',
    'add_pro_boolean' => 'Le champ add_pro doit être vrai ou faux.',

    'password_min' => 'Le mot de passe doit contenir au moins 8 caractères.',
    'password_confirmed' => 'Les mots de passe ne correspondent pas.',

    'otp_code_integer' => "Le code OTP doit être un nombre.",
    'otp_code_digits' => "Le code OTP doit comporter 6 chiffres.",

    'otp_expires_at_date' => "La date d'expiration du OTP doit être une date valide.",

    'agency_id_exists' => "L'agence sélectionnée n'existe pas.",

    'user_image_image' => "Le fichier doit être une image.",
    'user_image_mimes' => "Le format de l'image doit être JPEG, PNG, JPG, GIF ou SVG.",
    'user_image_max' => "L'image ne doit pas dépasser 2 Mo.",
    'document_required' => 'Le fichier est requis.',
    'document_mimes' => 'Extensions autorisées : :extensions',
    'document_max' => 'Taille maximale autorisée : :max Mo.',
    'platform_required' => 'Le champ dépense est obligatoire.',
    'platform_string' => 'Le champ dépense doit être une chaîne de caractères.',
    'platform_max' => 'Le champ dépense ne doit pas dépasser 255 caractères.',

    'budget_required' => 'Le champ budget est obligatoire.',
    'budget_numeric' => 'Le budget doit être un nombre.',
    'budget_min' => 'Le budget doit être supérieur ou égal à 0.',

    'amount_required' => 'Le montant réel est obligatoire.',
    'amount_numeric' => 'Le montant doit être un nombre.',
    'amount_min' => 'Le montant doit être supérieur ou égal à 0.',

    'invoice_file' => 'La facture doit être un fichier.',
    'invoice_mimes' => 'La facture doit être un fichier de type : pdf, doc, docx.',
    'invoice_max' => 'La facture ne doit pas dépasser 10 Mo.',

    'devise_required' => 'Le champ devise est obligatoire.',
    'devise_string' => 'La devise doit être une chaîne de caractères.',
    'devise_in' => 'La devise sélectionnée est invalide. (MAD, EUR, USD)',
    
];
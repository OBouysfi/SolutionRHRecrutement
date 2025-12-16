<?php
return [
'profession_id_required' => 'El campo "Título del puesto" es obligatorio.',
    'contract_type_required' => 'El campo "Tipo de contrato" es obligatorio.',
    'contract_type_string' => 'El tipo de contrato debe ser una cadena de caracteres.',
    'contract_type_max' => 'El tipo de contrato no debe exceder 255 caracteres.',

    'activity_area_id_required' => 'El campo "Sector de actividad" es obligatorio.',

    'company_size_required' => 'El campo "Tamaño de la empresa" es obligatorio.',
    'company_size_string' => 'El tamaño de la empresa debe ser una cadena de caracteres.',
    'company_size_max' => 'El tamaño de la empresa no debe exceder 255 caracteres.',

    'has_driving_license_required' => 'Por favor, indique si tiene licencia de conducir.',

    'min_expected_salary_required' => 'El salario mínimo esperado es obligatorio.',
    'min_expected_salary_min' => 'El salario mínimo debe ser al menos 0.',
    'min_expected_salary_max' => 'El salario mínimo no debe exceder 99999999.99.',

    'max_expected_salary_required' => 'El salario máximo esperado es obligatorio.',
    'max_expected_salary_min' => 'El salario máximo debe ser al menos 0.',
    'max_expected_salary_max' => 'El salario máximo no debe exceder 99999999.99.',
    'max_expected_salary_gte' => 'El salario máximo debe ser mayor o igual al salario mínimo.',

    'license_types_required' => 'Por favor, seleccione al menos un tipo de licencia.',
    'license_types_array' => 'El tipo de licencia debe ser un arreglo.',
    'license_types_string' => 'Cada tipo de licencia debe ser una cadena de caracteres.',
    'license_types_max' => 'Cada tipo de licencia no debe exceder 50 caracteres.',

    'mobility_weight_integer' => 'El peso de la movilidad debe ser un entero.',
    'mobility_weight_min' => 'El peso de la movilidad debe ser al menos 0.',
    'mobility_weight_max' => 'El peso de la movilidad no debe exceder 100.',

    'work_mode_weight_integer' => 'El peso del modo de trabajo debe ser un entero.',
    'work_mode_weight_min' => 'El peso del modo de trabajo debe ser al menos 0.',
    'work_mode_weight_max' => 'El peso del modo de trabajo no debe exceder 100.',

    'work_time_weight_integer' => 'El peso del tiempo de trabajo debe ser un entero.',
    'work_time_weight_min' => 'El peso del tiempo de trabajo debe ser al menos 0.',
    'work_time_weight_max' => 'El peso del tiempo de trabajo no debe exceder 100.',

    'availability_type_required' => 'El tipo de disponibilidad es obligatorio.',
    'availability_type_in' => 'El tipo de disponibilidad seleccionado es inválido.',
    'availability_notice_duration_required_if' => 'La duración del aviso previo es obligatoria si el tipo de disponibilidad es "Aviso previo".',
    'availability_notice_duration_integer' => 'La duración del aviso previo debe ser un entero.',
    'availability_notice_duration_min' => 'La duración del aviso previo debe ser al menos 1 mes.',
    'availability_notice_duration_max' => 'La duración del aviso previo no debe exceder 12 meses.',
    
    'logo_image' => 'El logo debe ser una imagen válida.',
    'logo_max' => 'El logo no puede exceder 10 MB.',

    'organisme_required' => 'El campo organismo es obligatorio.',
    'organisme_string' => 'El campo organismo debe ser una cadena de caracteres.',
    'organisme_max' => 'El campo organismo no puede exceder 255 caracteres.',

    'numero_accreditation_string' => 'El número de acreditación debe ser una cadena de caracteres.',
    'numero_accreditation_max' => 'El número de acreditación no puede exceder 255 caracteres.',

    'adresse_string' => 'La dirección debe ser una cadena de caracteres.',
    'adresse_max' => 'La dirección no puede exceder 255 caracteres.',

    'city_id_exists' => 'La ciudad seleccionada es inválida.',

    'pays_string' => 'El país debe ser una cadena de caracteres.',
    'pays_max' => 'El país no puede exceder 255 caracteres.',

    'telephone_1_string' => 'El número de teléfono debe ser una cadena de caracteres.',
    'telephone_1_max' => 'El número de teléfono no puede exceder 20 caracteres.',

    'telephone_2_string' => 'El número de teléfono secundario debe ser una cadena de caracteres.',
    'telephone_2_max' => 'El número de teléfono secundario no puede exceder 20 caracteres.',

    'email_email' => 'El campo email debe contener una dirección de correo electrónico válida.',
    'email_max' => 'La dirección de correo electrónico no puede exceder 255 caracteres.',

    'nom_certification_required' => 'El nombre de la certificación es obligatorio.',
    'nom_certification_string' => 'El nombre de la certificación debe ser una cadena de caracteres.',
    'nom_certification_max' => 'El nombre de la certificación no puede exceder 255 caracteres.',

    'criteres_evaluation_string' => 'Los criterios de evaluación deben ser una cadena de caracteres.',

    'theme_certification_string' => 'El tema de la certificación debe ser una cadena de caracteres.',
    'theme_certification_max' => 'El tema de la certificación no puede exceder 255 caracteres.',

    'score_resultat_string' => 'La puntuación del resultado debe ser una cadena de caracteres.',
    'score_resultat_max' => 'La puntuación del resultado no puede exceder 255 caracteres.',

    'niveau_certification_string' => 'El nivel de la certificación debe ser una cadena de caracteres.',
    'niveau_certification_max' => 'El nivel de la certificación no puede exceder 255 caracteres.',

    'date_obtention_date' => 'La fecha de obtención debe ser una fecha válida.',
    'volume_horaire_string' => 'El volumen horario debe ser una cadena de caracteres.',
    'volume_horaire_max' => 'El volumen horario no puede exceder 255 caracteres.',
    'date_expiration_date' => 'La fecha de expiración debe ser una fecha válida.',
    'subject_required' => 'El campo objeto es obligatorio.',
    'subject_string' => 'El campo objeto debe ser una cadena de caracteres.',
    'subject_max' => 'El campo objeto no puede exceder 150 caracteres.',
    'description_required' => 'El campo descripción es obligatorio.',
    'logo_file' => 'El logo debe ser un archivo válido.',

    'company_required' => 'El campo empresa es obligatorio.',
    'company_string' => 'El campo empresa debe ser una cadena de caracteres.',
    'company_max' => 'El campo empresa no puede exceder 255 caracteres.',

    'profession_id_exists' => 'La profesión seleccionada es inválida.',

    'started_at_required' => 'La fecha de inicio es obligatoria.',
    'started_at_date' => 'La fecha de inicio debe ser una fecha válida.',

    'finished_at_date' => 'La fecha de fin debe ser una fecha válida.',
    'finished_at_after_or_equal' => 'La fecha de fin debe ser posterior o igual a la fecha de inicio.',

    'project_name_required' => 'El campo proyecto es obligatorio.',
    'project_name_string' => 'El campo proyecto debe ser una cadena de caracteres.',
    'project_name_max' => 'El campo proyecto no puede exceder 255 caracteres.',

    'skills_tech_required' => 'El campo habilidades técnicas es obligatorio.',
    'skills_tech_string' => 'El campo habilidades técnicas debe ser una cadena de caracteres.',
    'skills_tech_max' => 'El campo habilidades técnicas no puede exceder 255 caracteres.',

    'date_required' => 'El campo fecha es obligatorio.',
    'date_date' => 'El campo fecha debe ser una fecha válida.',

    'description_string' => 'La descripción debe ser una cadena de caracteres.',

    'name_required' => 'El campo nombre es obligatorio.',
    'name_string' => 'El campo nombre debe ser una cadena de caracteres.',
    'name_max' => 'El campo nombre no puede exceder 255 caracteres.',

    'address_string' => 'La dirección debe ser una cadena de caracteres.',
    'address_max' => 'La dirección no puede exceder 255 caracteres.',

    'phone_string' => 'El número de teléfono debe ser una cadena de caracteres.',
    'phone_max' => 'El número de teléfono no puede exceder 20 caracteres.',

    'secondary_phone_string' => 'El número de teléfono secundario debe ser una cadena de caracteres.',
    'secondary_phone_max' => 'El número de teléfono secundario no puede exceder 20 caracteres.',

    'level_id_exists' => 'El nivel seleccionado es inválido.',
    'diploma_id_exists' => 'El diploma seleccionado es inválido.',

    'option_id_exists' => 'La opción de diploma seleccionada es inválida.',

    'option_string' => 'El campo opción debe ser una cadena de caracteres.',
    'option_max' => 'El campo opción no puede exceder 255 caracteres.',

    'mention_string' => 'El campo mención debe ser una cadena de caracteres.',
    'mention_max' => 'El campo mención no puede exceder 255 caracteres.',

    'civility_required' => 'El campo cortesía es obligatorio.',
    'civility_integer' => 'La cortesía debe ser un entero válido.',

    'first_name_required' => 'El nombre es obligatorio.',
    'first_name_string' => 'El nombre debe ser una cadena de caracteres.',
    'first_name_max' => 'El nombre no puede exceder 255 caracteres.',

    'last_name_required' => 'El apellido es obligatorio.',
    'last_name_string' => 'El apellido debe ser una cadena de caracteres.',
    'last_name_max' => 'El apellido no puede exceder 255 caracteres.',

    'family_situation_string' => 'La situación familiar debe ser una cadena de caracteres.',
    'family_situation_max' => 'La situación familiar no puede exceder 255 caracteres.',

    'birth_date_date' => 'La fecha de nacimiento debe ser una fecha válida.',
    'birth_date_before_or_equal' => 'Debe tener al menos 18 años.',

    'birth_place_string' => 'El lugar de nacimiento debe ser una cadena de caracteres.',
    'birth_place_max' => 'El lugar de nacimiento no puede exceder 255 caracteres.',

    'nationality_string' => 'La nacionalidad debe ser una cadena de caracteres.',
    'nationality_max' => 'La nacionalidad no puede exceder 255 caracteres.',

    'postal_code_string' => 'El código postal debe ser una cadena de caracteres.',
    'postal_code_max' => 'El código postal no puede exceder 20 caracteres.',

    'city_id_integer' => 'La ciudad debe ser un identificador válido.',

    'phone_primary_required' => 'El número de teléfono principal es obligatorio.',
    'phone_primary_string' => 'El número de teléfono principal debe ser una cadena de caracteres.',
    'phone_primary_max' => 'El número de teléfono principal no puede exceder 40 caracteres.',
    'phone_primary_unique' => 'El número de teléfono principal ya está en uso.',

    'phone_secondary_string' => 'El número de teléfono secundario debe ser una cadena de caracteres.',
    'phone_secondary_max' => 'El número de teléfono secundario no puede exceder 40 caracteres.',

    'email_required' => 'La dirección de correo electrónico es obligatoria.',
    'email_unique' => 'La dirección de correo electrónico ya está en uso.',

    'url_facebook_url' => 'La URL de Facebook debe ser una URL válida.',
    'url_facebook_max' => 'La URL de Facebook no puede exceder 255 caracteres.',

    'url_linkedin_url' => 'La URL de LinkedIn debe ser una URL válida.',
    'url_linkedin_max' => 'La URL de LinkedIn no puede exceder 255 caracteres.',

    'url_twitter_url' => 'La URL de Twitter debe ser una URL válida.',
    'url_twitter_max' => 'La URL de Twitter no puede exceder 255 caracteres.',

    'salary_expectation_numeric' => 'La expectativa salarial debe ser un número válido.',

    'profession_id_integer' => 'La profesión debe ser un identificador válido.',

    'cv_mimes' => 'El CV debe ser un archivo de tipo: pdf, doc o docx.',
    'cv_max' => 'El CV no puede exceder 10 MB.',

    'cover_letter_mimes' => 'La carta de presentación debe ser un archivo de tipo: pdf, doc o docx.',
    'cover_letter_max' => 'La carta de presentación no puede exceder 10 MB.',

    'video_mimes' => 'El video debe ser un archivo de tipo: mp4, mov, avi o wmv.',
    'video_max' => 'El video no puede exceder 50 MB.',
    
    'language_required' => 'El campo idioma es obligatorio.',
    'language_integer' => 'El campo idioma debe ser un identificador válido.',

    'skills_skill_required' => 'La habilidad es obligatoria.',
    'skills_skill_string' => 'La habilidad debe ser una cadena de caracteres.',
    'skills_skill_max' => 'La habilidad no puede exceder 250 caracteres.',

    'skills_level_required' => 'El nivel de habilidad es obligatorio.',
    'skills_level_string' => 'El nivel de habilidad debe ser una cadena de caracteres.',
    'skills_level_max' => 'El nivel de habilidad no puede exceder 2 caracteres.',

    'skills_weight_required' => 'La escala de habilidad es obligatoria.',
    'skills_weight_integer' => 'La escala de habilidad debe ser un entero válido.',
    'skills_weight_between' => 'La escala de habilidad debe estar entre 1 y 5.',
    
    'photo_image' => 'La foto debe ser una imagen válida.',
    'photo_mimes' => 'La foto debe estar en formato jpeg, png, jpg o gif.',
    'photo_max' => 'La foto no puede exceder 10 MB.',

    'poste_required' => 'El puesto es obligatorio.',
    'poste_integer' => 'El puesto debe ser un identificador válido.',
    'poste_exists' => 'El puesto seleccionado es inválido.',

    'message_required' => 'El mensaje es obligatorio.',
    'message_string' => 'El mensaje debe ser una cadena de caracteres.',

    // Habilidades técnicas
    'technical_skills_required' => 'Las habilidades técnicas son obligatorias.',
    'technical_skills_array' => 'Las habilidades técnicas deben ser un arreglo.',
    'technical_skills_category_required' => 'La categoría de habilidad técnica es obligatoria.',
    'technical_skills_category_string' => 'La categoría de habilidad técnica debe ser una cadena de caracteres.',
    'technical_skills_category_max' => 'La categoría de habilidad técnica no puede exceder 250 caracteres.',
    'technical_skills_skill_required' => 'El detalle de la habilidad técnica es obligatorio.',
    'technical_skills_skill_string' => 'El detalle de la habilidad técnica debe ser una cadena de caracteres.',
    'technical_skills_skill_max' => 'El detalle de la habilidad técnica no puede exceder 500 caracteres.',
    'technical_skills_level_required' => 'El nivel de habilidad técnica es obligatorio.',
    'technical_skills_level_integer' => 'El nivel de habilidad técnica debe ser un entero.',
    'technical_skills_weight_required' => 'La escala de habilidad técnica es obligatoria.',
    'technical_skills_weight_integer' => 'La escala de habilidad técnica debe ser un entero válido.',
    'technical_skills_weight_between' => 'La escala de habilidad técnica debe estar entre 1 y 5.',

    // Habilidades personales
    'personal_skills_required' => 'Las habilidades personales son obligatorias.',
    'personal_skills_array' => 'Las habilidades personales deben ser un arreglo.',
    'personal_skills_category_required' => 'La categoría de habilidad personal es obligatoria.',
    'personal_skills_category_string' => 'La categoría de habilidad personal debe ser una cadena de caracteres.',
    'personal_skills_category_max' => 'La categoría de habilidad personal no puede exceder 250 caracteres.',
    'personal_skills_skill_required' => 'El detalle de la habilidad personal es obligatorio.',
    'personal_skills_skill_string' => 'El detalle de la habilidad personal debe ser una cadena de caracteres.',
    'personal_skills_skill_max' => 'El detalle de la habilidad personal no puede exceder 500 caracteres.',
    'personal_skills_level_required' => 'El nivel de habilidad personal es obligatorio.',
    'personal_skills_level_integer' => 'El nivel de habilidad personal debe ser un entero.',
    'personal_skills_weight_required' => 'La escala de habilidad personal es obligatoria.',
    'personal_skills_weight_integer' => 'La escala de habilidad personal debe ser un entero válido.',
    'personal_skills_weight_between' => 'La escala de habilidad personal debe estar entre 1 y 5.',
    
    'civility_string' => 'La cortesía debe ser una cadena de caracteres.',

    'sexe_required' => 'El sexo es obligatorio.',
    'sexe_string' => 'El sexo debe ser una cadena de caracteres.',

    'nationality_required' => 'La nacionalidad es obligatoria.',

    'address_required' => 'La dirección es obligatoria.',

    'postal_code_required' => 'El código postal es obligatorio.',

    'city_id_required' => 'La ciudad es obligatoria.',

    'family_situation_required' => 'La situación familiar es obligatoria.',

    'birth_place_required' => 'El lugar de nacimiento es obligatorio.',

    'birth_date_required' => 'La fecha de nacimiento es obligatoria.',
   
    'status_required' => 'El estado es obligatorio.',
    'status_string' => 'El estado debe ser una cadena de caracteres.',

    'language_string' => 'El idioma debe ser una cadena de caracteres.',

    'path_picture_image' => 'La foto de perfil debe ser una imagen.',
    'path_picture_mimes' => 'La foto de perfil debe estar en formato jpeg, png o jpg.',
    'path_picture_max' => 'La foto de perfil no debe exceder 2 MB.',

    'cover_photo_image' => 'La foto de portada debe ser una imagen.',
    'cover_photo_mimes' => 'La foto de portada debe estar en formato jpeg, png o jpg.',
    'cover_photo_max' => 'La foto de portada no debe exceder 5 MB.',

    'user_id_nullable' => 'El identificador de usuario puede estar vacío.',

    'overtime_nullable' => 'El campo horas extra puede estar vacío.',
    'overtime_string' => 'El campo horas extra debe ser una cadena de caracteres.',

    'group_nullable' => 'El campo grupo puede estar vacío.',
    'group_string' => 'El campo grupo debe ser una cadena de caracteres.',
    
    'title_required' => 'El título del evento es obligatorio.',
    'event_type_required' => 'El tipo de evento es obligatorio.',
    'event_type_in' => 'El tipo de evento debe ser "presencial", "telefónico" o "videoconferencia".',

    'date_after_or_equal' => 'La fecha debe ser igual o posterior a hoy.',
    'start_time_required' => 'La hora de inicio es obligatoria.',
    'start_time_date_format' => 'La hora de inicio debe estar en formato HH:MM.',
    'end_time_required' => 'La hora de fin es obligatoria.',
    'end_time_date_format' => 'La hora de fin debe estar en formato HH:MM.',
    'end_time_after' => 'La hora de fin debe ser después de la hora de inicio.',
    'reminder_integer' => 'El recordatorio debe ser un número entero.',
    'reminder_in' => 'El recordatorio debe ser de 0, 5, 10, 15, 30, 45, 60 o 120 minutos.',
    'high_importance_boolean' => 'El campo "alta importancia" debe ser verdadero o falso.',
    'is_favorite_boolean' => 'El campo "favorito" debe ser verdadero o falso.',
    'is_draft_boolean' => 'El campo "borrador" debe ser verdadero o falso.',
    'participants_array' => 'Los participantes deben ser una lista de usuarios.',
    'participants_exists' => 'Uno o más participantes no son válidos.',
    'destinataires_array' => 'Los destinatarios deben ser una lista de usuarios.',
    'destinataires_exists' => 'Uno o más destinatarios no son válidos.',
    'attachments_array' => 'Los archivos adjuntos deben ser una lista de archivos.',
    'attachments_file' => 'Cada archivo adjunto debe ser un archivo válido.',
    
    'title_string' => 'El título debe ser una cadena de caracteres.',
    'title_max' => 'El título no puede exceder 255 caracteres.',
    'event_url_url' => 'La URL del evento debe ser válida.',

    'location_string' => 'El lugar debe ser una cadena de caracteres.',
    'location_max' => 'El lugar no puede exceder 255 caracteres.',

    'reminder_min' => 'El recordatorio debe ser mayor o igual a 0.',

    'attachments_max' => 'Cada archivo adjunto no puede exceder 2 MB.',
    
    'client_id_required' => 'El campo cliente es requerido.',

    'contract_type_id_required' => 'El tipo de contrato es requerido.',
    'nbr_profiles_required' => 'El número de perfiles es requerido.',
    'mission_started_at_required' => 'La fecha de inicio de la misión es requerida.',
    'mission_finished_at_required' => 'La fecha de fin de la misión es requerida.',
    'client_evaluator_required' => 'El campo Evaluador cliente es requerido.',
    'company_evaluator_required' => 'El campo Evaluador de empresa es requerido.',

    // Formación
    'formations_required' => 'Por favor, agregue al menos una formación.',
    'formations_array' => 'Las formaciones deben ser un arreglo.',
    'formations_diploma_id_required' => 'El diploma es obligatorio para cada formación.',
    'formations_option_id_required' => 'La opción es obligatoria para cada formación.',
    'formations_weight_formation_required' => 'El porcentaje de tolerancia de formación es obligatorio para cada formación.',
    'formations_weight_option_required' => 'El porcentaje de tolerancia de opción es obligatorio para cada formación.',

    // Experiencia
    'experiences_required' => 'Por favor, agregue al menos una experiencia profesional.',
    'experiences_array' => 'Las experiencias deben ser un arreglo.',
    'experiences_profession_id_required' => 'El título del puesto es obligatorio para cada experiencia.',
    'experiences_years_required' => 'El número de experiencia es obligatorio para cada experiencia.',
    'experiences_weight_profession_required' => 'El porcentaje de tolerancia del puesto es obligatorio para cada experiencia.',
    'experiences_weight_experience_required' => 'El porcentaje de tolerancia del número de experiencia es obligatorio para cada experiencia.',

    // Habilidades técnicas
    'technical_skills_label_skill_types_required' => 'La categoría es obligatoria para cada habilidad.',
    'technical_skills_label_skills_required' => 'El detalle es obligatorio para cada habilidad.',

    // Habilidades personales
    'personal_skills_label_skill_types_required' => 'La categoría es obligatoria para cada habilidad personal.',
    'personal_skills_label_skills_required' => 'El detalle es obligatorio para cada habilidad personal.',

    // Habilidades lingüísticas
    'language_skills_required' => 'El campo "habilidades lingüísticas" es obligatorio.',
    'language_skills_array' => 'El campo "habilidades lingüísticas" debe ser un arreglo.',
    'language_skills_label_skill_types_required' => 'El campo "tipos de habilidades" es obligatorio.',
    'language_skills_multiple_skills_required' => 'El campo "habilidades múltiples" es obligatorio.',
    'language_skills_multiple_skills_array' => 'El campo "habilidades múltiples" debe ser un arreglo.',
    'language_skills_label_skills_required' => 'El campo "etiqueta de habilidades" es obligatorio.',
    'language_skills_level_required' => 'El campo "nivel de habilidades para ofertas de trabajo" es obligatorio.',
    'language_skills_weight_required' => 'El campo "peso de habilidades para ofertas de trabajo" es obligatorio.',

    // Movilidad
    'mobilitys_availabilitys_type_required' => 'El campo "Disponibilidad" es requerido.',
    'mobilitys_availabilitys_notice_duration_required_if' => 'El campo "Duración de aviso previo" es requerido cuando la disponibilidad está definida como "Aviso previo".',

    'profile_id_required' => 'El campo candidato es obligatorio.',
    'profile_id_array' => 'Los candidatos deben ser enviados como un arreglo.',
    'profile_id_each_required' => 'Cada candidato es obligatorio.',
    'profile_id_each_integer' => 'El identificador de cada candidato debe ser un entero.',
    'profile_id_each_exists' => 'Uno o más candidatos seleccionados no existen en la base de datos.',

    'test_id_required' => 'El campo prueba es obligatorio.',
    'test_id_integer' => 'El identificador de la prueba debe ser un entero.',
    'test_id_exists' => 'Esta prueba no existe en la base de datos.',

    'job_offer_id_integer' => 'El identificador de la oferta debe ser un entero.',
    'job_offer_id_exists' => 'La oferta seleccionada no existe en la base de datos.',
    'language_max' => 'El idioma no debe exceder 255 caracteres.',

    'status_in' => 'El estado debe ser "borrador" o "final".',

    'score_integer' => 'La puntuación debe ser un entero.',

    'date_test_date' => 'La fecha de la prueba debe ser una fecha válida.',

    'nee_ful_scr_boolean' => 'El campo nee_ful_scr debe ser verdadero o falso.',
    'add_pro_boolean' => 'El campo add_pro debe ser verdadero o falso.',

    'password_min' => 'La contraseña debe contener al menos 8 caracteres.',
    'password_confirmed' => 'Las contraseñas no coinciden.',

    'otp_code_integer' => "El código OTP debe ser un número.",
    'otp_code_digits' => "El código OTP debe tener 6 dígitos.",

    'otp_expires_at_date' => "La fecha de expiración del OTP debe ser una fecha válida.",

    'agency_id_exists' => "La agencia seleccionada no existe.",

    'user_image_image' => "El archivo debe ser una imagen.",
    'user_image_mimes' => "El formato de la imagen debe ser JPEG, PNG, JPG, GIF o SVG.",
    'user_image_max' => "La imagen no debe exceder 2 MB.",
    
    'document_required' => 'El archivo es requerido.',
    'document_mimes' => 'Extensiones permitidas: :extensions',
    'document_max' => 'Tamaño máximo permitido: :max MB.',
    
    'platform_required' => 'El campo gasto es obligatorio.',
    'platform_string' => 'El campo gasto debe ser una cadena de caracteres.',
    'platform_max' => 'El campo gasto no debe exceder 255 caracteres.',

    'budget_required' => 'El campo presupuesto es obligatorio.',
    'budget_numeric' => 'El presupuesto debe ser un número.',
    'budget_min' => 'El presupuesto debe ser mayor o igual a 0.',

    'amount_required' => 'El monto real es obligatorio.',
    'amount_numeric' => 'El monto debe ser un número.',
    'amount_min' => 'El monto debe ser mayor o igual a 0.',

    'invoice_file' => 'La factura debe ser un archivo.',
    'invoice_mimes' => 'La factura debe ser un archivo de tipo: pdf, doc, docx.',
    'invoice_max' => 'La factura no debe exceder 10 MB.',

    'devise_required' => 'El campo moneda es obligatorio.',
    'devise_string' => 'La divisa debe ser una cadena de caracteres.',
    'devise_in' => 'La divisa seleccionada no es válida. (MAD, EUR, USD)',
];
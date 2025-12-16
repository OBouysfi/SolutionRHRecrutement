<?php 
return [
    'profession_id_required' => 'O campo "Título do Cargo" é obrigatório.',
'contract_type_required' => 'O campo "Tipo de Contrato" é obrigatório.',
'contract_type_string' => 'O tipo de contrato deve ser uma cadeia de caracteres.',
'contract_type_max' => 'O tipo de contrato não deve exceder 255 caracteres.',

'activity_area_id_required' => 'O campo "Setor de Atividade" é obrigatório.',

'company_size_required' => 'O campo "Tamanho da Empresa" é obrigatório.',
'company_size_string' => 'O tamanho da empresa deve ser uma cadeia de caracteres.',
'company_size_max' => 'O tamanho da empresa não deve exceder 255 caracteres.',

'has_driving_license_required' => 'Por favor, indique se você tem uma carteira de motorista.',

'min_expected_salary_required' => 'O salário mínimo esperado é obrigatório.',
'min_expected_salary_min' => 'O salário mínimo deve ser pelo menos 0.',
'min_expected_salary_max' => 'O salário mínimo não deve exceder 99999999,99.',

'max_expected_salary_required' => 'O salário máximo esperado é obrigatório.',
'max_expected_salary_min' => 'O salário máximo deve ser pelo menos 0.',
'max_expected_salary_max' => 'O salário máximo não deve exceder 99999999,99.',
'max_expected_salary_gte' => 'O salário máximo deve ser superior ou igual ao salário mínimo.',

'license_types_required' => 'Por favor, selecione pelo menos um tipo de licença.',
'license_types_array' => 'O tipo de licença deve ser um array.',
'license_types_string' => 'Cada tipo de licença deve ser uma cadeia de caracteres.',
'license_types_max' => 'Cada tipo de licença não deve exceder 50 caracteres.',

'mobility_weight_integer' => 'O peso da mobilidade deve ser um número inteiro.',
'mobility_weight_min' => 'O peso da mobilidade deve ser pelo menos 0.',
'mobility_weight_max' => 'O peso da mobilidade não deve exceder 100.',

'work_mode_weight_integer' => 'O peso do modo de trabalho deve ser um número inteiro.',
'work_mode_weight_min' => 'O peso do modo de trabalho deve ser pelo menos 0.',
'work_mode_weight_max' => 'O peso do modo de trabalho não deve exceder 100.',

'work_time_weight_integer' => 'O peso do tempo de trabalho deve ser um número inteiro.',
'work_time_weight_min' => 'O peso do tempo de trabalho deve ser pelo menos 0.',
'work_time_weight_max' => 'O peso do tempo de trabalho não deve exceder 100.',

'availability_type_required' => 'O tipo de disponibilidade é obrigatório.',
'availability_type_in' => 'O tipo de disponibilidade selecionado é inválido.',
'availability_notice_duration_required_if' => 'A duração do aviso é obrigatória se o tipo de disponibilidade for "Aviso".',
'availability_notice_duration_integer' => 'A duração do aviso deve ser um número inteiro.',
'availability_notice_duration_min' => 'A duração do aviso deve ser pelo menos 1 mês.',
'availability_notice_duration_max' => 'A duração do aviso não deve exceder 12 meses.',
'logo_image' => 'O logotipo deve ser uma imagem válida.',
'logo_max' => 'O logotipo não pode exceder 10 MB.',

'organisme_required' => 'O campo organismo é obrigatório.',
'organisme_string' => 'O campo organismo deve ser uma cadeia de caracteres.',
'organisme_max' => 'O campo organismo não pode exceder 255 caracteres.',

'numero_accreditation_string' => 'O número de acreditação deve ser uma cadeia de caracteres.',
'numero_accreditation_max' => 'O número de acreditação não pode exceder 255 caracteres.',

'adresse_string' => 'O endereço deve ser uma cadeia de caracteres.',
'adresse_max' => 'O endereço não pode exceder 255 caracteres.',

'city_id_exists' => 'A cidade selecionada é inválida.',

'pays_string' => 'O país deve ser uma cadeia de caracteres.',
'pays_max' => 'O país não pode exceder 255 caracteres.',

'telephone_1_string' => 'O número de telefone deve ser uma cadeia de caracteres.',
'telephone_1_max' => 'O número de telefone não pode exceder 20 caracteres.',

'telephone_2_string' => 'O número de telefone secundário deve ser uma cadeia de caracteres.',
'telephone_2_max' => 'O número de telefone secundário não pode exceder 20 caracteres.',

'email_email' => 'O campo email deve conter um endereço de e-mail válido.',
'email_max' => 'O endereço de e-mail não pode exceder 255 caracteres.',

'nom_certification_required' => 'O nome da certificação é obrigatório.',
'nom_certification_string' => 'O nome da certificação deve ser uma cadeia de caracteres.',
'nom_certification_max' => 'O nome da certificação não pode exceder 255 caracteres.',

'criteres_evaluation_string' => 'Os critérios de avaliação devem ser uma cadeia de caracteres.',

'theme_certification_string' => 'O tema da certificação deve ser uma cadeia de caracteres.',
'theme_certification_max' => 'O tema da certificação não pode exceder 255 caracteres.',

'score_resultat_string' => 'A pontuação do resultado deve ser uma cadeia de caracteres.',
'score_resultat_max' => 'A pontuação do resultado não pode exceder 255 caracteres.',

'niveau_certification_string' => 'O nível da certificação deve ser uma cadeia de caracteres.',
'niveau_certification_max' => 'O nível da certificação não pode exceder 255 caracteres.',

'date_obtention_date' => 'A data de obtenção deve ser uma data válida.',
'volume_horaire_string' => 'O volume horário deve ser uma cadeia de caracteres.',
'volume_horaire_max' => 'O volume horário não pode exceder 255 caracteres.',
'date_expiration_date' => 'A data de expiração deve ser uma data válida.',
'subject_required' => 'O campo assunto é obrigatório.',
'subject_string' => 'O campo assunto deve ser uma cadeia de caracteres.',
'subject_max' => 'O campo assunto não pode exceder 150 caracteres.',
'description_required' => 'O campo descrição é obrigatório.',
'logo_file' => 'O logotipo deve ser um arquivo válido.',

'company_required' => 'O campo empresa é obrigatório.',
'company_string' => 'O campo empresa deve ser uma cadeia de caracteres.',
'company_max' => 'O campo empresa não pode exceder 255 caracteres.',

'profession_id_exists' => 'A profissão selecionada é inválida.',

'started_at_required' => 'A data de início é obrigatória.',
'started_at_date' => 'A data de início deve ser uma data válida.',

'finished_at_date' => 'A data de término deve ser uma data válida.',
'finished_at_after_or_equal' => 'A data de término deve ser posterior ou igual à data de início.',

'project_name_required' => 'O campo projeto é obrigatório.',
'project_name_string' => 'O campo projeto deve ser uma cadeia de caracteres.',
'project_name_max' => 'O campo projeto não pode exceder 255 caracteres.',

'skills_tech_required' => 'O campo habilidades técnicas é obrigatório.',
'skills_tech_string' => 'O campo habilidades técnicas deve ser uma cadeia de caracteres.',
'skills_tech_max' => 'O campo habilidades técnicas não pode exceder 255 caracteres.',

'date_required' => 'O campo data é obrigatório.',
'date_date' => 'O campo data deve ser uma data válida.',

'description_string' => 'A descrição deve ser uma cadeia de caracteres.',

'name_required' => 'O campo nome é obrigatório.',
'name_string' => 'O campo nome deve ser uma cadeia de caracteres.',
'name_max' => 'O campo nome não pode exceder 255 caracteres.',

'address_string' => 'O endereço deve ser uma cadeia de caracteres.',
'address_max' => 'O endereço não pode exceder 255 caracteres.',

'phone_string' => 'O número de telefone deve ser uma cadeia de caracteres.',
'phone_max' => 'O número de telefone não pode exceder 20 caracteres.',

'secondary_phone_string' => 'O número de telefone secundário deve ser uma cadeia de caracteres.',
'secondary_phone_max' => 'O número de telefone secundário não pode exceder 20 caracteres.',

'level_id_exists' => 'O nível selecionado é inválido.',
'diploma_id_exists' => 'O diploma selecionado é inválido.',

'option_id_exists' => 'A opção de diploma selecionada é inválida.',

'option_string' => 'O campo opção deve ser uma cadeia de caracteres.',
'option_max' => 'O campo opção não pode exceder 255 caracteres.',

'mention_string' => 'O campo menção deve ser uma cadeia de caracteres.',
'mention_max' => 'O campo menção não pode exceder 255 caracteres.',

'civility_required' => 'O campo tratamento é obrigatório.',
'civility_integer' => 'O tratamento deve ser um número inteiro válido.',

'first_name_required' => 'O primeiro nome é obrigatório.',
'first_name_string' => 'O primeiro nome deve ser uma cadeia de caracteres.',
'first_name_max' => 'O primeiro nome não pode exceder 255 caracteres.',

'last_name_required' => 'O sobrenome é obrigatório.',
'last_name_string' => 'O sobrenome deve ser uma cadeia de caracteres.',
'last_name_max' => 'O sobrenome não pode exceder 255 caracteres.',

'family_situation_string' => 'A situação familiar deve ser uma cadeia de caracteres.',
'family_situation_max' => 'A situação familiar não pode exceder 255 caracteres.',

'birth_date_date' => 'A data de nascimento deve ser uma data válida.',
'birth_date_before_or_equal' => 'Você deve ter pelo menos 18 anos.',

'birth_place_string' => 'O lugar de nascimento deve ser uma cadeia de caracteres.',
'birth_place_max' => 'O lugar de nascimento não pode exceder 255 caracteres.',

'nationality_string' => 'A nacionalidade deve ser uma cadeia de caracteres.',
'nationality_max' => 'A nacionalidade não pode exceder 255 caracteres.',

'postal_code_string' => 'O código postal deve ser uma cadeia de caracteres.',
'postal_code_max' => 'O código postal não pode exceder 20 caracteres.',

'city_id_integer' => 'A cidade deve ser um identificador válido.',

'phone_primary_required' => 'O número de telefone principal é obrigatório.',
'phone_primary_string' => 'O número de telefone principal deve ser uma cadeia de caracteres.',
'phone_primary_max' => 'O número de telefone principal não pode exceder 40 caracteres.',
'phone_primary_unique' => 'O número de telefone principal já está em uso.',

'phone_secondary_string' => 'O número de telefone secundário deve ser uma cadeia de caracteres.',
'phone_secondary_max' => 'O número de telefone secundário não pode exceder 40 caracteres.',

'email_required' => 'O endereço de e-mail é obrigatório.',
'email_unique' => 'O endereço de e-mail já está em uso.',

'url_facebook_url' => 'A URL do Facebook deve ser uma URL válida.',
'url_facebook_max' => 'A URL do Facebook não pode exceder 255 caracteres.',

'url_linkedin_url' => 'A URL do LinkedIn deve ser uma URL válida.',
'url_linkedin_max' => 'A URL do LinkedIn não pode exceder 255 caracteres.',

'url_twitter_url' => 'A URL do Twitter deve ser uma URL válida.',
'url_twitter_max' => 'A URL do Twitter não pode exceder 255 caracteres.',

'salary_expectation_numeric' => 'A expectativa salarial deve ser um número válido.',

'profession_id_integer' => 'A profissão deve ser um identificador válido.',

'cv_mimes' => 'O currículo deve ser um arquivo do tipo: pdf, doc ou docx.',
'cv_max' => 'O currículo não pode exceder 10 MB.',

'cover_letter_mimes' => 'A carta de apresentação deve ser um arquivo do tipo: pdf, doc ou docx.',
'cover_letter_max' => 'A carta de apresentação não pode exceder 10 MB.',

'video_mimes' => 'O vídeo deve ser um arquivo do tipo: mp4, mov, avi ou wmv.',
'video_max' => 'O vídeo não pode exceder 50 MB.',

'language_required' => 'O campo idioma é obrigatório.',
'language_integer' => 'O campo idioma deve ser um identificador válido.',

'skills_skill_required' => 'A habilidade é obrigatória.',
'skills_skill_string' => 'A habilidade deve ser uma cadeia de caracteres.',
'skills_skill_max' => 'A habilidade não pode exceder 250 caracteres.',

'skills_level_required' => 'O nível de habilidade é obrigatório.',
'skills_level_string' => 'O nível de habilidade deve ser uma cadeia de caracteres.',
'skills_level_max' => 'O nível de habilidade não pode exceder 2 caracteres.',

'skills_weight_required' => 'A escala de habilidade é obrigatória.',
'skills_weight_integer' => 'A escala de habilidade deve ser um número inteiro válido.',
'skills_weight_between' => 'A escala de habilidade deve estar entre 1 e 5.',

'photo_image' => 'A foto deve ser uma imagem válida.',
'photo_mimes' => 'A foto deve ser no formato jpeg, png, jpg ou gif.',
'photo_max' => 'A foto não pode exceder 10 MB.',

'poste_required' => 'O posto é obrigatório.',
'poste_integer' => 'O posto deve ser um identificador válido.',
'poste_exists' => 'O posto selecionado é inválido.',

'message_required' => 'A mensagem é obrigatória.',
'message_string' => 'A mensagem deve ser uma cadeia de caracteres.',

// Habilidades técnicas
'technical_skills_required' => 'As habilidades técnicas são obrigatórias.',
'technical_skills_array' => 'As habilidades técnicas devem ser um array.',
'technical_skills_category_required' => 'A categoria de habilidade técnica é obrigatória.',
'technical_skills_category_string' => 'A categoria de habilidade técnica deve ser uma cadeia de caracteres.',
'technical_skills_category_max' => 'A categoria de habilidade técnica não pode exceder 250 caracteres.',
'technical_skills_skill_required' => 'O detalhe da habilidade técnica é obrigatório.',
'technical_skills_skill_string' => 'O detalhe da habilidade técnica deve ser uma cadeia de caracteres.',
'technical_skills_skill_max' => 'O detalhe da habilidade técnica não pode exceder 500 caracteres.',
'technical_skills_level_required' => 'O nível de habilidade técnica é obrigatório.',
'technical_skills_level_integer' => 'O nível de habilidade técnica deve ser um número inteiro.',
'technical_skills_weight_required' => 'A escala de habilidade técnica é obrigatória.',
'technical_skills_weight_integer' => 'A escala de habilidade técnica deve ser um número inteiro válido.',
'technical_skills_weight_between' => 'A escala de habilidade técnica deve estar entre 1 e 5.',

// Habilidades pessoais
'personal_skills_required' => 'As habilidades pessoais são obrigatórias.',
'personal_skills_array' => 'As habilidades pessoais devem ser um array.',
'personal_skills_category_required' => 'A categoria de habilidade pessoal é obrigatória.',
'personal_skills_category_string' => 'A categoria de habilidade pessoal deve ser uma cadeia de caracteres.',
'personal_skills_category_max' => 'A categoria de habilidade pessoal não pode exceder 250 caracteres.',
'personal_skills_skill_required' => 'O detalhe da habilidade pessoal é obrigatório.',
'personal_skills_skill_string' => 'O detalhe da habilidade pessoal deve ser uma cadeia de caracteres.',
'personal_skills_skill_max' => 'O detalhe da habilidade pessoal não pode exceder 500 caracteres.',
'personal_skills_level_required' => 'O nível de habilidade pessoal é obrigatório.',
'personal_skills_level_integer' => 'O nível de habilidade pessoal deve ser um número inteiro.',
'personal_skills_weight_required' => 'A escala de habilidade pessoal é obrigatória.',
'personal_skills_weight_integer' => 'A escala de habilidade pessoal deve ser um número inteiro válido.',
'personal_skills_weight_between' => 'A escala de habilidade pessoal deve estar entre 1 e 5.',
'civility_string' => 'O tratamento deve ser uma cadeia de caracteres.',

'sexe_required' => 'O sexo é obrigatório.',
'sexe_string' => 'O sexo deve ser uma cadeia de caracteres.',

'nationality_required' => 'A nacionalidade é obrigatória.',

'address_required' => 'O endereço é obrigatório.',

'postal_code_required' => 'O código postal é obrigatório.',

'city_id_required' => 'A cidade é obrigatória.',

'family_situation_required' => 'A situação familiar é obrigatória.',

'birth_place_required' => 'O lugar de nascimento é obrigatório.',

'birth_date_required' => 'A data de nascimento é obrigatória.',

'status_required' => 'O status é obrigatório.',
'status_string' => 'O status deve ser uma cadeia de caracteres.',

'language_string' => 'O idioma deve ser uma cadeia de caracteres.',

'path_picture_image' => 'A foto de perfil deve ser uma imagem.',
'path_picture_mimes' => 'A foto de perfil deve ser no formato jpeg, png ou jpg.',
'path_picture_max' => 'A foto de perfil não deve exceder 2 MB.',

'cover_photo_image' => 'A foto de capa deve ser uma imagem.',
'cover_photo_mimes' => 'A foto de capa deve ser no formato jpeg, png ou jpg.',
'cover_photo_max' => 'A foto de capa não deve exceder 5 MB.',

'user_id_nullable' => 'O identificador do usuário pode ser nulo.',

'overtime_nullable' => 'O campo horas extras pode ser nulo.',
'overtime_string' => 'O campo horas extras deve ser uma cadeia de caracteres.',

'group_nullable' => 'O campo grupo pode ser nulo.',
'group_string' => 'O campo grupo deve ser uma cadeia de caracteres.',

'title_required' => 'O título do evento é obrigatório.',
'event_type_required' => 'O tipo de evento é obrigatório.',
'event_type_in' => 'O tipo de evento deve ser "presencial", "telefônico" ou "videoconferência".',

'date_after_or_equal' => 'A data deve ser igual ou posterior ao dia de hoje.',
'start_time_required' => 'A hora de início é obrigatória.',
'start_time_date_format' => 'A hora de início deve estar no formato HH:MM.',
'end_time_required' => 'A hora de término é obrigatória.',
'end_time_date_format' => 'A hora de término deve estar no formato HH:MM.',
'end_time_after' => 'A hora de término deve ser após a hora de início.',
'reminder_integer' => 'O lembrete deve ser um número inteiro.',
'reminder_in' => 'O lembrete deve ser de 0, 5, 10, 15, 30, 45, 60 ou 120 minutos.',
'high_importance_boolean' => 'O campo "alta importância" deve ser verdadeiro ou falso.',
'is_favorite_boolean' => 'O campo "favorito" deve ser verdadeiro ou falso.',
'is_draft_boolean' => 'O campo "rascunho" deve ser verdadeiro ou falso.',
'participants_array' => 'Os participantes devem ser uma lista de usuários.',
'participants_exists' => 'Um ou mais participantes não são válidos.',
'destinataires_array' => 'Os destinatários devem ser uma lista de usuários.',
'destinataires_exists' => 'Um ou mais destinatários não são válidos.',
'attachments_array' => 'Os anexos devem ser uma lista de arquivos.',
'attachments_file' => 'Cada anexo deve ser um arquivo válido.',

'title_string' => 'O título deve ser uma cadeia de caracteres.',
'title_max' => 'O título não pode exceder 255 caracteres.',
'event_url_url' => 'A URL do evento deve ser válida.',

'location_string' => 'O local deve ser uma cadeia de caracteres.',
'location_max' => 'O local não pode exceder 255 caracteres.',

'reminder_min' => 'O lembrete deve ser maior ou igual a 0.',

'attachments_max' => 'Cada anexo não pode exceder 2 MB.',
'client_id_required' => 'O campo cliente é obrigatório.',

'contract_type_id_required' => 'O tipo de contrato é obrigatório.',
'nbr_profiles_required' => 'O número de perfis é obrigatório.',
'mission_started_at_required' => 'A data de início da missão é obrigatória.',
'mission_finished_at_required' => 'A data de término da missão é obrigatória.',
'client_evaluator_required' => 'O campo Avaliador do Cliente é obrigatório.',
'company_evaluator_required' => 'O campo Avaliador da Empresa é obrigatório.',

// Formação
'formations_required' => 'Por favor, adicione pelo menos uma formação.',
'formations_array' => 'As formações devem ser um array.',
'formations_diploma_id_required' => 'O diploma é obrigatório para cada formação.',
'formations_option_id_required' => 'A opção é obrigatória para cada formação.',
'formations_weight_formation_required' => 'O percentual de tolerância da formação é obrigatório para cada formação.',
'formations_weight_option_required' => 'O percentual de tolerância da opção é obrigatório para cada formação.',

// Experiência
'experiences_required' => 'Por favor, adicione pelo menos uma experiência profissional.',
'experiences_array' => 'As experiências devem ser um array.',
'experiences_profession_id_required' => 'O título do cargo é obrigatório para cada experiência.',
'experiences_years_required' => 'O número de anos de experiência é obrigatório para cada experiência.',
'experiences_weight_profession_required' => 'O percentual de tolerância do cargo é obrigatório para cada experiência.',
'experiences_weight_experience_required' => 'O percentual de tolerância do número de anos de experiência é obrigatório para cada experiência.',

// Habilidades técnicas
'technical_skills_label_skill_types_required' => 'A categoria é obrigatória para cada habilidade.',
'technical_skills_label_skills_required' => 'O detalhe é obrigatório para cada habilidade.',

// Habilidades pessoais
'personal_skills_label_skill_types_required' => 'A categoria é obrigatória para cada habilidade pessoal.',
'personal_skills_label_skills_required' => 'O detalhe é obrigatório para cada habilidade pessoal.',

// Habilidades linguísticas
'language_skills_required' => 'O campo "habilidades linguísticas" é obrigatório.',
'language_skills_array' => 'O campo "habilidades linguísticas" deve ser um array.',
'language_skills_label_skill_types_required' => 'O campo "tipos de habilidades" é obrigatório.',
'language_skills_multiple_skills_required' => 'O campo "múltiplas habilidades" é obrigatório.',
'language_skills_multiple_skills_array' => 'O campo "múltiplas habilidades" deve ser um array.',
'language_skills_label_skills_required' => 'O campo "descrição das habilidades" é obrigatório.',
'language_skills_level_required' => 'O campo "nível das habilidades para ofertas de emprego" é obrigatório.',
'language_skills_weight_required' => 'O campo "peso das habilidades para ofertas de emprego" é obrigatório.',

// Mobilidade
'mobilitys_availabilitys_type_required' => 'O campo "Disponibilidade" é obrigatório.',
'mobilitys_availabilitys_notice_duration_required_if' => 'O campo "Duração do aviso" é obrigatório quando a disponibilidade está definida como "Aviso".',

'profile_id_required' => 'O campo candidato é obrigatório.',
'profile_id_array' => 'Os candidatos devem ser enviados como um array.',
'profile_id_each_required' => 'Cada candidato é obrigatório.',
'profile_id_each_integer' => 'O identificador de cada candidato deve ser um número inteiro.',
'profile_id_each_exists' => 'Um ou mais candidatos selecionados não existem no banco de dados.',

'test_id_required' => 'O campo teste é obrigatório.',
'test_id_integer' => 'O identificador do teste deve ser um número inteiro.',
'test_id_exists' => 'Este teste não existe no banco de dados.',

'job_offer_id_integer' => 'O identificador da oferta deve ser um número inteiro.',
'job_offer_id_exists' => 'A oferta selecionada não existe no banco de dados.',
'language_max' => 'O idioma não deve exceder 255 caracteres.',

'status_in' => 'O status deve ser "rascunho" ou "final".',

'score_integer' => 'A pontuação deve ser um número inteiro.',

'date_test_date' => 'A data do teste deve ser uma data válida.',

'nee_ful_scr_boolean' => 'O campo nee_ful_scr deve ser verdadeiro ou falso.',
'add_pro_boolean' => 'O campo add_pro deve ser verdadeiro ou falso.',

'password_min' => 'A senha deve conter pelo menos 8 caracteres.',
'password_confirmed' => 'As senhas não correspondem.',

'otp_code_integer' => 'O código OTP deve ser um número.',
'otp_code_digits' => 'O código OTP deve ter 6 dígitos.',

'otp_expires_at_date' => 'A data de expiração do OTP deve ser uma data válida.',

'agency_id_exists' => 'A agência selecionada não existe.',

'user_image_image' => 'O arquivo deve ser uma imagem.',
'user_image_mimes' => 'O formato da imagem deve ser JPEG, PNG, JPG, GIF ou SVG.',
'user_image_max' => 'A imagem não deve exceder 2 MB.',
'document_required' => 'O arquivo é obrigatório.',
'document_mimes' => 'Extensões permitidas: :extensions',
'document_max' => 'Tamanho máximo permitido: :max MB.',
'platform_required' => 'O campo plataforma é obrigatório.',
'platform_string' => 'O campo plataforma deve ser uma cadeia de caracteres.',
'platform_max' => 'O campo plataforma não deve exceder 255 caracteres.',

'budget_required' => 'O campo orçamento é obrigatório.',
'budget_numeric' => 'O orçamento deve ser um número.',
'budget_min' => 'O orçamento deve ser maior ou igual a 0.',

'amount_required' => 'O valor real é obrigatório.',
'amount_numeric' => 'O valor deve ser um número.',
'amount_min' => 'O valor deve ser maior ou igual a 0.',

'invoice_file' => 'A fatura deve ser um arquivo.',
'invoice_mimes' => 'A fatura deve ser um arquivo do tipo: pdf, doc, docx.',
'invoice_max' => 'A fatura não deve exceder 10 MB.',

'devise_required' => 'O campo moeda é obrigatório.',
'devise_string' => 'A moeda deve ser uma cadeia de caracteres.',
'devise_in' => 'A moeda selecionada é inválida. (MAD, EUR, USD)',

];
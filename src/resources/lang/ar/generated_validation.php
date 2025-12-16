<?php 
return [
    'profession_id_required' => 'حقل "المسمى الوظيفي" إلزامي.',
'contract_type_required' => 'حقل "نوع العقد" إلزامي.',
'contract_type_string' => 'يجب أن يكون نوع العقد سلسلة نصية.',
'contract_type_max' => 'يجب ألا يتجاوز نوع العقد 255 حرفًا.',

'activity_area_id_required' => 'حقل "مجال النشاط" إلزامي.',

'company_size_required' => 'حقل "حجم الشركة" إلزامي.',
'company_size_string' => 'يجب أن يكون حجم الشركة سلسلة نصية.',
'company_size_max' => 'يجب ألا يتجاوز حجم الشركة 255 حرفًا.',

'has_driving_license_required' => 'يرجى تحديد ما إذا كان لديك رخصة قيادة.',

'min_expected_salary_required' => 'الحد الأدنى للأجر المتوقع إلزامي.',
'min_expected_salary_min' => 'يجب أن يكون الحد الأدنى للأجر على الأقل 0.',
'min_expected_salary_max' => 'يجب ألا يتجاوز الحد الأدنى للأجر 99999999.99.',

'max_expected_salary_required' => 'الحد الأقصى للأجر المتوقع إلزامي.',
'max_expected_salary_min' => 'يجب أن يكون الحد الأقصى للأجر على الأقل 0.',
'max_expected_salary_max' => 'يجب ألا يتجاوز الحد الأقصى للأجر 99999999.99.',
'max_expected_salary_gte' => 'يجب أن يكون الحد الأقصى للأجر أكبر من أو يساوي الحد الأدنى للأجر.',

'license_types_required' => 'يرجى اختيار نوع رخصة واحد على الأقل.',
'license_types_array' => 'يجب أن يكون نوع الرخصة مصفوفة.',
'license_types_string' => 'يجب أن يكون كل نوع رخصة سلسلة نصية.',
'license_types_max' => 'يجب ألا يتجاوز كل نوع رخصة 50 حرفًا.',

'mobility_weight_integer' => 'يجب أن يكون وزن التنقل عددًا صحيحًا.',
'mobility_weight_min' => 'يجب أن يكون وزن التنقل على الأقل 0.',
'mobility_weight_max' => 'يجب ألا يتجاوز وزن التنقل 100.',

'work_mode_weight_integer' => 'يجب أن يكون وزن نمط العمل عددًا صحيحًا.',
'work_mode_weight_min' => 'يجب أن يكون وزن نمط العمل على الأقل 0.',
'work_mode_weight_max' => 'يجب ألا يتجاوز وزن نمط العمل 100.',

'work_time_weight_integer' => 'يجب أن يكون وزن وقت العمل عددًا صحيحًا.',
'work_time_weight_min' => 'يجب أن يكون وزن وقت العمل على الأقل 0.',
'work_time_weight_max' => 'يجب ألا يتجاوز وزن وقت العمل 100.',

'availability_type_required' => 'نوع التوفر إلزامي.',
'availability_type_in' => 'نوع التوفر المحدد غير صالح.',
'availability_notice_duration_required_if' => 'مدة الإشعار إلزامية إذا كان نوع التوفر "إشعار مسبق".',
'availability_notice_duration_integer' => 'يجب أن تكون مدة الإشعار عددًا صحيحًا.',
'availability_notice_duration_min' => 'يجب أن تكون مدة الإشعار شهرًا واحدًا على الأقل.',
'availability_notice_duration_max' => 'يجب ألا تتجاوز مدة الإشعار 12 شهرًا.',
'logo_image' => 'يجب أن يكون الشعار صورة صالحة.',
'logo_max' => 'يجب ألا يتجاوز حجم الشعار 10 ميجابايت.',

'organisme_required' => 'حقل المؤسسة إلزامي.',
'organisme_string' => 'يجب أن يكون حقل المؤسسة سلسلة نصية.',
'organisme_max' => 'يجب ألا يتجاوز حقل المؤسسة 255 حرفًا.',

'numero_accreditation_string' => 'يجب أن يكون رقم الاعتماد سلسلة نصية.',
'numero_accreditation_max' => 'يجب ألا يتجاوز رقم الاعتماد 255 حرفًا.',

'adresse_string' => 'يجب أن يكون العنوان سلسلة نصية.',
'adresse_max' => 'يجب ألا يتجاوز العنوان 255 حرفًا.',

'city_id_exists' => 'المدينة المحددة غير صالحة.',

'pays_string' => 'يجب أن يكون البلد سلسلة نصية.',
'pays_max' => 'يجب ألا يتجاوز البلد 255 حرفًا.',

'telephone_1_string' => 'يجب أن يكون رقم الهاتف سلسلة نصية.',
'telephone_1_max' => 'يجب ألا يتجاوز رقم الهاتف 20 حرفًا.',

'telephone_2_string' => 'يجب أن يكون رقم الهاتف الثانوي سلسلة نصية.',
'telephone_2_max' => 'يجب ألا يتجاوز رقم الهاتف الثانوي 20 حرفًا.',

'email_email' => 'يجب أن يكون البريد الإلكتروني صالحًا.',
'email_max' => 'يجب ألا يتجاوز البريد الإلكتروني 255 حرفًا.',

'nom_certification_required' => 'اسم الشهادة إلزامي.',
'nom_certification_string' => 'يجب أن يكون اسم الشهادة سلسلة نصية.',
'nom_certification_max' => 'يجب ألا يتجاوز اسم الشهادة 255 حرفًا.',

'criteres_evaluation_string' => 'يجب أن تكون معايير التقييم سلسلة نصية.',

'theme_certification_string' => 'يجب أن يكون موضوع الشهادة سلسلة نصية.',
'theme_certification_max' => 'يجب ألا يتجاوز موضوع الشهادة 255 حرفًا.',

'score_resultat_string' => 'يجب أن تكون نتيجة النتيجة سلسلة نصية.',
'score_resultat_max' => 'يجب ألا تتجاوز نتيجة النتيجة 255 حرفًا.',

'niveau_certification_string' => 'يجب أن يكون مستوى الشهادة سلسلة نصية.',
'niveau_certification_max' => 'يجب ألا يتجاوز مستوى الشهادة 255 حرفًا.',

'date_obtention_date' => 'يجب أن يكون تاريخ الحصول تاريخًا صالحًا.',
'volume_horaire_string' => 'يجب أن يكون الحجم الساعي سلسلة نصية.',
'volume_horaire_max' => 'يجب ألا يتجاوز الحجم الساعي 255 حرفًا.',
'date_expiration_date' => 'يجب أن يكون تاريخ الانتهاء تاريخًا صالحًا.',
'subject_required' => 'حقل الموضوع إلزامي.',
'subject_string' => 'يجب أن يكون حقل الموضوع سلسلة نصية.',
'subject_max' => 'يجب ألا يتجاوز حقل الموضوع 150 حرفًا.',
'description_required' => 'حقل الوصف إلزامي.',
'logo_file' => 'يجب أن يكون الشعار ملفًا صالحًا.',

'company_required' => 'حقل الشركة إلزامي.',
'company_string' => 'يجب أن يكون حقل الشركة سلسلة نصية.',
'company_max' => 'يجب ألا يتجاوز حقل الشركة 255 حرفًا.',

'profession_id_exists' => 'المهنة المحددة غير صالحة.',

'started_at_required' => 'تاريخ البدء إلزامي.',
'started_at_date' => 'يجب أن يكون تاريخ البدء تاريخًا صالحًا.',

'finished_at_date' => 'يجب أن يكون تاريخ الانتهاء تاريخًا صالحًا.',
'finished_at_after_or_equal' => 'يجب أن يكون تاريخ الانتهاء بعد تاريخ البدء أو مساويًا له.',

'project_name_required' => 'حقل المشروع إلزامي.',
'project_name_string' => 'يجب أن يكون حقل المشروع سلسلة نصية.',
'project_name_max' => 'يجب ألا يتجاوز حقل المشروع 255 حرفًا.',

'skills_tech_required' => 'حقل المهارات التقنية إلزامي.',
'skills_tech_string' => 'يجب أن يكون حقل المهارات التقنية سلسلة نصية.',
'skills_tech_max' => 'يجب ألا يتجاوز حقل المهارات التقنية 255 حرفًا.',

'date_required' => 'حقل التاريخ إلزامي.',
'date_date' => 'يجب أن يكون حقل التاريخ تاريخًا صالحًا.',

'description_string' => 'يجب أن يكون الوصف سلسلة نصية.',

'name_required' => 'حقل الاسم إلزامي.',
'name_string' => 'يجب أن يكون حقل الاسم سلسلة نصية.',
'name_max' => 'يجب ألا يتجاوز حقل الاسم 255 حرفًا.',

'address_string' => 'يجب أن يكون العنوان سلسلة نصية.',
'address_max' => 'يجب ألا يتجاوز العنوان 255 حرفًا.',

'phone_string' => 'يجب أن يكون رقم الهاتف سلسلة نصية.',
'phone_max' => 'يجب ألا يتجاوز رقم الهاتف 20 حرفًا.',

'secondary_phone_string' => 'يجب أن يكون رقم الهاتف الثانوي سلسلة نصية.',
'secondary_phone_max' => 'يجب ألا يتجاوز رقم الهاتف الثانوي 20 حرفًا.',

'level_id_exists' => 'المستوى المحدد غير صالح.',
'diploma_id_exists' => 'الشهادة المحددة غير صالحة.',

'option_id_exists' => 'الخيار المحدد غير صالح.',

'option_string' => 'يجب أن يكون حقل الخيار سلسلة نصية.',
'option_max' => 'يجب ألا يتجاوز حقل الخيار 255 حرفًا.',

'mention_string' => 'يجب أن يكون حقل التقدير سلسلة نصية.',
'mention_max' => 'يجب ألا يتجاوز حقل التقدير 255 حرفًا.',

'civility_required' => 'حقل التحية إلزامي.',
'civility_integer' => 'يجب أن تكون التحية عددًا صحيحًا صالحًا.',

'first_name_required' => 'الاسم الأول إلزامي.',
'first_name_string' => 'يجب أن يكون الاسم الأول سلسلة نصية.',
'first_name_max' => 'يجب ألا يتجاوز الاسم الأول 255 حرفًا.',

'last_name_required' => 'الاسم الأخير إلزامي.',
'last_name_string' => 'يجب أن يكون الاسم الأخير سلسلة نصية.',
'last_name_max' => 'يجب ألا يتجاوز الاسم الأخير 255 حرفًا.',

'family_situation_string' => 'يجب أن تكون الحالة العائلية سلسلة نصية.',
'family_situation_max' => 'يجب ألا تتجاوز الحالة العائلية 255 حرفًا.',

'birth_date_date' => 'يجب أن يكون تاريخ الميلاد تاريخًا صالحًا.',
'birth_date_before_or_equal' => 'يجب أن يكون عمرك 18 عامًا على الأقل.',

'birth_place_string' => 'يجب أن يكون مكان الميلاد سلسلة نصية.',
'birth_place_max' => 'يجب ألا يتجاوز مكان الميلاد 255 حرفًا.',

'nationality_string' => 'يجب أن تكون الجنسية سلسلة نصية.',
'nationality_max' => 'يجب ألا تتجاوز الجنسية 255 حرفًا.',

'postal_code_string' => 'يجب أن يكون الرمز البريدي سلسلة نصية.',
'postal_code_max' => 'يجب ألا يتجاوز الرمز البريدي 20 حرفًا.',

'city_id_integer' => 'يجب أن تكون المدينة معرفًا صالحًا.',

'phone_primary_required' => 'رقم الهاتف الرئيسي إلزامي.',
'phone_primary_string' => 'يجب أن يكون رقم الهاتف الرئيسي سلسلة نصية.',
'phone_primary_max' => 'يجب ألا يتجاوز رقم الهاتف الرئيسي 40 حرفًا.',
'phone_primary_unique' => 'رقم الهاتف الرئيسي مستخدم مسبقًا.',

'phone_secondary_string' => 'يجب أن يكون رقم الهاتف الثانوي سلسلة نصية.',
'phone_secondary_max' => 'يجب ألا يتجاوز رقم الهاتف الثانوي 40 حرفًا.',

'email_required' => 'البريد الإلكتروني إلزامي.',
'email_unique' => 'البريد الإلكتروني مستخدم مسبقًا.',

'url_facebook_url' => 'يجب أن يكون رابط فيسبوك رابطًا صالحًا.',
'url_facebook_max' => 'يجب ألا يتجاوز رابط فيسبوك 255 حرفًا.',

'url_linkedin_url' => 'يجب أن يكون رابط لينكد إن رابطًا صالحًا.',
'url_linkedin_max' => 'يجب ألا يتجاوز رابط لينكد إن 255 حرفًا.',

'url_twitter_url' => 'يجب أن يكون رابط تويتر رابطًا صالحًا.',
'url_twitter_max' => 'يجب ألا يتجاوز رابط تويتر 255 حرفًا.',

'salary_expectation_numeric' => 'يجب أن يكون الراتب المتوقع رقمًا صالحًا.',

'profession_id_integer' => 'يجب أن تكون المهنة معرفًا صالحًا.',

'cv_mimes' => 'يجب أن يكون السيرة الذاتية من نوع: pdf, doc, docx.',
'cv_max' => 'يجب ألا يتجاوز حجم السيرة الذاتية 10 ميجابايت.',

'cover_letter_mimes' => 'يجب أن تكون خطاب التغطية من نوع: pdf, doc, docx.',
'cover_letter_max' => 'يجب ألا يتجاوز حجم خطاب التغطية 10 ميجابايت.',

'video_mimes' => 'يجب أن يكون الفيديو من نوع: mp4, mov, avi, wmv.',
'video_max' => 'يجب ألا يتجاوز حجم الفيديو 50 ميجابايت.',
'language_required' => 'حقل اللغة إلزامي.',
'language_integer' => 'يجب أن يكون حقل اللغة معرفًا صالحًا.',

'skills_skill_required' => 'المهارة إلزامية.',
'skills_skill_string' => 'يجب أن تكون المهارة سلسلة نصية.',
'skills_skill_max' => 'يجب ألا تتجاوز المهارة 250 حرفًا.',

'skills_level_required' => 'مستوى المهارة إلزامي.',
'skills_level_string' => 'يجب أن يكون مستوى المهارة سلسلة نصية.',
'skills_level_max' => 'يجب ألا يتجاوز مستوى المهارة حرفين.',

'skills_weight_required' => 'مقياس المهارة إلزامي.',
'skills_weight_integer' => 'يجب أن يكون مقياس المهارة عددًا صحيحًا صالحًا.',
'skills_weight_between' => 'يجب أن يكون مقياس المهارة بين 1 و 5.',
'photo_image' => 'يجب أن تكون الصورة صورة صالحة.',
'photo_mimes' => 'يجب أن تكون الصورة من نوع: jpeg, png, jpg, gif.',
'photo_max' => 'يجب ألا يتجاوز حجم الصورة 10 ميجابايت.',

'poste_required' => 'المنصب إلزامي.',
'poste_integer' => 'يجب أن يكون المنصب معرفًا صالحًا.',
'poste_exists' => 'المنصب المحدد غير صالح.',

'message_required' => 'الرسالة إلزامية.',
'message_string' => 'يجب أن تكون الرسالة سلسلة نصية.',

// Technical skills
'technical_skills_required' => 'المهارات التقنية إلزامية.',
'technical_skills_array' => 'يجب أن تكون المهارات التقنية مصفوفة.',
'technical_skills_category_required' => 'فئة المهارة التقنية إلزامية.',
'technical_skills_category_string' => 'يجب أن تكون فئة المهارة التقنية سلسلة نصية.',
'technical_skills_category_max' => 'يجب ألا تتجاوز فئة المهارة التقنية 250 حرفًا.',
'technical_skills_skill_required' => 'تفاصيل المهارة التقنية إلزامية.',
'technical_skills_skill_string' => 'يجب أن تكون تفاصيل المهارة التقنية سلسلة نصية.',
'technical_skills_skill_max' => 'يجب ألا تتجاوز تفاصيل المهارة التقنية 500 حرفًا.',
'technical_skills_level_required' => 'مستوى المهارة التقنية إلزامي.',
'technical_skills_level_integer' => 'يجب أن يكون مستوى المهارة التقنية عددًا صحيحًا.',
'technical_skills_weight_required' => 'مقياس المهارة التقنية إلزامي.',
'technical_skills_weight_integer' => 'يجب أن يكون مقياس المهارة التقنية عددًا صحيحًا صالحًا.',
'technical_skills_weight_between' => 'يجب أن يكون مقياس المهارة التقنية بين 1 و 5.',

// Personal skills
'personal_skills_required' => 'المهارات الشخصية إلزامية.',
'personal_skills_array' => 'يجب أن تكون المهارات الشخصية مصفوفة.',
'personal_skills_category_required' => 'فئة المهارة الشخصية إلزامية.',
'personal_skills_category_string' => 'يجب أن تكون فئة المهارة الشخصية سلسلة نصية.',
'personal_skills_category_max' => 'يجب ألا تتجاوز فئة المهارة الشخصية 250 حرفًا.',
'personal_skills_skill_required' => 'تفاصيل المهارة الشخصية إلزامية.',
'personal_skills_skill_string' => 'يجب أن تكون تفاصيل المهارة الشخصية سلسلة نصية.',
'personal_skills_skill_max' => 'يجب ألا تتجاوز تفاصيل المهارة الشخصية 500 حرفًا.',
'personal_skills_level_required' => 'مستوى المهارة الشخصية إلزامي.',
'personal_skills_level_integer' => 'يجب أن يكون مستوى المهارة الشخصية عددًا صحيحًا.',
'personal_skills_weight_required' => 'مقياس المهارة الشخصية إلزامي.',
'personal_skills_weight_integer' => 'يجب أن يكون مقياس المهارة الشخصية عددًا صحيحًا صالحًا.',
'personal_skills_weight_between' => 'يجب أن يكون مقياس المهارة الشخصية بين 1 و 5.',
'civility_string' => 'يجب أن تكون التحية سلسلة نصية.',

'sexe_required' => 'الجنس إلزامي.',
'sexe_string' => 'يجب أن يكون الجنس سلسلة نصية.',

'nationality_required' => 'الجنسية إلزامية.',

'address_required' => 'العنوان إلزامي.',

'postal_code_required' => 'الرمز البريدي إلزامي.',

'city_id_required' => 'المدينة إلزامية.',

'family_situation_required' => 'الحالة العائلية إلزامية.',

'birth_place_required' => 'مكان الميلاد إلزامي.',

'birth_date_required' => 'تاريخ الميلاد إلزامي.',

'status_required' => 'الحالة إلزامية.',
'status_string' => 'يجب أن تكون الحالة سلسلة نصية.',

'language_string' => 'يجب أن تكون اللغة سلسلة نصية.',

'path_picture_image' => 'يجب أن تكون صورة الملف الشخصي صورة.',
'path_picture_mimes' => 'يجب أن تكون صورة الملف الشخصي من نوع: jpeg, png, jpg.',
'path_picture_max' => 'يجب ألا يتجاوز حجم صورة الملف الشخصي 2 ميجابايت.',

'cover_photo_image' => 'يجب أن تكون صورة الغلاف صورة.',
'cover_photo_mimes' => 'يجب أن تكون صورة الغلاف من نوع: jpeg, png, jpg.',
'cover_photo_max' => 'يجب ألا يتجاوز حجم صورة الغلاف 5 ميجابايت.',

'user_id_nullable' => 'معرف المستخدم يمكن أن يكون فارغًا.',

'overtime_nullable' => 'حقل العمل الإضافي يمكن أن يكون فارغًا.',
'overtime_string' => 'يجب أن يكون حقل العمل الإضافي سلسلة نصية.',

'group_nullable' => 'حقل المجموعة يمكن أن يكون فارغًا.',
'group_string' => 'يجب أن يكون حقل المجموعة سلسلة نصية.',
'title_required' => 'عنوان الحدث إلزامي.',
'event_type_required' => 'نوع الحدث إلزامي.',
'event_type_in' => 'نوع الحدث يجب أن يكون "حضوري", "هاتفي" أو "مؤتمر مرئي".',

'date_after_or_equal' => 'يجب أن يكون التاريخ بعد التاريخ الحالي أو مساويًا له.',
'start_time_required' => 'وقت البدء إلزامي.',
'start_time_date_format' => 'يجب أن يكون وقت البدء بتنسيق HH:MM.',
'end_time_required' => 'وقت الانتهاء إلزامي.',
'end_time_date_format' => 'يجب أن يكون وقت الانتهاء بتنسيق HH:MM.',
'end_time_after' => 'يجب أن يكون وقت الانتهاء بعد وقت البدء.',
'reminder_integer' => 'يجب أن يكون التذكير عددًا صحيحًا.',
'reminder_in' => 'يجب أن يكون التذكير 0, 5, 10, 15, 30, 45, 60 أو 120 دقيقة.',
'high_importance_boolean' => 'يجب أن تكون الأهمية العالية صحيحة أو خاطئة.',
'is_favorite_boolean' => 'يجب أن يكون المفضل صحيحًا أو خاطئًا.',
'is_draft_boolean' => 'يجب أن يكون المسودة صحيحًا أو خاطئًا.',
'participants_array' => 'يجب أن يكون المشاركون قائمة مستخدمين.',
'participants_exists' => 'واحد أو أكثر من المشاركين غير صالحين.',
'destinataires_array' => 'يجب أن يكون المستلمون قائمة مستخدمين.',
'destinataires_exists' => 'واحد أو أكثر من المستلمين غير صالحين.',
'attachments_array' => 'يجب أن تكون المرفقات قائمة ملفات.',
'attachments_file' => 'يجب أن يكون كل مرفق ملفًا صالحًا.',

'title_string' => 'يجب أن يكون العنوان سلسلة نصية.',
'title_max' => 'يجب ألا يتجاوز العنوان 255 حرفًا.',
'event_url_url' => 'يجب أن يكون رابط الحدث رابطًا صالحًا.',

'location_string' => 'يجب أن يكون الموقع سلسلة نصية.',
'location_max' => 'يجب ألا يتجاوز الموقع 255 حرفًا.',

'reminder_min' => 'يجب أن يكون التذكير أكبر من أو يساوي 0.',

'attachments_max' => 'يجب ألا يتجاوز حجم كل مرفق 2 ميجابايت.',
'client_id_required' => 'حقل العميل إلزامي.',

'contract_type_id_required' => 'نوع العقد إلزامي.',
'nbr_profiles_required' => 'عدد المرشحين إلزامي.',
'mission_started_at_required' => 'تاريخ بدء المهمة إلزامي.',
'mission_finished_at_required' => 'تاريخ انتهاء المهمة إلزامي.',
'client_evaluator_required' => 'حقل مقيم العميل إلزامي.',
'company_evaluator_required' => 'حقل مقيم الشركة إلزامي.',

// Formation
'formations_required' => 'يرجى إضافة دورة تدريبية واحدة على الأقل.',
'formations_array' => 'يجب أن تكون الدورات التدريبية مصفوفة.',
'formations_diploma_id_required' => 'الشهادة إلزامية لكل دورة تدريبية.',
'formations_option_id_required' => 'الخيار إلزامي لكل دورة تدريبية.',
'formations_weight_formation_required' => 'نسبة تحمل الدورة التدريبية إلزامية لكل دورة.',
'formations_weight_option_required' => 'نسبة تحمل الخيار إلزامية لكل دورة.',

// Expérience
'experiences_required' => 'يرجى إضافة خبرة مهنية واحدة على الأقل.',
'experiences_array' => 'يجب أن تكون الخبرات مصفوفة.',
'experiences_profession_id_required' => 'المسمى الوظيفي إلزامي لكل خبرة.',
'experiences_years_required' => 'عدد سنوات الخبرة إلزامي لكل خبرة.',
'experiences_weight_profession_required' => 'نسبة تحمل المنصب إلزامية لكل خبرة.',
'experiences_weight_experience_required' => 'نسبة تحمل عدد سنوات الخبرة إلزامية لكل خبرة.',

// Compétences techniques
'technical_skills_label_skill_types_required' => 'الفئة إلزامية لكل مهارة.',
'technical_skills_label_skills_required' => 'التفاصيل إلزامية لكل مهارة.',

// Compétences personnelles
'personal_skills_label_skill_types_required' => 'الفئة إلزامية لكل مهارة شخصية.',
'personal_skills_label_skills_required' => 'التفاصيل إلزامية لكل مهارة شخصية.',

// Compétences linguistiques
'language_skills_required' => 'حقل المهارات اللغوية إلزامي.',
'language_skills_array' => 'يجب أن يكون حقل المهارات اللغوية مصفوفة.',
'language_skills_label_skill_types_required' => 'حقل أنواع المهارات إلزامي.',
'language_skills_multiple_skills_required' => 'حقل المهارات المتعددة إلزامي.',
'language_skills_multiple_skills_array' => 'يجب أن يكون حقل المهارات المتعددة مصفوفة.',
'language_skills_label_skills_required' => 'حقل تسمية المهارات إلزامي.',
'language_skills_level_required' => 'حقل مستوى المهارات للوظائف إلزامي.',
'language_skills_weight_required' => 'حقل وزن المهارات للوظائف إلزامي.',

// Mobilité
'mobilitys_availabilitys_type_required' => 'حقل التوفر إلزامي.',
'mobilitys_availabilitys_notice_duration_required_if' => 'حقل مدة الإشعار إلزامي عند تعيين التوفر على "إشعار مسبق".',

'profile_id_required' => 'حقل المرشح إلزامي.',
'profile_id_array' => 'يجب إرسال المرشحين كمصفوفة.',
'profile_id_each_required' => 'كل مرشح إلزامي.',
'profile_id_each_integer' => 'يجب أن يكون معرف كل مرشح عددًا صحيحًا.',
'profile_id_each_exists' => 'واحد أو أكثر من المرشحين المحددين غير موجودين.',

'test_id_required' => 'حقل الاختبار إلزامي.',
'test_id_integer' => 'يجب أن يكون معرف الاختبار عددًا صحيحًا.',
'test_id_exists' => 'هذا الاختبار غير موجود.',

'job_offer_id_integer' => 'يجب أن يكون معرف الوظيفة عددًا صحيحًا.',
'job_offer_id_exists' => 'الوظيفة المحددة غير موجودة.',
'language_max' => 'يجب ألا تتجاوز اللغة 255 حرفًا.',

'status_in' => 'يجب أن تكون الحالة "مسودة" أو "نهائية".',

'score_integer' => 'يجب أن تكون النتيجة عددًا صحيحًا.',

'date_test_date' => 'يجب أن يكون تاريخ الاختبار تاريخًا صالحًا.',

'nee_ful_scr_boolean' => 'يجب أن يكون حقل nee_ful_scr صحيحًا أو خاطئًا.',
'add_pro_boolean' => 'يجب أن يكون حقل add_pro صحيحًا أو خاطئًا.',

'password_min' => 'يجب أن تتكون كلمة المرور من 8 أحرف على الأقل.',
'password_confirmed' => 'كلمات المرور غير متطابقة.',

'otp_code_integer' => "يجب أن يكون رمز OTP رقمًا.",
'otp_code_digits' => "يجب أن يتكون رمز OTP من 6 أرقام.",

'otp_expires_at_date' => "يجب أن يكون تاريخ انتهاء صلاحية OTP تاريخًا صالحًا.",

'agency_id_exists' => "الوكالة المحددة غير موجودة.",

'user_image_image' => "يجب أن يكون الملف صورة.",
'user_image_mimes' => "يجب أن تكون صيغة الصورة: JPEG, PNG, JPG, GIF, SVG.",
'user_image_max' => "يجب ألا يتجاوز حجم الصورة 2 ميجابايت.",
'document_required' => 'الملف مطلوب.',
'document_mimes' => 'الصيغ المسموحة: :extensions',
'document_max' => 'الحد الأقصى للحجم: :max ميجابايت.',
'platform_required' => 'حقل المنصة إلزامي.',
'platform_string' => 'يجب أن يكون حقل المنصة سلسلة نصية.',
'platform_max' => 'يجب ألا يتجاوز حقل المنصة 255 حرفًا.',

'budget_required' => 'حقل الميزانية إلزامي.',
'budget_numeric' => 'يجب أن تكون الميزانية رقمًا.',
'budget_min' => 'يجب أن تكون الميزانية أكبر من أو تساوي 0.',

'amount_required' => 'المبلغ الفعلي إلزامي.',
'amount_numeric' => 'يجب أن يكون المبلغ رقمًا.',
'amount_min' => 'يجب أن يكون المبلغ أكبر من أو يساوي 0.',

'invoice_file' => 'يجب أن تكون الفاتورة ملفًا.',
'invoice_mimes' => 'يجب أن تكون الفاتورة من نوع: pdf, doc, docx.',
'invoice_max' => 'يجب ألا يتجاوز حجم الفاتورة 10 ميجابايت.',

'devise_required' => 'حقل العملة إلزامي.',
'devise_string' => 'يجب أن تكون العملة سلسلة نصية.',
'devise_in' => 'العملة المحددة غير صالحة. (MAD, EUR, USD)',
];
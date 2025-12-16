<?php
return [
'profession_id_required' => '职位名称字段是必填的。',
'contract_type_required' => '合同类型字段是必填的。',
'contract_type_string' => '合同类型必须是字符串。',
'contract_type_max' => '合同类型不得超过255个字符。',

'activity_area_id_required' => '活动领域字段是必填的。',

'company_size_required' => '公司规模字段是必填的。',
'company_size_string' => '公司规模必须是字符串。',
'company_size_max' => '公司规模不得超过255个字符。',

'has_driving_license_required' => '请说明您是否有驾驶执照。',

'min_expected_salary_required' => '最低期望薪资是必填的。',
'min_expected_salary_min' => '最低薪资必须至少为0。',
'min_expected_salary_max' => '最低薪资不得超过99999999.99。',

'max_expected_salary_required' => '最高期望薪资是必填的。',
'max_expected_salary_min' => '最高薪资必须至少为0。',
'max_expected_salary_max' => '最高薪资不得超过99999999.99。',
'max_expected_salary_gte' => '最高薪资必须大于或等于最低薪资。',

'license_types_required' => '请选择至少一种执照类型。',
'license_types_array' => '执照类型必须是数组。',
'license_types_string' => '每种执照类型必须是字符串。',
'license_types_max' => '每种执照类型不得超过50个字符。',

'mobility_weight_integer' => '流动性权重必须是整数。',
'mobility_weight_min' => '流动性权重必须至少为0。',
'mobility_weight_max' => '流动性权重不得超过100。',

'work_mode_weight_integer' => '工作模式权重必须是整数。',
'work_mode_weight_min' => '工作模式权重必须至少为0。',
'work_mode_weight_max' => '工作模式权重不得超过100。',

'work_time_weight_integer' => '工作时间权重必须是整数。',
'work_time_weight_min' => '工作时间权重必须至少为0。',
'work_time_weight_max' => '工作时间权重不得超过100。',

'availability_type_required' => '可用性类型是必填的。',
'availability_type_in' => '选择的可用性类型无效。',
'availability_notice_duration_required_if' => '如果可用性类型为"通知期"，则通知期间是必填的。',
'availability_notice_duration_integer' => '通知期间必须是整数。',
'availability_notice_duration_min' => '通知期间必须至少为1个月。',
'availability_notice_duration_max' => '通知期间不得超过12个月。',

'logo_image' => '标志必须是有效的图像。',
'logo_max' => '标志不能超过10MB。',

'organisme_required' => '机构字段是必填的。',
'organisme_string' => '机构字段必须是字符串。',
'organisme_max' => '机构字段不能超过255个字符。',

'numero_accreditation_string' => '认证号码必须是字符串。',
'numero_accreditation_max' => '认证号码不能超过255个字符。',

'adresse_string' => '地址必须是字符串。',
'adresse_max' => '地址不能超过255个字符。',

'city_id_exists' => '选择的城市无效。',

'pays_string' => '国家必须是字符串。',
'pays_max' => '国家不能超过255个字符。',

'telephone_1_string' => '电话号码必须是字符串。',
'telephone_1_max' => '电话号码不能超过20个字符。',

'telephone_2_string' => '备用电话号码必须是字符串。',
'telephone_2_max' => '备用电话号码不能超过20个字符。',

'email_email' => '邮箱字段必须包含有效的电子邮件地址。',
'email_max' => '电子邮件地址不能超过255个字符。',

'nom_certification_required' => '认证名称是必填的。',
'nom_certification_string' => '认证名称必须是字符串。',
'nom_certification_max' => '认证名称不能超过255个字符。',

'criteres_evaluation_string' => '评估标准必须是字符串。',

'theme_certification_string' => '认证主题必须是字符串。',
'theme_certification_max' => '认证主题不能超过255个字符。',

'score_resultat_string' => '结果得分必须是字符串。',
'score_resultat_max' => '结果得分不能超过255个字符。',

'niveau_certification_string' => '认证级别必须是字符串。',
'niveau_certification_max' => '认证级别不能超过255个字符。',

'date_obtention_date' => '获得日期必须是有效日期。',
'volume_horaire_string' => '学时必须是字符串。',
'volume_horaire_max' => '学时不能超过255个字符。',
'date_expiration_date' => '到期日期必须是有效日期。',

'subject_required' => '主题字段是必填的。',
'subject_string' => '主题字段必须是字符串。',
'subject_max' => '主题字段不能超过150个字符。',
'description_required' => '描述字段是必填的。',
'logo_file' => '标志必须是有效文件。',

'company_required' => '公司字段是必填的。',
'company_string' => '公司字段必须是字符串。',
'company_max' => '公司字段不能超过255个字符。',

'profession_id_exists' => '选择的职业无效。',

'started_at_required' => '开始日期是必填的。',
'started_at_date' => '开始日期必须是有效日期。',

'finished_at_date' => '结束日期必须是有效日期。',
'finished_at_after_or_equal' => '结束日期必须晚于或等于开始日期。',

'project_name_required' => '项目字段是必填的。',
'project_name_string' => '项目字段必须是字符串。',
'project_name_max' => '项目字段不能超过255个字符。',

'skills_tech_required' => '技术技能字段是必填的。',
'skills_tech_string' => '技术技能字段必须是字符串。',
'skills_tech_max' => '技术技能字段不能超过255个字符。',

'date_required' => '日期字段是必填的。',
'date_date' => '日期字段必须是有效日期。',

'description_string' => '描述必须是字符串。',

'name_required' => '姓名字段是必填的。',
'name_string' => '姓名字段必须是字符串。',
'name_max' => '姓名字段不能超过255个字符。',

'address_string' => '地址必须是字符串。',
'address_max' => '地址不能超过255个字符。',

'phone_string' => '电话号码必须是字符串。',
'phone_max' => '电话号码不能超过20个字符。',

'secondary_phone_string' => '备用电话号码必须是字符串。',
'secondary_phone_max' => '备用电话号码不能超过20个字符。',

'level_id_exists' => '选择的级别无效。',
'diploma_id_exists' => '选择的文凭无效。',

'option_id_exists' => '选择的文凭选项无效。',

'option_string' => '选项字段必须是字符串。',
'option_max' => '选项字段不能超过255个字符。',

'mention_string' => '荣誉字段必须是字符串。',
'mention_max' => '荣誉字段不能超过255个字符。',

'civility_required' => '称谓字段是必填的。',
'civility_integer' => '称谓必须是有效整数。',

'first_name_required' => '名字是必填的。',
'first_name_string' => '名字必须是字符串。',
'first_name_max' => '名字不能超过255个字符。',

'last_name_required' => '姓氏是必填的。',
'last_name_string' => '姓氏必须是字符串。',
'last_name_max' => '姓氏不能超过255个字符。',

'family_situation_string' => '家庭状况必须是字符串。',
'family_situation_max' => '家庭状况不能超过255个字符。',

'birth_date_date' => '出生日期必须是有效日期。',
'birth_date_before_or_equal' => '您必须年满18岁。',

'birth_place_string' => '出生地必须是字符串。',
'birth_place_max' => '出生地不能超过255个字符。',

'nationality_string' => '国籍必须是字符串。',
'nationality_max' => '国籍不能超过255个字符。',

'postal_code_string' => '邮政编码必须是字符串。',
'postal_code_max' => '邮政编码不能超过20个字符。',

'city_id_integer' => '城市必须是有效标识符。',

'phone_primary_required' => '主要电话号码是必填的。',
'phone_primary_string' => '主要电话号码必须是字符串。',
'phone_primary_max' => '主要电话号码不能超过40个字符。',
'phone_primary_unique' => '主要电话号码已被使用。',

'phone_secondary_string' => '备用电话号码必须是字符串。',
'phone_secondary_max' => '备用电话号码不能超过40个字符。',

'email_required' => '电子邮件地址是必填的。',
'email_unique' => '电子邮件地址已被使用。',

'url_facebook_url' => 'Facebook URL必须是有效URL。',
'url_facebook_max' => 'Facebook URL不能超过255个字符。',

'url_linkedin_url' => 'LinkedIn URL必须是有效URL。',
'url_linkedin_max' => 'LinkedIn URL不能超过255个字符。',

'url_twitter_url' => 'Twitter URL必须是有效URL。',
'url_twitter_max' => 'Twitter URL不能超过255个字符。',

'salary_expectation_numeric' => '期望薪资必须是有效数字。',

'profession_id_integer' => '职业必须是有效标识符。',

'cv_mimes' => '简历必须是以下文件类型：pdf、doc或docx。',
'cv_max' => '简历不能超过10MB。',

'cover_letter_mimes' => '求职信必须是以下文件类型：pdf、doc或docx。',
'cover_letter_max' => '求职信不能超过10MB。',

'video_mimes' => '视频必须是以下文件类型：mp4、mov、avi或wmv。',
'video_max' => '视频不能超过50MB。',

'language_required' => '语言字段是必填的。',
'language_integer' => '语言字段必须是有效标识符。',

'skills_skill_required' => '技能是必填的。',
'skills_skill_string' => '技能必须是字符串。',
'skills_skill_max' => '技能不能超过250个字符。',

'skills_level_required' => '技能等级是必填的。',
'skills_level_string' => '技能等级必须是字符串。',
'skills_level_max' => '技能等级不能超过2个字符。',

'skills_weight_required' => '技能评分是必填的。',
'skills_weight_integer' => '技能评分必须是有效整数。',
'skills_weight_between' => '技能评分必须在1到5之间。',

'photo_image' => '照片必须是有效图像。',
'photo_mimes' => '照片必须是jpeg、png、jpg或gif格式。',
'photo_max' => '照片不能超过10MB。',

'poste_required' => '职位是必填的。',
'poste_integer' => '职位必须是有效标识符。',
'poste_exists' => '选择的职位无效。',

'message_required' => '消息是必填的。',
'message_string' => '消息必须是字符串。',

// 技术技能
'technical_skills_required' => '技术技能是必填的。',
'technical_skills_array' => '技术技能必须是数组。',
'technical_skills_category_required' => '技术技能类别是必填的。',
'technical_skills_category_string' => '技术技能类别必须是字符串。',
'technical_skills_category_max' => '技术技能类别不能超过250个字符。',
'technical_skills_skill_required' => '技术技能详情是必填的。',
'technical_skills_skill_string' => '技术技能详情必须是字符串。',
'technical_skills_skill_max' => '技术技能详情不能超过500个字符。',
'technical_skills_level_required' => '技术技能等级是必填的。',
'technical_skills_level_integer' => '技术技能等级必须是整数。',
'technical_skills_weight_required' => '技术技能评分是必填的。',
'technical_skills_weight_integer' => '技术技能评分必须是有效整数。',
'technical_skills_weight_between' => '技术技能评分必须在1到5之间。',

// 个人技能
'personal_skills_required' => '个人技能是必填的。',
'personal_skills_array' => '个人技能必须是数组。',
'personal_skills_category_required' => '个人技能类别是必填的。',
'personal_skills_category_string' => '个人技能类别必须是字符串。',
'personal_skills_category_max' => '个人技能类别不能超过250个字符。',
'personal_skills_skill_required' => '个人技能详情是必填的。',
'personal_skills_skill_string' => '个人技能详情必须是字符串。',
'personal_skills_skill_max' => '个人技能详情不能超过500个字符。',
'personal_skills_level_required' => '个人技能等级是必填的。',
'personal_skills_level_integer' => '个人技能等级必须是整数。',
'personal_skills_weight_required' => '个人技能评分是必填的。',
'personal_skills_weight_integer' => '个人技能评分必须是有效整数。',
'personal_skills_weight_between' => '个人技能评分必须在1到5之间。',

'civility_string' => '称谓必须是字符串。',

'sexe_required' => '性别是必填的。',
'sexe_string' => '性别必须是字符串。',

'nationality_required' => '国籍是必填的。',

'address_required' => '地址是必填的。',

'postal_code_required' => '邮政编码是必填的。',

'city_id_required' => '城市是必填的。',

'family_situation_required' => '家庭状况是必填的。',

'birth_place_required' => '出生地是必填的。',

'birth_date_required' => '出生日期是必填的。',

'status_required' => '状态是必填的。',
'status_string' => '状态必须是字符串。',

'language_string' => '语言必须是字符串。',

'path_picture_image' => '头像必须是图像。',
'path_picture_mimes' => '头像必须是jpeg、png或jpg格式。',
'path_picture_max' => '头像不得超过2MB。',

'cover_photo_image' => '封面照片必须是图像。',
'cover_photo_mimes' => '封面照片必须是jpeg、png或jpg格式。',
'cover_photo_max' => '封面照片不得超过5MB。',

'user_id_nullable' => '用户标识符可以为空。',

'overtime_nullable' => '加班字段可以为空。',
'overtime_string' => '加班字段必须是字符串。',

'group_nullable' => '组字段可以为空。',
'group_string' => '组字段必须是字符串。',

'title_required' => '活动标题是必填的。',
'event_type_required' => '活动类型是必填的。',
'event_type_in' => '活动类型必须是"现场"、"电话"或"视频会议"。',

'date_after_or_equal' => '日期必须等于或晚于今天。',
'start_time_required' => '开始时间是必填的。',
'start_time_date_format' => '开始时间必须是HH:MM格式。',
'end_time_required' => '结束时间是必填的。',
'end_time_date_format' => '结束时间必须是HH:MM格式。',
'end_time_after' => '结束时间必须晚于开始时间。',
'reminder_integer' => '提醒必须是整数。',
'reminder_in' => '提醒必须是0、5、10、15、30、45、60或120分钟。',
'high_importance_boolean' => '"高重要性"字段必须是真或假。',
'is_favorite_boolean' => '"收藏"字段必须是真或假。',
'is_draft_boolean' => '"草稿"字段必须是真或假。',
'participants_array' => '参与者必须是用户列表。',
'participants_exists' => '一个或多个参与者无效。',
'destinataires_array' => '收件人必须是用户列表。',
'destinataires_exists' => '一个或多个收件人无效。',
'attachments_array' => '附件必须是文件列表。',
'attachments_file' => '每个附件必须是有效文件。',

'title_string' => '标题必须是字符串。',
'title_max' => '标题不能超过255个字符。',
'event_url_url' => '活动URL必须有效。',

'location_string' => '地点必须是字符串。',
'location_max' => '地点不能超过255个字符。',

'reminder_min' => '提醒必须大于或等于0。',

'attachments_max' => '每个附件不能超过2MB。',

'client_id_required' => '客户字段是必填的。',

'contract_type_id_required' => '合同类型是必填的。',
'nbr_profiles_required' => '档案数量是必填的。',
'mission_started_at_required' => '任务开始日期是必填的。',
'mission_finished_at_required' => '任务结束日期是必填的。',
'client_evaluator_required' => '客户评估员字段是必填的。',
'company_evaluator_required' => '公司评估员字段是必填的。',

// 培训
'formations_required' => '请至少添加一项培训。',
'formations_array' => '培训必须是数组。',
'formations_diploma_id_required' => '每项培训的文凭是必填的。',
'formations_option_id_required' => '每项培训的选项是必填的。',
'formations_weight_formation_required' => '每项培训的培训容忍度百分比是必填的。',
'formations_weight_option_required' => '每项培训的选项容忍度百分比是必填的。',

// 经验
'experiences_required' => '请至少添加一项专业经验。',
'experiences_array' => '经验必须是数组。',
'experiences_profession_id_required' => '每项经验的职位名称是必填的。',
'experiences_years_required' => '每项经验的经验年数是必填的。',
'experiences_weight_profession_required' => '每项经验的职位容忍度百分比是必填的。',
'experiences_weight_experience_required' => '每项经验的经验年数容忍度百分比是必填的。',

// 技术技能
'technical_skills_label_skill_types_required' => '每项技能的类别是必填的。',
'technical_skills_label_skills_required' => '每项技能的详情是必填的。',

// 个人技能
'personal_skills_label_skill_types_required' => '每项个人技能的类别是必填的。',
'personal_skills_label_skills_required' => '每项个人技能的详情是必填的。',

// 语言技能
'language_skills_required' => '"语言技能"字段是必填的。',
'language_skills_array' => '"语言技能"字段必须是数组。',
'language_skills_label_skill_types_required' => '"技能类型"字段是必填的。',
'language_skills_multiple_skills_required' => '"多项技能"字段是必填的。',
'language_skills_multiple_skills_array' => '"多项技能"字段必须是数组。',
'language_skills_label_skills_required' => '"技能标签"字段是必填的。',
'language_skills_level_required' => '"招聘技能等级"字段是必填的。',
'language_skills_weight_required' => '"招聘技能权重"字段是必填的。',

// 流动性
'mobilitys_availabilitys_type_required' => '"可用性"字段是必填的。',
'mobilitys_availabilitys_notice_duration_required_if' => '当可用性设置为"通知期"时，"通知期间"字段是必填的。',

'profile_id_required' => '候选人字段是必填的。',
'profile_id_array' => '候选人必须以数组形式发送。',
'profile_id_each_required' => '每个候选人都是必填的。',
'profile_id_each_integer' => '每个候选人的标识符必须是整数。',
'profile_id_each_exists' => '一个或多个选择的候选人在数据库中不存在。',

'test_id_required' => '测试字段是必填的。',
'test_id_integer' => '测试标识符必须是整数。',
'test_id_exists' => '此测试在数据库中不存在。',

'job_offer_id_integer' => '职位标识符必须是整数。',
'job_offer_id_exists' => '选择的职位在数据库中不存在。',
'language_max' => '语言不得超过255个字符。',

'status_in' => '状态必须是"草稿"或"最终"。',

'score_integer' => '分数必须是整数。',

'date_test_date' => '测试日期必须是有效日期。',

'nee_ful_scr_boolean' => 'nee_ful_scr字段必须是真或假。',
'add_pro_boolean' => 'add_pro字段必须是真或假。',

'password_min' => '密码必须至少包含8个字符。',
'password_confirmed' => '密码不匹配。',

'otp_code_integer' => "OTP代码必须是数字。",
'otp_code_digits' => "OTP代码必须是6位数字。",

'otp_expires_at_date' => "OTP到期日期必须是有效日期。",

'agency_id_exists' => "选择的代理机构不存在。",

'user_image_image' => "文件必须是图像。",
'user_image_mimes' => "图像格式必须是JPEG、PNG、JPG、GIF或SVG。",
'user_image_max' => "图像不得超过2MB。",

'document_required' => '文件是必填的。',
'document_mimes' => '允许的扩展名：:extensions',
'document_max' => '允许的最大大小：:max MB。',

'platform_required' => '支出字段是必填的。',
'platform_string' => '支出字段必须是字符串。',
'platform_max' => '支出字段不得超过255个字符。',

'budget_required' => '预算字段是必填的。',
'budget_numeric' => '预算必须是数字。',
'budget_min' => '预算必须大于或等于0。',

'amount_required' => '实际金额是必填的。',
'amount_numeric' => '金额必须是数字。',
'amount_min' => '金额必须大于或等于0。',

'invoice_file' => '发票必须是文件。',
'invoice_mimes' => '发票必须是以下文件类型：pdf、doc、docx。',
'invoice_max' => '发票不得超过10MB。',

'devise_required' => '货币字段是必填的。',
'devise_string' => '货币必须是字符串。',
'devise_in' => '选择的货币无效。（MAD、EUR、USD）',
];
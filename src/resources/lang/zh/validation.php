<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 验证语言行
    |--------------------------------------------------------------------------
    |
    | 以下语言行包含验证器类使用的默认错误消息。其中一些规则有多个版本，例如大小规则。您可以随意在这里调整这些消息。
    |
    */

    'accepted' => ':attribute字段必须被接受。',
    'accepted_if' => '当:other为:value时，:attribute字段必须被接受。',
    'active_url' => ':attribute字段必须是有效的URL。',
    'after' => ':attribute字段必须是:date之后的日期。',
    'after_or_equal' => ':attribute字段必须是:date之后或等于:date的日期。',
    'alpha' => ':attribute字段只能包含字母。',
    'alpha_dash' => ':attribute字段只能包含字母、数字、破折号和下划线。',
    'alpha_num' => ':attribute字段只能包含字母和数字。',
    'array' => ':attribute字段必须是数组。',
    'ascii' => ':attribute字段只能包含单字节的字母数字字符和符号。',
    'before' => ':attribute字段必须是:date之前的日期。',
    'before_or_equal' => ':attribute字段必须是:date之前或等于:date的日期。',
    'between' => [
        'array' => ':attribute字段必须在:min到:max项之间。',
        'file' => ':attribute字段必须在:min到:max千字节之间。',
        'numeric' => ':attribute字段必须在:min到:max之间。',
        'string' => ':attribute字段必须在:min到:max字符之间。',
    ],
    'boolean' => ':attribute字段必须为true或false。',
    'can' => ':attribute字段包含未授权的值。',
    'confirmed' => ':attribute字段确认不匹配。',
    'current_password' => '密码不正确。',
    'date' => ':attribute字段必须是有效的日期。',
    'date_equals' => ':attribute字段必须是等于:date的日期。',
    'date_format' => ':attribute字段必须匹配格式:format。',
    'decimal' => ':attribute字段必须有:decimal小数位。',
    'declined' => ':attribute字段必须被拒绝。',
    'declined_if' => '当:other为:value时，:attribute字段必须被拒绝。',
    'different' => ':attribute字段和:other必须不同。',
    'digits' => ':attribute字段必须是:digits位数字。',
    'digits_between' => ':attribute字段必须在:min到:max位数字之间。',
    'dimensions' => ':attribute字段有无效的图像尺寸。',
    'distinct' => ':attribute字段有重复的值。',
    'doesnt_end_with' => ':attribute字段不能以以下内容结尾：:values。',
    'doesnt_start_with' => ':attribute字段不能以以下内容开头：:values。',
    'email' => ':attribute字段必须是有效的电子邮件地址。',
    'ends_with' => ':attribute字段必须以以下内容结尾：:values。',
    'enum' => '所选:attribute无效。',
    'exists' => '所选:attribute无效。',
    'extensions' => ':attribute字段必须有以下扩展名之一：:values。',
    'file' => ':attribute字段必须是文件。',
    'filled' => ':attribute字段必须有值。',
    'gt' => [
        'array' => ':attribute字段必须有超过:value项。',
        'file' => ':attribute字段必须大于:value千字节。',
        'numeric' => ':attribute字段必须大于:value。',
        'string' => ':attribute字段必须大于:value字符。',
    ],
    'gte' => [
        'array' => ':attribute字段必须有:value项或更多。',
        'file' => ':attribute字段必须大于或等于:value千字节。',
        'numeric' => ':attribute字段必须大于或等于:value。',
        'string' => ':attribute字段必须大于或等于:value字符。',
    ],
    'hex_color' => ':attribute字段必须是有效的十六进制颜色。',
    'image' => ':attribute字段必须是图像。',
    'in' => '所选:attribute无效。',
    'in_array' => ':attribute字段必须存在于:other中。',
    'integer' => ':attribute字段必须是整数。',
    'ip' => ':attribute字段必须是有效的IP地址。',
    'ipv4' => ':attribute字段必须是有效的IPv4地址。',
    'ipv6' => ':attribute字段必须是有效的IPv6地址。',
    'json' => ':attribute字段必须是有效的JSON字符串。',
    'lowercase' => ':attribute字段必须是小写。',
    'lt' => [
        'array' => ':attribute字段必须少于:value项。',
        'file' => ':attribute字段必须小于:value千字节。',
        'numeric' => ':attribute字段必须小于:value。',
        'string' => ':attribute字段必须少于:value字符。',
    ],
    'lte' => [
        'array' => ':attribute字段不能超过:value项。',
        'file' => ':attribute字段必须小于或等于:value千字节。',
        'numeric' => ':attribute字段必须小于或等于:value。',
        'string' => ':attribute字段必须小于或等于:value字符。',
    ],
    'mac_address' => ':attribute字段必须是有效的MAC地址。',
    'max' => [
        'array' => ':attribute字段不能超过:max项。',
        'file' => ':attribute字段不能大于:max千字节。',
        'numeric' => ':attribute字段不能大于:max。',
        'string' => ':attribute字段不能大于:max字符。',
    ],
    'max_digits' => ':attribute字段不能超过:max位数字。',
    'mimes' => ':attribute字段必须是以下类型的文件：:values。',
    'mimetypes' => ':attribute字段必须是以下类型的文件：:values。',
    'min' => [
        'array' => ':attribute字段至少要有:min项。',
        'file' => ':attribute字段至少要是:min千字节。',
        'numeric' => ':attribute字段至少要是:min。',
        'string' => ':attribute字段至少要是:min字符。',
    ],
    'min_digits' => ':attribute字段至少要有:min位数字。',
    'missing' => ':attribute字段必须缺失。',
    'missing_if' => '当:other为:value时，:attribute字段必须缺失。',
    'missing_unless' => '除非:other为:value，否则:attribute字段必须缺失。',
    'missing_with' => '当:values存在时，:attribute字段必须缺失。',
    'missing_with_all' => '当:values存在时，:attribute字段必须缺失。',
    'multiple_of' => ':attribute字段必须是:value的倍数。',
    'not_in' => '所选:attribute无效。',
    'not_regex' => ':attribute字段格式无效。',
    'numeric' => ':attribute字段必须是数字。',
    'password' => [
        'letters' => ':attribute字段必须至少包含一个字母。',
        'mixed' => ':attribute字段必须至少包含一个大写字母和一个小写字母。',
        'numbers' => ':attribute字段必须至少包含一个数字',
        'symbols' => ':attribute字段必须至少包含一个符号',
        'uncompromised' => '提供的:attribute已出现在数据泄露事件中。请选择不同的:attribute',
    ],
    'present' => ':attribute字段必须存在',
    'present_if' => '当:other为:value时，:attribute字段必须存在',
    'present_unless' => '除非:other为:value，否则:attribute字段必须存在',
    'present_with' => '当:values存在时，:attribute字段必须存在',
    'present_with_all' => '当:values存在时，:attribute字段必须存在',
    'prohibited' => ':attribute字段是禁止的',
    'prohibited_if' => '当:other为:value时，:attribute字段是禁止的',
    'prohibited_unless' => '除非:other在:values中，否则:attribute字段是禁止的',
    'prohibits' => ':attribute字段禁止:other存在',
    'regex' => ':attribute字段格式无效',
    'required' => ':attribute字段是必需的',
    'required_array_keys' => ':attribute字段必须包含以下条目：:values',
    'required_if' => '当:other为:value时，:attribute字段是必需的',
    'required_if_accepted' => '当:other被接受时，:attribute字段是必需的',
    'required_unless' => '除非:other在:values中，否则:attribute字段是必需的',
    'required_with' => '当:values存在时，:attribute字段是必需的',
    'required_with_all' => '当:values存在时，:attribute字段是必需的',
    'required_without' => '当:values不存在时，:attribute字段是必需的',
    'required_without_all' => '当:values都不存在时，:attribute字段是必需的',
    'same' => ':attribute字段必须与:other匹配',
    'size' => [
        'array' => ':attribute字段必须包含:size项',
        'file' => ':attribute字段必须是:size千字节',
        'numeric' => ':attribute字段必须是:size',
        'string' => ':attribute字段必须是:size字符',
    ],
    'starts_with' => ':attribute字段必须以以下内容开头：:values',
    'string' => ':attribute字段必须是字符串',
    'timezone' => ':attribute字段必须是有效的时区',
    'unique' => ':attribute已被占用',
    'uploaded' => ':attribute上传失败',
    'uppercase' => ':attribute字段必须是大写',
    'url' => ':attribute字段必须是有效的URL',
    'ulid' => ':attribute字段必须是有效的ULID',
    'uuid' => ':attribute字段必须是有效的UUID',

    /*
    |--------------------------------------------------------------------------
    | 自定义验证语言行
    |--------------------------------------------------------------------------
    |
    | 您可以在此指定自定义验证消息，使用“attribute.rule”约定来命名行。这使得为给定的属性规则指定特定的自定义语言行变得快速。
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => '自定义消息',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | 自定义验证属性
    |--------------------------------------------------------------------------
    |
    | 以下语言行用于将我们的属性占位符替换为更易读的内容，例如“E-Mail Address”而不是“email”。这仅仅帮助我们使我们的消息更具表现力。
    |
    */

    'attributes' => [],

];
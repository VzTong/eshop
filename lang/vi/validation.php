<?php

return [

    'required' => ':attribute là bắt buộc',

    'min' => [
        'numeric' => ' :attribute không được nhỏ hơn :min.',
        'file' => ' :attribute không được nhỏ hơn :min KB.',
        'string' => ' :attribute không được nhỏ hơn :min kí tự.',
    ],

    'max' => [
        'numeric' => ' :attribute không được lớn hơn :max.',
        'file' => ' :attribute không được lớn hơn :max KB.',
        'string' => ' :attribute không được lớn hơn :max kí tự.',
    ],

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    'same' => ':attribute và :other không khớp nhau.',
    'unique' => ':attribute đã tồn tại.',

    'attributes' => [
        'ten_danh_muc' => 'Tên danh mục',
        "name" => "Tên",
        "password" => "Mật khẩu",
        "cf_password" => "Xác nhận mật khẩu",
        "email" => "Email"
    ],

];

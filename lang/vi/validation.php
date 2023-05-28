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

    'attributes' => [
        'ten_danh_muc' => 'Tên danh mục'
    ],

];

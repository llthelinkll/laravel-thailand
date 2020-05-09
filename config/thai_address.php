<?php

return [

    'models' => [
        'sub_district' => TheLink\ThaiAddress\Models\SubDistrict::class,
        'district' => TheLink\ThaiAddress\Models\District::class,
        'province' => TheLink\ThaiAddress\Models\Province::class,
        'postal_code' => TheLink\ThaiAddress\Models\PostalCode::class,
    ],

    'table_names' => [
        'sub_district' => 'sub_districts',
        'district' => 'districts',
        'province' => 'provinces',
        'postal_code' => 'postal_codes',
    ],

];

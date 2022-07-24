<?php

return [
    'app' => [
        'title' => 'General',
        'desc' => 'All the general settings for application.',
        'icon' => 'glyphicon glyphicon-sunglasses',

        'elements' => [
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'app_name', // unique name for field
                'label' => 'App Name', // you know what label it is
                'rules' => 'required|min:2|max:50', // validation rule of laravel
                'class' => 'w-auto px-2', // any class for input
                'value' => '' // default value if you want
            ],
            [
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'app_desc', // unique name for field
                'label' => 'App Desc', // you know what label it is
                'rules' => 'required|min:2|max:50', // validation rule of laravel
                'class' => 'w-auto px-2', // any class for input
                'value' => '' // default value if you want
            ],
            [
                'type' => 'select', // input fields type
                'data' => 'string', // data type, string, int, boolean
                'name' => 'app_xx', // unique name for field
                'label' => 'App Desc', // you know what label it is
                'rules' => 'required', // validation rule of laravel
                'class' => 'w-auto px-2', // any class for input
                'value' => 'city', // default value if you want
                'options' => [
                    'name' => 'Name of Town',
                    'city' => 'Name of City'
                ]
            ]
        ]
    ]
];
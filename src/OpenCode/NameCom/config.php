<?php

return [
    'openCode' => [
        'nameCom' => [
            'auth' => [
                /**
                 * https://api.dev.name.com or https://api.name.com
                 */
                'endpoint' => dotenv('OPENCODE_NAMECOM_ENDPOINT'),
                'username' => dotenv('OPENCODE_NAMECOM_USERNAME'),
                'password' => dotenv('OPENCODE_NAMECOM_PASSWORD'),
            ],
        ]
    ],
];
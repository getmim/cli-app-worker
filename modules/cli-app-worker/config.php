<?php

return [
    '__name' => 'cli-app-worker',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/cli-app-worker.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/cli-app-worker' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'cli-app' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'CliAppWorker\\Library' => [
                'type' => 'file',
                'base' => 'modules/cli-app-worker/library'
            ],
            'CliAppWorker\\Controller' => [
                'type' => 'file',
                'base' => 'modules/cli-app-worker/controller'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'tool-app' => [
            'toolAppWorkerStart' => [
                'info' => 'Run application worker',
                'path' => [
                    'value' => 'worker start'
                ],
                'handler' => 'CliAppWorker\\Controller\\Worker::start'
            ],
            'toolAppWorkerStop' => [
                'info' => 'Stop application worker',
                'path' => [
                    'value' => 'worker stop'
                ],
                'handler' => 'CliAppWorker\\Controller\\Worker::stop'
            ],
            'toolAppWorkerPID' => [
                'info' => 'Get application worker pid',
                'path' => [
                    'value' => 'worker pid'
                ],
                'handler' => 'CliAppWorker\\Controller\\Worker::pid'
            ],
            'toolAppWorkerStatus' => [
                'info' => 'Get application worker status',
                'path' => [
                    'value' => 'worker status'
                ],
                'handler' => 'CliAppWorker\\Controller\\Worker::status'
            ]
        ]
    ],
    'cli' => [
        'autocomplete' => [
            '!^app worker( .*)?$!' => [
                'priority' => 6,
                'handler' => [
                    'class' => 'CliAppWorker\\Library\\Autocomplete',
                    'method' => 'command'
                ]
            ]
        ]
    ]
];
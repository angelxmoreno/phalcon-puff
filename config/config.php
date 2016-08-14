<?php
return [
    'database' => [
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'dbname' => 'test',
        'charset' => 'utf8',
    ],
    'application' => [
        'controllersDir' => APP_PATH . 'controllers' . DS,
        'modelsDir' => APP_PATH . 'models' . DS,
        'migrationsDir' => ROOT_PATH . 'migrations' . DS,
        'viewsDir' => VIEWS_PATH,
        'pluginsDir' => APP_PATH . 'plugins' . DS,
        'libraryDir' => APP_PATH . 'library' . DS,
        'cacheDir' => CACHE_PATH,
        'baseUri' => ''
    ],
    'view' => [
        'options' => [
            'compiledPath' => CACHE_PATH . 'compiled' . DS,
            'compiledExtension' => '.php',
            'compiledSeparator' => '__',
            'stat' => true,
            'prefix' => 'view_',
            'compileAlways' => true,
        ]
    ],
    'logger' => [
        'adapters' => [
            'FirePHP' => '',
            'File' => LOGS_PATH . 'app.log',
        ]
    ],
    'cache' => [
        'default' => [
            'frontend' => [
                'Data' => [
                    'lifetime' => 172800
                ]
            ],
            'backend' => [
                'File' => [
                    'cacheDir' => CACHE_PATH . 'data' . DS,
                ]
            ]
        ],
        
        'database' => [
            'frontend' => [
                'Data' => [
                    'lifetime' => 172800
                ]
            ],
            'backend' => [
                'File' => [
                    'cacheDir' => CACHE_PATH . 'models' . DS,
                    'prefix' => '_cached_data_'
                ]
            ]
        ]
    ]
];

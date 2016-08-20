<?php
return [
    'database' => [
        'adapter' => ucfirst(parse_url(getenv('DATABASE_URL'), PHP_URL_SCHEME)),
        'host' => parse_url(getenv('DATABASE_URL'), PHP_URL_HOST),
        'port' => parse_url(getenv('DATABASE_URL'), PHP_URL_PORT),
        'username' => parse_url(getenv('DATABASE_URL'), PHP_URL_USER),
        'password' => parse_url(getenv('DATABASE_URL'), PHP_URL_PASS),
        'dbname' => trim(parse_url(getenv('DATABASE_URL'), PHP_URL_PATH), '/'),
        'charset' => 'utf8',
    ],
    'sessions' => [
        'adapter' => ucfirst(parse_url(getenv('SESSION_URL'), PHP_URL_SCHEME)),
        'host' => parse_url(getenv('SESSION_URL'), PHP_URL_HOST),
        'port' => parse_url(getenv('SESSION_URL'), PHP_URL_PORT),
        'auth' => parse_url(getenv('SESSION_URL'), PHP_URL_PASS),
        'persistent' => true,
        'lifetime' => 2592000, //30 days
        'prefix' => 'session_'
    ],
    'application' => [
        'modulesDir' => APP_PATH . 'Modules' . DS,
        'controllersDir' => APP_PATH . 'Controllers' . DS,
        'modelsDir' => APP_PATH . 'Models' . DS,
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
                'Redis' => [
                    'adapter' => ucfirst(parse_url(getenv('CACHE_URL'), PHP_URL_SCHEME)),
                    'host' => parse_url(getenv('CACHE_URL'), PHP_URL_HOST),
                    'port' => parse_url(getenv('CACHE_URL'), PHP_URL_PORT),
                    'auth' => parse_url(getenv('CACHE_URL'), PHP_URL_PASS),
                    'persistent' => true
                ]
            ]
        ],
        'database' => [
            'frontend' => [
                'Data' => [
                    'lifetime' => 600 //10 minutes
                ]
            ],
            'backend' => [
                'Redis' => [
                    'adapter' => ucfirst(parse_url(getenv('MODELS_CACHE_URL'), PHP_URL_SCHEME)),
                    'host' => parse_url(getenv('MODELS_CACHE_URL'), PHP_URL_HOST),
                    'port' => parse_url(getenv('MODELS_CACHE_URL'), PHP_URL_PORT),
                    'auth' => parse_url(getenv('MODELS_CACHE_URL'), PHP_URL_PASS),
                    'persistent' => true
                ]
            ]
        ]
    ]
];

<?php
return [
    'database' => [
        'adapter' => ucfirst(parse_url(getenv('DATABASE_URL'), PHP_URL_SCHEME)),
        'host' => parse_url(getenv('DATABASE_URL'), PHP_URL_HOST),
        'username' => parse_url(getenv('DATABASE_URL'), PHP_URL_USER),
        'password' => parse_url(getenv('DATABASE_URL'), PHP_URL_PASS),
        'dbname' => parse_url(getenv('DATABASE_URL'), PHP_URL_PATH),
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
            'compiledPath' => CACHE_PATH . 'views' . DS,
            'compiledExtension' => '.php',
            'compiledSeparator' => '__',
            'stat' => true,
            'compileAlways' => true,
        ]
    ],
    'logger' => [
        'adapters' => [
            'FirePHP' => '',
            'File' => LOGS_PATH . 'app.log',
        ]
    ]
];

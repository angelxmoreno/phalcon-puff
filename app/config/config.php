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
        'migrationsDir' => APP_PATH . 'migrations' . DS,
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
    ]
];

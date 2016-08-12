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
        'viewsDir' => APP_PATH . 'views' . DS,
        'pluginsDir' => APP_PATH . 'plugins' . DS,
        'libraryDir' => APP_PATH . 'library' . DS,
        'cacheDir' => ROOT_PATH . 'cache' . DS,
        'baseUri' => DS . 'src' . DS
    ]
];

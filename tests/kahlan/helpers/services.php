<?php

use Phalcon\Di;
use Phalcon\Di\FactoryDefault as PhalconDiDefault;
use Phalcon\Db\Adapter\Pdo\Sqlite as SqlitePdo;

$di = new PhalconDiDefault();
$di->setShared('db', function() {
    return new SqlitePdo([
        'dbname' => TESTS_PATH . 'kahlan.sqlite',
    ]);
});
Di::setDefault($di);

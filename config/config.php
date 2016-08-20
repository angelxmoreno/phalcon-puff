<?php 
return new Phalcon\Config(array (
  'database' => 
  array (
    'adapter' => 'Mysql',
    'host' => '127.0.0.1',
    'port' => 8889,
    'username' => 'root',
    'password' => 'root',
    'dbname' => 'phalcon-puff',
    'charset' => 'utf8',
  ),
  'sessions' => 
  array (
    'adapter' => 'Redis',
    'host' => 'ec2-23-23-129-214.compute-1.amazonaws.com',
    'port' => 23499,
    'auth' => 'p8ecqo9hqjr7kc11l7ndj2ilnrn',
    'persistent' => true,
    'lifetime' => 2592000,
    'prefix' => 'session_',
  ),
  'application' => 
  array (
    'modulesDir' => '/Volumes/MicroSD128/Projects/PhalconHeroku/pahlcon-puff/src/Modules/',
    'controllersDir' => '/Volumes/MicroSD128/Projects/PhalconHeroku/pahlcon-puff/src/Controllers/',
    'modelsDir' => '/Volumes/MicroSD128/Projects/PhalconHeroku/pahlcon-puff/src/Models/',
    'migrationsDir' => '/Volumes/MicroSD128/Projects/PhalconHeroku/pahlcon-puff/migrations/',
    'viewsDir' => '/Volumes/MicroSD128/Projects/PhalconHeroku/pahlcon-puff/views/',
    'pluginsDir' => '/Volumes/MicroSD128/Projects/PhalconHeroku/pahlcon-puff/src/plugins/',
    'libraryDir' => '/Volumes/MicroSD128/Projects/PhalconHeroku/pahlcon-puff/src/library/',
    'cacheDir' => '/Volumes/MicroSD128/Projects/PhalconHeroku/pahlcon-puff/cache/',
    'baseUri' => '',
  ),
  'view' => 
  array (
    'options' => 
    array (
      'compiledPath' => '/Volumes/MicroSD128/Projects/PhalconHeroku/pahlcon-puff/cache/compiled/',
      'compiledExtension' => '.php',
      'compiledSeparator' => '__',
      'stat' => true,
      'prefix' => 'view_',
      'compileAlways' => true,
    ),
  ),
  'logger' => 
  array (
    'adapters' => 
    array (
      'FirePHP' => '',
      'File' => '/Volumes/MicroSD128/Projects/PhalconHeroku/pahlcon-puff/logs/app.log',
    ),
  ),
  'cache' => 
  array (
    'default' => 
    array (
      'frontend' => 
      array (
        'Data' => 
        array (
          'lifetime' => 172800,
        ),
      ),
      'backend' => 
      array (
        'Redis' => 
        array (
          'adapter' => 'Redis',
          'host' => 'ec2-54-197-242-4.compute-1.amazonaws.com',
          'port' => 23179,
          'auth' => 'p6viu6tfsecsfudgmpu23d9rncp',
          'persistent' => true,
        ),
      ),
    ),
    'database' => 
    array (
      'frontend' => 
      array (
        'Data' => 
        array (
          'lifetime' => 600,
        ),
      ),
      'backend' => 
      array (
        'Redis' => 
        array (
          'adapter' => 'Redis',
          'host' => 'ec2-54-163-236-211.compute-1.amazonaws.com',
          'port' => 10789,
          'auth' => 'p43gvuukr5evageihhuhelqqra',
          'persistent' => true,
        ),
      ),
    ),
  ),
));
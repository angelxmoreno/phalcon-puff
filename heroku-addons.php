<?php
$plugins = [
    'dbs' => [
        'heroku-postgresql:hobby-dev' //main db
    ],
    'cache' => [
        'heroku-redis:hobby-dev', //25mb/20conns
        'rediscloud:30', //30mb/30conns
        'iron_cache:developer' //100mb
    ],
    'monitoring' => [
        'blackfire:test',
        'newrelic:wayne'
    ],
    'logging' => [
        'papertrail:choklad',
        'logentries:le_tryit',
        'sumologic:test'
    ],
    'email' => [
        'sendgrid:starter'
    ],
    'search' => [],
    'queue' => [],
    'image_processing' => [],
    'video_processing' => []
];

foreach ($plugins as $type => $addons) {
    echo "$type\n";
    foreach ($addons as $addon) {
        echo "\t$addon\n-------------------------------------------------\n";
        $cmd = 'heroku addons:create ' . $addon;
//        passthru($cmd);
        echo "\n-------------------------------------------------\n";
    }
}


$cmd = 'heroku config:pull';
passthru($cmd);

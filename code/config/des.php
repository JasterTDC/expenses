<?php

$configPro = require_once __DIR__ . '/pro.php';

$configDes = [
    'settings' => [
        'expenseWriterDatabase' => [
            'engine'    => 'mysql',
            'hostname'  => 'sql',
            'username'  => 'root',
            'password'  => 'root',
            'database'  => 'expenses',
            'charset'   => 'utf8',
            'port'      => 3306
        ],
        'expenseReaderDatabase' => [
            'engine'    => 'mysql',
            'hostname'  => 'sql',
            'username'  => 'root',
            'password'  => 'root',
            'database'  => 'expenses',
            'charset'   => 'utf8',
            'port'      => 3306
        ]
    ]
];

return array_merge($configPro, $configDes);

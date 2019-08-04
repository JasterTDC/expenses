<?php

return [
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
    ],
    'dateFormat'    => 'Y-m-d H:i:s'
];

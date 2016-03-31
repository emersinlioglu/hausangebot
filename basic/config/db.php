<?php

if (getenv('YII_ENV') == 'development') {

    // development
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=hausangebot',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
    ];

} else {

    // default
    return [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=localhost;dbname=hausangebot',
        'username' => 'root',
        'password' => 'Sri6lanka',
        'charset' => 'utf8',
    ];
}

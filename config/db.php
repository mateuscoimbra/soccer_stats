<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='.env('DATABASE_HOST').';dbname='.env('DATABASE_DATABASE').'',
    'username' => env('DATABASE_USER'),
    'password' => env('DATABASE_PASSWORD'),
    'charset' => 'utf8mb4',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];

<?php
    use Dotenv\Dotenv;

    $dot_env = Dotenv::createImmutable(dirname(__DIR__));
    $dot_env->load();
    
    return [
        'db_info' => [
            'db_conection_string' => $_ENV['DB_CONECTION_STRING'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'] ?? '',
        ]
    ];
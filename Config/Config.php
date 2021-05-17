<?php
    use Dotenv\Dotenv;

    $dot_env = Dotenv::createImmutable(dirname(__DIR__));
    $dot_env->load();
    
    return [
        'db_info' => [
            'host' => $_ENV['DB_HOST'],
            'db_name' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD'] ?? '',
            'port' => $_ENV['DB_PORT']
        ]
    ];
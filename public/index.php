<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    $config = require __DIR__ . '/../Config/Config.php';
    use App\Core\Application;
    use App\Controllers\UserController;
 
    $app = new Application(dirname(__DIR__), $config);
    $app->route->get('/', [UserController::class, 'user']);
    $app->route->post('/auth', [UserController::class, 'post_user']);

    $app->run();

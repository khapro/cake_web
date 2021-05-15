<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    use App\Core\Application;
    use App\Controllers\UserController;
 
    $app = new Application(dirname(__DIR__));
    $app->route->get('/', [UserController::class, 'user']);

    $app->run();

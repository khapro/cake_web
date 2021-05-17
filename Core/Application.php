<?php
    namespace App\Core;

        class Application
        {
            public Router $route;
            public Request $request;
            public Response $response;
            public Database $database;
            public static string $root_dir;
            public static Application $application;

            public function __construct(string $root_path, array $config)
            {
                $this->request = new Request();
                $this->response = new Response();
                $this->database = new Database($config);
                $this->route = new Router($this->request, $this->response);
                self::$root_dir = $root_path;
                self::$application = $this;   
            }

            public function run()
            {
                echo $this->route->resolve();
            }
        }
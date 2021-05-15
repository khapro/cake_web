<?php
    namespace App\Core;

        class Application
        {
            public Router $route;
            public Request $request;
            public Response $response;
            public static string $root_dir;
            public static Application $application;

            public function __construct(string $root_path)
            {
                $this->request = new Request();
                $this->response = new Response();
                $this->route = new Router($this->request, $this->response);
                self::$root_dir = $root_path;
                self::$application = $this;   
            }

            public function run()
            {
                echo $this->route->resolve();
            }
        }
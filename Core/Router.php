<?php
    namespace App\Core;

        class Router
        {
            protected array $routes = [];
            public Request $request;
            public Response $response;
            public Controller $controller;
           

            public function __construct(Request $req, Response $res)
            {
                $this->request = $req;
                $this->response = $res;

            }

            public function get($path, $callback)
            {
                $this->routes['GET'][$path] = $callback;
            }

            public function post($path, $callback)
            {
                $this->routes['POST'][$path] = $callback;
            }

            public function resolve()
            {
                $path = $this->request->getpath();
                $method = $this->request->getmethod();
                $callback = $this->routes[$method][$path] ?? false;

                if($callback === false)
                {
                    $this->response->set_code(404);
                    return $this->render_view('_404');
                }

                if(is_string($callback))
                {
                    $this->render_view($callback);
                }

                if(is_array($callback))
                {
                    $callback[0] = new $callback[0]();
                    $this->controller = $callback[0];
                }

                return call_user_func($callback, $this->request);
            }

            public function render_view($view, $param = [])
            {
                $content_layout = $this->content_layout();
                $view_only = $this->only_view($view , $param);

                return str_replace('{{content}}', $view_only, $content_layout);
            }

            public function render_view_content($view_contnet)
            {
                $content_layout = $this->content_layout();
                return str_replace('{{content}}', $view_contnet, $content_layout);
            }

            private function content_layout()
            {
                $main_layout =  $this->controller->layout ?? 'main_layout'; 
                ob_start();
                include_once Application::$root_dir . "/Views/master/{$main_layout}.php";
                return ob_get_clean();
            }

            private function only_view($view, $param)
            {

                if(count($param) > 0)
                {
                    foreach($param as $key => $value)
                    {
                        $$key = $value;
                    }
                }
                
                ob_start();
                include_once Application::$root_dir . "/Views/$view.php";
                return ob_get_clean();
            }

        }
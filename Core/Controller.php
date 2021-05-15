<?php
    namespace App\Core;
    class Controller
    {
        public string $layout = 'main_layout';

        public function render($view, $param = [])
        {
            return Application::$application->route->render_view($view, $param);
            
        }

        public function set_layout_main(string $main_layout)
        {
            $this->layout = $main_layout;
        }
    }
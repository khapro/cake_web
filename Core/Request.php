<?php
    namespace App\Core;

        class Request
        {
            public function getpath()
            {                
                $path_url = $_SERVER['REQUEST_URI'];
                $position = strpos($path_url, '?');

                if ($position === false)
                {
                    return $path_url;
                }

                $path_url = substr($path_url, 0, $position);

                return $path_url;
            }

            public function getmethod() :string
            {
               return $_SERVER['REQUEST_METHOD'];
            }

            public function is_get()
            {
                return strtolower($this->getmethod()) === 'get';
            }

            public function is_post()
            {
                return strtolower($this->getmethod()) === 'post';
            }

            public function get_body()
            {
                $array_request = [];

                if($this->is_get() === true)
                {
                   foreach($_GET as $key => $value)
                   {
                        $array_request[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                   }
                }

                if($this->is_post())
                {
                    foreach($_POST as $key => $value)
                    {
                        $array_request[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }

                return $array_request; 
            }
        }
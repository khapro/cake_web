<?php
    namespace App\Core;

        class Response
        {

            public function __construct()
            {
                
            }

            public function set_code($code)
            {
                http_response_code($code);
            }
        }
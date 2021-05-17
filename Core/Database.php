<?php
    namespace App\Core;
    use mysqli;

    class Database
    {
        protected mysqli $mysqli;

        public function __construct(array $config)
        {
            $host = $config['db_info']['host'];
            $db_name = $config['db_info']['db_name'];
            $port = $config['db_info']['port'];
            $user = $config['db_info']['user'];
            $password = $config['db_info']['password'];
            $this->mysqli = new mysqli($host, $user, $password, $db_name, $port);
            
        }

    }
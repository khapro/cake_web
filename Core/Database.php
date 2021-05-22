<?php
    namespace App\Core;

        use PDO;
        use PDOException;

        class Database
        {
            public PDO $pdo;

            public function __construct(array $config)
            {
                try 
                {
                    $host = $config['db_info']['db_conection_string'];
                    $user = $config['db_info']['user'];
                    $password = $config['db_info']['password'];
                    $this->pdo = new PDO($host, $user, $password);
                    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } 
                catch (PDOException $ex) 
                {
                    die($ex->getMessage());
                }
            }

        }
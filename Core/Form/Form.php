<?php
    namespace App\Core\Form;

        use App\Core\Model;

        class Form
        {
            public Model $model;
            public string $attribute;

            public function __construct($_model, $_attribute)
            {
                $this->model = $_model;
                $this->attribute = $_attribute;
            }

            public static function begin($action, $method, string $class='')
            {
                if(empty($class))
                {
                    echo "<form action=$action method=$method>";
                }
                else
                {
                    echo "<form action=$action method=$method class=$class>";
                }
            }

            public static function end()
            {
                echo '</form>';
            }
        }
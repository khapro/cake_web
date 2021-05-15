<?php
    namespace App\Core;

        class Model
        {
            public static const  RULE_REQUIRED = 'required';
            public static const RULE_EMAIL = 'email';
            public static const RULE_MATCH =  'match';
            public static const RULE_MIN = 'min';
            public static const RULE_MAX = 'max';

            public array $errors = [];

            public function load_data($data)
            {
                foreach($data as $key => $value)
                {
                    if(property_exists($this, $key))
                    {
                        $this->{$key} = $value;
                    }
                }
            }

            public function validate(array $rules = [])
            {
                if(empty($rule) !== true)
                {
                    foreach($rules as $atribute => $rule)
                    {
                        $value = $this->{$atribute} ?? false;


                    }
                }
            }

            private function check_rule($rule, $key, $value)
            {
                switch($rule)
                {
                    case self::RULE_REQUIRED:
                    {
                        if($value === false)
                        {
                            $this->errors[$key][$rule] = "This field is required";
                        }
                        break;
                    }
                }
            }
        }
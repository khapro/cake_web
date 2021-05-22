<?php
    namespace App\Core;

        abstract class Model
        {
            public  const  RULE_REQUIRED = 'required';
            public  const RULE_EMAIL = 'email';
            public  const RULE_MATCH =  'match';
            public  const RULE_MIN = 'min';
            public  const RULE_MAX = 'max';

            public array $errors = [];

            private array $messages = [
                self::RULE_REQUIRED => 'This field is required',
                self::RULE_EMAIL => 'This is not email',
                self::RULE_MATCH  => 'This is not match',
                self::RULE_MIN => 'least need charater',
                self::RULE_MAX => 'maximun is charater'
            ];

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

            abstract public function rules() : array;

            public function validate()
            {
                $rules = $this->rules();
                if(count($rules) > 0)
                {
                    foreach($rules as $atribute => $rule)
                    {
                        $value = $this->{$atribute};
                        
                        foreach($rule as $detail_rule)
                        {
                            if(is_string($detail_rule))
                            {
                                $this->check_rule($detail_rule, $atribute, $value);
                            }

                            if(is_array($detail_rule))
                            {
                                $this->check_rule(
                                                    $detail_rule[0], 
                                                    $atribute, 
                                                    $value, 
                                                    $detail_rule[1][$detail_rule[0]]
                                                );
                            }
                        }

                    }
                }

                return empty($this->errors);
            }

            private function check_rule($rule, $key, $value, $rule_value = '')
            {
                switch($rule)
                {
                    case self::RULE_REQUIRED:
                    {
                        if(empty($value))
                        {
                            $this->errors[$key][$rule] = $this->messages[$rule];
                        }
                        break;
                    }

                    case self::RULE_EMAIL:
                    {
                        if(!empty($value) &&  (filter_var($value, FILTER_VALIDATE_EMAIL) === false))
                        {
                            $this->errors[$key][$rule] = $this->messages[$rule];
                        }
                        break;
                    }

                    case self::RULE_MATCH:
                    {
                        if(!empty($value) and strcmp($value, $rule_value) !== 0)
                        {
                            $this->errors[$key][$rule] = $this->messages[$rule];
                        }
                        break;
                    }

                    case self::RULE_MAX:
                    {
                        if(!empty($value) and strlen($value) > intval($rule_value))
                        {
                            $this->errors[$key][$rule] = $this->messages[$rule] . " $rule_value";
                        }
                        break;
                    }

                    case self::RULE_MIN:
                    {
                        if(!empty($value) and strlen($value) < intval($rule_value))
                        {
                            $this->errors[$key][$rule] = $this->messages[$rule] . " $rule_value";
                        }
                    }

                }
            }

            public function has_error($attribute)
            {
                return $this->errors[$attribute]?? false;
            }

            public function get_frist_error($attribute)
            {
                return $this->errors[$attribute];
            }
        }
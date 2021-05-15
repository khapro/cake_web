<?php
    namespace App\Models;
    use App\Core\Model;

    class UserModel extends Model 
    {
        public string $email;
        public string $password;

        public function rules():array
        {
            return [
                'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
                'password' =>[self::RULE_REQUIRED]
            ];
        }
    }
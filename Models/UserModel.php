<?php
    namespace App\Models;
    use App\Core\Model;
    use App\Core\ModelDB;

    class UserModel extends ModelDB 
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

        public function get_table(): string
        {
            return 'user';
        }

        public function get_atributes(): array
        {
            return ['email', 'password'];
        }
    }
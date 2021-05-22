<?php
    namespace App\Core;
    use App\Core\Application;

        abstract class ModelDB extends Model 
        {
            abstract public function get_table() : string;
            abstract public function get_atributes(): array;

            public function save()
            {
                $table = $this->get_table();
                $atributes = $this->get_atributes();
                $param_question = array_map(fn($atr) => ":$atr", $atributes);
                $sql = "INSERT INTO $table(" . implode(',', $atributes) .") values(" . implode(',', $param_question) . ")";
                $this->prepare($sql, $atributes);
            }

            private function prepare(string $sql, array $atributes)
            {
                $atributes_value = array_combine($atributes, array_map(fn($atr) => $this->{$atr}, $atributes));
                $query = Application::$application->database->pdo->prepare($sql);
                foreach ($atributes as $value) 
                {
                    $query->bindParam(':'.$value, $atributes_value[$value]);
                }
                
                return $query->execute();
            }

            public function update()
            {
                
            }
        }
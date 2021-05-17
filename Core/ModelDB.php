<?php
    namespace App\Core;

        abstract class ModelDB extends Model 
        {
            abstract public function get_table() : string;
            abstract public function get_atributes(): array;

            protected function save()
            {
                $table = $this->get_table();
                $atributes = $this->get_atributes();
                $param_question = array_map(fn($atr) => "?", $atributes);

                $sql = "INSERT INTO $table(." . implode(',', $atributes) .") values()";
            }

            private function prepare($sql)
            {
                
            }
        }
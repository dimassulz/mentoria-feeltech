<?php

class DBConnection {

    private function __construct(){
        echo "Novo objeto criado \n";
    }

    public static function getInstance() {
        static $instance = null;

        if(null === $instance){
            $instance = new static();
        }else{
            echo "Usando o objeto \n";
        }

        return $instance;
    }
}
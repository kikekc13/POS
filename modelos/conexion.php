<?php

class Conexion{
    
    static public function conectar(){
        
        $link = new PDO("mysql:host=localhost;dbname=pos",
                        "root",
                        "");
        
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $link->exec("set names utf8");
        
        return $link;
        
    }

}
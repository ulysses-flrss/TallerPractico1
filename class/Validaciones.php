<?php
    $errores = array();

    function estaVacio($var){
        return empty(trim($var));
    }

    function esCodigo($var){
        return preg_match('/^[A-Z]{2}[0-9]{6}$/',$var);
    }

    function esTexto($var){
        return preg_match('/^[a-zA-Z ]+$/',$var);
    }

    function esPrecio($var){
        return $var > 0;
    }

    function esExistencia($var){
        return $var > 0;
    }

?>
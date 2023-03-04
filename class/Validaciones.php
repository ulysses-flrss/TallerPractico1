<?php
    $errores = array();

    function estaVacio($var){
        return empty(trim($var));
    }

    function esCodigo($var){  //PROD#####
        return preg_match('/^[P][R][O][D][0-9]{5}$/',$var);
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
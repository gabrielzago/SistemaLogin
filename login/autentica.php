<?php

include_once '../conn/conection.php';

function limpaEntrada($valor) {
    $valor = str_replace("'", "", $valor);
    $valor = str_replace("--", "", $valor);
    $valor = str_replace("\"", "", $valor);
    $valor = str_replace("'", "", $valor);
    $valor = str_replace("<", "", $valor);
    $valor = str_replace(">", "", $valor);
    $valor = str_replace(";", "", $valor);
    $valor = str_replace("=", "", $valor);
    $valor = str_replace('"', "", $valor);
    $valor = str_replace(" or ", "", $valor);
    $valor = str_replace("select ", "", $valor);
    $valor = str_replace("delete ", "", $valor);
    $valor = str_replace("create ", "", $valor);
    $valor = str_replace("drop ", "", $valor);
    $valor = str_replace("update ", "", $valor);
    $valor = str_replace("drop table", "", $valor);
    $valor = str_replace("show table", "", $valor);
    $valor = str_replace("applet", "", $valor);
    $valor = str_replace("object", "", $valor);
    $valor = str_replace("#", "", $valor);
    $valor = str_replace("=", "", $valor);
    $valor = str_replace("-", "", $valor);
    $valor = str_replace("*", "", $valor);
    return $valor;
}

if(isset($_POST["login"])){
    $login = limpaEntrada($_POST["login"]);
}
if(isset($_POST["senha"])){
    $senha = limpaEntrada($_POST["senha"]);
    $senha =  md5(sha1($senha));
}

if(isset($login) && isset($senha)){
    $sql = "select * from user_admin where login = '$login' and senha = '$senha' ";
    $res = query($sql);

    if(count($res) > 0){

        $array = array();

        foreach($res as $r){
            array_push($array, array('codigo' => $r['codigo'],
                                     'nome' => utf8_encode($r['nome']),
                                     'login' => $r['login'],
                                     'senha' => $r['senha'],
                                     'email' => $r['email']));
        }
        echo json_encode($array);
    }
    else{
        echo json_encode("negado");
    }
}

<?php

require "../vendor/autoload.php";
use ProyectoScrum\Modelo\ModeloLogin;
$ModeloLogin=new ModeloLogin();
/*
 * Control de usuario y contraseña por GET
 * 
 * Se controlarán los datos por GET, los cuales serán comprobados por la base
 * de datos para verificarlos y en caso de error, dar un mensaje con el error.
 */
if($_SERVER["REQUEST_METHOD"] == "GET"){
    require __DIR__."../index.php";
    $email =$_GET["email"];
    echo $email;
}
else if($_SERVER["REQUEST_METHOD"] == "POST"){
    $datosConsulta = file_get_contents('php://input');
    
    $datos = json_decode($datosConsulta,true);
    $email = $datos["email"];
    $password = $datos["password"];
    
    $ModeloLogin->conexionLogin();
    $valido=$ModeloLogin->compruebaEmail($email);
    if($valido){
        $valido=$ModeloLogin->compruebaPassword($password,$email);
        if($valido){
            echo $datosConsulta;
            $ModeloLogin->cierre();
        }else{
            $ModeloLogin->error("password");
            $ModeloLogin->cierre();
        }
    }else{
        $ModeloLogin->error("email");
        $ModeloLogin->cierre();
    }
}
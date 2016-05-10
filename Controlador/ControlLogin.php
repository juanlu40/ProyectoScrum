<?php


/**
 *Carga del objeto ModeloLogin.
 * 
 *Carga del objeto ModeloLogin para poder usarlo y llamar a los métodos.
 */
require "../vendor/autoload.php";
use ProyectoScrum\Modelo\ModeloLogin;
$ModeloLogin=new ModeloLogin();
/*
 * Control de usuario y contraseña
 * 
 * Se controlarán los datos, los cuales serán comprobados por la base
 * de datos para verificarlos y en caso de error, dar un mensaje con el error.
 */
if($_SERVER["REQUEST_METHOD"] == "GET"){
    require __DIR__."../index.php";
    $email =$_GET["email"];
    echo $email;
}
else if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    /*
     * Entrada de contenidos de ajax
     */
    $datosConsulta = file_get_contents('php://input');
    
    /*
     * Datos del json abierto
     */
    
    $datos = json_decode($datosConsulta,true);
    
    /*
     * variables obtenidas del json
     * 
     * Las variables son <var>email</var>, <var>password</var>
     */
    $email = $datos["email"];
    $password = $datos["password"];
    
    /*
     * llamadas a modeloLogin para realizar las consultas, en caso de error,
     * devuelve el mensaje de error correspondiente.
     */
    
    $ModeloLogin->conexionLogin();
    $valido=$ModeloLogin->compruebaEmail($email,"datos");
    if($valido){
        $valido=$ModeloLogin->compruebaPassword($password,$email,"datos");
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
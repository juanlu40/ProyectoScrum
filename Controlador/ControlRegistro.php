<?php

/**
 *Carga del objeto ModeloRegistro.
 * 
 *Carga del objeto ModeloRegistro para poder usarlo y llamar a los métodos.
 */

require "../vendor/autoload.php";
use ProyectoScrum\Modelo\ModeloLogin;
$ModeloRegistro=new ModeloLogin();

/*
 * Control de Registro
 * 
 * Se controlarán los datos, los cuales serán comprobados por la base
 * de datos para verificarlos e insertar el nuevo usuario en caso afirmativo,
 *  y en caso de error, dar un mensaje con el error.
 */

if($_SERVER["REQUEST_METHOD"] == "GET"){
    require __DIR__."../Vista/Registro.php";
}else if($_SERVER["REQUEST_METHOD"] == "POST"){
    
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
     * Las variables son <var>email</var>, <var>password</var>,
     * <var>nick</var>, <var>nombre</var>, <var>apellidos</var>
     */
    
    $nick = $datos["nick"];
    $email = $datos["email"];
    $password = $datos["password"];
    $nombre = $nombre["nomnbre"];
    $apellidos = $apellidos["apellidos"];
    
    /*
     * llamadas a modeloLogin para realizar las consultas, en caso de error,
     * devuelve el mensaje de error correspondiente.
     */
    
    $ModeloRegistro->conexionLogin();
    $valido=$ModeloRegistro->compruebaEmail($email,"datos");
    if($valido){
        $valido=$ModeloRegistro->compruebaNick($nick,"datos");
        if($valido){
            $valido=$ModeloRegistro->insertarDatosNuevos($nombre, $apellidos, $nick, $email, $password, "datos");
            if(!$valido){
                echo $ModeloRegistro->error("general");
                $ModeloRegistro->cierre();
            }else{
            require __DIR__."../index.php";
             $mensaje = ["email" => $email];
             echo json_encode($mensaje);
            $ModeloRegistro->cierre();
            }
        }else{
            $ModeloRegistro->error("password");
            $ModeloRegistro->cierre();
        }
    }else{
        $ModeloRegistro->error("email");
        $ModeloRegistro->cierre();
    }
    
}




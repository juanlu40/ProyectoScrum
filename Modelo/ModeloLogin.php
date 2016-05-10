<?php

namespace ProyectoScrum\Modelo;

/**
 * Clase ModeloLogin.
 * 
 * En esta clase se realizaran los metodos de comprobacion
 *  del usuario a logear.
 */
class ModeloLogin {
    
    /**
     * variables de el login
     * 
     * variables para una base de datos.
     * 
     * @var Variable de logeo en base de datos <var>log</var> y Resultado
     *  de las consultas <var>Resultado</var>.
     */
    private $log;
    private $Resultado;
    
    /*
     * Metodo de conexion BD.
     * 
     * Este metodo hace log en la base de datos.
     */
    
    public function conexionLogin(){
        $this->log = new \mysqli("localhost","root","0123456789","bdconsultas");
        if ($this->log->connect_error){
            throw new \Exception("Conexion abortada");
        }
    }
    
    /*
     * Metodo de comprobacion de email
     * 
     * Este metodo nos comprueba que nuestro email existe en la base de datos o no
     */
    public function compruebaEmail($email){
        $this->Resultado=$this->log->query("SELECT email FROM datos WHERE email='".$email."';");
        if ($this->Resultado->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }
    /*
     * Metodo de comprobar password
     * 
     * Este metodo nos comprueba que la password existe o no para ese email.
     */
    public function compruebaPassword($password,$email){
        $this->Resultado=$this->log->query("SELECT * FROM datos WHERE password='".$password."' AND email='".$email."';");
        if ($this->Resultado->num_rows > 0){
            return true;
        }else{
            return false;
        }
    }
    /*
     * Metodo de cierre
     * 
     * Este metodo cierra el log de la base de datos. 
     */
    public function cierre(){
        $this->log->close();
    }
    /*
     * Metodo de errores
     * 
     * Nos devuelve una cadena de error por si no coinciden los datos instroducidos.
     */
    public function error($tipo){
        $error =["error"=>"El ".$tipo." no coincide."];
        echo json_encode($error);
    }
}

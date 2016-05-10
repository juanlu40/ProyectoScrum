<?php

namespace ProyectoScrum\Modelo;

/**
 * Clase ModeloLogin.
 * 
 * En esta clase se realizaran los metodos de comprobacion
 *  del usuario a logear o al registrarse.
 */
class ModeloLogin {
    
    /**
     * variables de el login y Registro
     * 
     * variables para una base de datos.
     * 
     * @var Variable de logeo en base de datos <var>log</var> y Resultado
     *  de las consultas <var>Resultado</var>, junto con el error <var>error</var>.
     */
    private $log;
    private $Resultado;
    private $error;
    
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
    
    /**
     * Metodo de comprobacion de email
     * 
     * Este metodo nos comprueba que nuestro email existe en la base de datos
     *  o no.
     * 
     * @param Variables de entrada <var>email</var> y <var>tabla</var>
     * @return devuelve si existe o no el email, y en caso de error, devuelve
     * el error.
     * 
     */
    public function compruebaEmail($email,$tabla){
        try{
        $this->Resultado=$this->log->query("SELECT email FROM ".$tabla." WHERE email='".$email."';");
        if ($this->Resultado->num_rows > 0){
            return true;
        }else{
            return false;
        }
        } catch (\Exception $e){
            $this->error = $e->getMessage();
            return false;
        }
    }
    
   /**
     * Metodo de comprobacion de Nick
     * 
     * Este metodo nos comprueba que nuestro Nick existe en la base de datos
     *  o no.
     * 
     * @param Variables de entrada <var>Nick</var> y <var>tabla</var>
     * @return devuelve si existe o no el Nick, y en caso de error, devuelve
     * el error.
     * 
     */
    public function compruebaNick($nick,$tabla){
        try{
        $this->Resultado=$this->log->query("SELECT email FROM ".$tabla." WHERE email='".$nick."';");
        if ($this->Resultado->num_rows > 0){
            return true;
        }else{
            return false;
        }
        } catch (\Exception $e){
            $this->error = $e->getMessage();
            return false;
        }
    }
    
    /**
     * Metodo de comprobar password
     * 
     * Este metodo nos comprueba que la password existe o no para ese email.
     * 
     * @param Variables de entrada <var>password</var>, <var>email</var> 
     * y <var>tabla</var>
     * @return devuelve si el email y el password es correcto password
     * para ese email, y en caso de error, devuelve
     * el error.
     */
    public function compruebaPassword($password,$email,$tabla){
        try{
        $this->Resultado=$this->log->query("SELECT * FROM ".$tabla." WHERE password='".$password."' AND email='".$email."';");
        if ($this->Resultado->num_rows > 0){
            return true;
        }else{
            return false;
        }
        } catch (\Exception $e){
            $this->error = $e->getMessage();
            return false;
        }
    }
    /**
     * Metodo de insercion en base de datos
     * 
     * Este metodo inserta los datos del nuevo usuario en la base de datos.
     * 
     * @param Variables de entrada son <var>email</var>, <var>password</var>,
     * <var>nick</var>, <var>nombre</var>, <var>apellidos</var> y la tabla a la
     * que llama.
     * @return completado.
     */
    
    public function insertarDatosNuevos($nombre,$apellidos,$nick,$email,$password,$tabla){
        try{
        $this->Resultado=$this->log->query("INSERT INTO ".$tabla." VALUES ('".$nombre."','".$apellidos."','".$nick."','".$email."','".$password."');");
        return true;
        } catch (\Exception $e){
            $this->error = $e->getMessage();
            return false;
        }
    }
    /**
     * Metodo de cierre
     * 
     * Este metodo cierra el log de la base de datos. 
     */
    public function cierre(){
        $this->log->close();
    }
    /**
     * Metodo de errores
     * 
     * Nos devuelve una cadena de error por si no coinciden los datos
     *  instroducidos.
     * @param Variable de entrada <var>Tipo<var>
     * @return Devuelve un error según el tipo que le haya entrado, o bien
     * en caso de error general, devuelve el error de la base de datos.     
     */
    public function error($tipo){
        if (Empty($this->error)){
            $error =["error"=>"El ".$tipo." no coincide."];
        }else{
            $error =["error"=>$error];
        }
        echo json_encode($error);
    }
}

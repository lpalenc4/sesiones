<?php
include_once('../config/config.php');
include('../config/Database.php');
class paciente{

    public $conexion;

    function __construct()
    {
        $db = new Database();
        $this->conexion = $db->connectToDatabase();
    }

    function save($params){
        $nombres = $params['nombres'];
        $apellidos = $params['apellidos'];
        $email = $params['email'];
        $celular = $params['celular'];
        $enfermedades = $params['enfermedades'];
        $duracionSesion = $params['duracionSesion'];
        $fecha = $params['fecha'];
        $imagen = $params['imagen'];
        
        $insert = " INSERT INTO paciente VALUES (NULL, '$nombres', '$apellidos', '$email',$celular, '$enfermedades', '$duracionSesion', '$imagen', '$fecha')";
        return mysqli_query($this->conexion, $insert);
    }
    function getAll () {
        $sql = "SELECT * FROM paciente ORDER BY fecha ASC";
        return mysqli_query($this->conexion, $sql);
        }
        
        function getOne($id)
        {
            $sql = "SELECT * FROM paciente WHERE id = $id";
            return mysqli_query($this->conexion, $sql);
        }

        function update($params){
        $nombres = $params['nombres'];
        $apellidos = $params['apellidos'];
        $email = $params['email'];
        $celular = $params['celular'];
        $enfermedades = $params['enfermedades'];
        $duracionSesion = $params['duracionSesion'];
        $fecha = $params['fecha'];
        $imagen = $params['imagen'];
        $id = $params['id'];
        
        $update = " UPDATE paciente SET nombres='$nombres', apellidos='$apellidos', email='$email', celular=$celular, enfermedades='$enfermedades', duracionSesiones='$duracionSesion', fecha='$fecha', imagen=$imagen" WHERE id=$id;

        return mysqli_query($this->conexion, $update);
    
    }
    function delete ($id){
        $delete = "DELETE FROM paciente WHERE id= $id";
        return mysqli_query($this->conexion, $delete);
    }       
}
?>
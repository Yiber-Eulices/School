<?php
    class ControladorLogin{
        public static function CtrlLogin($rol,$user,$password){
            $objLOGINM = ModeloLogin::Login($rol,$user,$password);
            return $objLOGINM;
        }
        public static function CtrlProfile(){
            $rol = $_SESSION['UserRol'];
            $id = $_SESSION['UserId'];
            $objLOGINM = ModeloLogin::Profile($rol,$id);
            return $objLOGINM;
        }
        public static function CtrlEditar($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $rol = $_SESSION['UserRol'];
            $id = $_SESSION['UserId'];
            $passwordHash =  password_hash($password, PASSWORD_DEFAULT);
            $objEDITM = ModeloLogin::EditProfile($rol,$id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$passwordHash,$telefono,$foto,$fechaNacimiento);
            return $objEDITM;
        }
        public static function CtrlRecuperar($rol,$user){
            $objLOGINM = ModeloLogin::Recover($rol,$user);
            return $objLOGINM;
        }
    }
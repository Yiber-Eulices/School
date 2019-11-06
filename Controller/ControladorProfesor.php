<?php
    class ControladorProfesor{
        public static function CtrlCrear($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $passwordHash =  password_hash($password, PASSWORD_DEFAULT);
            $objCREARM = ModeloProfesor::CrearProfesor($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$passwordHash,$telefono,$foto,$fechaNacimiento);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $passwordHash =  password_hash($password, PASSWORD_DEFAULT);
            $objEDITM = ModeloProfesor::EditarProfesor($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$passwordHash,$telefono,$foto,$fechaNacimiento);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloProfesor::ListarProfesor();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloProfesor::BuscarProfesor($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloProfesor::EliminarProfesor($id);
            return $objELIM;
        }
        public static function CtrlSesion($id){
            session_start();
            $objBUSCM = ModeloProfesor::BuscarProfesor($id);
            $_SESSION['ProfesorId'] = $objBUSCM["IdProfesor"];
            $_SESSION['ProfesorNombre'] = $objBUSCM["Nombre"]." ".$objBUSCM["Apellido"];
            return true;
        }
    }
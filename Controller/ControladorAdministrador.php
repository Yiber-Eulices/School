<?php
    class ControladorAdministrador{
        public static function CtrlCrear($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $objCREARM = ModeloAdministrador::CrearAdministrador($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $objEDITM = ModeloAdministrador::EditarAdministrador($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloAdministrador::ListarAdministrador();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloAdministrador::BuscarAdministrador($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloAdministrador::EliminarAdministrador($id);
            return $objELIM;
        }
    }
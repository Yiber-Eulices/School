<?php
    class ControladorAcudiente{
        public static function CtrlCrear($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $objCREARM = ModeloAcudiente::CrearAcudiente($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $objEDITM = ModeloAcudiente::EditarAcudiente($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloAcudiente::ListarAcudiente();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloAcudiente::BuscarAcudiente($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloAcudiente::EliminarAcudiente($id);
            return $objELIM;
        }
    }
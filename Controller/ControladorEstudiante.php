<?php
    class ControladorEstudiante{
        public static function CtrlCrear($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento,$Curso){
            $objCREARM = ModeloEstudiante::CrearEstudiante($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento,$Curso);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento,$Curso){
            $objEDITM = ModeloEstudiante::EditarEstudiante($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento,$Curso);
            return $objEDITM; //lo retorna en false.
        }
        public static function CtrlListar(){
            $objLISTM = ModeloEstudiante::ListarEstudiante();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloEstudiante::BuscarEstudiante($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloEstudiante::EliminarEstudiante($id);
            return $objELIM;
        }
    }
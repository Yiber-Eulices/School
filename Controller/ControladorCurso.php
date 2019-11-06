<?php
    class ControladorCurso{
        public static function CtrlCrear($nombre,$anio,$grado,$profesor){
            $objCREARM = ModeloCurso::CrearCurso($nombre,$anio,$grado,$profesor);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$nombre,$anio,$grado,$profesor){
            $objEDITM = ModeloCurso::EditarCurso($id,$nombre,$anio,$grado,$profesor);
            return $objEDITM; 
        }
        public static function CtrlListar(){
            $objLISTM = ModeloCurso::ListarCurso();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloCurso::BuscarCurso($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloCurso::EliminarCurso($id);
            return $objELIM;
        }
        public static function CtrlSesion($id){
            session_start();
            $objBUSCM = ModeloCurso::BuscarCurso($id);
            $_SESSION['CursoId'] = $objBUSCM["IdCurso"];
            $_SESSION['CursoNombre'] = $objBUSCM["Nombre"];
            return true;
        }
    }
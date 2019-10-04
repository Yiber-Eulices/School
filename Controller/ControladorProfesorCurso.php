<?php
    class ControladorProfesorCurso{
        public static function CtrlCrear($profesor,$curso){
            $objCREARM = ModeloProfesorCurso::CrearProfesorCurso($profesor,$curso);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$profesor,$curso){
            $objEDITM = ModeloProfesorCurso::EditarProfesorCurso($id,$profesor,$curso);
            return $objEDITM; 
        }
        public static function CtrlListar(){
            $objLISTM = ModeloProfesorCurso::ListarProfesorCurso();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloProfesorCurso::BuscarProfesorCurso($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloProfesorCurso::EliminarProfesorCurso($id);
            return $objELIM;
            
        }
    }
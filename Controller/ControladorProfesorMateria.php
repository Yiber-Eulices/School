<?php
    class ControladorProfesorMateria{
        public static function CtrlCrear($profesor,$materia){
            $objCREARM = ModeloProfesorMateria::CrearProfesorMateria($profesor,$materia);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$profesor,$materia){
            $objEDITM = ModeloProfesorMateria::EditarProfesorMateria($id,$profesor,$materia);
            return $objEDITM; 
        }
        public static function CtrlListar(){
            $objLISTM = ModeloProfesorMateria::ListarProfesorMateria();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloProfesorMateria::BuscarProfesorMateria($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloProfesorMateria::EliminarProfesorMateria($id);
            return $objELIM;
            
        }
    }
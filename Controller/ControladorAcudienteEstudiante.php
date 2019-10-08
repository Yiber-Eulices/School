<?php
    class ControladorAcudienteEstudiante{
        public static function CtrlCrear($estudiante,$acudiente){
            $objCREARM = ModeloAcudienteEstudiante::CrearAcudienteEstudiante($estudiante,$acudiente);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$estudiante,$acudiente){
            $objEDITM = ModeloAcudienteEstudiante::EditarAcudienteEstudiante($id,$estudiante,$acudiente);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloAcudienteEstudiante::ListarAcudienteEstudiante();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloAcudienteEstudiante::BuscarAcudienteEstudiante($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloAcudienteEstudiante::EliminarAcudienteEstudiante($id);
            return $objELIM;
        }
    }
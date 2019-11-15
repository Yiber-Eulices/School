<?php
    class ControladorCalificacion{
        public static function CtrlCrear($periodo,$notaAcumulativa,$notaComportamental,$evaluacion,$autoevaluacion,$materiaIdMateria,$estudianteIdEstudiante){
            $objCREARM = ModeloCalificacion::CrearCalificacion($periodo,$notaAcumulativa,$notaComportamental,$evaluacion,$autoevaluacion,$materiaIdMateria,$estudianteIdEstudiante);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$periodo,$notaAcumulativa,$notaComportamental,$evaluacion,$autoevaluacion,$materiaIdMateria,$estudianteIdEstudiante){
            $objEDITM = ModeloCalificacion::EditarCalificacion($id,$periodo,$notaAcumulativa,$notaComportamental,$evaluacion,$autoevaluacion,$materiaIdMateria,$estudianteIdEstudiante);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloCalificacion::ListarCalificacion();
            return $objLISTM;
        }
        public static function CtrlListarProfesor(){
            $objLISTM = ModeloCalificacion::ListarCalificacionProfesor();
            return $objLISTM;
        }
        public static function CtrlListarEstudiante(){
            $objLISTM = ModeloCalificacion::ListarCalificacionEstudiante();
            return $objLISTM;
        }
        public static function CtrlListarAcudiente(){
            $objLISTM = ModeloCalificacion::ListarCalificacionAcudiente();
            return $objLISTM;
        }
        public static function CtrlListarBoletin($id,$periodo){
            $objLISTM = ModeloCalificacion::ListarCalificacionBoletin($id,$periodo);
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloCalificacion::BuscarCalificacion($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloCalificacion::EliminarCalificacion($id);
            return $objELIM;
        }
    }
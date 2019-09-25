<?php
    class ControladorAlerta{
        public static function CtrlCrear($rolPersona,$idPersona,$fecha,$titulo,$mensaje,$estado){
            $objCREARM = ModeloAlerta::CrearAlerta($rolPersona,$idPersona,$fecha,$titulo,$mensaje,$estado);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$rolPersona,$idPersona,$fecha,$titulo,$mensaje,$estado){
            $objEDITM = ModeloAlerta::EditarAlerta($id,$rolPersona,$idPersona,$fecha,$titulo,$mensaje,$estado);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloAlerta::ListarAlerta();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloAlerta::BuscarAlerta($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloAlerta::EliminarAlerta($id);
            return $objELIM;
        }
    }
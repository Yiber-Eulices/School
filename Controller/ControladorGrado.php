<?php
    class ControladorGrado{
        public static function CtrlCrear($nivel){
            $objCREARM = ModeloGrado::CrearGrado($nivel);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$nivel){
            $objEDITM = ModeloGrado::EditarGrado($id,$nivel);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloGrado::ListarGrado();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloGrado::BuscarGrado($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloGrado::EliminarGrado($id);
            return $objELIM;
        }
    }
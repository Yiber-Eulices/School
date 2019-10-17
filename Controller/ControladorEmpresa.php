<?php
    class ControladorEmpresa{
        public static function CtrlCrear($mision,$vision,$somos){
            $objCREARM = ModeloEmpresa::CrearEmpresa($mision,$vision,$somos);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$mision,$vision,$somos){
            $objEDITM = ModeloEmpresa::EditarEmpresa($id,$mision,$vision,$somos);
            return $objEDITM; 
        }
        public static function CtrlListar(){
            $objLISTM = ModeloEmpresa::ListarEmpresa();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloEmpresa::BuscarEmpresa($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloEmpresa::EliminarEmpresa($id);
            return $objELIM;
        }
    }
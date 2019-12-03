<?php
    require_once "ControladorVerificar.php";
    class ControladorDirectivo{
        public static function CtrlCrear($nombre,$cargo,$correo,$telefono){
            $objCREARM = ModeloDirectivo::CrearDirectivo($nombre,$cargo,$correo,$telefono);
            $objVERIFICARCORREO = ControladorVerificar::CtrlValidarCorreo($correo);
            if($objVERIFICARCORREO != true){
                return "El Correo Ingresado '".$correo."' no Existe, por Favor Ingrese un Correo Electronico Existente.";
            }
            $objVERIFICARTELEFONO = ControladorVerificar::CtrlValidarTelefono($telefono);
            if($objVERIFICARTELEFONO != true){
                return "El Telefono Ingresado '".$telefono."' no Existe en Colombia, por favor Ingrese un Numero Telefonico Existente.";
            }
            return $objCREARM;
        }
        public static function CtrlEditar($id,$nombre,$cargo,$correo,$telefono){
            $objVERIFICARCORREO = ControladorVerificar::CtrlValidarCorreo($correo);
            if($objVERIFICARCORREO != true){
                return "El Correo Ingresado '".$correo."' no Existe, por Favor Ingrese un Correo Electronico Existente.";
            }
            $objVERIFICARTELEFONO = ControladorVerificar::CtrlValidarTelefono($telefono);
            if($objVERIFICARTELEFONO != true){
                return "El Telefono Ingresado '".$telefono."' no Existe en Colombia, por favor Ingrese un Numero Telefonico Existente.";
            }
            $objEDITM = ModeloDirectivo::EditarDirectivo($id,$nombre,$cargo,$correo,$telefono);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloDirectivo::ListarDirectivo();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloDirectivo::BuscarDirectivo($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloDirectivo::EliminarDirectivo($id);
            return $objELIM;
        }
    }
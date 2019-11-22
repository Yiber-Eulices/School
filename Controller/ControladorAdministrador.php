<?php
    require_once "ControladorVerificar.php";
    class ControladorAdministrador{
        public static function CtrlCrear($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $objBUSCMDOCUMENTO = ModeloAdministrador::BuscarDocumentoAdministrador($documento);
            if($documento==$objBUSCMDOCUMENTO["Documento"]){
                return "El Documento de Identifiacacion Ingresado ya esta Registardo por favor Ingrese otro Documento de Identifiacacion.";
            }
            $objBUSCMCORREO = ModeloAdministrador::BuscarCorreoAdministrador($correo);
            if($correo==$objBUSCMCORREO["Correo"]){
                return "El Correo Ingresado ya esta Registardo por favor Ingrese otro Correo.";
            }
            $objVERIFICARCORREO = ControladorVerificar::CtrlValidarCorreo($correo);
            if($objVERIFICARCORREO != true){
                return "El Correo Ingresado no Existe, por Favor Ingrese un Correo Electronico Existente.";
            }
            $objVERIFICARTELEFONO = ControladorVerificar::CtrlValidarTelefono($telefono);
            if($objVERIFICARTELEFONO != true){
                return "El Telefono Ingresado no Existe en Colombia, por favor Ingrese un Numero Telefonico Existente.";
            }
            $passwordHash =  password_hash($password, PASSWORD_DEFAULT);
            $objCREARM = ModeloAdministrador::CrearAdministrador($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$passwordHash,$telefono,$foto,$fechaNacimiento);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $objBUSCMDOCUMENTO = ModeloAdministrador::BuscarDocumentoAdministrador($documento);
            if($objBUSCMDOCUMENTO["IdAdministrador"]!=$id && $documento==$objBUSCMDOCUMENTO["Documento"]){
                return "El Documento de Identifiacacion Ingresado ya esta Registardo por favor Ingrese otro Documento de Identifiacacion.";
            }
            $objBUSCMCORREO = ModeloAdministrador::BuscarCorreoAdministrador($correo);
            if($objBUSCMCORREO["IdAdministrador"]!=$id && $correo==$objBUSCMCORREO["Correo"]){
                return "El Correo Ingresado ya esta Registardo por favor Ingrese otro Correo.";
            }
            $objVERIFICARCORREO = ControladorVerificar::CtrlValidarCorreo($correo);
            if($objVERIFICARCORREO != true){
                return "El Correo Ingresado no Existe, por Favor Ingrese un Correo Electronico Existente.";
            }
            $objVERIFICARTELEFONO = ControladorVerificar::CtrlValidarTelefono($telefono);
            if($objVERIFICARTELEFONO != true){
                return "El Telefono Ingresado no Existe en Colombia, por favor Ingrese un Numero Telefonico Existente.";
            }
            $objBUSCM = ModeloAdministrador::BuscarAdministrador($id);
            if($foto == null || $foto =="null"){
                $foto = $objBUSCM["Foto"];
            }
            $passwordHash =  "";
            if($password == null || $password =="null"){
                $passwordHash = $objBUSCM["Password"];
            }else{
                $passwordHash =  password_hash($password, PASSWORD_DEFAULT);
            }
            $objEDITM = ModeloAdministrador::EditarAdministrador($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$passwordHash,$telefono,$foto,$fechaNacimiento);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloAdministrador::ListarAdministrador();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloAdministrador::BuscarAdministrador($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloAdministrador::EliminarAdministrador($id);
            return $objELIM;
        }
    }
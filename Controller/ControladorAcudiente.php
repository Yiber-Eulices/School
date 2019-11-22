<?php
    require_once "ControladorVerificar.php";
    class ControladorAcudiente{
        public static function CtrlCrear($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $objBUSCMDOCUMENTO = ModeloAcudiente::BuscarDocumentoAcudiente($documento);
            if($documento==$objBUSCMDOCUMENTO["Documento"]){
                return "El Documento de Identifiacacion Ingresado ya esta Registardo por favor Ingrese otro Documento de Identifiacacion.";
            }
            $objBUSCMCORREO = ModeloAcudiente::BuscarCorreoAcudiente($correo);
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
            $objCREARM = ModeloAcudiente::CrearAcudiente($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$passwordHash,$telefono,$foto,$fechaNacimiento);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $objBUSCMDOCUMENTO = ModeloAcudiente::BuscarDocumentoAcudiente($documento);
            if($objBUSCMDOCUMENTO["IdAcudiente"]!=$id && $documento==$objBUSCMDOCUMENTO["Documento"]){
                return "El Documento de Identifiacacion Ingresado ya esta Registardo por favor Ingrese otro Documento de Identifiacacion.";
            }
            $objBUSCMCORREO = ModeloAcudiente::BuscarCorreoAcudiente($correo);
            if($objBUSCMCORREO["IdAcudiente"]!=$id && $correo==$objBUSCMCORREO["Correo"]){
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
            $objBUSCM = ModeloAcudiente::BuscarAcudiente($id);
            if($foto == null || $foto =="null"){
                $foto = $objBUSCM["Foto"];
            }
            $passwordHash =  "";
            if($password == null || $password =="null"){
                $passwordHash = $objBUSCM["Password"];
            }else{
                $passwordHash =  password_hash($password, PASSWORD_DEFAULT);
            }
            $objEDITM = ModeloAcudiente::EditarAcudiente($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$passwordHash,$telefono,$foto,$fechaNacimiento);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloAcudiente::ListarAcudiente();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloAcudiente::BuscarAcudiente($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloAcudiente::EliminarAcudiente($id);
            return $objELIM;
        }
        public static function CtrlSesion($id){
            session_start();
            $objBUSCM = ModeloAcudiente::BuscarAcudiente($id);
            $_SESSION['AcudienteId'] = $objBUSCM["IdAcudiente"];
            $_SESSION['AcudienteNombre'] = $objBUSCM["Nombre"]." ".$objBUSCM["Apellido"];
            return true;
        }
    }
<?php
    require_once "ControladorVerificar.php";
    require_once "../Model/ModeloAcudiente.php";
    require_once "../Model/ModeloAdministrador.php";
    require_once "../Model/ModeloEstudiante.php";
    require_once "../Model/ModeloProfesor.php";
    class ControladorLogin{
        public static function CtrlLogin($rol,$user,$password){
            $objLOGINM = ModeloLogin::Login($rol,$user,$password);
            return $objLOGINM;
        }
        public static function CtrlProfile(){
            $rol = $_SESSION['UserRol'];
            $id = $_SESSION['UserId'];
            $objLOGINM = ModeloLogin::Profile($rol,$id);
            return $objLOGINM;
        }
        public static function CtrlEditar($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $rol = $_SESSION['UserRol'];
            $id = $_SESSION['UserId'];
            $objBUSCMDOCUMENTO = '';
            $objBUSCMCORREO =  '';
            $objBUSCM = '';
            if($rol=='Acudiente'){
                $objBUSCMDOCUMENTO = ModeloAcudiente::BuscarDocumentoAcudiente($documento);
                $objBUSCMCORREO = ModeloAcudiente::BuscarCorreoAcudiente($correo);
                $objBUSCM = ModeloAcudiente::BuscarAcudiente($id);
            }else if($rol=='Estudiante'){
                $objBUSCMDOCUMENTO = ModeloEstudiante::BuscarDocumentoEstudiante($documento);
                $objBUSCMCORREO = ModeloEstudiante::BuscarCorreoEstudiante($correo);
                $objBUSCM = ModeloEstudiante::BuscarEstudiante($id);
            }else if($rol=='Profesor'){
                $objBUSCMDOCUMENTO = ModeloProfesor::BuscarDocumentoProfesor($documento);
                $objBUSCMCORREO = ModeloProfesor::BuscarCorreoProfesor($correo);
                $objBUSCM = ModeloProfesor::BuscarProfesor($id);
            }else if($rol=='Administrador'){
                $objBUSCMDOCUMENTO = ModeloAdministrador::BuscarDocumentoAdministrador($documento);
                $objBUSCMCORREO = ModeloAdministrador::BuscarCorreoAdministrador($correo);
                $objBUSCM = ModeloAdministrador::BuscarAdministrador($id);
            }
            if($objBUSCMDOCUMENTO["Id".$rol]!=$id && $documento==$objBUSCMDOCUMENTO["Documento"]){
                return "El Documento de Identifiacacion Ingresado '"+$documento+"' ya esta Registardo por favor Ingrese otro Documento de Identifiacacion.";
            }
            $objBUSCMCORREO = ModeloEstudiante::BuscarCorreoEstudiante($correo);
            if($objBUSCMCORREO["Id".$rol]!=$id && $correo==$objBUSCMCORREO["Correo"]){
                return "El Correo Ingresado '".$correo."' ya esta Registardo por favor Ingrese otro Correo.";
            }
            $objVERIFICARCORREO = ControladorVerificar::CtrlValidarCorreo($correo);
            if($objVERIFICARCORREO != true){
                return "El Correo Ingresado '".$correo."' no Existe, por Favor Ingrese un Correo Electronico Existente.";
            }
            $objVERIFICARTELEFONO = ControladorVerificar::CtrlValidarTelefono($telefono);
            if($objVERIFICARTELEFONO != true){
                return "El Telefono Ingresad '".$telefono."' no Existe en Colombia, por favor Ingrese un Numero Telefonico Existente.";
            }
            if($foto == null || $foto =="null"){
                $foto = $objBUSCM["Foto"];
            }
            $passwordHash =  "";
            if($password == null || $password =="null"){
                $passwordHash = $objBUSCM["Password"];
            }else{
                $passwordHash =  password_hash($password, PASSWORD_DEFAULT);
            }
            $objEDITM = ModeloLogin::EditProfile($rol,$id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$passwordHash,$telefono,$foto,$fechaNacimiento);
            return $objEDITM;
        }
        public static function CtrlRecuperar($rol,$user){
            $objLOGINM = ModeloLogin::Recover($rol,$user);
            return $objLOGINM;
        }
    }
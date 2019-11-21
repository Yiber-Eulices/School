<?php
    require_once "ControladorVerificar.php";
    class ControladorProfesor{
        public static function CtrlCrear($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $objBUSCMDOCUMENTO = ModeloProfesor::BuscarDocumentoProfesor($documento);
            if($documento==$objBUSCMDOCUMENTO["Documento"]){
                return "El Documento de Identifiacacion Ingresado ya esta Registardo por favor Ingrese otro Documento de Identifiacacion.";
            }
            $objBUSCMCORREO = ModeloProfesor::BuscarCorreoProfesor($correo);
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
            $objCREARM = ModeloProfesor::CrearProfesor($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$passwordHash,$telefono,$foto,$fechaNacimiento);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $objBUSCMDOCUMENTO = ModeloProfesor::BuscarDocumentoProfesor($documento);
            if($objBUSCMDOCUMENTO["IdProfesor"]!=$id && $documento==$objBUSCMDOCUMENTO["Documento"]){
                return "El Documento de Identifiacacion Ingresado ya esta Registardo por favor Ingrese otro Documento de Identifiacacion.";
            }
            $objBUSCMCORREO = ModeloProfesor::BuscarCorreoProfesor($correo);
            if($objBUSCMCORREO["IdProfesor"]!=$id && $correo==$objBUSCMCORREO["Correo"]){
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
            $objEDITM = ModeloProfesor::EditarProfesor($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$passwordHash,$telefono,$foto,$fechaNacimiento);
            return $objEDITM;
        }
        public static function CtrlListar(){
            $objLISTM = ModeloProfesor::ListarProfesor();
            return $objLISTM;
        }
        public static function CtrlListarMiCurso(){
            $objLISTM = ModeloProfesor::ListarMicurso();
            return $objLISTM;
        }
        public static function CtrlListarMiCursoDirector(){
            $objLISTM = ModeloProfesor::ListarMicursoDirector();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloProfesor::BuscarProfesor($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloProfesor::EliminarProfesor($id);
            return $objELIM;
        }
        public static function CtrlSesion($id){
            session_start();
            $objBUSCM = ModeloProfesor::BuscarProfesor($id);
            $_SESSION['ProfesorId'] = $objBUSCM["IdProfesor"];
            $_SESSION['ProfesorNombre'] = $objBUSCM["Nombre"]." ".$objBUSCM["Apellido"];
            return true;
        }
        public static function CtrlSessionCursoEstudiante($id){
            session_start();
            $objBUSCMPC = ModeloProfesorCurso::BuscarProfesorCurso($id);
            $objBUSCMM = ModeloMateria::BuscarMateria($objBUSCMPC["MateriaIdMateria"]);
            $objBUSCMC = ModeloCurso::BuscarCurso($objBUSCMPC["CursoIdCurso"]);
            $objBUSCMG = ModeloGrado::BuscarGrado($objBUSCMC["GradoIdGrado"]);
            $_SESSION['CalificarProfesorCursoId'] = $objBUSCMPC["IdProfesorCurso"];
            $_SESSION['CalificarMateriaId'] = $objBUSCMM["IdMateria"];
            $_SESSION['CalificarMateriaNombre'] = $objBUSCMM["Nombre"];
            $_SESSION['CalificarCursoId'] = $objBUSCMC["IdCurso"];
            $_SESSION['CalificarCursoNombre'] = $objBUSCMC["Nombre"];
            $_SESSION['CalificarGradoId'] = $objBUSCMG["IdGrado"];
            $_SESSION['CalificarGradoNombre'] = $objBUSCMG["Nivel"];
            return true;
        }
    }
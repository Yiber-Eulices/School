<?php
    class ControladorEstudiante{
        public static function CtrlCrear($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento,$Curso){
            $passwordHash =  password_hash($password, PASSWORD_DEFAULT);
            $objCREARM = ModeloEstudiante::CrearEstudiante($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$passwordHash,$telefono,$foto,$fechaNacimiento,$Curso);
            return $objCREARM;
        }
        public static function CtrlEditar($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento,$Curso){
            $passwordHash =  password_hash($password, PASSWORD_DEFAULT);
            $objEDITM = ModeloEstudiante::EditarEstudiante($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$passwordHash,$telefono,$foto,$fechaNacimiento,$Curso);
            return $objEDITM; //lo retorna en false.
        }
        public static function CtrlListar(){
            $objLISTM = ModeloEstudiante::ListarEstudiante();
            return $objLISTM;
        }
        public static function CtrlListarMisMaterias(){
            $objLISTM = ModeloEstudiante::ListarMiMaterias();
            return $objLISTM;
        }
        public static function CtrlListarMisMateriasAcudiente(){
            $objLISTM = ModeloEstudiante::ListarMiMateriasAcudiente();
            return $objLISTM;
        }
        public static function CtrlListarProfesor(){
            $objLISTM = ModeloEstudiante::ListarProfesor();
            return $objLISTM;
        }
        public static function CtrlBuscar($id){
            $objBUSCM = ModeloEstudiante::BuscarEstudiante($id);
            return $objBUSCM;
        }
        public static function CtrlEliminar($id){
            $objELIM = ModeloEstudiante::EliminarEstudiante($id);
            return $objELIM;
        }
        public static function CtrlSesion($id){
            session_start();
            $objBUSCM = ModeloEstudiante::BuscarEstudiante($id);
            $_SESSION['EstudianteId'] = $objBUSCM["IdEstudiante"];
            $_SESSION['EstudianteNombre'] = $objBUSCM["Nombre"]." ".$objBUSCM["Apellido"];
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
<?php
    require_once "Conexion.php";
    class ModeloCalificacion{
        public static function CrearCalificacion($periodo,$notaAcumulativa,$notaComportamental,$evaluacion,$autoevaluacion,$materiaIdMateria,$estudianteIdEstudiante){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO Calificacion (Periodo,NotaAcumulativa,NotaComportamental,Evaluacion,AutoEvaluacion,MateriaIdMateria,EstudianteIdEstudiante) VALUES (:Periodo,:NotaAcumulativa,:NotaComportamental,:Evaluacion,:AutoEvaluacion,:MateriaIdMateria,:EstudianteIdEstudiante)");
            $oBJEC_DATA_INSERT  -> bindParam(":Periodo",$periodo, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":NotaAcumulativa",$notaAcumulativa, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":NotaComportamental",$notaComportamental, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":Evaluacion",$evaluacion, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":AutoEvaluacion",$autoevaluacion, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":MateriaIdMateria",$materiaIdMateria, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":EstudianteIdEstudiante",$estudianteIdEstudiante, PDO::PARAM_STR);

            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarCalificacion($id,$periodo,$notaAcumulativa,$notaComportamental,$evaluacion,$autoevaluacion,$materiaIdMateria,$estudianteIdEstudiante){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE Calificacion  SET Periodo = :Periodo,NotaAcumulativa = :NotaAcumulativa,NotaComportamental = :NotaComportamental,Evaluacion = :Evaluacion,AutoEvaluacion = :AutoEvaluacion,MateriaIdMateria = :MateriaIdMateria,EstudianteIdEstudiante = :EstudianteIdEstudiante WHERE IdCalificacion = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":Periodo",$periodo, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":NotaAcumulativa",$notaAcumulativa, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":NotaComportamental",$notaComportamental, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":Evaluacion",$evaluacion, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":AutoEvaluacion",$autoevaluacion, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":MateriaIdMateria",$materiaIdMateria, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":EstudianteIdEstudiante",$estudianteIdEstudiante, PDO::PARAM_STR);

            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarCalificacion(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT c.IdCalificacion,e.Nombre AS NombreEstudiante,e.Apellido AS Apellido,m.Nombre AS NombreMateria,c.Periodo,c.NotaAcumulativa,c.NotaComportamental,c.Evaluacion,c.AutoEvaluacion,( (c.NotaAcumulativa*0.6)+(c.NotaComportamental*0.2)+(c.Evaluacion*0.1)+(c.AutoEvaluacion*0.1)) AS Promedio FROM Calificacion c INNER JOIN Materia m ON c.MateriaIdMateria=m.IdMateria INNER JOIN Estudiante e ON c.EstudianteIdEstudiante=e.IdEstudiante");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST->fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function ListarCalificacionEstudiante(){
            session_start();
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT c.IdCalificacion,c.Periodo,c.NotaAcumulativa,c.NotaComportamental,c.Evaluacion,c.AutoEvaluacion,( (c.NotaAcumulativa*0.6)+(c.NotaComportamental*0.2)+(c.Evaluacion*0.1)+(c.AutoEvaluacion*0.1)) AS Promedio FROM Calificacion c INNER JOIN profesorcurso pc ON c.MateriaIdMateria = pc.IdProfesorCurso INNER JOIN curso cr ON pc.CursoIdCurso = cr.IdCurso INNER JOIN estudiante e ON cr.IdCurso = e.CursoIdCurso WHERE e.IdEstudiante = :id AND IdProfesorCurso =:idProfesorCurso");
            $oBJEC_DATA_LIST  -> bindParam(":id",$_SESSION["UserId"], PDO::PARAM_INT);
            $oBJEC_DATA_LIST  -> bindParam(":idProfesorCurso",$_SESSION["CalificarProfesorCursoId"], PDO::PARAM_INT);
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST->fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function ListarCalificacionAcudiente(){
            session_start();
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT DISTINCT c.IdCalificacion,c.Periodo,c.NotaAcumulativa,c.NotaComportamental,c.Evaluacion,c.AutoEvaluacion,( (c.NotaAcumulativa*0.6)+(c.NotaComportamental*0.2)+(c.Evaluacion*0.1)+(c.AutoEvaluacion*0.1)) AS Promedio FROM Calificacion c INNER JOIN profesorcurso pc ON c.MateriaIdMateria = pc.IdProfesorCurso INNER JOIN curso cr ON pc.CursoIdCurso = cr.IdCurso INNER JOIN estudiante e ON cr.IdCurso = e.CursoIdCurso WHERE c.EstudianteIdEstudiante = :id AND IdProfesorCurso =:idProfesorCurso");
            $oBJEC_DATA_LIST  -> bindParam(":id",$_SESSION["EstudianteId"], PDO::PARAM_INT);
            $oBJEC_DATA_LIST  -> bindParam(":idProfesorCurso",$_SESSION["CalificarProfesorCursoId"], PDO::PARAM_INT);
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST->fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function ListarCalificacionProfesor(){
            session_start();
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT DISTINCT c.IdCalificacion,c.Periodo,c.NotaAcumulativa,c.NotaComportamental,c.Evaluacion,c.AutoEvaluacion,( (c.NotaAcumulativa*0.6)+(c.NotaComportamental*0.2)+(c.Evaluacion*0.1)+(c.AutoEvaluacion*0.1)) AS Promedio FROM Calificacion c INNER JOIN profesorcurso pc ON c.MateriaIdMateria = pc.IdProfesorCurso INNER JOIN curso cr ON pc.CursoIdCurso = cr.IdCurso INNER JOIN estudiante e ON cr.IdCurso = e.CursoIdCurso WHERE c.EstudianteIdEstudiante = :id AND IdProfesorCurso =:idProfesorCurso");
            $oBJEC_DATA_LIST  -> bindParam(":id",$_SESSION["EstudianteId"], PDO::PARAM_INT);
            $oBJEC_DATA_LIST  -> bindParam(":idProfesorCurso",$_SESSION["CalificarProfesorCursoId"], PDO::PARAM_INT);
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST->fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarCalificacion($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Calificacion WHERE IdCalificacion = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarCalificacion($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM Calificacion WHERE IdCalificacion = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
        public static function ListarCalificacionBoletin($id,$periodo){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT p.*,m.Nombre AS NombreMateria ,m.Descripcion,c.IdCalificacion,c.Periodo,c.NotaAcumulativa,c.NotaComportamental,c.Evaluacion,c.AutoEvaluacion,( (c.NotaAcumulativa*0.6)+(c.NotaComportamental*0.2)+(c.Evaluacion*0.1)+(c.AutoEvaluacion*0.1)) AS Promedio FROM Calificacion c INNER JOIN profesorcurso pc ON c.MateriaIdMateria = pc.IdProfesorCurso INNER JOIN curso cr ON pc.CursoIdCurso = cr.IdCurso INNER JOIN estudiante e ON cr.IdCurso = e.CursoIdCurso INNER JOIN materia m ON m.IdMateria = pc.MateriaIdMateria INNER JOIN profesor p ON p.IdProfesor = pc.ProfesorIdProfesor WHERE e.IdEstudiante = :id AND c.Periodo = :periodo");
            $oBJEC_DATA_LIST  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_LIST  -> bindParam(":periodo",$periodo, PDO::PARAM_INT);
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST->fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        
    }
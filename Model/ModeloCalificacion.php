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
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM Calificacion");
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
    }
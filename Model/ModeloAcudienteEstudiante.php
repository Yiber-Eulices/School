<?php
    require_once "Conexion.php";
    class ModeloAcudienteEstudiante{
        public static function CrearAcudienteEstudiante($estudiante,$acudiente){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO acudienteestudiante (EstudianteIdEstudiante,AcudienteIdAcudiente) VALUES (:estudiante,:acudiente)");
            $oBJEC_DATA_INSERT  -> bindParam(":estudiante",$estudiante, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":acudiente",$acudiente, PDO::PARAM_STR);

            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarAcudienteEstudiante($id,$estudiente,$acudiente){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE acudienteestudiante  SET EstudianteIdEstudiante = :estudiante,AcudienteIdAcudiente=:acudiente WHERE IdAcudienteEstudiante = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":estudiante",$estudiante, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":acudiente",$acudiente, PDO::PARAM_STR);

            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarAcudienteEstudiante(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM acudienteestudiante");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarAcudienteEstudiante($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM acudienteestudiante WHERE IdAcudienteEstudiante = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarAcudienteEstudiante($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM acudienteestudiante WHERE IdAcudienteEstudiante = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
<?php
    require_once "Conexion.php";
    class ModeloMatricula{
        public static function CrearMatricula($fecha,$costo,$grado,$estudiante){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO matricula (Fecha,Costo,GradoIdGrado,EstudianteIdEstudiante) VALUES (:fecha,:costo,:grado,:estudiante)");
            $oBJEC_DATA_INSERT  -> bindParam(":fecha",$fecha, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":costo",$costo, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":grado",$grado, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":estudiante",$estudiante, PDO::PARAM_STR);
           
            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarMatricula($id,$fecha,$costo,$grado,$estudiante){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE matricula  SET Fecha = :fecha,Costo = :costo,GradoIdGrado = :grado,EstudianteIdEstudiante = :estudiante WHERE IdMatricula = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":fecha",$fecha, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":costo",$costo, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":grado",$grado, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":estudiante",$estudiante, PDO::PARAM_STR);
            
            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarMatricula(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM matricula");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarMatricula($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM matricula WHERE IdMatricula = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarMatricula($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM matricula WHERE IdMatricula = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
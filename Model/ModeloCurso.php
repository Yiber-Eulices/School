<?php
    require_once "Conexion.php";
    class ModeloCurso{
        public static function CrearCurso($nombre,$anio,$grado,$profesor){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO Curso (Nombre,Anio,GradoIdGrado,ProfesorIdProfesor) VALUES (:nombre,:anio,:grado,:profesor)");
            $oBJEC_DATA_INSERT  -> bindParam(":nombre",$nombre, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":anio",$anio, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":grado",$grado, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":profesor",$profesor, PDO::PARAM_STR);
           
            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarCurso($id,$nombre,$anio,$grado,$profesor){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE Curso  SET Nombre = :nombre,Anio = :anio,GradoIdGrado = :grado,ProfesorIdProfesor = :profesor WHERE IdCurso = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":nombre",$nombre, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":anio",$anio, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":grado",$grado, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":profesor",$profesor, PDO::PARAM_STR);
            
            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarCurso(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM Curso");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarCurso($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Curso WHERE IdCurso = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarCurso($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM Curso WHERE IdCurso = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
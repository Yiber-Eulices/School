<?php
    require_once "Conexion.php";
    class ModeloProfesorCurso{
        public static function CrearProfesorCurso($profesor,$curso){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO profesorcurso (ProfesorIdProfesor,CursoIdCurso) VALUES (:profesor,:curso)");
            $oBJEC_DATA_INSERT  -> bindParam(":profesor",$profesor, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":curso",$curso, PDO::PARAM_STR);
           
            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarProfesorCurso($id,$profesor,$curso){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE profesorcurso  SET ProfesorIdProfesor = :profesor,CursoIdCurso = :curso WHERE IdProfesorCurso = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":profesor",$profesor, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":curso",$curso, PDO::PARAM_STR);
            
            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarProfesorCurso(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM profesorcurso");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarProfesorCurso($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM profesorcurso WHERE IdProfesorCurso = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarProfesorCurso($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM profesorcurso WHERE IdProfesorCurso = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
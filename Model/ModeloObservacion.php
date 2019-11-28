<?php
    require_once "Conexion.php";
    session_start();
    class ModeloObservacion{
        public static function CrearObservacion($fecha,$gravedad,$descripcion,$compromiso,$estudiante,$profesor){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO observacion (Fecha,Gravedad,Descripcion,Compromiso,EstudianteIdEstudiante,ProfesorIdProfesor) VALUES (:fecha,:gravedad,:descripcion,:compromiso,:estudiante,:profesor)");
            $oBJEC_DATA_INSERT  -> bindParam(":fecha",$fecha, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":gravedad",$gravedad, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":descripcion",$descripcion, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":compromiso",$compromiso, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":estudiante",$estudiante, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":profesor",$profesor, PDO::PARAM_STR);
            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarObservacion($id,$fecha,$gravedad,$descripcion,$compromiso,$estudiante,$profesor){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE observacion  SET Fecha = :fecha,Gravedad = :gravedad,Descripcion = :descripcion,Compromiso = :compromiso,EstudianteIdEstudiante = :estudiante,ProfesorIdProfesor = :profesor WHERE IdObservacion = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":fecha",$fecha, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":gravedad",$gravedad, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":descripcion",$descripcion, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":compromiso",$compromiso, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":estudiante",$estudiante, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":profesor",$profesor, PDO::PARAM_STR);
            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarObservacion(){
            $id;
            if($_SESSION['UserRol']=="Estudiante"){
                $id = $_SESSION["UserId"];
            }else{
                $id = $_SESSION["EstudianteId"];
            }
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM observacion o INNER JOIN Profesor p ON p.IdProfesor=o.ProfesorIdProfesor WHERE o.EstudianteIdEstudiante=:idEstudiante");
            $oBJEC_DATA_LIST ->bindParam(":idEstudiante",$id, PDO::PARAM_INT);
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarObservacion($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM observacion WHERE IdObservacion = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarObservacion($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM observacion WHERE IdObservacion = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
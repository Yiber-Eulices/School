<?php
    require_once "Conexion.php";
    class ModeloMateria{
        public static function CrearMateria($nombre,$descripcion){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO Materia (Nombre,Descripcion) VALUES (:nombre,:descripcion)");
            $oBJEC_DATA_INSERT  -> bindParam(":nombre",$nombre, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":descripcion",$descripcion, PDO::PARAM_STR);
           
            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarMateria($id,$nombre,$descripcion){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE materia  SET Nombre = :nombre,Descripcion = :descripcion WHERE IdMateria = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":nombre",$nombre, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":descripcion",$descripcion, PDO::PARAM_STR);
            
            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarMateria(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM Materia");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarMateria($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Materia WHERE IdMateria = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarMateria($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM Materia WHERE IdMateria = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
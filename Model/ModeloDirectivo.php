<?php
    require_once "Conexion.php";
    class ModeloDirectivo{
        public static function CrearDirectivo($nombre,$cargo,$correo,$telefono){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO Directivo (Nombre,Cargo,Correo,Telefono) VALUES (:nombre,:cargo,:correo,:telefono)");
            $oBJEC_DATA_INSERT  -> bindParam(":nombre",$nombre, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":cargo",$cargo, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":correo",$correo, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":telefono",$telefono, PDO::PARAM_STR);

            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarDirectivo($id,$nombre,$cargo,$correo,$telefono){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE Directivo  SET Nombre = :nombre,Cargo = :cargo,Correo = :correo,Telefono = :telefono WHERE IdDirectivo = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":nombre",$nombre, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":cargo",$cargo, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":correo",$correo, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":telefono",$telefono, PDO::PARAM_STR);

            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarDirectivo(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM Directivo");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarDirectivo($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Directivo WHERE IdDirectivo = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarDirectivo($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM Directivo WHERE IdDirectivo = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
        public static function BuscarCorreoDirectivo($correo){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Directivo WHERE Correo = :correo");
            $oBJEC_DATA_SEARCH  -> bindParam(":correo",$correo, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function BuscarTelefonoDirectivo($telefono){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Directivo WHERE Telefono = :telefono");
            $oBJEC_DATA_SEARCH  -> bindParam(":telefono",$telefono, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
    }
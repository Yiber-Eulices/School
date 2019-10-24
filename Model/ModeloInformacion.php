<?php
    require_once "Conexion.php";
    class ModeloInformacion{
        public static function CrearInformacion($descripcion,$ubicacion,$correo,$telefono){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO informacion (Descripcion,Ubicacion,Correo,Telefono) VALUES (:descripcion,:ubicacion,:correo,:telefono)");
            $oBJEC_DATA_INSERT  -> bindParam(":descripcion",$descripcion, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":ubicacion",$ubicacion, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":correo",$correo, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":telefono",$telefono, PDO::PARAM_STR);
           
            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarInformacion($id,$descripcion,$ubicacion,$correo,$telefono){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE informacion  SET Descripcion = :descripcion,Ubicacion = :ubicacion,Correo = :correo,Telefono = :telefono WHERE IdInformacion = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":descripcion",$descripcion, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":ubicacion",$ubicacion, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":correo",$correo, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":telefono",$telefono, PDO::PARAM_STR);
            
            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarInformacion(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM informacion");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarInformacion($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM informacion WHERE IdInformacion = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarInformacion($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM informacion WHERE IdInformacion = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
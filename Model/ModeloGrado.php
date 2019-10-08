<?php
    require_once "Conexion.php";
    class ModeloGrado{
        public static function CrearGrado($nivel){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO Grado (Nivel) VALUES (:nivel)");
            $oBJEC_DATA_INSERT  -> bindParam(":nivel",$nivel, PDO::PARAM_STR);

            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarGrado($id,$nivel){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE Grado  SET Nivel = :nivel WHERE IdGrado = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":nivel",$nivel, PDO::PARAM_STR);

            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarGrado(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM Grado");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarGrado($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Grado WHERE IdGrado = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarGrado($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM Grado WHERE IdGrado = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
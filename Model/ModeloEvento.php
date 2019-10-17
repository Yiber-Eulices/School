<?php
    require_once "Conexion.php";
    class ModeloEvento{
        public static function CrearEvento($fecha,$titulo,$descripcion,$foto){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO Evento (Fecha,Titulo,Descripcion,Foto) VALUES (:fecha,:titulo,:descripcion,:foto)");
            $oBJEC_DATA_INSERT  -> bindParam(":fecha",$fecha, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":titulo",$titulo, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":descripcion",$descripcion, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":foto",$foto, PDO::PARAM_STR);

            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarEvento($id,$fecha,$titulo,$descripcion,$foto){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE Evento  SET Fecha = :fecha,Titulo = :titulo,Descripcion = :descripcion,Foto = :foto WHERE IdEvento = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":fecha",$fecha, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":titulo",$titulo, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":descripcion",$descripcion, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":foto",$foto, PDO::PARAM_STR);

            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarEvento(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM Evento");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarEvento($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Evento WHERE IdEvento = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarEvento($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM Evento WHERE IdEvento = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
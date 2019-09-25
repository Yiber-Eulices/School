<?php
    require_once "Conexion.php";
    class ModeloAlerta{
        public static function CrearAlerta($rolPersona,$idPersona,$fecha,$titulo,$mensaje,$estado){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO Alerta (RolPersona,IdPersona,Fecha,Titulo,Mensage,Estado) VALUES (:RolPersona,:IdPersona,:Fecha,:Titulo,:Mensage,:Estado)");
            $oBJEC_DATA_INSERT  -> bindParam(":RolPersona",$rolPersona, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":IdPersona",$idPersona, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":Fecha",$fecha, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":Titulo",$titulo, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":Mensage",$mensaje, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":Estado",$estado, PDO::PARAM_STR);

            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarAlerta($id,$rolPersona,$idPersona,$fecha,$titulo,$mensaje,$estado){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE Alerta  SET RolPersona = :RolPersona,IdPersona = :IdPersona,Fecha = :Fecha,Titulo = :Titulo,Mensage = :Mensage,Estado = :Estado WHERE IdAlerta = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":RolPersona",$rolPersona, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":IdPersona",$idPersona, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":Fecha",$fecha, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":Titulo",$titulo, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":Mensage",$mensaje, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":Estado",$estado, PDO::PARAM_STR);

            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarAlerta(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM Alerta");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST->fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarAlerta($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Alerta WHERE IdAlerta = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarAlerta($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM Alerta WHERE IdAlerta = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
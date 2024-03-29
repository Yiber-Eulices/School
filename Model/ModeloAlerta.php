<?php
    require_once "Conexion.php";
    class ModeloAlerta{
        public static function CrearAlerta($rolPersona,$idPersona,$fecha,$titulo,$mensaje,$estado){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO Alerta (RolPersona,IdPersona,Fecha,Titulo,Mensaje,Estado) VALUES (:RolPersona,:IdPersona,:Fecha,:Titulo,:Mensaje,:Estado)");
            $oBJEC_DATA_INSERT  -> bindParam(":RolPersona",$rolPersona, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":IdPersona",$idPersona, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":Fecha",$fecha, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":Titulo",$titulo, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":Mensaje",$mensaje, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":Estado",$estado, PDO::PARAM_STR);

            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarAlerta($id,$rolPersona,$idPersona,$fecha,$titulo,$mensaje,$estado){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE Alerta  SET RolPersona = :RolPersona,IdPersona = :IdPersona,Fecha = :Fecha,Titulo = :Titulo,Mensaje = :Mensaje,Estado = :Estado WHERE IdAlerta = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":RolPersona",$rolPersona, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":IdPersona",$idPersona, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":Fecha",$fecha, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":Titulo",$titulo, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":Mensaje",$mensaje, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":Estado",$estado, PDO::PARAM_STR);

            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function EditarAlertaEstado($id,$estado){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE Alerta  SET Estado = :Estado WHERE IdAlerta = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":Estado",$estado, PDO::PARAM_STR);
            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarAlerta(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM Alerta");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST->fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function ListarMisAlertas($idPersona,$rolPersona){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM Alerta WHERE IdPersona = :IdPersona AND RolPersona = :RolPersona ORDER BY Fecha DESC");
            $oBJEC_DATA_LIST  -> bindParam(":IdPersona",$idPersona, PDO::PARAM_STR);
            $oBJEC_DATA_LIST  -> bindParam(":RolPersona",$rolPersona, PDO::PARAM_STR);
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
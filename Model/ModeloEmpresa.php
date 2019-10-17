<?php
    require_once "Conexion.php";
    class ModeloEmpresa{
        public static function CrearEmpresa($mision,$vision,$somos){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO empresa (Mision,Vision,QuienesSomos) VALUES (:mision,:vision,:somos)");
            $oBJEC_DATA_INSERT  -> bindParam(":mision",$mision, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":vision",$vision, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":somos",$somos, PDO::PARAM_STR);
           
            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarEmpresa($id,$mision,$vision,$somos){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE empresa  SET Mision = :mision,Vision = :vision,QuienesSomos = :somos WHERE IdEmpresa = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":mision",$mision, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":vision",$vision, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":somos",$somos, PDO::PARAM_STR);
            
            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarEmpresa(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM empresa");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarEmpresa($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM empresa WHERE IdEmpresa = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarEmpresa($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM empresa WHERE IdEmpresa = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
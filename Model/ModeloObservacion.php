<?php
    require_once "Conexion.php";
    class ModeloObservacion{
        public static function CrearObservacion($fecha,$gravedad,$descripcion,$compromiso,$estudiante,$profesor){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO Observacion (fecha,gravedad,descripcion,compromiso,estudiante,profesor,Password,Telefono,Foto,FechaNacimiento) VALUES (:fecha,:gravedad,:descripcion,:compromiso,:estudiante,:profesor,:password,:telefono,:foto,:fechaNacimiento)");
            $oBJEC_DATA_INSERT  -> bindParam(":fecha",$fecha, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":gravedad",$gravedad, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":descripcion",$descripcion, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":compromiso",$compromiso, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":estudiante",$estudiante, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":profesor",$profesor, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":password",$password, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":telefono",$telefono, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":foto",$foto, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":fechaNacimiento",$fechaNacimiento, PDO::PARAM_STR);

            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarObservacion($id,$fecha,$gravedad,$descripcion,$compromiso,$estudiante,$profesor,$password,$telefono,$foto,$fechaNacimiento){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE Observacion  SET fecha = :fecha,gravedad = :gravedad,descripcion = :descripcion,compromiso = :compromiso,estudiante = :estudiante,profesor = :profesor,Password = :password,Telefono = :telefono,Foto = :foto,FechaNacimiento = :fechaNacimiento WHERE IdObservacion = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":fecha",$fecha, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":gravedad",$gravedad, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":descripcion",$descripcion, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":compromiso",$compromiso, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":estudiante",$estudiante, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":profesor",$profesor, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":password",$password, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":telefono",$telefono, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":foto",$foto, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":fechaNacimiento",$fechaNacimiento, PDO::PARAM_STR);

            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarObservacion(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM Observacion o INNER JOIN Profesor p ON p.IdProfesor=o.ProfesorIdProfesor WHERE o.EstudianteIdEstudiante=:idEstudiante");
            $oBJEC_DATA_LIST ->bindParam(":idEstudiante",$_SESSION["EstudianteId"], PDO::PARAM_INT);
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarObservacion($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Observacion WHERE IdObservacion = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function BuscarprofesorObservacion($profesor){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Observacion WHERE profesor = :profesor");
            $oBJEC_DATA_SEARCH  -> bindParam(":profesor",$profesor, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function BuscarTelefonoObservacion($telefono){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Observacion WHERE Telefono = :telefono");
            $oBJEC_DATA_SEARCH  -> bindParam(":telefono",$telefono, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function BuscarcompromisoObservacion($compromiso){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Observacion WHERE compromiso = :compromiso");
            $oBJEC_DATA_SEARCH  -> bindParam(":compromiso",$compromiso, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarObservacion($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM Observacion WHERE IdObservacion = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
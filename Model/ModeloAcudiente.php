<?php
    require_once "Conexion.php";
    class ModeloAcudiente{
        public static function CrearAcudiente($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO Acudiente (Nombre,Apellido,TipoDocumento,Documento,Rh,Correo,Password,Telefono,Foto,FechaNacimiento) VALUES (:nombre,:apellido,:tipoDocumento,:documento,:rh,:correo,:password,:telefono,:foto,:fechaNacimiento)");
            $oBJEC_DATA_INSERT  -> bindParam(":nombre",$nombre, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":apellido",$apellido, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":tipoDocumento",$tipoDocumento, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":documento",$documento, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":rh",$rh, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":correo",$correo, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":password",$password, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":telefono",$telefono, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":foto",$foto, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":fechaNacimiento",$fechaNacimiento, PDO::PARAM_STR);

            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarAcudiente($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE Acudiente  SET Nombre = :nombre,Apellido = :apellido,TipoDocumento = :tipoDocumento,Documento = :documento,Rh = :rh,Correo = :correo,Password = :password,Telefono = :telefono,Foto = :foto,FechaNacimiento = :fechaNacimiento WHERE IdAcudiente = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":nombre",$nombre, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":apellido",$apellido, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":tipoDocumento",$tipoDocumento, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":documento",$documento, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":rh",$rh, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":correo",$correo, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":password",$password, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":telefono",$telefono, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":foto",$foto, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":fechaNacimiento",$fechaNacimiento, PDO::PARAM_STR);

            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarAcudiente(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM Acudiente");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarAcudiente($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Acudiente WHERE IdAcudiente = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function BuscarCorreoAcudiente($correo){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Acudiente WHERE Correo = :correo");
            $oBJEC_DATA_SEARCH  -> bindParam(":correo",$correo, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function BuscarTelefonoAcudiente($telefono){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Acudiente WHERE Telefono = :telefono");
            $oBJEC_DATA_SEARCH  -> bindParam(":telefono",$telefono, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function BuscarDocumentoAcudiente($documento){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Acudiente WHERE Documento = :documento");
            $oBJEC_DATA_SEARCH  -> bindParam(":documento",$documento, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarAcudiente($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM Acudiente WHERE IdAcudiente = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
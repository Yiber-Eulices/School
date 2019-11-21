<?php
    require_once "Conexion.php";
    class ModeloAdministrador{
        public static function CrearAdministrador($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO Administrador (Nombre,Apellido,TipoDocumento,Documento,Rh,Correo,Password,Telefono,Foto,FechaNacimiento) VALUES (:nombre,:apellido,:tipoDocumento,:documento,:rh,:correo,:password,:telefono,:foto,:fechaNacimiento)");
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
        public static function EditarAdministrador($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE Administrador  SET Nombre = :nombre,Apellido = :apellido,TipoDocumento = :tipoDocumento,Documento = :documento,Rh = :rh,Correo = :correo,Password = :password,Telefono = :telefono,Foto = :foto,FechaNacimiento = :fechaNacimiento WHERE IdAdministrador = :id");
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
        public static function ListarAdministrador(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM Administrador");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarAdministrador($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Administrador WHERE IdAdministrador = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function BuscarCorreoAdministrador($correo){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Administrador WHERE Correo = :correo");
            $oBJEC_DATA_SEARCH  -> bindParam(":correo",$correo, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function BuscarTelefonoAdministrador($telefono){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Administrador WHERE Telefono = :telefono");
            $oBJEC_DATA_SEARCH  -> bindParam(":telefono",$telefono, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function BuscarDocumentoAdministrador($documento){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Administrador WHERE Documento = :documento");
            $oBJEC_DATA_SEARCH  -> bindParam(":documento",$documento, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarAdministrador($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM Administrador WHERE IdAdministrador = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
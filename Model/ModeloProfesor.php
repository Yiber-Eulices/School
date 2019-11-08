<?php
    require_once "Conexion.php";
    class ModeloProfesor{
        public static function CrearProfesor($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO profesor (Nombre,Apellido,TipoDocumento,Documento,Rh,Correo,Password,Telefono,Foto,FechaNacimiento) VALUES (:nombre,:apellido,:tipoDocumento,:documento,:rh,:correo,:password,:telefono,:foto,:fechaNacimiento)");
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
        public static function EditarProfesor($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE profesor  SET Nombre = :nombre,Apellido = :apellido,TipoDocumento = :tipoDocumento,Documento = :documento,Rh = :rh,Correo = :correo,Password = :password,Telefono = :telefono,Foto = :foto,FechaNacimiento = :fechaNacimiento WHERE IdProfesor = :id");
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
        public static function ListarMicurso(){
            session_start();
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT c.IdCurso,g.Nivel,c.Nombre AS NombreCurso,m.Nombre AS NombreMateria FROM grado g INNER JOIN curso c ON c.GradoIdGrado = g.IdGrado INNER JOIN profesorcurso pc ON pc.CursoIdCurso = c.IdCurso INNER JOIN materia m ON m.IdMateria = pc.MateriaIdMateria INNER JOIN profesor p ON p.IdProfesor = pc.ProfesorIdProfesor WHERE p.IdProfesor=:id");
            $oBJEC_DATA_LIST  -> bindParam(":id",$_SESSION["UserId"], PDO::PARAM_INT);
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function ListarProfesor(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT * FROM profesor");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarProfesor($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM profesor WHERE IdProfesor = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarProfesor($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM profesor WHERE IdProfesor = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
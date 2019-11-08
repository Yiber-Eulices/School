<?php
    require_once "Conexion.php";
    class ModeloEstudiante{
        public static function CrearEstudiante($nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento,$Curso){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO Estudiante (Nombre,Apellido,TipoDocumento,Documento,Rh,Correo,Password,Telefono,Foto,FechaNacimiento,CursoIdCurso) VALUES (:nombre,:apellido,:tipoDocumento,:documento,:rh,:correo,:password,:telefono,:foto,:fechaNacimiento,:Curso)");
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
            $oBJEC_DATA_INSERT  -> bindParam(":Curso",$Curso, PDO::PARAM_STR);

            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarEstudiante($id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento,$Curso){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE Estudiante  SET Nombre = :nombre,Apellido = :apellido, TipoDocumento = :tipoDocumento, Documento = :documento, Rh = :rh, Correo = :correo, Password = :password, Telefono = :telefono, Foto = :foto, FechaNacimiento = :fechaNacimiento, CursoIdCurso = :Curso WHERE IdEstudiante = :id");
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
            $oBJEC_DATA_UPDATE  -> bindParam(":Curso",$Curso, PDO::PARAM_STR);

            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarEstudiante(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT e.*,g.*,c.Nombre AS NombreCurso FROM Estudiante AS e INNER JOIN  curso AS c ON E.CursoIdCurso=c.IdCurso INNER JOIN grado AS g ON g.IdGrado=c.GradoIdGrado");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function ListarProfesor(){
            session_start();
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT p.IdProfesor,p.Nombre AS NombreProfesor,P.Apellido,p.Foto,p.Correo,p.Telefono,m.Nombre AS NombreMateria FROM grado g INNER JOIN curso c ON c.GradoIdGrado = g.IdGrado INNER JOIN profesorcurso pc ON pc.CursoIdCurso = c.IdCurso INNER JOIN materia m ON m.IdMateria = pc.MateriaIdMateria INNER JOIN profesor p ON p.IdProfesor = pc.ProfesorIdProfesor INNER JOIN estudiante e ON e.CursoIdCurso = c.IdCurso WHERE e.IdEstudiante = :id");
            $oBJEC_DATA_LIST  -> bindParam(":id",$_SESSION["UserId"], PDO::PARAM_INT);
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarEstudiante($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM Estudiante WHERE IdEstudiante = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarEstudiante($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM Estudiante WHERE IdEstudiante = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
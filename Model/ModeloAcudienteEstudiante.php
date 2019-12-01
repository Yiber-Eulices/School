<?php
    require_once "Conexion.php";
    class ModeloAcudienteEstudiante{
        public static function CrearAcudienteEstudiante($estudiante,$acudiente){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO acudienteestudiante (EstudianteIdEstudiante,AcudienteIdAcudiente) VALUES (:estudiante,:acudiente)");
            $oBJEC_DATA_INSERT  -> bindParam(":estudiante",$estudiante, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":acudiente",$acudiente, PDO::PARAM_STR);

            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarAcudienteEstudiante($id,$estudiante,$acudiente){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE acudienteestudiante  SET EstudianteIdEstudiante = :estudiante,AcudienteIdAcudiente=:acudiente WHERE IdAcudienteEstudiante = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":estudiante",$estudiante, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":acudiente",$acudiente, PDO::PARAM_STR);

            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarAcudienteEstudiante(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT ae.*,e.IdEstudiante,e.Nombre AS NombreEstudiante,e.Apellido AS ApellidoEstudiante,e.TipoDocumento AS TipoDocumentoEstudiante, e.Documento AS DocumentoEstudiante,e.Rh AS RhEstudiante,e.Correo AS CorreoEstudiante,e.Telefono AS TelefonoEstudiante,e.Foto AS FotoEstudiante,e.FechaNacimiento AS FechaNacimientoEstudiante,e.CursoIdCurso,a.IdAcudiente,a.Nombre AS NombreAcudiente,a.Apellido AS ApellidoAcudiente,a.TipoDocumento AS TipoDocumentoAcudiente,a.Documento AS DocumentoAcudiente,a.Rh AS RhAcudiente,a.Correo AS CorreoAcudiente,a.Telefono AS TelefonoAcudiente,a.Foto AS FotoAcudiente,a.FechaNacimiento AS FechaNacimientoAcudiente,g.Nivel,c.Nombre NombreCurso FROM acudienteestudiante ae INNER JOIN estudiante e ON ae.EstudianteIdEstudiante=e.IdEstudiante INNER JOIN acudiente a ON ae.AcudienteIdAcudiente=a.IdAcudiente INNER JOIN curso c ON e.CursoIdCurso = c.IdCurso INNER JOIN grado g ON c.GradoIdGrado = g.IdGrado");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarAcudienteEstudiante($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM acudienteestudiante WHERE IdAcudienteEstudiante = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarAcudienteEstudiante($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM acudienteestudiante WHERE IdAcudienteEstudiante = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
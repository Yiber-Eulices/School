<?php
    require_once "Conexion.php";
    class ModeloProfesorMateria{
        public static function CrearProfesorMateria($profesor,$materia){
            $oBJEC_DATA_INSERT = Conexion::conectar()->prepare("INSERT INTO profesormateria (profesorIdprofesor,materiaIdmateria) VALUES (:profesor,:materia)");
            $oBJEC_DATA_INSERT  -> bindParam(":profesor",$profesor, PDO::PARAM_STR);
            $oBJEC_DATA_INSERT  -> bindParam(":materia",$materia, PDO::PARAM_STR);
           
            return ($oBJEC_DATA_INSERT -> execute());
        }
        public static function EditarProfesorMateria($id,$profesor,$materia){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE profesormateria  SET profesorIdprofesor = :profesor,materiaIdmateria = :materia WHERE IdProfesorMateria = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":profesor",$profesor, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":materia",$materia, PDO::PARAM_STR);
            
            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function ListarProfesorMateria(){
            $oBJEC_DATA_LIST = Conexion::conectar()->prepare("SELECT c.IdProfesorMateria,c.ProfesorIdProfesor,c.MateriaIdMateria,g.IdMateria,g.Nombre,p.IdProfesor,p.Nombre AS NombreProfesor FROM profesorMateria c INNER JOIN materia g ON c.MateriaIdMateria=g.IdMateria INNER JOIN profesor p ON c.ProfesorIdProfesor=p.IdProfesor");
            $oBJEC_DATA_LIST -> execute();
            $oBJEC_DATA_ARRAY =  $oBJEC_DATA_LIST-> fetchAll();
            return $oBJEC_DATA_ARRAY;            
        }
        public static function BuscarProfesorMateria($id){
            $oBJEC_DATA_SEARCH = Conexion::conectar()->prepare("SELECT * FROM profesormateria WHERE IdProfesorMateria = :id");
            $oBJEC_DATA_SEARCH  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_SEARCH -> execute();
            $oBJEC_DATA =  $oBJEC_DATA_SEARCH -> fetch();
            return $oBJEC_DATA;     
        }
        public static function EliminarProfesorMateria($id){
            $oBJEC_DATA_DELETE = Conexion::conectar()->prepare("DELETE FROM profesormateria WHERE IdProfesorMateria = :id");
            $oBJEC_DATA_DELETE  -> bindParam(":id",$id, PDO::PARAM_INT);
            return $oBJEC_DATA_DELETE -> execute();
        }
    }
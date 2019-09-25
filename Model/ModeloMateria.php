<?php

require_once "conexion.php";

    class ModeloMateria{
        //modelo recibe lo que envia el controlador(dato1,dato2).
        public static function MdlInsertarMateria($nombre,$descripcion){
            $oBJEC_INSE = Conexion::conectar()->prepare("INSERT INTO materia(Nombre,Descripcion) VALUES (:Nombre,:Descripcion)");
            $oBJEC_INSE->bindParam(":Nombre",$nombre, PDO::PARAM_STR);
            $oBJEC_INSE->bindParam(":Descripcion",$descripcion, PDO::PARAM_STR);          
            return ($oBJEC_INSE->execute());
            //se retorna a AJAX un booleano (true o false)
        }
        //modelo recibe lo que envia el controlador(dato1,dato2,dato3).
        public static function MdlActualizarMateria($id,$nombre,$descripcion){
            $oBJEC_ACT = Conexion::conectar()->prepare("UPDATE  materia SET Nombre = :Nombre,Descripcion = :Descripcion WHERE IdMateria = :id");
            $oBJEC_ACT->bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_ACT->bindParam(":Nombre",$nombre, PDO::PARAM_STR);
            $oBJEC_ACT->bindParam(":Descripcion",$descripcion, PDO::PARAM_STR);          
            return ($oBJEC_ACT->execute());
            //se retorna a AJAX un booleano (true o false)
        }
        public static function MdlListarMateria(){
            $oBJEM_LIST = Conexion::conectar()->prepare("SELECT * FROM materia");
            $oBJEM_LIST->execute();
            $oBJEM_LISTARRAY = $oBJEM_LIST -> fetchAll();
            return $oBJEM_LISTARRAY;
            //se retorna a AJAX un array con toda la tabla
        }
        //modelo recibe lo que envia el controlador(id).
        public static function MdlBuscarMateria($id){
            $oBJEM_BUSCAR = Conexion::conectar()->prepare("SELECT * FROM materia WHERE IdMateria = :id");
            $oBJEM_BUSCAR->bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEM_BUSCAR->execute();
            $oBJEM_BUSCARARRAY = $oBJEM_BUSCAR -> fetchAll();
            return $oBJEM_BUSCARARRAY;
            //se retorna a AJAX un booleano (true o false)
        }
        //modelo recibe lo que envia el controlador(id).
        public static function MdlEliminarMateria($id){
            $oBJEC_ELIM = Conexion::conectar()->prepare("DELETE FROM materia WHERE IdMateria = :id");
            $oBJEC_ELIM->bindParam(":id",$id, PDO::PARAM_STR);
            return ($oBJEC_ELIM->execute());
            //se retorna a AJAX un booleano (true o false)
        }
    }

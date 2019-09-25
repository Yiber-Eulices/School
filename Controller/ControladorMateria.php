<?php
    class ControladorMateria{
	
        public static function CrtInsertarMateria($nombre,$descripcion){
            $oBJECT_RESP=ModeloMateria::MdlInsertarMateria($nombre,$descripcion);
            return $oBJECT_RESP;
            }
        public static function CrtEliminarMateria($id){
            $oBJECT_RESP = ModeloMateria::MdlEliminarMateria($id);
            return $oBJECT_RESP;	
            }
        public static function CrtBuscarMateria($id){
            $oBJECT_RESP = ModeloMateria::MdlBuscarMateria($id);	
            return $oBJECT_RESP;
        }
        public static function CrtActualizarMateria($id,$nombre,$descripcion)	{
            $oBJECT_RESP=ModeloMateria::MdlActualizarMateria($id,$nombre,$descripcion);
            return $oBJECT_RESP;
        }
        public static function CtrListarMateria(){
            $oBJECT_RESP=ModeloMateria::MdlListarMateria();
            return $oBJECT_RESP;
        }
    }
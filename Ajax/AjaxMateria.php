<?php
require_once "../Controller/ControladorMateria.php";
require_once "../Model/ModeloMateria.php";
/**
 * 
 */
	
class MateriaAjax {
	public $id;
	public $nombre;
	public $descripcion;

	public function InsertarMateria(){
		$oBJECT_RESP=ControladorMateria::CrtInsertarMateria($this->nombre,$this->descripcion);
		echo json_encode($oBJECT_RESP);
	}
    
    public function EliminarMateria(){
        $oBJECT_ELIM = ControladorMateria::CrtEliminarMateria($this->id);
        echo json_encode($oBJECT_ELIM);
    }
    
	public function BuscarMateria(){
	$oBJECT_CAR = ControladorMateria::CrtBuscarMateria($this->id);
	echo json_encode($oBJECT_CAR);
    }
     
	public function ActualizarMateria(){
		$oBJECT_UPD = ControladorMateria::CrtActualizarMateria($this->id,$this->nombre,$this->descripcion);
		echo json_encode($oBJECT_UPD);
    }
    
    public function ListarMateria(){
        $oBJECT_CAR = ControladorMateria::CtrListarMateria();
        $oBJEC_JSON = '{
            "data": [';
                if (count($oBJECT_CAR) >= 1){
                    for ($i=0; $i < count($oBJECT_CAR); $i++) {
                        $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' IdMateria = '".$oBJECT_CAR[$i]["IdMateria"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                        $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdMateria = '".$oBJECT_CAR[$i]["IdMateria"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                        
                        $oBJEC_JSON .= '[
                            "'.$oBJECT_CAR[$i]["IdMateria"].'",
                            "'.$oBJECT_CAR[$i]["Nombre"].'",
                            "'.$oBJECT_CAR[$i]["Descripcion"].'",
                            "'.$btnUpdate.$btnDelete.'"
                        ],';
                    }
                }else{
                    $oBJEC_JSON .= '[
                        "",
                        "",
                        "",
                        ""
                    ],';
                }
                $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
                $oBJEC_JSON .=']
            }';

            echo $oBJEC_JSON;
    }

}

    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){

        $oBJECT_DATA = new MateriaAjax();
        $oBJECT_DATA ->nombre=$_POST["Nombre"];
        $oBJECT_DATA ->descripcion=$_POST["Descripcion"];
        $oBJECT_DATA ->InsertarMateria();
    }
if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
    $oBJECT_ELIM = new MateriaAjax();
    $oBJECT_ELIM ->id = $_POST["id"];
    $oBJECT_ELIM ->EliminarMateria();
}
if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
    $oBJECT_DATA = new MateriaAjax();
    $oBJECT_DATA ->id = $_POST["id"];
	$oBJECT_DATA ->BuscarMateria();
}
if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
	$oBJECT_DATA = new MateriaAjax();
	$oBJECT_DATA ->id = $_POST["id"];
	$oBJECT_DATA ->nombre = $_POST["Nombre"];
	$oBJECT_DATA ->descripcion = $_POST["Descripcion"];
	$oBJECT_DATA ->ActualizarMateria();

}
if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
	$oBJECT_DATA = new MateriaAjax();
	$oBJECT_DATA ->ListarMateria();
}

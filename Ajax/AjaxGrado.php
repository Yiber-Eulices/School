<?php
    require_once "../Controller/ControladorGrado.php";
    require_once "../Model/ModeloGrado.php";
    class AjaxGrado{
        public $id;
        public $nivel;

        public function AjxCrear(){
            $objGRADO = ControladorGrado::CtrlCrear( $this->nivel);
            echo json_encode($objGRADO);
        }
        public function AjxEditar(){
            $objGRADO = ControladorGrado::CtrlEditar( $this->id,$this->nivel);
            echo json_encode($objGRADO);  
        }
        public function AjxListar(){
            $objGRADO = ControladorGrado::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objGRADO) >= 1){
                        for ($i=0; $i < count($objGRADO); $i++) {
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdGrado = '".$objGRADO[$i]["IdGrado"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdGrado = '".$objGRADO[$i]["IdGrado"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";

                            $oBJEC_JSON .= '[
                                "'.$objGRADO[$i]["IdGrado"].'",
                                "'.$objGRADO[$i]["Nivel"].'",
                                "'.$btnUpdate.$btnDelete.'"
                            ],';
                        }
                    }else{
                        $oBJEC_JSON .= '[
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
        public function AjxBuscar(){
            $objGRADO = ControladorGrado::CtrlBuscar($this->id);
            echo json_encode($objGRADO);
        }
        public function AjxEliminar(){
            $objGRADO = ControladorGrado::CtrlEliminar($this->id);
            echo json_encode($objGRADO);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){
        /*$image=null;
		if(isset($_FILES["Foto"]) && !empty($_FILES["Foto"]["tmp_name"])){
		  if(!is_dir("../View/profilePhoto")){
			$dir = mkdir("../View/profilePhoto", 0777, true);
		  }else{
			$dir=true;
		  }
		  if($dir){
			$filename= time()."-".$_FILES["Foto"]["name"]; //concatenar función tiempo con el nivel de imagen
			$muf=move_uploaded_file($_FILES["Foto"]["tmp_name"], "../View/profilePhoto/".$filename); //mover el fichero utilizando esta función
			$image='../View/profilePhoto/'.$filename;
			if($muf){
			  $image_upload=true;
			}else{
			  $image_upload=false;
			  $error["image"]= "La imagen no se ha subido";
			}
		  }
		  //var_dump($_FILES["image"]);
          //die();
        }*/
        $oBJEC_AJAX = new AjaxGrado();
        $oBJEC_AJAX -> nivel = $_POST["Nivel"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
        /*$image=null;
		if(isset($_FILES["Foto"]) && !empty($_FILES["Foto"]["tmp_name"])){
		  if(!is_dir("../View/profilePhoto")){
			$dir = mkdir("../View/profilePhoto", 0777, true);
		  }else{
			$dir=true;
		  }
		  if($dir){
			$filename= time()."-".$_FILES["Foto"]["name"]; //concatenar función tiempo con el nivel de imagen
			$muf=move_uploaded_file($_FILES["Foto"]["tmp_name"], "../View/profilePhoto/".$filename); //mover el fichero utilizando esta función
			$image='../View/profilePhoto/'.$filename;
			if($muf){
			  $image_upload=true;
			}else{
			  $image_upload=false;
			  $error["image"]= "La imagen no se ha subido";
			}
		  }
		  //var_dump($_FILES["image"]);
          //die();
        }else{
            $image = $_POST["FotoSrc"];
        }*/
        $oBJEC_AJAX = new AjaxGrado();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> nivel = $_POST["Nivel"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxGrado();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxGrado();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxGrado();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    
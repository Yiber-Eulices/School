<?php
    require_once "../Controller/ControladorEvento.php";
    require_once "../Model/ModeloEvento.php";
    class AjaxEvento{
        public $id;
        public $fecha;
        public $titulo;
        public $descripcion;
        public $foto;
        public $lugar;

        public function AjxCrear(){
            $objEVEN = ControladorEvento::CtrlCrear( $this->fecha,$this->titulo,$this->descripcion,$this->foto,$this->lugar);
            echo json_encode($objEVEN);
        }
        public function AjxEditar(){
            $objEVEN = ControladorEvento::CtrlEditar( $this->id,$this->fecha,$this->titulo,$this->descripcion,$this->foto,$this->lugar);
            echo json_encode($objEVEN);  
        }
        public function AjxListar(){
            $objEVEN = ControladorEvento::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objEVEN) >= 1){
                        for ($i=0; $i < count($objEVEN); $i++) {
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdEvento = '".$objEVEN[$i]["IdEvento"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdEvento = '".$objEVEN[$i]["IdEvento"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $img = "<img class = 'imgProfile' src ='".$objEVEN[$i]["Foto"]."'>";

                            $oBJEC_JSON .= '[
                                "'.$objEVEN[$i]["IdEvento"].'",
                                "'.$img.'",
                                "'.$objEVEN[$i]["Fecha"].'",
                                "'.$objEVEN[$i]["Titulo"].'",
                                "'.$objEVEN[$i]["Descripcion"].'",
                                "'.$objEVEN[$i]["Lugar"].'",
                                "'.$btnUpdate.$btnDelete.'"
                            ],';
                        }
                    }else{
                        $oBJEC_JSON .= '[
                            "",
                            "",
                            "",
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
        public function AjxBuscar(){
            $objEVEN = ControladorEvento::CtrlBuscar($this->id);
            echo json_encode($objEVEN);
        }
        public function AjxEliminar(){
            $objEVEN = ControladorEvento::CtrlEliminar($this->id);
            echo json_encode($objEVEN);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){
        
        $image=null;
		if(isset($_FILES["Foto"]) && !empty($_FILES["Foto"]["tmp_name"])){
		  if(!is_dir("../View/profilePhoto")){
			$dir = mkdir("../View/profilePhoto", 0777, true);
		  }else{
			$dir=true;
		  }
		  if($dir){
			$filename= time()."-".$_FILES["Foto"]["name"]; //concatenar función tiempo con el nombre de imagen
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
        }
        $oBJEC_AJAX = new AjaxEvento();
        $oBJEC_AJAX -> fecha = $_POST["Fecha"];
        $oBJEC_AJAX -> titulo = $_POST["Titulo"];
        $oBJEC_AJAX -> descripcion = $_POST["Descripcion"];
        $oBJEC_AJAX -> lugar = $_POST["Lugar"];
        $oBJEC_AJAX -> foto = $image;
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
        $image=null;
		if(isset($_FILES["Foto"]) && !empty($_FILES["Foto"]["tmp_name"])){
		  if(!is_dir("../View/profilePhoto")){
			$dir = mkdir("../View/profilePhoto", 0777, true);
		  }else{
			$dir=true;
		  }
		  if($dir){
			$filename= time()."-".$_FILES["Foto"]["name"]; //concatenar función tiempo con el nombre de imagen
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
        }
        $oBJEC_AJAX = new AjaxEvento();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> fecha = $_POST["Fecha"];
        $oBJEC_AJAX -> titulo = $_POST["Titulo"];
        $oBJEC_AJAX -> descripcion = $_POST["Descripcion"];
        $oBJEC_AJAX -> lugar = $_POST["Lugar"];
        $oBJEC_AJAX -> foto = $image;
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxEvento();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxEvento();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxEvento();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    
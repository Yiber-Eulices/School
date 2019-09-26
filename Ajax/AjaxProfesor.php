<?php
    require_once "../Controller/ControladorProfesor.php";
    require_once "../Model/ModeloProfesor.php";
    class AjaxProfesor{
        public $id;
        public $nombre;
        public $apellido;
        public $tipoDocumento;
        public $documento;
        public $rh;
        public $correo;
        public $password;
        public $telefono;
        public $foto;
        public $fechaNacimiento;

        public function AjxCrear(){
            $objPROF = ControladorProfesor::CtrlCrear( $this->nombre,$this->apellido,$this->tipoDocumento,$this->documento,$this->rh,$this->correo,$this->password,$this->telefono,$this->foto,$this->fechaNacimiento);
            echo json_encode($objPROF);
        }
        public function AjxEditar(){
            $objPROF = ControladorProfesor::CtrlEditar( $this->id,$this->nombre,$this->apellido,$this->tipoDocumento,$this->documento,$this->rh,$this->correo,$this->password,$this->telefono,$this->foto,$this->fechaNacimiento);
            echo json_encode($objPROF);  
        }
        public function AjxListar(){
            $objPROF = ControladorProfesor::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objPROF) >= 1){
                        for ($i=0; $i < count($objPROF); $i++) {
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdProfesor = '".$objPROF[$i]["IdProfesor"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdProfesor = '".$objPROF[$i]["IdProfesor"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $img = "<img class = 'imgProfile' src ='".$objPROF[$i]["Foto"]."'>";

                            $oBJEC_JSON .= '[
                                "'.$objPROF[$i]["IdProfesor"].'",
                                "'.$img.'",
                                "'.$objPROF[$i]["Nombre"].'",
                                "'.$objPROF[$i]["Apellido"].'",
                                "'.$objPROF[$i]["TipoDocumento"].'",
                                "'.$objPROF[$i]["Documento"].'",
                                "'.$objPROF[$i]["FechaNacimiento"].'",
                                "'.$objPROF[$i]["Rh"].'",
                                "'.$objPROF[$i]["Correo"].'",
                                "'.$objPROF[$i]["Telefono"].'",
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
            $objPROF = ControladorProfesor::CtrlBuscar($this->id);
            echo json_encode($objPROF);
        }
        public function AjxEliminar(){
            $objPROF = ControladorProfesor::CtrlEliminar($this->id);
            echo json_encode($objPROF);
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
        $oBJEC_AJAX = new AjaxProfesor();
        $oBJEC_AJAX -> nombre = $_POST["Nombre"];
        $oBJEC_AJAX -> apellido = $_POST["Apellido"];
        $oBJEC_AJAX -> tipoDocumento = $_POST["TipoDocumento"];
        $oBJEC_AJAX -> documento = $_POST["Documento"];
        $oBJEC_AJAX -> rh = $_POST["Rh"];
        $oBJEC_AJAX -> correo = $_POST["Correo"];
        $oBJEC_AJAX -> password = $_POST["Password"];
        $oBJEC_AJAX -> telefono = $_POST["Telefono"];
        $oBJEC_AJAX -> foto = $image;
        $oBJEC_AJAX -> fechaNacimiento = $_POST["FechaNacimiento"];
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
        $oBJEC_AJAX = new AjaxProfesor();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> nombre = $_POST["Nombre"];
        $oBJEC_AJAX -> apellido = $_POST["Apellido"];
        $oBJEC_AJAX -> tipoDocumento = $_POST["TipoDocumento"];
        $oBJEC_AJAX -> documento = $_POST["Documento"];
        $oBJEC_AJAX -> rh = $_POST["Rh"];
        $oBJEC_AJAX -> correo = $_POST["Correo"];
        $oBJEC_AJAX -> password = $_POST["Password"];
        $oBJEC_AJAX -> telefono = $_POST["Id"];
        $oBJEC_AJAX -> foto = $image;
        $oBJEC_AJAX -> fechaNacimiento = $_POST["FechaNacimiento"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxProfesor();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxProfesor();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxProfesor();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    
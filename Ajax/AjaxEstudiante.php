<?php
    require_once "../Controller/ControladorEstudiante.php";
    require_once "../Model/ModeloEstudiante.php";
    class AjaxEstudiante{
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
        public $Curso;

        public function AjxCrear(){
            $objADMIN = ControladorEstudiante::CtrlCrear( $this->nombre,$this->apellido,$this->tipoDocumento,$this->documento,$this->rh,$this->correo,$this->password,$this->telefono,$this->foto,$this->fechaNacimiento,$this->Curso);
            echo json_encode($objADMIN);
        }
        public function AjxEditar(){
            $objADMIN = ControladorEstudiante::CtrlEditar( $this->id,$this->nombre,$this->apellido,$this->tipoDocumento,$this->documento,$this->rh,$this->correo,$this->password,$this->telefono,$this->foto,$this->fechaNacimiento,$this->Curso);
            echo json_encode($objADMIN);  //lo esta retornando en false.
        }
        public function AjxListar(){
            $objADMIN = ControladorEstudiante::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        for ($i=0; $i < count($objADMIN); $i++) {
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $img = "<img class = 'imgProfile' src ='".$objADMIN[$i]["Foto"]."'>";

                            $oBJEC_JSON .= '[
                                "'.$objADMIN[$i]["IdEstudiante"].'",
                                "'.$img.'",
                                "'.$objADMIN[$i]["Nombre"].'",
                                "'.$objADMIN[$i]["Apellido"].'",
                                "'.$objADMIN[$i]["TipoDocumento"].'",
                                "'.$objADMIN[$i]["Documento"].'",
                                "'.$objADMIN[$i]["FechaNacimiento"].'",
                                "'.$objADMIN[$i]["Rh"].'",
                                "'.$objADMIN[$i]["Correo"].'",
                                "'.$objADMIN[$i]["Telefono"].'",
                                "'.$objADMIN[$i]["CursoIdCurso"].'",
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
            $objADMIN = ControladorEstudiante::CtrlBuscar($this->id);
            echo json_encode($objADMIN);
        }
        public function AjxEliminar(){
            $objADMIN = ControladorEstudiante::CtrlEliminar($this->id);
            echo json_encode($objADMIN);
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
        $oBJEC_AJAX = new AjaxEstudiante();
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
        $oBJEC_AJAX -> Curso = $_POST["Curso"];
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
        $oBJEC_AJAX = new AjaxEstudiante();
        $oBJEC_AJAX -> id = $_POST["Id"];
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
        $oBJEC_AJAX -> Curso = $_POST["Curso"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxEstudiante();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxEstudiante();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxEstudiante();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    
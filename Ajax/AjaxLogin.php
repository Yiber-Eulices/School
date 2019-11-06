<?php
    require_once "../Controller/ControladorLogin.php";
    require_once "../Model/ModeloLogin.php";

    class AjaxLogin{
        public $rol;
        public $user;
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
        public function LoginAjax(){
            $objLOGINC = ControladorLogin::CtrlLogin( $this->rol,$this->user,$this->password);
            echo json_encode($objLOGINC);
        }
        public function ProfileAjax(){
            $objLOGINC = ControladorLogin::CtrlProfile();
            echo json_encode($objLOGINC);
        }
        public function AjxEditar(){
            $objADMIN = ControladorLogin::CtrlEditar($this->nombre,$this->apellido,$this->tipoDocumento,$this->documento,$this->rh,$this->correo,$this->password,$this->telefono,$this->foto,$this->fechaNacimiento);
            echo json_encode($objADMIN);  
        }
        public function RecuperarAjax(){
            $objLOGINC = ControladorLogin::CtrlRecuperar( $this->rol,$this->user);
            echo json_encode($objLOGINC);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'login'){
        $oBJEC_AJAX = new AjaxLogin();
        $oBJEC_AJAX->rol = $_POST["Rol"];
        $oBJEC_AJAX->user = $_POST["User"];
        $oBJEC_AJAX->password = $_POST["Paswword"];
        $oBJEC_AJAX -> LoginAjax();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'profile'){
        $oBJEC_AJAX = new AjaxLogin();
        $oBJEC_AJAX -> ProfileAjax();
    }   
    if(isset($_GET["a"]) && $_GET["a"] == 'edit'){
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
        $oBJEC_AJAX = new AjaxLogin();
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
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'recuperar'){
        $oBJEC_AJAX = new AjaxLogin();
        $oBJEC_AJAX->rol = $_POST["Rol"];
        $oBJEC_AJAX->user = $_POST["User"];
        $oBJEC_AJAX -> RecuperarAjax();
    }
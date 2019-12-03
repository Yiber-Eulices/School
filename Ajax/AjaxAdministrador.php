<?php
    require_once "../Controller/ControladorAdministrador.php";
    require_once "../Model/ModeloAdministrador.php";
    setlocale(LC_ALL,"es-CO.utf8");
    class AjaxAdministrador{
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
            $objADMIN = ControladorAdministrador::CtrlCrear( $this->nombre,$this->apellido,$this->tipoDocumento,$this->documento,$this->rh,$this->correo,$this->password,$this->telefono,$this->foto,$this->fechaNacimiento);
            echo json_encode($objADMIN);
        }
        public function AjxEditar(){
            $objADMIN = ControladorAdministrador::CtrlEditar( $this->id,$this->nombre,$this->apellido,$this->tipoDocumento,$this->documento,$this->rh,$this->correo,$this->password,$this->telefono,$this->foto,$this->fechaNacimiento);
            echo json_encode($objADMIN);  
        }
        public function AjxListarSelect(){
          $objADMIN = ControladorAdministrador::CtrlListar();
          $oBJEC_JSON = '{
              "data": [';
                  if (count($objADMIN) >= 1){
                      for ($i=0; $i < count($objADMIN); $i++) {
                          $oBJEC_JSON .= '[
                              "'.$objADMIN[$i]["IdAdministrador"].'",
                              "'.$objADMIN[$i]["Nombre"].'",
                              "'.$objADMIN[$i]["Apellido"].'"
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
        public function AjxListar(){
            $objADMIN = ControladorAdministrador::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        $enum=1;
                        for ($i=0; $i < count($objADMIN); $i++) {
                            list($anio,$mes,$dia) = explode("-",$objADMIN[$i]["FechaNacimiento"]);
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdAdministrador = '".$objADMIN[$i]["IdAdministrador"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdAdministrador = '".$objADMIN[$i]["IdAdministrador"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $img = "<img class = 'imgProfile' src ='".$objADMIN[$i]["Foto"]."'>";
                            $tipDoc = '';
                            if($objADMIN[$i]["TipoDocumento"]=="CC"){
                              $tipDoc = 'Cédula de Ciudadanía';
                            }else if($objADMIN[$i]["TipoDocumento"]=="CE"){
                              $tipDoc = 'Cédula de Extranjería';
                            }
                            $oBJEC_JSON .= '[
                                "'.$enum++.'",
                                "'.$img.'",
                                "'.$objADMIN[$i]["Nombre"].'",
                                "'.$objADMIN[$i]["Apellido"].'",
                                "'.$tipDoc.'",
                                "'.$objADMIN[$i]["Documento"].'",
                                "'.strftime("%A %e de %B de %Y",mktime(0,0,0,$mes,$dia,$anio)).'",
                                "'.$objADMIN[$i]["Rh"].'",
                                "'.$objADMIN[$i]["Correo"].'",
                                "'.$objADMIN[$i]["Telefono"].'",
                                "'.$btnUpdate.$btnDelete.'",
                                "'.$objADMIN[$i]["IdAdministrador"].'"
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
            $objADMIN = ControladorAdministrador::CtrlBuscar($this->id);
            echo json_encode($objADMIN);
        }
        public function AjxEliminar(){
            $objADMIN = ControladorAdministrador::CtrlEliminar($this->id);
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
        $image='View/profilePhoto/'.$filename;
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
          $oBJEC_AJAX = new AjaxAdministrador();
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
        $image='View/profilePhoto/'.$filename;
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
        $oBJEC_AJAX = new AjaxAdministrador();
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
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listaSelect'){
        $oBJEC_AJAX = new AjaxAdministrador();
        $oBJEC_AJAX -> AjxListarSelect();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
      $oBJEC_AJAX = new AjaxAdministrador();
      $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxAdministrador();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxAdministrador();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    
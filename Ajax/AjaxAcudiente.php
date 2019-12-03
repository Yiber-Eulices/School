<?php
    require_once "../Controller/ControladorAcudiente.php";
    require_once "../Model/ModeloAcudiente.php";
    setlocale(LC_ALL,"es-CO.utf8");
    class AjaxAcudiente{
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
            $objACUDI = ControladorAcudiente::CtrlCrear( $this->nombre,$this->apellido,$this->tipoDocumento,$this->documento,$this->rh,$this->correo,$this->password,$this->telefono,$this->foto,$this->fechaNacimiento);
            echo json_encode($objACUDI);
        }
        public function AjxEditar(){
            $objACUDI = ControladorAcudiente::CtrlEditar( $this->id,$this->nombre,$this->apellido,$this->tipoDocumento,$this->documento,$this->rh,$this->correo,$this->password,$this->telefono,$this->foto,$this->fechaNacimiento);
            echo json_encode($objACUDI);  
        }
        public function AjxListarSelect(){
          $objACUDI = ControladorAcudiente::CtrlListar();
          $oBJEC_JSON = '{
              "data": [';
                  if (count($objACUDI) >= 1){
                      for ($i=0; $i < count($objACUDI); $i++) {
                          $oBJEC_JSON .= '[
                              "'.$objACUDI[$i]["IdAcudiente"].'",
                              "'.$objACUDI[$i]["Nombre"].'",
                              "'.$objACUDI[$i]["Apellido"].'"
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
            $objACUDI = ControladorAcudiente::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objACUDI) >= 1){
                        $enum=1;
                        for ($i=0; $i < count($objACUDI); $i++) {
                            list($anio,$mes,$dia) = explode("-",$objACUDI[$i]["FechaNacimiento"]);
                            $btnEstudiante= "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='btn btnEstudiante btn-info waves-effect' IdAcudiente = '".$objACUDI[$i]["IdAcudiente"]."'><i class='material-icons'>school</i><span>Hijos</span></button>";
                            $btnUpdate = "<button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdAcudiente = '".$objACUDI[$i]["IdAcudiente"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdAcudiente = '".$objACUDI[$i]["IdAcudiente"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $img = "<img class = 'imgProfile' src ='".$objACUDI[$i]["Foto"]."'>";
                            $tipDoc = '';
                            if($objACUDI[$i]["TipoDocumento"]=="CC"){
                              $tipDoc = 'Cédula de Ciudadanía';
                            }else if($objACUDI[$i]["TipoDocumento"]=="CE"){
                              $tipDoc = 'Cédula de Extranjería';
                            }
                            $oBJEC_JSON .= '[
                                "'.$enum++.'",
                                "'.$img.'",
                                "'.$objACUDI[$i]["Nombre"].'",
                                "'.$objACUDI[$i]["Apellido"].'",
                                "'.$tipDoc.'",
                                "'.$objACUDI[$i]["Documento"].'",
                                "'.strftime("%A %e de %B de %Y",mktime(0,0,0,$mes,$dia,$anio)).'",
                                "'.$objACUDI[$i]["Rh"].'",
                                "'.$objACUDI[$i]["Correo"].'",
                                "'.$objACUDI[$i]["Telefono"].'",
                                "'.$btnEstudiante.$btnUpdate.$btnDelete.'",
                                "'.$objACUDI[$i]["IdAcudiente"].'"
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
        public function AjxListarp(){
          $objACUDI = ControladorAcudiente::CtrlListar();
          $oBJEC_JSON = '{
              "data": [';
                  if (count($objACUDI) >= 1){
                      $enum=1;
                      for ($i=0; $i < count($objACUDI); $i++) {
                          list($anio,$mes,$dia) = explode("-",$objACUDI[$i]["FechaNacimiento"]);
                          $btnEstudiante= "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='btn btnEstudiante btn-info waves-effect' IdAcudiente = '".$objACUDI[$i]["IdAcudiente"]."'><i class='material-icons'>school</i><span>Hijos</span></button></div>";
                          $img = "<img class = 'imgProfile' src ='".$objACUDI[$i]["Foto"]."'>";
                          $tipDoc = '';
                          if($objACUDI[$i]["TipoDocumento"]=="CC"){
                            $tipDoc = 'Cédula de Ciudadanía';
                          }else if($objACUDI[$i]["TipoDocumento"]=="CE"){
                            $tipDoc = 'Cédula de Extranjería';
                          }
                          $oBJEC_JSON .= '[
                              "'.$enum++.'",
                              "'.$img.'",
                              "'.$objACUDI[$i]["Nombre"].'",
                              "'.$objACUDI[$i]["Apellido"].'",
                              "'.$tipDoc.'",
                              "'.$objACUDI[$i]["Documento"].'",
                              "'.strftime("%A %e de %B de %Y",mktime(0,0,0,$mes,$dia,$anio)).'",
                              "'.$objACUDI[$i]["Rh"].'",
                              "'.$objACUDI[$i]["Correo"].'",
                              "'.$objACUDI[$i]["Telefono"].'",
                              "'.$btnEstudiante.'"
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
            $objACUDI = ControladorAcudiente::CtrlBuscar($this->id);
            echo json_encode($objACUDI);
        }
        public function AjxEliminar(){
            $objACUDI = ControladorAcudiente::CtrlEliminar($this->id);
            echo json_encode($objACUDI);
        }
        public function AjxSesion(){
          $objADMIN = ControladorAcudiente::CtrlSesion($this->id);
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
        $oBJEC_AJAX = new AjaxAcudiente();
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
        $oBJEC_AJAX = new AjaxAcudiente();
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
        $oBJEC_AJAX = new AjaxAcudiente();
        $oBJEC_AJAX -> AjxListarSelect();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
      $oBJEC_AJAX = new AjaxAcudiente();
      $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listap'){
      $oBJEC_AJAX = new AjaxAcudiente();
      $oBJEC_AJAX -> AjxListarp();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxAcudiente();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxAcudiente();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'sesion'){
      $oBJEC_AJAX = new AjaxAcudiente();
      $oBJEC_AJAX -> id = $_POST["Id"];
      $oBJEC_AJAX -> AjxSesion();
    }
    
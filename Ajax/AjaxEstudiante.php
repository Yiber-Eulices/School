<?php
    require_once "../Controller/ControladorEstudiante.php";
    require_once "../Model/ModeloEstudiante.php";
    require_once "../Model/ModeloProfesorCurso.php";
    require_once "../Model/ModeloCurso.php";
    require_once "../Model/ModeloGrado.php";
    require_once "../Model/ModeloMateria.php";
    setlocale(LC_ALL,"es-CO.utf8");
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
        public function AjxListarSelect(){
            $objADMIN = ControladorEstudiante::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        for ($i=0; $i < count($objADMIN); $i++) {
                            $oBJEC_JSON .= '[
                                "'.$objADMIN[$i]["IdEstudiante"].'",
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
            $objADMIN = ControladorEstudiante::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        $enum=1;
                        for ($i=0; $i < count($objADMIN); $i++) {
                            list($anio,$mes,$dia) = explode("-",$objADMIN[$i]["FechaNacimiento"]);
                            $btnAcudiente = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='btn btnAcudiente btn-default waves-effect' IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>record_voice_over</i><span>Acudientes</span></button>";
                            $btnUpdate = "<button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $btnCalificacion = "<button type='button' style='width: auto;' class='btn btnCalificacion btn-primary  waves-effect'  IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>book</i><span>Calificaciones</span></button>";
                            $btnBoletin = "<button type='button' style='width: auto;' class='btn btnBoletin btn-success waves-effect'  IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>picture_as_pdf</i><span>Boletines</span></button>";
                            $btnObservacion = "<button type='button' style='width: auto;' class='btn btnObservacion btn-info  waves-effect' IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>receipt</i><span>Observaciones</span></button>";
                            $img = "<img class = 'imgProfile' src ='".$objADMIN[$i]["Foto"]."'>";
                            $tipDoc = '';
                            if($objADMIN[$i]["TipoDocumento"]=="CC"){
                                $tipDoc = 'Cédula de Ciudadanía';
                            }else if($objADMIN[$i]["TipoDocumento"]=="CE"){
                                $tipDoc = 'Cédula de Extranjería';
                            }else if($objADMIN[$i]["TipoDocumento"]=="TI"){
                                $tipDoc = 'Tarjeta de Identidad';
                            }else if($objADMIN[$i]["TipoDocumento"]=="RC"){
                                $tipDoc = 'Registro Civil';
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
                                "'.$objADMIN[$i]["Nivel"]." ".$objADMIN[$i]["NombreCurso"].'",
                                "'.$btnAcudiente.$btnCalificacion.$btnBoletin.$btnObservacion.$btnUpdate.$btnDelete.'"
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
                            "",
                            ""
                        ],';
                    }
                    $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
                    $oBJEC_JSON .=']
                }';

                echo $oBJEC_JSON;

        }
        public function AjxListarCursoDirector(){
            session_start();
            $count = 0;
            $objADMIN = ControladorEstudiante::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        $enum=1;
                        for ($i=0; $i < count($objADMIN); $i++) {
                            if($objADMIN[$i]["CursoIdCurso"]==$_SESSION['CursoId']){
                                list($anio,$mes,$dia) = explode("-",$objADMIN[$i]["FechaNacimiento"]);
                                $btnObservacion = "<button type='button' style='width: auto;' class='btn btnObservacion btn-info waves-effect' IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>receipt</i><span>Observaciones</span></button></div>";
                                $btnBoletin = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='btn btnBoletin btn-info waves-effect' IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>picture_as_pdf</i><span>Boletines</span></button>";
                                $img = "<img class = 'imgProfile' src ='".$objADMIN[$i]["Foto"]."'>";
                                $tipDoc = '';
                                if($objADMIN[$i]["TipoDocumento"]=="CC"){
                                    $tipDoc = 'Cédula de Ciudadanía';
                                }else if($objADMIN[$i]["TipoDocumento"]=="CE"){
                                    $tipDoc = 'Cédula de Extranjería';
                                }else if($objADMIN[$i]["TipoDocumento"]=="TI"){
                                    $tipDoc = 'Tarjeta de Identidad';
                                }else if($objADMIN[$i]["TipoDocumento"]=="RC"){
                                    $tipDoc = 'Registro Civil';
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
                                    "'.$objADMIN[$i]["Nivel"]." ".$objADMIN[$i]["NombreCurso"].'",
                                    "'.$btnBoletin.$btnObservacion.'"
                                ],';
                                $count++;
                            }
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
                            "",
                            ""
                        ],';
                    }
                    if($count<=0 && count($objADMIN)>0){
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
                            "",
                            ""
                        ],';
                    }
                    $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
                    $oBJEC_JSON .=']
                }';

                echo $oBJEC_JSON;

        }
        public function AjxListarMimateria(){
            $objADMIN = ControladorEstudiante::CtrlListarMisMaterias();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        $enum=1;
                        for ($i=0; $i < count($objADMIN); $i++) {
                            $img = "<img class = 'imgProfile' src ='".$objADMIN[$i]["Foto"]."'>";
                            $btnCalificacion = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='btn btnCalificacion btn-info waves-effect' IdProfesorCurso = '".$objADMIN[$i]["IdProfesorCurso"]."'><i class='material-icons'>list</i><span>Ver Calificaciones</span></button>";
                            $oBJEC_JSON .= '[
                                "'.$enum++.'",
                                "'.$img.'",
                                "'.$objADMIN[$i]["NombreProfesor"].'",
                                "'.$objADMIN[$i]["Apellido"].'",
                                "'.$objADMIN[$i]["Correo"].'",
                                "'.$objADMIN[$i]["Telefono"].'",
                                "'.$objADMIN[$i]["NombreMateria"].'",
                                "'.$btnCalificacion.'"
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
                            ""
                        ],';
                    }
                    $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
                    $oBJEC_JSON .=']
                }';

                echo $oBJEC_JSON;

        }
        public function AjxListarMimateriaAcudiente(){
            $objADMIN = ControladorEstudiante::CtrlListarMisMateriasAcudiente();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        $enum=1;
                        for ($i=0; $i < count($objADMIN); $i++) {
                            $img = "<img class = 'imgProfile' src ='".$objADMIN[$i]["Foto"]."'>";
                            $btnCalificacion = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='btn btnCalificacion btn-info waves-effect' IdProfesorCurso = '".$objADMIN[$i]["IdProfesorCurso"]."'><i class='material-icons'>list</i><span>Ver Calificaciones</span></button></div>";
                            $oBJEC_JSON .= '[
                                "'.$enum++.'",
                                "'.$img.'",
                                "'.$objADMIN[$i]["NombreProfesor"].'",
                                "'.$objADMIN[$i]["Apellido"].'",
                                "'.$objADMIN[$i]["Correo"].'",
                                "'.$objADMIN[$i]["Telefono"].'",
                                "'.$objADMIN[$i]["NombreMateria"].'",
                                "'.$btnCalificacion.'"
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
                            ""
                        ],';
                    }
                    $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
                    $oBJEC_JSON .=']
                }';

                echo $oBJEC_JSON;

        }
        public function AjxListarp(){
          $objADMIN = ControladorEstudiante::CtrlListar();
          $oBJEC_JSON = '{
              "data": [';
                  if (count($objADMIN) >= 1){
                    $enum=1;
                      for ($i=0; $i < count($objADMIN); $i++) {
                        list($anio,$mes,$dia) = explode("-",$objADMIN[$i]["FechaNacimiento"]);
                        $btnAcudiente = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='btn btnAcudiente btn-default  waves-effect' IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>record_voice_over</i><span>Acudientes</span></button>";
                        $btnObservacion = "<button type='button' style='width: auto;' class='btn btnObservacion btn-info waves-effect' IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>record_voice_over</i><span>Observaciones</span></button></div>";
                          $img = "<img class = 'imgProfile' src ='".$objADMIN[$i]["Foto"]."'>";
                          $tipDoc = '';
                        if($objADMIN[$i]["TipoDocumento"]=="CC"){
                            $tipDoc = 'Cédula de Ciudadanía';
                        }else if($objADMIN[$i]["TipoDocumento"]=="CE"){
                            $tipDoc = 'Cédula de Extranjería';
                        }else if($objADMIN[$i]["TipoDocumento"]=="TI"){
                            $tipDoc = 'Tarjeta de Identidad';
                        }else if($objADMIN[$i]["TipoDocumento"]=="RC"){
                            $tipDoc = 'Registro Civil';
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
                              "'.$objADMIN[$i]["Nivel"]." ".$objADMIN[$i]["NombreCurso"].'",
                              "'.$btnAcudiente.$btnObservacion.'"
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
                          "",
                          ""
                      ],';
                  }
                  $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
                  $oBJEC_JSON .=']
              }';

              echo $oBJEC_JSON;

        }
        public function AjxListarpcursoest(){
            session_start();
            $count =0;
            $objADMIN = ControladorEstudiante::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        $enum=1;
                        for ($i=0; $i < count($objADMIN); $i++) {
                            if($objADMIN[$i]["CursoIdCurso"]==$_SESSION["CalificarCursoId"]){
                                list($anio,$mes,$dia) = explode("-",$objADMIN[$i]["FechaNacimiento"]);
                                $btnObservacion = "<button type='button' style='width: auto;' class='btn btnObservacion btn-info waves-effect' IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>record_voice_over</i><span>Observaciones</span></button></div>";
                                $btnCalificacion = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='btn btnCalificacion btn-primary waves-effect' IdEstudiante = '".$objADMIN[$i]["IdEstudiante"]."'><i class='material-icons'>list</i><span>Calificaciones</span></button>";
                                $img = "<img class = 'imgProfile' src ='".$objADMIN[$i]["Foto"]."'>";
                                $tipDoc = '';
                                if($objADMIN[$i]["TipoDocumento"]=="CC"){
                                    $tipDoc = 'Cédula de Ciudadanía';
                                }else if($objADMIN[$i]["TipoDocumento"]=="CE"){
                                    $tipDoc = 'Cédula de Extranjería';
                                }else if($objADMIN[$i]["TipoDocumento"]=="TI"){
                                    $tipDoc = 'Tarjeta de Identidad';
                                }else if($objADMIN[$i]["TipoDocumento"]=="RC"){
                                    $tipDoc = 'Registro Civil';
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
                                    "'.$objADMIN[$i]["Nivel"]." ".$objADMIN[$i]["NombreCurso"].'",
                                    "'.$btnCalificacion.$btnObservacion.'"
                                ],';
                                $count++;
                            }
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
                    if($count<=0 && ($objADMIN) >= 1){
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
        
        public function AjxListarProfesor(){
          $objADMIN = ControladorEstudiante::CtrlListarProfesor();
          $oBJEC_JSON = '{
              "data": [';
                  if (count($objADMIN) >= 1){
                    $enum=1;
                      for ($i=0; $i < count($objADMIN); $i++) {
                            $img = "<img class = 'imgProfile' src ='".$objADMIN[$i]["Foto"]."'>";
                            $oBJEC_JSON .= '[
                                "'.$enum++.'",
                                "'.$img.'",
                                "'.$objADMIN[$i]["NombreProfesor"].'",
                                "'.$objADMIN[$i]["Apellido"].'",
                                "'.$objADMIN[$i]["Correo"].'",
                                "'.$objADMIN[$i]["Telefono"].'",
                                "'.$objADMIN[$i]["NombreMateria"].'"
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
            $objADMIN = ControladorEstudiante::CtrlBuscar($this->id);
            echo json_encode($objADMIN);
        }
        public function AjxEliminar(){
            $objADMIN = ControladorEstudiante::CtrlEliminar($this->id);
            echo json_encode($objADMIN);
        }
        public function AjxSesion(){
            $objADMIN = ControladorEstudiante::CtrlSesion($this->id);
            echo json_encode($objADMIN);
        }
        public function AjxSessionCursoEstudiante(){
            $objPROF = ControladorEstudiante::CtrlSessionCursoEstudiante($this->id);
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
    if(isset($_GET["a"]) && $_GET["a"] == 'listaSelect'){
        $oBJEC_AJAX = new AjaxEstudiante();
        $oBJEC_AJAX -> AjxListarSelect();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listaCursoDirector'){
        $oBJEC_AJAX = new AjaxEstudiante();
        $oBJEC_AJAX -> AjxListarCursoDirector();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listamimateria'){
        $oBJEC_AJAX = new AjaxEstudiante();
        $oBJEC_AJAX -> AjxListarMimateria();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listamimateriaAcudiente'){
        $oBJEC_AJAX = new AjaxEstudiante();
        $oBJEC_AJAX -> AjxListarMimateriaAcudiente();
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
    if(isset($_GET["a"]) && $_GET["a"] == 'sesion'){
      $oBJEC_AJAX = new AjaxEstudiante();
      $oBJEC_AJAX -> id = $_POST["Id"];
      $oBJEC_AJAX -> AjxSesion();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listaProfesor'){
        $oBJEC_AJAX = new AjaxEstudiante();
        $oBJEC_AJAX -> AjxListarProfesor();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listap'){
        $oBJEC_AJAX = new AjaxEstudiante();
        $oBJEC_AJAX -> AjxListarp();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listapce'){
        $oBJEC_AJAX = new AjaxEstudiante();
        $oBJEC_AJAX -> AjxListarpcursoest();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'sessionCursoEstudiante'){
        $oBJEC_AJAX = new AjaxEstudiante();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxSessionCursoEstudiante();
    }
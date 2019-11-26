<?php
    require_once "../Controller/ControladorAlerta.php";
    require_once "../Model/ModeloAlerta.php";
    require_once "../Controller/ControladorProfesor.php";
    require_once "../Model/ModeloProfesor.php";
    require_once "../Controller/ControladorEstudiante.php";
    require_once "../Model/ModeloEstudiante.php";
    require_once "../Controller/ControladorAdministrador.php";
    require_once "../Model/ModeloAdministrador.php";
    require_once "../Controller/ControladorAcudiente.php";
    require_once "../Model/ModeloAcudiente.php";
    setlocale(LC_ALL,"es-CO.utf8");
    class AjaxAlerta{
        public $id;
        public $rolPersona;
        public $idPersona;
        public $fecha;
        public $titulo;
        public $mensaje;
        public $estado;

        public function AjxCrear(){
            $objADMIN = ControladorAlerta::CtrlCrear( $this->rolPersona,$this->idPersona,$this->fecha,$this->titulo,$this->mensaje,$this->estado);
            echo json_encode($objADMIN);
        }
        public function AjxEditar(){
            $objADMIN = ControladorAlerta::CtrlEditar( $this->id,$this->rolPersona,$this->idPersona,$this->fecha,$this->titulo,$this->mensaje,$this->estado);
            echo json_encode($objADMIN);  
        }
        public function AjxEditarEstado(){
            $objADMIN = ControladorAlerta::CtrlEditarEstado( $this->id,$this->estado);
            echo json_encode($objADMIN);  
        }
        public function AjxListar(){
            $objADMIN = ControladorAlerta::CtrlListar();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        $enum=1;
                        for ($i=0; $i < count($objADMIN); $i++) {
                            list($anio,$mes,$dia) = explode("-",$objADMIN[$i]["Fecha"]);
                            $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdAlerta = '".$objADMIN[$i]["IdAlerta"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                            $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdAlerta = '".$objADMIN[$i]["IdAlerta"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                            $objPERS = "";
                            if($objADMIN[$i]["RolPersona"]=="Estudiante"){
                                $objPERS =ControladorEstudiante::CtrlBuscar($objADMIN[$i]["IdPersona"]);
                            }else if($objADMIN[$i]["RolPersona"]=="Profesor"){
                                $objPERS =ControladorProfesor::CtrlBuscar($objADMIN[$i]["IdPersona"]);
                            }else if($objADMIN[$i]["RolPersona"]=="Acudiente"){
                                $objPERS =ControladorAcudiente::CtrlBuscar($objADMIN[$i]["IdPersona"]);
                            }if($objADMIN[$i]["RolPersona"]=="Administrador"){
                                $objPERS =ControladorAdministrador::CtrlBuscar($objADMIN[$i]["IdPersona"]);
                            }
                            $tipDoc = '';
                            if($objPERS["TipoDocumento"]=="CC"){
                                $tipDoc = 'Cédula de Ciudadanía';
                            }else if($objPERS["TipoDocumento"]=="CE"){
                                $tipDoc = 'Cédula de Extranjería';
                            }else if($objPERS["TipoDocumento"]=="TI"){
                                $tipDoc = 'Tarjeta de Identidad';
                            }else if($objPERS["TipoDocumento"]=="RC"){
                                $tipDoc = 'Registro Civil';
                            }
                            $oBJEC_JSON .= '[
                                "'.$enum++.'",
                                "'.$objADMIN[$i]["RolPersona"].'",
                                "'.$objPERS["Nombre"]." ".$objPERS["Apellido"].'",
                                "'.$tipDoc.'",
                                "'.$objPERS["Documento"].'",
                                "'.strftime("%A %e de %B de %Y",mktime(0,0,0,$mes,$dia,$anio)).'",
                                "'.$objADMIN[$i]["Titulo"].'",
                                "'.$objADMIN[$i]["Mensaje"].'",
                                "'.$objADMIN[$i]["Estado"].'",
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
                            ""
                        ],';
                    }
                    $oBJEC_JSON = substr($oBJEC_JSON,0,-1);
                    $oBJEC_JSON .=']
                }';

                echo $oBJEC_JSON;

        }
        public function AjxMiLista(){
            $objADMIN = ControladorAlerta::CtrlMiLista();
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objADMIN) >= 1){
                        $enum=1;
                        for ($i=0; $i < count($objADMIN); $i++) {  
                            list($anio,$mes,$dia) = explode("-",$objADMIN[$i]["Fecha"]);
                            $oBJEC_JSON .= '[
                                "'.$enum++.'",
                                "'.strftime("%A %e de %B de %Y",mktime(0,0,0,$mes,$dia,$anio)).'",
                                "'.$objADMIN[$i]["Titulo"].'",
                                "'.$objADMIN[$i]["Mensaje"].'",
                                "'.$objADMIN[$i]["Estado"].'",
                                "'.$objADMIN[$i]["IdAlerta"].'"
                            ],';
                        }
                    }else{
                        $oBJEC_JSON .= '[
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
            $objADMIN = ControladorAlerta::CtrlBuscar($this->id);
            echo json_encode($objADMIN);
        }
        public function AjxEliminar(){
            $objADMIN = ControladorAlerta::CtrlEliminar($this->id);
            echo json_encode($objADMIN);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){
        $oBJEC_AJAX = new AjaxAlerta();
        $oBJEC_AJAX -> rolPersona = $_POST["RolPersona"];
        $oBJEC_AJAX -> idPersona = $_POST["IdPersona"];
        $oBJEC_AJAX -> fecha = $_POST["Fecha"];
        $oBJEC_AJAX -> titulo = $_POST["Titulo"];
        $oBJEC_AJAX -> mensaje = $_POST["Mensaje"];
        $oBJEC_AJAX -> estado = $_POST["Estado"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
        $oBJEC_AJAX = new AjaxAlerta();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> rolPersona = $_POST["RolPersona"];
        $oBJEC_AJAX -> idPersona = $_POST["IdPersona"];
        $oBJEC_AJAX -> fecha = $_POST["Fecha"];
        $oBJEC_AJAX -> titulo = $_POST["Titulo"];
        $oBJEC_AJAX -> mensaje = $_POST["Mensaje"];
        $oBJEC_AJAX -> estado = $_POST["Estado"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editarEstado'){
        $oBJEC_AJAX = new AjaxAlerta();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> estado = $_POST["Estado"];
        $oBJEC_AJAX -> AjxEditarEstado();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'lista'){
        $oBJEC_AJAX = new AjaxAlerta();
        $oBJEC_AJAX -> AjxListar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'milista'){
        $oBJEC_AJAX = new AjaxAlerta();
        $oBJEC_AJAX -> AjxMiLista();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxAlerta();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxAlerta();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    
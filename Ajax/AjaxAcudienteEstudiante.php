<?php
    require_once "../Controller/ControladorAcudienteEstudiante.php";
    require_once "../Model/ModeloAcudienteEstudiante.php";
    class AjaxAcudienteEstudiante{
        public $id;
        public $estudiante;
        public $acudiente;

        public function AjxCrear(){
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlCrear( $this->estudiante,$this->acudiente);
            echo json_encode($objAcudienteEstudiante);
        }
        public function AjxEditar(){
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlEditar( $this->id,$this->estudiante,$this->acudiente);
            echo json_encode($objAcudienteEstudiante);  
        }
        public function AjxListarEstudiante(){
            session_start();
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlListar();
            $count = 0;
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objAcudienteEstudiante) >= 1){
                        for ($i=0; $i < count($objAcudienteEstudiante); $i++) {
                            if($objAcudienteEstudiante[$i]["EstudianteIdEstudiante"]==$_SESSION['EstudianteId']){
                                $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdAcudienteEstudiante = '".$objAcudienteEstudiante[$i]["IdAcudienteEstudiante"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                                $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdAcudienteEstudiante = '".$objAcudienteEstudiante[$i]["IdAcudienteEstudiante"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                                $img = "<img class = 'imgProfile' src ='".$objAcudienteEstudiante[$i]["FotoAcudiente"]."'>";
                                $oBJEC_JSON .= '[
                                    "'.$objAcudienteEstudiante[$i]["IdAcudienteEstudiante"].'",
                                    "'.$img.'",
                                    "'.$objAcudienteEstudiante[$i]["NombreAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["ApellidoAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["TipoDocumentoAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["DocumentoAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["CorreoAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["TelefonoAcudiente"].'",
                                    "'.$btnUpdate.$btnDelete.'"
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
                            ""
                        ],';
                    }
                    if($count<=0 && count($objAcudienteEstudiante) >= 1){
                        $oBJEC_JSON .= '[
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
        public function AjxListarEstudiantep(){
            session_start();
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlListar();
            $count = 0;
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objAcudienteEstudiante) >= 1){
                        for ($i=0; $i < count($objAcudienteEstudiante); $i++) {
                            if($objAcudienteEstudiante[$i]["EstudianteIdEstudiante"]==$_SESSION['EstudianteId']){
                                $img = "<img class = 'imgProfile' src ='".$objAcudienteEstudiante[$i]["FotoAcudiente"]."'>";
                                $oBJEC_JSON .= '[
                                    "'.$objAcudienteEstudiante[$i]["IdAcudienteEstudiante"].'",
                                    "'.$img.'",
                                    "'.$objAcudienteEstudiante[$i]["NombreAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["ApellidoAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["TipoDocumentoAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["DocumentoAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["CorreoAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["TelefonoAcudiente"].'"
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
                            ""
                        ],';
                    }
                    if($count<=0 && count($objAcudienteEstudiante) >= 1){
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
        public function AjxListarEstudiantePadres(){
            session_start();
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlListar();
            $count = 0;
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objAcudienteEstudiante) >= 1){
                        for ($i=0; $i < count($objAcudienteEstudiante); $i++) {
                            if($objAcudienteEstudiante[$i]["EstudianteIdEstudiante"]==$_SESSION['UserId']){
                                $img = "<img class = 'imgProfile' src ='".$objAcudienteEstudiante[$i]["FotoAcudiente"]."'>";
                                $oBJEC_JSON .= '[
                                    "'.$objAcudienteEstudiante[$i]["IdAcudienteEstudiante"].'",
                                    "'.$img.'",
                                    "'.$objAcudienteEstudiante[$i]["NombreAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["ApellidoAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["TipoDocumentoAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["DocumentoAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["CorreoAcudiente"].'",
                                    "'.$objAcudienteEstudiante[$i]["TelefonoAcudiente"].'"
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
                            ""
                        ],';
                    }
                    if($count<=0 && count($objAcudienteEstudiante) >= 1){
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
        public function AjxListarAcudiente(){
            session_start();
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlListar();
            $count = 0;
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objAcudienteEstudiante) >= 1){
                        for ($i=0; $i < count($objAcudienteEstudiante); $i++) {
                            if($objAcudienteEstudiante[$i]["AcudienteIdAcudiente"]==$_SESSION['AcudienteId']){
                                $btnUpdate = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='ml-1 btn btnUpdate bg-amber waves-effect' data-target='#ModalEdit' IdAcudienteEstudiante = '".$objAcudienteEstudiante[$i]["IdAcudienteEstudiante"]."'><i class='material-icons'>edit</i><span>Editar</span></button>";
                                $btnDelete = "<button type='button' style='width: auto;' class='ml-1 btn btnDelete bg-deep-orange waves-effect' IdAcudienteEstudiante = '".$objAcudienteEstudiante[$i]["IdAcudienteEstudiante"]."'><i class='material-icons'>delete_forever</i><span>Eliminar</span></button></div>";
                                $img = "<img class = 'imgProfile' src ='".$objAcudienteEstudiante[$i]["FotoEstudiante"]."'>";
                                $oBJEC_JSON .= '[
                                    "'.$objAcudienteEstudiante[$i]["IdAcudienteEstudiante"].'",
                                    "'.$img.'",
                                    "'.$objAcudienteEstudiante[$i]["NombreEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["ApellidoEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["TipoDocumentoEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["DocumentoEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["CorreoEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["TelefonoEstudiante"].'",
                                    "'.$btnUpdate.$btnDelete.'"
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
                            ""
                        ],';
                    }
                    if($count<=0 && count($objAcudienteEstudiante) >= 1){
                        $oBJEC_JSON .= '[
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
        public function AjxListarAcudientep(){
            session_start();
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlListar();
            $count = 0;
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objAcudienteEstudiante) >= 1){
                        for ($i=0; $i < count($objAcudienteEstudiante); $i++) {
                            if($objAcudienteEstudiante[$i]["AcudienteIdAcudiente"]==$_SESSION['AcudienteId']){
                                $img = "<img class = 'imgProfile' src ='".$objAcudienteEstudiante[$i]["FotoEstudiante"]."'>";
                                $oBJEC_JSON .= '[
                                    "'.$objAcudienteEstudiante[$i]["IdAcudienteEstudiante"].'",
                                    "'.$img.'",
                                    "'.$objAcudienteEstudiante[$i]["NombreEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["ApellidoEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["TipoDocumentoEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["DocumentoEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["CorreoEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["TelefonoEstudiante"].'"
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
                            ""
                        ],';
                    }
                    if($count<=0 && count($objAcudienteEstudiante) >= 1){
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
        public function AjxListarAcudienteHijos(){
            session_start();
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlListar();
            $count = 0;
            $oBJEC_JSON = '{
                "data": [';
                    if (count($objAcudienteEstudiante) >= 1){
                        for ($i=0; $i < count($objAcudienteEstudiante); $i++) {
                            if($objAcudienteEstudiante[$i]["AcudienteIdAcudiente"]==$_SESSION['UserId']){
                                $btnCalificacion = "<div class='icon-and-text-button-demo'><button type='button' style='width: auto;' class='btn btnCalificacion btn-primary waves-effect'  IdEstudiante = '".$objAcudienteEstudiante[$i]["IdEstudiante"]."'><i class='material-icons'>book</i><span>Calificaciones</span></button></div>";
                                $btnBoletin = "<button type='button' style='width: auto;' class='btn btnBoletin btn-success waves-effect'  IdEstudiante = '".$objAcudienteEstudiante[$i]["IdEstudiante"]."'><i class='material-icons'>picture_as_pdf</i><span>Boletines</span></button></div>";
                                $img = "<img class = 'imgProfile' src ='".$objAcudienteEstudiante[$i]["FotoEstudiante"]."'>";
                                $oBJEC_JSON .= '[
                                    "'.$objAcudienteEstudiante[$i]["IdAcudienteEstudiante"].'",
                                    "'.$img.'",
                                    "'.$objAcudienteEstudiante[$i]["NombreEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["ApellidoEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["TipoDocumentoEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["DocumentoEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["CorreoEstudiante"].'",
                                    "'.$objAcudienteEstudiante[$i]["TelefonoEstudiante"].'",
                                    "'.$btnCalificacion.$btnBoletin.'"
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
                            ""
                        ],';
                    }
                    if($count<=0 && count($objAcudienteEstudiante) >= 1){
                        $oBJEC_JSON .= '[
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
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlBuscar($this->id);
            echo json_encode($objAcudienteEstudiante);
        }
        public function AjxEliminar(){
            $objAcudienteEstudiante = ControladorAcudienteEstudiante::CtrlEliminar($this->id);
            echo json_encode($objAcudienteEstudiante);
        }
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'crear'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> estudiante = $_POST["EstudianteIdEstudiante"];
        $oBJEC_AJAX -> acudiente = $_POST["AcudienteIdAcudiente"];
        $oBJEC_AJAX -> AjxCrear();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'editar'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> estudiante = $_POST["EstudianteIdEstudiante"];
        $oBJEC_AJAX -> acudiente = $_POST["AcudienteIdAcudiente"];
        $oBJEC_AJAX -> AjxEditar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listaEstudiante'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> AjxListarEstudiante();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listaEstudiantep'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> AjxListarEstudiantep();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listaEstudiantePadre'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> AjxListarEstudiantePadres();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listaAcudiente'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> AjxListarAcudiente();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listaAcudientep'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> AjxListarAcudientep();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'listaAcudienteHijo'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> AjxListarAcudienteHijos();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'buscar'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxBuscar();
    }
    if(isset($_GET["a"]) && $_GET["a"] == 'eliminar'){
        $oBJEC_AJAX = new AjaxAcudienteEstudiante();
        $oBJEC_AJAX -> id = $_POST["Id"];
        $oBJEC_AJAX -> AjxEliminar();
    }
    
<?php
require('PlantillaPdf.php');
require_once "../Controller/ControladorProfesor.php";
require_once "../Model/ModeloProfesor.php";
require_once "../Controller/ControladorCalificacion.php";
require_once "../Model/ModeloCalificacion.php";
require_once "../Controller/ControladorGrado.php";
require_once "../Model/ModeloGrado.php";
require_once "../Controller/ControladorCurso.php";
require_once "../Model/ModeloCurso.php";
require_once "../Controller/ControladorEstudiante.php";
require_once "../Model/ModeloEstudiante.php";
$periodo = $_POST["Periodo"];
$id = $_POST["Id"];
$Lista = ControladorCalificacion::CtrlListarBoletin($id,$periodo);
$objESTUD = ControladorEstudiante::CtrlBuscar($id);
$objCURSO = ControladorCurso::CtrlBuscar($objESTUD["CursoIdCurso"]);
$objGRADO = ControladorGrado::CtrlBuscar($objCURSO["GradoIdGrado"]);
$objPROF = ControladorProfesor::CtrlBuscar($objCURSO["ProfesorIdProfesor"]);
$periodoPdf = "";
if($periodo==1){
    $periodoPdf = "Primer Periodo";
}else if($periodo==2){
    $periodoPdf = "Segundo Periodo";
}else if($periodo==3){
    $periodoPdf = "Tercer Periodo";
}else if($periodo==4){
    $periodoPdf = "Cuarto Periodo";
}

//$pdf = new PDF();
$pdf = new PDF('L','mm','A3');
//$pdf = new PDF('L','mm',array(400,150)); 
//$pdf = new PDF('P','mm',array(100,150))
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

$pdf->Cell(190,10,"Estudiante : ". utf8_decode($objESTUD["Nombre"])." ".utf8_decode($objESTUD["Apellido"]),1,0,"J",0);
$pdf->Cell(190,10,"Curso : ". utf8_decode($objGRADO["Nivel"])." ".utf8_decode($objCURSO["Nombre"]),1,1,"J",0);
$pdf->Cell(190,10,"Periodo : ". utf8_decode($periodoPdf),1,0,"J",0);
$pdf->Cell(190,10,utf8_decode("Año : ".date("Y")),1,1,"J",0);
// Salto de línea
$pdf->Ln(5);
$pdf->Cell(100);
$pdf->Cell(100,10,utf8_decode("Evaluación Cuantitativa Parcial"),1,1,"C",0);
$pdf->Cell(100,10,"Nombre de la Asignatura",1,0,"C",0);
$pdf->Cell(25,10,"60%",1,0,"C",0);
$pdf->Cell(25,10,"20%",1,0,"C",0);
$pdf->Cell(25,10,"10%",1,0,"C",0);
$pdf->Cell(25,10,"10%",1,0,"C",0);
$pdf->Cell(60,10,"Definitiva",1,0,"C",0);
$pdf->Cell(60,10,utf8_decode("Desempeño"),1,0,"C",0);
$pdf->Cell(60,10,"Promedio",1,1,"C",0);


$count=0;
$promedio=0;

foreach ($Lista as $key => $ListaDatos){
    $desempeno = (int)$ListaDatos["Promedio"];
    // Salto de línea
    $pdf->Ln(2);
    $pdf->Cell(100,10, utf8_decode($ListaDatos["NombreMateria"]),1,0,"J",0);
    $pdf->Cell(25,10, $ListaDatos["NotaAcumulativa"],1,0,"C",0);
    $pdf->Cell(25,10, $ListaDatos["NotaComportamental"],1,0,"C",0);
    $pdf->Cell(25,10, $ListaDatos["Evaluacion"],1,0,"C",0);
    $pdf->Cell(25,10, $ListaDatos["AutoEvaluacion"],1,0,"C",0);
    $pdf->Cell(60,10, $ListaDatos["Promedio"],1,0,"C",0);
    if($desempeno > 0 && $desempeno < 3){
        $pdf->Cell(60,10,"BAJO",1,0,"C",0);
    }else if($desempeno >= 3 && $desempeno < 4){
        $pdf->Cell(60,10,"BASICO",1,0,"C",0);
    }else if($desempeno >= 4 && $desempeno <= 5){
        $pdf->Cell(60,10,"ALTO",1,0,"C",0);
    }
    $pdf->Cell(60,10, $ListaDatos["Promedio"],1,true,"C",0);
    $pdf->Cell(126.6,10,utf8_decode("Profesor : ". $ListaDatos["Nombre"]." ".$ListaDatos["Apellido"]),1,0,"J",0);
    $pdf->Cell(126.6,10,utf8_decode("Correo : ". $ListaDatos["Correo"]),1,0,"J",0);
    $pdf->Cell(126.6,10,utf8_decode("Telefono : ". $ListaDatos["Telefono"]),1,true,"J",0);
    $promedio+=(int)$ListaDatos["Promedio"];
    $count++;
}
$pdf->Ln(5);
$pdf->Cell(320);
if($count>0){
    $promedioFinal = $promedio/$count;
}else{
    $promedioFinal =0;
}
$pdf->Cell(60,10,"Promedio : ".$promedioFinal,1,true,"J",0);
$pdf->Ln(30);
$pdf->Cell(126.6,10,utf8_decode("Director de Curso : ".$objPROF["Nombre"]." ".$objPROF["Apellido"]),1,0,"J",0);
$pdf->Cell(126.6,10,utf8_decode("Correo : ".$objPROF["Correo"]),1,0,"J",0);
$pdf->Cell(126.6,10,"Telefono : ".$objPROF["Telefono"],1,true,"J",0);
$ruta = 'View/PdfBoletin/Boletin.pdf';
$pdf->Output('../'.$ruta,'F');
echo json_encode($ruta);
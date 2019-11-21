<?php 
    session_start();
    if(isset($_GET["url"])){
        if(isset($_SESSION['UserRol'])&&$_SESSION['UserRol']=="Administrador"){
            if($_GET["url"] == "Index" || $_GET["url"] == "Contacto" || $_GET["url"] == "Login"|| $_GET["url"] == "ForgotPassword" || $_GET["url"] == "Home" || $_GET["url"] == "MiNotificacion" || $_GET["url"] == "Perfil"){
                include "View/EveryBody/".$_GET["url"].".php";
            }else if($_GET["url"] == "Acudiente" || $_GET["url"] == "Administrador" || $_GET["url"] == "Estudiante"|| $_GET["url"] == "Profesor" || $_GET["url"] == "Materia" || $_GET["url"] == "Grado" || $_GET["url"] == "Curso" || $_GET["url"] == "Matricula" || $_GET["url"] == "Evento" || $_GET["url"] == "Directivo" || $_GET["url"] == "Empresa" || $_GET["url"] == "Informacion" || $_GET["url"] == "MiNotificacion" || $_GET["url"] == "Notificacion" || $_GET["url"] == "AcudienteEstudiante" || $_GET["url"] == "EstudianteAcudiente" || $_GET["url"] == "ProfesorCurso" || $_GET["url"] == "CursoProfesor" ){
                include "View/Administrator/".$_GET["url"].".php";
            }else{
                include "View/EveryBody/Error404.php";
            }
        }else if(isset($_SESSION['UserRol'])&&$_SESSION['UserRol']=="Estudiante"){
            if($_GET["url"] == "Index" || $_GET["url"] == "Contacto" || $_GET["url"] == "Login"|| $_GET["url"] == "ForgotPassword" || $_GET["url"] == "Home" || $_GET["url"] == "MiNotificacion" || $_GET["url"] == "Perfil"){
                include "View/EveryBody/".$_GET["url"].".php";
            }else if($_GET["url"] == "Acudiente" || $_GET["url"] == "Profesor" || $_GET["url"] == "Calificacion"|| $_GET["url"] == "Boletin" || $_GET["url"] == "Materia"){
                include "View/Student/".$_GET["url"].".php";
            }else{
                include "View/EveryBody/Error404.php";
            }
        }else if(isset($_SESSION['UserRol'])&&$_SESSION['UserRol']=="Profesor"){
            if($_GET["url"] == "Index" || $_GET["url"] == "Contacto" || $_GET["url"] == "Login"|| $_GET["url"] == "ForgotPassword" || $_GET["url"] == "Home" || $_GET["url"] == "MiNotificacion" || $_GET["url"] == "Perfil"){
                include "View/EveryBody/".$_GET["url"].".php";
            }else if($_GET["url"] == "Acudiente" || $_GET["url"] == "Estudiante" || $_GET["url"] == "Curso" || $_GET["url"] == "CursoDirector" || $_GET["url"] == "AcudienteEstudiante" || $_GET["url"] == "EstudianteAcudiente" || $_GET["url"] == "CursoEstudianteDirector" || $_GET["url"] == "CursoEstudiante" || $_GET["url"] == "Calificacion" || $_GET["url"] == "Boletin"){
                include "View/Teacher/".$_GET["url"].".php";
            }else{
                include "View/EveryBody/Error404.php";
            }
        }else if(isset($_SESSION['UserRol'])&&$_SESSION['UserRol']=="Acudiente"){
            if($_GET["url"] == "Index" || $_GET["url"] == "Contacto" || $_GET["url"] == "Login"|| $_GET["url"] == "ForgotPassword" || $_GET["url"] == "Home" || $_GET["url"] == "MiNotificacion" || $_GET["url"] == "Perfil"){
                include "View/EveryBody/".$_GET["url"].".php";
            }else if( $_GET["url"] == "Estudiante"|| $_GET["url"] == "Profesor"|| $_GET["url"] == "Materia" || $_GET["url"] == "Calificacion" || $_GET["url"] == "Boletin"){
                include "View/Parent/".$_GET["url"].".php";
            }else{
                include "View/EveryBody/Error404.php";
            }
        }else if($_GET["url"] == "Index" || $_GET["url"] == "Contacto" || $_GET["url"] == "Login"|| $_GET["url"] == "ForgotPassword"){
            include "View/EveryBody/".$_GET["url"].".php";
        }else{
            include "View/EveryBody/Error404.php";
        }
    }else{
        include "View/EveryBody/Index.php";
    }
    
?>
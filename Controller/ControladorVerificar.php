<?php
    require_once "../Model/ModeloAcudiente.php";
    require_once "../Model/ModeloAdministrador.php";
    require_once "../Model/ModeloEstudiante.php";
    require_once "../Model/ModeloProfesor.php";
    class ControladorVerificar{
        public static function CtrlValidarCorreo($correo){
            $objBUSCMCORREOACUDIENTE = ModeloAcudiente::BuscarCorreoAcudiente($correo);
            $objBUSCMCORREOADMINISTRADOR = ModeloAdministrador::BuscarCorreoAdministrador($correo);
            $objBUSCMCORREOESTUDIANTE = ModeloEstudiante::BuscarCorreoEstudiante($correo);
            $objBUSCMCORREOPROFESOR = ModeloProfesor::BuscarCorreoProfesor($correo);
            if($correo == $objBUSCMCORREOACUDIENTE["Correo"]){
                return true;
            }else if($correo == $objBUSCMCORREOADMINISTRADOR["Correo"]){
                return true;
            }else if($correo == $objBUSCMCORREOESTUDIANTE["Correo"]){
                return true;
            }else if($correo == $objBUSCMCORREOPROFESOR["Correo"]){
                return true;
            }else{
                $apiKey= 'bdf6da844098b58d89a18f9d9cd2a6b4';
                $ch =  curl_init('http://apilayer.net/api/check?access_key='.$apiKey.'&email='.$correo.'&smtp=1&format=1');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $json = curl_exec($ch);
                curl_close($ch);
                $validationResult = json_decode($json,  true);
                return $validationResult["smtp_check"];
            }
        }
        public static function CtrlValidarTelefono($telefono){
            $objBUSCMTELEFONOACUDIENTE = ModeloAcudiente::BuscarTelefonoAcudiente($telefono);
            $objBUSCMTELEFONOADMINISTRADOR = ModeloAdministrador::BuscarTelefonoAdministrador($telefono);
            $objBUSCMTELEFONOESTUDIANTE = ModeloEstudiante::BuscarTelefonoEstudiante($telefono);
            $objBUSCMTELEFONOPROFESOR = ModeloProfesor::BuscarTelefonoProfesor($telefono);
            if($telefono == $objBUSCMTELEFONOACUDIENTE["Telefono"]){
                return true;
            }else if($telefono == $objBUSCMTELEFONOADMINISTRADOR["Telefono"]){
                return true;
            }else if($telefono == $objBUSCMTELEFONOESTUDIANTE["Telefono"]){
                return true;
            }else if($telefono == $objBUSCMTELEFONOPROFESOR["Telefono"]){
                return true;
            }else{
                $apiKey= '6d4b5facab5de4f11f9940d003e51033';
                $ch =  curl_init('http://apilayer.net/api/validate?access_key='.$apiKey.'&number='.$telefono.'&country_code=CO&format=1');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $json = curl_exec($ch);
                curl_close($ch);
                $validationResult = json_decode($json,true);
                return $validationResult["valid"];
            }
        }
    }
?>
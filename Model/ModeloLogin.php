<?php 
session_start();
require_once "Conexion.php";
    class ModeloLogin{
        public static function Login($rol,$user,$password){
            $sql = "SELECT * FROM ".$rol." WHERE Correo = :correo";
            $oBJEC_DATA = Conexion::conectar()->prepare($sql);
            $oBJEC_DATA  -> bindParam(":correo",$user, PDO::PARAM_STR);
            $oBJEC_DATA -> execute();
            $oBJEC_LOGIN =  $oBJEC_DATA -> fetch();

            $idDB = $oBJEC_LOGIN["Id".$rol];
            $nombreDB = $oBJEC_LOGIN["Nombre"];
            $apellidoDB = $oBJEC_LOGIN["Apellido"];
            $correoDB = $oBJEC_LOGIN["Correo"];
            $passwordDB = $oBJEC_LOGIN["Password"];
            $fotoDB = $oBJEC_LOGIN["Foto"];

            if ($user == $correoDB){
                if (password_verify($password, $passwordDB)) {
                    unset($password);
                    unset($passwordDB);
                    $_SESSION['UserId'] = $idDB;
                    $_SESSION['UserRol'] = $rol;
                    $_SESSION['UserNombre'] = $nombreDB;
                    $_SESSION['UserApellido'] = $apellidoDB;
                    $_SESSION['UserCorreo'] = $correoDB;
                    $_SESSION['UserFoto'] = $fotoDB;
                    $_SESSION['TimeSession'] = time(); 
                    return true;
                }else{
                    return "La contraseña ingresada es Incorrecta";
                }

            }else{
                return "El correo ingresado no es un ".$rol.", es Incorrecto o no existe.";
            }

        }
        public static function Profile($rol,$id){
            $sql = "SELECT * FROM ".$rol." WHERE Id".$rol." = :id";
            $oBJEC_DATA = Conexion::conectar()->prepare($sql);
            $oBJEC_DATA  -> bindParam(":id",$id, PDO::PARAM_STR);
            $oBJEC_DATA -> execute();
            $oBJEC_LOGIN =  $oBJEC_DATA -> fetch();
            return $oBJEC_LOGIN;
        }
        public static function EditProfile($rol,$id,$nombre,$apellido,$tipoDocumento,$documento,$rh,$correo,$password,$telefono,$foto,$fechaNacimiento){
            $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE ".$rol."  SET Nombre = :nombre,Apellido = :apellido,TipoDocumento = :tipoDocumento,Documento = :documento,Rh = :rh,Correo = :correo,Password = :password,Telefono = :telefono,Foto = :foto,FechaNacimiento = :fechaNacimiento WHERE Id".$rol."  = :id");
            $oBJEC_DATA_UPDATE  -> bindParam(":id",$id, PDO::PARAM_INT);
            $oBJEC_DATA_UPDATE  -> bindParam(":nombre",$nombre, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":apellido",$apellido, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":tipoDocumento",$tipoDocumento, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":documento",$documento, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":rh",$rh, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":correo",$correo, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":password",$password, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":telefono",$telefono, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":foto",$foto, PDO::PARAM_STR);
            $oBJEC_DATA_UPDATE  -> bindParam(":fechaNacimiento",$fechaNacimiento, PDO::PARAM_STR);
            $_SESSION['UserId'] = $id;
            $_SESSION['UserRol'] = $rol;
            $_SESSION['UserNombre'] = $nombre;
            $_SESSION['UserApellido'] = $apellido;
            $_SESSION['UserCorreo'] = $correo;
            $_SESSION['UserFoto'] = $foto;
            return ($oBJEC_DATA_UPDATE -> execute());
        }
        public static function Recover($rol,$user){
            $sql = "SELECT * FROM ".$rol." WHERE Correo = :correo";
            $oBJEC_DATA = Conexion::conectar()->prepare($sql);
            $oBJEC_DATA  -> bindParam(":correo",$user, PDO::PARAM_STR);
            $oBJEC_DATA -> execute();
            $oBJEC_LOGIN =  $oBJEC_DATA -> fetch();
            $idDB = $oBJEC_LOGIN["Id".$rol];
            $correoDB = $oBJEC_LOGIN["Correo"];
            $telefonoDB = $oBJEC_LOGIN["Telefono"];
            if ($user == $correoDB){
                $key = '';
                $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
                $max = strlen($pattern)-1;
                for($i=0;$i < 10;$i++){
                    $key .= $pattern{mt_rand(0,$max)};
                }
                $password = password_hash($key,PASSWORD_DEFAULT);
                $oBJEC_DATA_UPDATE = Conexion::conectar()->prepare("UPDATE ".$rol."  SET Password = :password WHERE Id".$rol."  = :id");
                $oBJEC_DATA_UPDATE  -> bindParam(":id",$idDB, PDO::PARAM_INT);
                $oBJEC_DATA_UPDATE  -> bindParam(":password",$password, PDO::PARAM_STR);
                $oBJEC_DATA_UPDATE -> execute();    
                $essql = $oBJEC_DATA_UPDATE;
                /*Mensaje SMS*/
                $mensajeSMS = "Su nueva Contraseña como ".$rol." es : ( ".$key." ).";
                $request = [ 
                    "api_key" => "88d9e978596e56402700fc866c4e4533",
                    "messages" => [ 
                       [
                          "from" => "REMITENTE",
                          "to" => "57".$telefonoDB,
                          "text" => $mensajeSMS
                       ]
                    ]
                ];
                $headersms = array('Content-Type: application/json');
                $ch = curl_init('https://api.gateway360.com/api/3.0/sms/send');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headersms);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($request));
                $result = curl_exec($ch);
                if (curl_errno($ch) != 0 ){
                    die("curl error: ".curl_errno($ch));
                }
                /*Mensaje Email*/           
                $destinatario = $user;
                $from = "yibercitolopez@hotmail.com";
                $pass = "13012001yiber";
                $asunto = utf8_decode("Restablecer contraseña en School Admin.");
                $mensaje = utf8_decode("Su nueva Contraseña como <b>".$rol."</b> es : ( <b>".$key."</b> ).");                 
                $mail = new PHPMailer();
                try {
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.live.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = $from;
                    $mail->Password   = $pass;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587; 
                    $mail->setFrom($from, 'School Admin');
                    $mail->addAddress($destinatario);  
                    $mail->isHTML(true); 
                    $mail->Subject = $asunto;
                    $mail->Body    = $mensaje;
                    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    $mail->send();
                    return (true);
                } catch (Exception $e) {
                    return "El mensaje no pudo ser enviado. Error de correo : {$mail->ErrorInfo}";
                }
            }else{
                return "El correo ingresado no es un ".$rol.", es Incorrecto o no existe.";
            }

        }
    }
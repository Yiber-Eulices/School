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
    }
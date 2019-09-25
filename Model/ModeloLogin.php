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
                //if (password_verify($password,$passwordDB) ){
                if ($password==$passwordDB){
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
    }
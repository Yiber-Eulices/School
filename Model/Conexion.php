<?php
	class Conexion{
		public static function conectar(){
			$cvServer = "localhost";
			$cvUserServer = "root";
			$cvPasswordServer = "";
			$cvDataBaseServer = "school";
			try {
				$obConnectDataBase = new PDO('mysql:host='.$cvServer.';dbname='.$cvDataBaseServer.';',$cvUserServer,$cvPasswordServer);
				$obConnectDataBase -> EXEC("set names utf8");
			} catch (Exception $e) {
				$obConnectDataBase = "<script>alert( 'Se ha detectado un error : '".$e.");</script>";				
			}
			return $obConnectDataBase;
		}
	}
?>
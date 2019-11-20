<?php
function isLoginSessionExpired() {
	$time_duration = 300;//2 minutos
	$current_time = time(); 
	if( isset($_SESSION['TimeSession']) ){  
		if(  (time() - $_SESSION['TimeSession']) > $time_duration ){ 
			return true; 
		}else{
			timeReload();
			return false;
		} 
	}else{
        return true;
    }
}
function isLoginSessionExpiredVerif() {
	$time_duration = 300;//2 minutos
	$current_time = time(); 
	if( isset($_SESSION['TimeSession']) ){  
		if(  (time() - $_SESSION['TimeSession']) > $time_duration ){ 
			return true; 
		}else{
			return false;
		} 
	}else{
        return true;
    }
}
function timeReload(){
	$_SESSION['TimeSession'] = time();
}
if(isset($_GET["a"])&&$_GET["a"]=="reload"){
	session_start();
	echo json_encode(isLoginSessionExpired());
}
if(isset($_GET["a"])&&$_GET["a"]=="verif"){
	session_start();
	echo json_encode(isLoginSessionExpiredVerif());
}
?>
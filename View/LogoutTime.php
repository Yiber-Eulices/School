<?php
function isLoginSessionExpired() {
	$time_duration = 100; 
	$current_time = time(); 
	if( isset($_SESSION['TimeSession']) ){  
		if(  (time() - $_SESSION['TimeSession']) > $time_duration ){ 
			return true; 
		} 
	}else{
        return false;
    }
}
?>
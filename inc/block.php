<?php

    
	session_start();
	if($_SESSION['logado'] == false){
		header('location: login.php');
	}

?>
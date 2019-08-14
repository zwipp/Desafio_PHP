<?php

    
	session_start();
	if(!$_SESSION['logado']){
		header('location: login.php');
	}

?>
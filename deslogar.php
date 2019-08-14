<?php

    if($_POST){

        session_start();

        //destruir a session quando clicar no botao de sair
        session_destroy();

        //mandar para o login
        header('location: login.php');
    }

?>
<?php

    //print_r($_POST);

    include('./inc/function_users.php');

    $usuario = getUsers();

    //excluindo ocicao que foi mandada
    array_splice($usuario,$_POST["posicao"],1); 

    //transformando o array usuarios numa string json
    $json = json_encode($usuario);

    //salvar a string json no arquivo
    file_put_contents(ARQUIVO,$json);

    header('location: cadastro_usuario.php');




?>
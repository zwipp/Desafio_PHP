<?php

    //print_r($_POST);

    include('./inc/function.php');

    $produto = getProduto();

    //excluindo ocicao que foi mandada
    array_splice($produto,$_POST["posicao"],1); 

    //transformando o array usuarios numa string json
    $json = json_encode($produto);

    //salvar a string json no arquivo
    file_put_contents(ARQUIVO,$json);

    header('location: produtos.php');




?>
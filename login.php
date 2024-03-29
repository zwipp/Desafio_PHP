<?php

    //incluindo arquivo de funçãos do usuario
    include('./inc/function_users.php');

    if($_POST){
        $loginOK = login($_POST['email'],$_POST['senha']);
        if($loginOK){

            //criando a session
            session_start();
            $_SESSION['logado'] = true;

            //mandando para a pagina de cadastro de produtos
            header('location: cadastro.php');
        }
    }

    else{
        $loginOK = true;
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./estilo/login.css">

</head>
<body>

    <?php
        if (!$loginOK) {
            echo('vc errouuuuuuuuuuuuuuuuuuuuuuuu, ta pegando fogo bixo');
        }
    ?>
    
    <div class="d-flex justify-content-end align-items-center" style="height: 100vh">
        <div class="col-4 rounded p-4 h-100 d-flex justify-content-center align-items-center" id="login">
            <img class="logo" src="./img/logo.png" alt="">
            <form action="" method="post" class="w-100" >
                <div class="form-group">
				    <label for="email" class="texto">E-mail</label>
				    <input value="" type="email" class="form-control" id="email" name="email" placeholder="e-mail">
                    <?php if($loginOK): ?><div class="invalid-feedback">Email invalido.</div><?php endif; ?>
                </div>
                <div class="form-group">
				    <label for="senha" class="texto">senha</label>
				    <input value="" type="password" class="form-control" id="senha" name="senha" placeholder="senha">
                    <?php if($loginOK): ?><div class="invalid-feedback">senha invalido.</div><?php endif; ?>
                </div>
                <button class="btn col-12 botao texto" type="submit">Enviar</button>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
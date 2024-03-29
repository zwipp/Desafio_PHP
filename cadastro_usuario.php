<?php

    include('./inc/function_users.php');

    include('./inc/block.php');

    if($_POST){

        //verificando o post
        $erros = errosPost();

        //print_r($_POST);
        //exit;

        if(count($erros) == 0){

            // adicionar usuario ao arquivo json
            addUsuario($_POST['nome'],$_POST['email'],$_POST['senha']);
        }
    
    }

    else {
        //garantindo que o vetor de erros existe
        // mesmo vazio
        $erros = [];
    }

    $errNome = in_array('errNome',$erros);

    $errEmail = in_array('errEmail',$erros);

    $errSenha = in_array('errSenha',$erros);

    $errConf = in_array('errConf',$erros);


    $usuarios = getUsers();

?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
    <link rel="stylesheet" href="./estilo/produtos.css">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light" id="cabecalho">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
  		</button>
  		<div class="collapse navbar-collapse" id="navbarText">
            <img class="logo" src="./img/logo.png" alt="">
    		<ul class="navbar-nav mr-auto">
      			<li class="nav-item active">
        			<a class="nav-link" id="texto" href="./cadastro.php">Cadastro de produto<span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" id="texto" href="./cadastro_usuario.php">Cadastro de usuario</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" id="texto" href="./produtos.php">produtos</a>
      			</li>
                <li class="nav-item">
                    <form action="deslogar.php" method="post">
                        <input type="hidden" name="deslogar">
                        <button class="btn botao" type="submit">Sair</button>  
                    </form>
      			</li>
    		</ul>
  		</div>
	</nav>


    <div class="container" id="cadastro">
		<div class="row">

            <ul class="col-sm-12 col-md-4 list-group">
				<?php foreach($usuarios as $i => $c): ?>
				<li class="list-group-item">
					<span><?= $c['nome'];  ?></span> : 
					<span><?= $c['email'];  ?></span>
                    <form action="excluir_usuario.php" method="post">
                        <input type="hidden" name="posicao" value="<?= $i; ?>">
                        <button class="btn botao" type="submit">Excluir</button>  
                    </form>
				</li>
				<?php endforeach; ?>
			</ul>

            <form class="col-sm-12 col-md-8" action="cadastro_usuario.php" method="post">
                <div class="form-group">
					<label for="nome">Nome</label>
					<input value="" type="text" class="form-control <?= ($errNome?'is-invalid':'')?>" id="nome" name="nome" placeholder="Digite o nome do funcionário">
                    <?php if($errNome): ?><div class="invalid-feedback">Adicione um nome.</div><?php endif; ?>
                </div>

                <div class="form-group">
					<label for="email">E-mail</label>
					<input value="" type="email" class="form-control <?= ($errEmail?'is-invalid':'')?>" id="email" name="email" placeholder="Digite o e-mail do funcionário">
                    <?php if($errEmail): ?><div class="invalid-feedback">Preencha o e-mail corretamente.</div><?php endif; ?>
                </div>

                <div class="form-group">
					<label for="senha">senha</label>
					<input value="" type="password" class="form-control <?= ($errSenha?'is-invalid':'')?>" id="senha" name="senha" placeholder="Digite uma senha para o funcionario">
                    <?php if($errSenha): ?><div class="invalid-feedback">Senha invalida.</div><?php endif; ?>
                </div>

                <div class="form-group">
					<label for="conf">Confirmar senha</label>
					<input value="" type="password" class="form-control <?= ($errConf?'is-invalid':'')?>" id="conf" name="conf" placeholder="Confirmar senha">
                    <?php if($errConf): ?><div class="invalid-feedback">Confirmação senha invalida.</div><?php endif; ?>
                </div>
				
                <button class="btn botao" type="submit">Salvar</button>


            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
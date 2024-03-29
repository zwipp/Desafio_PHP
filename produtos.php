<?php

    include('./inc/function.php');

    include('./inc/block.php'); //confirmar se esta logado

    // Carregando vetor de produtos
	  $produto = getProduto();
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
    <style>
		.foto_func{
			width: 75px;
			border-radius: 16px;
		}
	  </style>

</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light " id="cabecalho">
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

    
    <div class="container">
        <!-- ////////////// -->

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produto as $i => $p): ?>
                    <tr>
                        <th scope="row"><img src="<?= $p['foto']; ?>" alt="" class="foto_func"></th>
                        <td><?= $p['nome'];  ?></td>
                        <td><?= $p['descricao'];  ?></td>
                        <td><?= $p['preco'];  ?></td>
                        <td> 
                            <form action="excluir_produto.php" method="post">
                                <input type="hidden" name="posicao" value="<?= $i; ?>">
                                <input type="hidden" name="urlfoto" value="<?= $p['foto']; ?>">
                                <button class="btn botao" type="submit">Excluir</button>  
                            </form>
                        </td>
                  </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
		integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
		crossorigin="anonymous"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
		crossorigin="anonymous"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
		crossorigin="anonymous"></script>
</body>

</html>
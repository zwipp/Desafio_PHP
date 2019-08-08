<?php

	include('./inc/function.php');

	if($_POST){

		$erros = errosNoPost(); //verificar se tem erros
		
		if($_FILES['foto']){
			if ($_FILES['foto']['error'] == 0) {
				//salvar foto no lugar certo
				move_uploaded_file($_FILES['foto']['tmp_name'],'./foto/'.$_FILES['foto']['name']);

				//salvando o nome do arquivo (da foto)
				$arquivo_def = './foto/'.$_FILES['foto']['name'];
			}
			else {
				$erros [] = 'errUpload';
			}
		}

		if(count($erros) == 0){
			addProduto($_POST['nome'],$_POST['descricao'],$_POST['preco'],$arquivo_def);
		}
	}

	else{
		$erros = [];
	}





	// errNome será true se o campo nome for inválido e false se o campo estiver ok. 
	$errNome = in_array('errNome',$erros);

	// errPreco será true se o campo preco for inválido e false se o campo estiver ok. 
	$errPreco = in_array('errPreco',$erros);
	
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

</head>

<body>
	<div class="container">
		<div class="row">

			<form class="col-sm-12 col-md-8" action="cadastro.php" method="post" enctype="multipart/form-data">
				
				<div class="form-group">
					<label for="nome">Nome do produto</label>
					<input value="" type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do produto">
					<?php if($errNome): ?><div class="invalid-feedback">Preencha o nome.</div><?php endif; ?>
				</div>

				<div class="form-group">
					<label for="exampleFormControlTextarea1">Descrição do produto</label>
					<textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
				</div>

				<div class="form-group">
					<label for="nome">Preço do produto</label>
					<input value="00,00" type="number" class="form-control" id="preco" name="preco" placeholder="Digite o preço do produto">
					<?php if($errPreco): ?><div class="invalid-feedback">Coloque um preço.</div><?php endif; ?>
				</div>

				<div class="form-group">
					<div class="custom-file">
    					<input type="file" class="custom-file-input" name="foto" id="foto">
    					<label class="custom-file-label" for="foto">Escolha uma foto...</label>
  					</div>
				</div>
				
				<button class="btn btn-primary" type="submit">Salvar</button>
				
			</form>
		</div>
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
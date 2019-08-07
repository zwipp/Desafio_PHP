<?php

    // Definindo uma constante para o nome do arquivo
	define('ARQUIVO','produto.json');


    function errosNoPost(){
        $erros = [];
        if(!isset($_POST['nome']) || $_POST['nome']==''){  //se tiver erro no nome
            $erros[] = 'errNome';
        }

        if(!isset($_POST['preco']) || $_POST['preco']==''){  //se tiver erro no preco
            $erros[] = 'errPreco';
        }

        return $erros;
    }

    //Carregando o conteudo do arquivo (string json) para uma variavel

    function getProduto(){
        $json = file_get_contents(ARQUIVO);
        $produtos = json_decode($json,true);
        return $produtos;
    }

    // Função que adiciona o produto ao json

    function addProduto($nome,$descricao,$preco){

        //carregando os produtos
        $produto = getProduto();

        //adicionando um novo produto ao array de produtos
        $produto[] = [
            'nome' => $nome,
            'descricao' => $descricao,
            'preco' => $preco,
            //'foto' => $foto
        ];

        // Transformando o array produto numa string json
        $json = json_encode($produto);

        //salvar a string json no arquivo
        file_put_contents(ARQUIVO,$json);

    }




?>
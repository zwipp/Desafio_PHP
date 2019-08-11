<?php

    // Definindo uma constante para o nome do arquivo
    define('ARQUIVO','usuarios.json');

    //func validar erros post
    function errosPost(){
        $erros = [];
        if(!isset($_POST['nome']) || $_POST['nome'] ==''){
            $erros[] = 'errNome';
        }

        if(!isset($_POST['email']) || $_POST['email'] ==''){
            $erros[] = 'errEmail';
        }

        if(!isset($_POST['senha']) || $_POST['senha'] ==''){
            $erros[] = 'errSenha';
        }

        if(!isset($_POST['conf']) || $_POST['conf'] ==''){
            $erros[] = 'errConf';
        }

        return $erros;
    }

    //Carregando o conteudo do arquivo (string json) para uma variavel
    function getUsers(){
        $json = file_get_contents(ARQUIVO);
        $usuarios = json_decode($json,true);
        return $usuarios;
    }

    //função que add usuario ao json
    function addUsuario($nome,$email,$senha){

        //carregando os usuarios
        $usuarios = getUsers();

        //adicionando um novo usuario ao array de usuarios
        $usuarios[] = [
            'nome' => $nome,
            'email' => $email,
            'senha' => password_hash($senha,PASSWORD_DEFAULT)
        ];

        //transformando o array usuarios numa string json
        $json = json_encode($usuarios);

        //salvar a string json no arquivo
        file_put_contents(ARQUIVO,$json);

    }


?>
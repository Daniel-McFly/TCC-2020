<?php
    session_start();
   // string de conexão com o banco
    $CONEXAO = mysqli_connect("localhost:3306", "root","1234","TCC");

    //Pegando os dados escritos pelo usuário e guardando em variáveis
    $cpf = $_POST['txt_cpf'];
    $endereco = $_POST['txt_endereco'];
    $bairro = $_POST['txt_bairro'];
    $cidade = $_POST['txt_cidade'];
    $nome = $_POST['txt_nome'];
    $cep = $_POST['txt_cep'];
    $email = $_POST['txt_email'];
    $telefone = $_POST['txt_telefone'];
    $login = $_POST['txt_login'];
    $senha = $_POST['txt_senha'];
    
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
    $cpf2 = $cpf;
    
    function validaCPF($cpf) {
 
        
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
            return false;
            }
        }
        return true;
    }
    

    if(validaCPF($cpf) == false)
    {
        echo "Deu ruim";
    }
    else
    {
    
    //iniciando uma transação, para ter controle em caso de erros com o banco
    mysqli_begin_transaction($CONEXAO);

    //Colocando o comando de insert na variável "$sql"
    $sql = "INSERT INTO cadastro (CPF, NOME, EMAIL, ENDERECO, BAIRRO, CIDADE, CEP, CEL) VALUES('$cpf2','$nome','$email','$endereco','$bairro','$cidade','$cep','$telefone')" ;   
    
    //Aqui, se o comando "sql" for bem sucedido ele continua o codigo de inserção
    if(mysqli_query($CONEXAO, $sql))
    {
        //Colocando um novo insert na variável "$sql"
        $sql = "INSERT INTO login (CPFLOGIN, LOGIN, SENHA) VALUES('$cpf2','$login',md5('$senha'))" ;

        //fazendo novamente um teste para seguir no código de inserção
        if(mysqli_query($CONEXAO, $sql))
        {   
            //Salvando a transação
            mysqli_commit($CONEXAO);

            //Altera a página de usuário para a página de login
            echo "OK";
        }

        //caso não consiga fazer o segundo insert
        else
        {
            //Escreve uma mensagem de erro, mostrando o erro ocorrido no banco
            echo "Deu ruim";

            //Reverte toda a transação
            mysqli_rollback($CONEXAO);
        }
    }

    //caso não consiga fazer o primeiro insert
    else
    {
        //Escreve uma mensagem de erro, mostrando o erro ocorrido no banco
        echo "Deu ruim";
        
        //Reverte toda a transação
        mysqli_rollback($CONEXAO);
    }

}
?>
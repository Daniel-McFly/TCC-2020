<?php 
    session_start();
    //Faz um teste para ver se o usuario não deixou nenhum campo vazio
    if(empty($_POST['txt_login']) || empty($_POST['txt_senha']))
    {
        $_SESSION['nao_autenticado'] = true;
        header('Location: login.php');
        
        //Sai da página
        exit();
    }
   
    //string de conexão
    $conexao = mysqli_connect("localhost:3306", "root","1234","TCC");

    //torna acessivel os caracteres especiais
    $usuario = mysqli_real_escape_string($conexao, $_POST['txt_login']);
    $senha = mysqli_real_escape_string($conexao, $_POST['txt_senha']);
    
    //Um select, onde ele preocura pelo login e senha igual a que o usuário digitou
    $query = "select CPFLOGIN, IDLOGIN, LOGIN from login where login = '{$usuario}' and senha = md5('{$senha}')";
    
    //envia o comando, e salva ele na variável"$result"
    $result = mysqli_query($conexao,$query);

    //conta o número de linhas que veio na pesquisa
    $row = mysqli_num_rows($result);
    
    //Verifica se o número de pesquisas que chegaram foi igual a um
    if($row == 1)
    {
        $aux = mysqli_fetch_assoc($result);
        $_SESSION['CPF'] = $aux["CPFLOGIN"];
        $_SESSION['usuario'] = $usuario;
        //muda para a página home
        header('Location: Pedidos.php');
        
        //Sai da página
        exit();
    }
    
    // caso não seja igual à um
    else
    {
        $_SESSION['nao_autenticado'] = true;
        header('Location: login.php');
        
        //Sai da página
        exit();
        
    }
?>      
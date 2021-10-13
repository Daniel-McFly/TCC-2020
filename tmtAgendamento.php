<?php 
    session_start();
    $conexao = mysqli_connect("localhost:3306","root","1234", "TCC");
    
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome = md5(time()) . $extensao;
    $diretorio  = "upload/";

    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
    
    $problema = $_POST['problema'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $cpf = $_SESSION['CPF'];
    $hoje = date('Y-m-d H:i:s');
    $date_user = $data . " $hora:00";

    if($date_user >= $hoje && $hora >= "06:00" && $hora <= "17:00")
    {
        $comando = "INSERT INTO AGENDAMENTO(AGDCPF, AGDPROBLEMA, AGDDATA, AGDIMAGEM) VALUES ('$cpf', '$problema', '$date_user', '$novo_nome')";
        if(mysqli_query($conexao, $comando))
        {
            header("location: visualisar.php?txtPesquisa=&cmdPesquisa=");
            session_destroy();

            
            exit();
        }
        else
        {
            $_SESSION['nao_autenticado1'] = true;
            header('Location:pedidos.php');
            exit();
        }
        
        
    }
    else
    {
        $_SESSION['nao_autenticado2'] = true;
        header('Location:pedidos.php');
        exit();
    }
?>
<?php 
    session_start();

    $conexao = mysqli_connect("localhost:3306","root","1234", "TCC");
    
    $agd = $_POST['rbCOD'];
    $sql = "delete from agendamento where agdcodigo = " . $agd;

    $csql = mysqli_query($conexao, $sql);

    header('Location: visualisar.php?txtPesquisa=&cmdPesquisa=');


?>
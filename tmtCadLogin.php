<?php 
    $CONEXAO = mysqli_connect("localhost:3306", "root","1234","TCC");

    $CPF = $_POST['txt_cpf'];
    $login = $_POST['txt_login'];
    $senha = $_POST['txt_senha'];

    $sql = "INSERT INTO login (CPFLOGIN, LOGIN, SENHA) VALUES('$CPF','$login',md5('$senha'))" ;   
    $resultado = mysqli_query($CONEXAO, $sql);
    
    header('Location: login.html');
?>
<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login FEABTA</title>
    <link rel="stylesheet" href="css/cadastro.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body class="fundo_site">
<script language="javascript" src="javascript/login.js"></script>    
<!--Menu do site-->
<nav class="menu">
    <!--A imagem da logo no site-->
    <img id="ahover_btn_menu" class="logo" src="img/LogoDefinitivoSite_menor.png">
    <ul>   
        <!--Ao passar o mouse por cima ou retirar o mouse de cima, a tag <img> tem o src alterado pela função mudaFoto js-->
        <li onmouseover="mudaFoto('img/icone_home.png')" onmouseout="mudaFoto('img/LogoDefinitivoSite_menor.png')"><a class="PAGINA" href="Home.html">	
            <!--Efeitos do botão do menu-->
            <span></span>
            <span></span>
            <span></span>
            <span></span> 
            Home 
            </a> 
        </li>

        <li onmouseover="mudaFoto('img/icone_contatos.png')" onmouseout="mudaFoto('img/LogoDefinitivoSite_menor.png')"><a class="PAGINA" href="Contatos.html">
                <span></span>
                <span></span>
                <span></span>  
                Contatos 
            </a> 
        </li>

        <li onmouseover="mudaFoto('img/icone_cadastro.png')" onmouseout="mudaFoto('img/LogoDefinitivoSite_menor.png')"><a class="PAGINA"  href="cadastro.html"> 
                <span></span>
                <span></span>
                <span></span>
                <span></span> 
                Cadastro 
            </a> 
        </li>

    </ul>
    <!--A barra de pesquisa do site com o tipo search que é um campo de texto com uma só linha para digitar termos de busca; quebras de linha são automaticamente removidas do valor entrado.-->             
    <input class="barra-pesquisa" type="search" placeholder="PESQUISAR">
    <!--Imagem de login dentro do menu-->    
    <a href="login.html"><img class="icone-login" src="img/login_atual_menor.png"></a>
</nav>
  <!--Linha azul de baixo do menu-->
<div class="linha_azul"></div>



<div id="interface" style="height: 350px !important;">
    
    <div class="container" style="height: 350px !important;">
          
        <form style="margin-top: 120px;" method="POST" action="tmtLogin.php" onSubmit="return fnValidaForm()">
        
        <h1 class="titulo"><b>Login</b></h1>
        <br><br><br><br>
        <?php
        if(isset($_SESSION['nao_autenticado']))
        {
    ?>
        <div class="notification is-danger" style="color: white; font-size: 18px;">
           <center><p>ERRO: Usuário ou senha inválidos.</p></center> 
        </div>
    <?php
            unset($_SESSION['nao_autenticado']);
        }
    ?> 
        <label id="primeiro"><b>Usuário</b></label>
        <input placeholder="Escreva o nome de seu usuário" autocomplete=off class="login" name="txt_login" /><br />
        <label><b>Senha</b></label>
        <input placeholder="Digite sua senha" autocomplete=off class="login" type="password" name="txt_senha" />
        <br /><br />
        <button style="margin-top: 15px; margin-left: 155px;" type="submit" >Login</button>
        
        <a href="Cadastroq.php"><button type="button" class="btnCad" value="Cadastrar" ">Cadastrar</button> </a>

        </form>
        
    </div>
    
     
</div>

<footer class="rodape" style="margin-top: 110px;">
    <p class="texto_fundo">&#9400;2020 FEABTA informática Todos os direitos reservados:<br>
    Site por Projeto Auxillium</p>
</footer>
</body>
</html>
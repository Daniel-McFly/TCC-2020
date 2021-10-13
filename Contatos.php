<!DOCTYPE html>
<html lang="pt-br">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nossos contatos</title>
    <link rel="stylesheet" href="css/CONTATOS.CSS">
    <script type="text/javascript" src="contatos.js"></script>


</head>
<div style="margin-top:-7px;">
<?php
include 'menu.php';
?>
</div>
<br><br><br><br>

    <DIV class="TEXTO"><br>
<h1>Contatos</h1><br>
Nome: Fernando <br>
Email: fernando@gmail.com <br>
Cel: 91234-5678 <br>
Onde trabalho : São Paulo  <br>
Horário : Das X até Y <br>
<br>


         <!--Mostra o texto pelas abas-->  
        <form id="formY" onchange="imagem_escolhida();">
            <!--a div seleciona serve para criar a borda azul nas opções-->
                        
            <label class="container">
            <div class="seleciona" >
            CLIQUE AQUI PARA <br> VER OS PREÇOS      
            <input type="checkbox" id="imgs1" name="opcao" value="1">
            </div>
            </label>                      
         </form>
        <!--Fim abas-->  
    </DIV> 

    <br>
        <!--tabela de preços-->  
    <div id="divimg2">
        <div id="anuncio"> Avulso por apenas</div> <div id="nume"> R$175!</div><br><br><br>
      <div id="cond"> O preço pode variar de acordo <br>
         com o serviço executado para o cliente.</div> 
    </div>
    <br><br><br><br><br><br><br><br>
    <div id="divimg1">
        <img src="img/Logo.png" class="logo" height="auto"alt="">
    </div>
</label> 
            <!--Fim preços--> 
</body>
</html>
<?php
session_start();

if(!$_SESSION['usuario'])
{
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang=pt-br>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu pedido ; )</title>
    <link rel="stylesheet" href="Pedidos.css">
</head>
<body>
</head>

<body>
<?php
include 'menu.php';
?>
<div class="suma">
 <br><br><br> <br><br><br>
</div>

    <form action="tmtAgendamento.php" method="POST" enctype="multipart/form-data" class="Formulario"id="formu"> 
   <font class="Texto"> Bom dia</font> <?php echo $_SESSION['usuario']; ?>! Qual serviço você deseja? (Entraremos em contato assim que possível) <br>

    <textarea  type="text" class="pedido" placeholder="Descreva seu pedido aqui" cols="40" rows="5" name="problema" >
    </textarea>
<br>
 <div class="lado"> Coloque a data aqui: <input type="date" class="data" name="data">
 <br><input type="time" class="data" name="hora">  </div>
  
    <br><br><br>   <br>

    <div class="outro"> <center> Coloque uma foto do seu problema</center>
    <center><input type="file" class="Imgcoloca" require name="arquivo"></center></div>
    <br>
    <div class="textinho"> <br><br>
    Ao enviar você concorda com nossos <a href="Termos.php">termos de uso</a>
    <br>
    <br>
    <?php
        if(isset($_SESSION['nao_autenticado2']))
        {
    ?>
        <div class="notification is-danger" style="color: white; font-size: 18px;">
        <center><p>ERRO: Não trabalhamos nesse horário.</p></center> 
        </div>
    <?php
            unset($_SESSION['nao_autenticado2']);
        }
    ?> 
    <button  class="botao">Enviar</button>
    </div>
</form>
   <center> <a href="logout.php"><button class="botao">Sair</button></a></center>
</body>
</html>

<?php 

$mysqli = new mysqli("localhost:3306", "root", "1234", "TCC");

if(isset($_POST['user_name']))
{
 $name=$_POST['user_name'];

 $checkdata=$mysqli->query("SELECT COUNT(*) FROM LOGIN WHERE login = '$name'");

 $row = $checkdata->fetch_row();

 if ($row[0] > 0)
 {
  echo "<SCRIPT>document.getElementById('botao').disabled=true;</SCRIPT>Este Nome de Usuário já está em Uso";
 }
 else
 {
  echo "<SCRIPT>document.getElementById('botao').disabled=false;</SCRIPT>OK";
 }
 exit();
}
?>
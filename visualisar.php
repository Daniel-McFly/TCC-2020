
<!DOCTYPE html>
<?php 
    session_start();
    $cPesquisa = "";
    if(isset($_GET['txtPesquisa']))
        $cPesquisa = str_replace("'", "''", $_GET['txtPesquisa']);
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/vizu.css">
    
</head>
<body>
    <form  class="pesq form-inline">
	<input name="txtPesquisa" class="pesquisa" placeholder="Digite um nome para pesquisar" value="<?php echo str_replace("''", "'",$cPesquisa); ?>" onKeyUp="if(event.keyCode==13) frmPesquisa.submit()" /><button name="cmdPesquisa" class="botao"><img src="img/Lupa_menor.jpg" alt=""  class="imagi"></button>
 

</form>
    <?php 
        

        $conexao = mysqli_connect('localhost', 'root', '1234', 'TCC');
        
        $csql= "select NOME,CPF,AGDCODIGO, EMAIL,AGDPROBLEMA, AGDDATA, AGDIMAGEM, CEP, ENDERECO, BAIRRO, CIDADE, CEL from CADASTRO left join LOGIN on CPF = CPFLOGIN left join AGENDAMENTO on CPF = AGDCPF " .
        " WHERE 1 = 1";

        
        if(isset($_GET['txtPesquisa']))
            $csql .= "  and ( NOME LIKE '%" . $cPesquisa . "%'" .
                   "   OR CPF LIKE '%" . $cPesquisa . "%'" .
                   "   OR AGDPROBLEMA LIKE '%" . $cPesquisa . "%'" .
                   "   OR AGDDATA LIKE '%" . $cPesquisa . "%'" .
                   "   OR EMAIL LIKE '%" . $cPesquisa . "%'" .
                   "   OR BAIRRO LIKE '%" . $cPesquisa . "%'" .
                   "   OR CIDADE LIKE '%" . $cPesquisa . "%'" .
                   "   OR CEL LIKE '%" . $cPesquisa . "%')";

        $csql .=	"ORDER by CPF";

        $sql = mysqli_query($conexao, $csql);
        
            echo mysqli_error($conexao);
           while($aux = mysqli_fetch_assoc($sql)) 
           { 
           if($aux['AGDCODIGO'])
           {
            echo "------------------------------------- ----------------------------------------- ---------------------------------------------<br />"; 
            echo "<form action='deleteagd.php' method='POST'  onsubmit='fnchek()'>";
            
            
            echo "<div class=\"textotitulo\">Nome do cliente: </div><div class=\"textinho\">".$aux["NOME"]."</div><br />";
            echo "<div class=\"textotitulo\">Número para entrar em contato: </div><div class=\"textinho\">".$aux["CEL"]."</div><br />";
            echo "<div class=\"textotitulo\">CPF do cliente:</div> <div class=\"textinho\">".$aux["CPF"]."</div><br />";
            echo "<div class=\"textotitulo\">E-MAIL do cliente: </div><div class=\"textinho\">".$aux["EMAIL"]."</div><br />";
            echo "<br />";
            echo "Problema: ".$aux["AGDPROBLEMA"]. "<br>";
            echo " ....Imagem:<br><center> <img src='upload/".$aux["AGDIMAGEM"]."' class=\"imagem\"'></center><br />"; 
            echo "<br />"; 
            echo "<div class=\"textotitulo\">CEP:</div><div class=\"textinho\"> ".$aux["CEP"]."</div><br />"; 
            echo "<div class=\"textotitulo\">Endereço:</div> <div class=\"textinho\">".$aux["ENDERECO"]."</div><br />"; 
            echo "<div class=\"textotitulo\">Bairo: </div><div class=\"textinho\">".$aux["BAIRRO"]."</div><br />";
            echo "<div class=\"textotitulo\">Cidade:</div><div class=\"textinho\"> ".$aux["CIDADE"]."</div><br />"; 
            echo "<center>";
            echo "<input type='radio' id='rbn' name = 'rbCOD' value='" . $aux['AGDCODIGO'] . " '>";
            echo "<button class=\"deletar\">Deletar</button></center>";
            echo "</form>";
            echo "<hr><br />"; 
           }
          }
          
          
    ?>
</body>
</html>
<?php 

    $cpf = $_POST['usercpf'];
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
    $cpf2 =$cpf;
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
        echo "<SCRIPT>document.getElementById('botao').disabled=true;</SCRIPT>CPF é falso"; 
    }
    else
    {

        $mysqli = new mysqli("localhost:3306", "root", "1234", "TCC");

    

    $checkdata=$mysqli->query("SELECT COUNT(*) FROM LOGIN WHERE CPFLOGIN = '$cpf'");

    $row = $checkdata->fetch_row();

    if ($row[0] > 0)
    {
        echo "<SCRIPT>document.getElementById('botao').disabled=true;</SCRIPT>Este CPF já está em Uso";
    }
    else
    {
        echo "<SCRIPT>document.getElementById('botao').disabled=false;</SCRIPT>OK";
    }
    exit();


    echo "<SCRIPT>document.getElementById('botao').disabled=false;</SCRIPT>";

    }
 exit();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro FEABTA</title>
    <link rel="stylesheet" href="css/cadastro.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Adicionando Javascript -->
<script type="text/javascript">

$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#cEndereco").val("");
        $("#cBairro").val("");
        $("#cCidade").val("");
        $("#cUF").val("");
      
    }
    
    //Quando o campo cep perde o foco.
    $("#cCEP").keyup(function() {
        
        if($("#cCEP").val().length < 8 || $("#cCEP").val().length > 9)
        {
            limpa_formulário_cep();
        }
        else
        {
        //Nova variável "cep" somente com dígitos.
        var cep = $("#cCEP").val().replace(/\D/gim, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#cEndereco").val("...");
                $("#cBairro").val("...");
                $("#cCidade").val("...");
                $("#cUF").val("...");


                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#cEndereco").val(dados.logradouro);
                        $("#cBairro").val(dados.bairro);
                        $("#cCidade").val(dados.localidade);
                        $("#cUF").val(dados.uf);


                        if($("#cUF").val() != "SP")
                        {
                            limpa_formulário_cep();
                            alert("Só trabalhamos em São Paulo");
                        }
                       
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
    
            }    
        }
        
    });
    
});
function validarUsuario()
{
    
    var name=document.getElementById( "cUsuario" ).value;

 if(name.length >3)
 {
    
      $.ajax({
          type: 'post',
          url: 'checkdata.php',
          data: {
           user_name:name,
          },
          success: function (response) {
               $('#usuarioErro').html(response);
               if(response=="OK")   
               {
                
                return true;
               
               }
               else
               {
                return false;  
               
               }
          }
      });
 }
 else
 {
  $( '#usuarioErro' ).html("");
  return false;
 }
}
function fncheckcpf()
{
    var cpf=document.getElementById( "cCPF" ).value;

if(cpf.length > 0)
{
   
     $.ajax({
         type: 'post',
         url: 'cpfcheck.php',
         data: {
          usercpf:cpf,
         },
         success: function (response1) {
              $('#cpfErro').html(response1);
              
         }
     });
}
else
{
 $( '#cpfErro' ).html("");
 return false;
}
}
function fncadastrar()
{
    fnValidaForm(); 
    var nome1=document.getElementById( "cNome" ).value;
    var email=document.getElementById( "cMail" ).value;
    var cpf1=document.getElementById( "cCPF" ).value;
    var telefone=document.getElementById( "cTelefone" ).value;
    
    var cep1 = $("#cCEP").val().replace(/\D/g, '');
    var endereco=document.getElementById( "cEndereco" ).value;
    var bairro=document.getElementById( "cBairro" ).value;
    var cidade=document.getElementById( "cCidade" ).value;
    var usuario1=document.getElementById( "cUsuario" ).value;
    var senha1=document.getElementById( "cSenha" ).value;


    $.ajax({
         type: 'post',
         url: 'tmtCadastro.php',
         data: {
            txt_cpf:cpf1,
            txt_endereco:endereco,
            txt_bairro:bairro,
            txt_cidade:cidade,
            txt_nome:nome1,
            txt_cep:cep1,
            txt_email:email,
            txt_telefone:telefone,
            txt_login:usuario1,
            txt_senha:senha1,
         },
         success: function (response2) {
             
               if(response2=="OK")   
               {
                location.href = "login.php";
                return true;
               
               }
               else
               {
                alert("Alguma das informações digitadas, pode ter algo errada, ou está faltando informação");
                return false;  
               
               }
          }
         
     });
}
</script>
</head>


<!--Para carregar o arquivo javascript. 
    O language pode ser omitido pois o html usa como padrão o javascript, porém serve para dizer ao navegador que a liguagem script que será carregada é em javascript-->
<script language="javascript" src="javascript/cadastro.js"></script>
<!--Cor do fundo do site-->
<body class="fundo_site">
    <!--Menu do site-->
    <nav class="menu">
        <!--A imagem da logo no site-->
        <img id="ahover_btn_menu" class="logo" src="img/LogoDefinitivoSite_menor.png">
        <ul>   
            <!--Ao passar o mouse por cima ou retirar o mouse de cima, a tag <img> tem o src alterado pela função mudaFoto js-->
            <li onmouseover="mudaFoto('img/icone_home.png')" onmouseout="mudaFoto('img/LogoDefinitivoSite_menor.png')"><a class="PAGINA" href="Home.php">	
                <!--Efeitos do botão do menu-->
                <span></span>
                <span></span>
                <span></span>
                <span></span> 
                Home 
                </a> 
            </li>

            <li onmouseover="mudaFoto('img/icone_contatos.png')" onmouseout="mudaFoto('img/LogoDefinitivoSite_menor.png')"><a class="PAGINA" href="Contatos.php">
                    <span></span>
                    <span></span>
                    <span></span>  
                    Contatos 
                </a> 
            </li>

            <li onmouseover="mudaFoto('img/icone_cadastro.png')" onmouseout="mudaFoto('img/LogoDefinitivoSite_menor.png')"><a class="PAGINA"  href="cadastro.php"> 
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span> 
                    Cadastro 
                </a> 
            </li>

        </ul>   
        <!--A barra de pesquisa do site com o tipo search que é um campo de texto com uma só linha para digitar termos de busca; quebras de linha são automaticamente removidas do valor entrado.-->             
        <!--maxlength="19" limita a digitação em 19 caracteres, enquanto o size="25" define quantos aparecem para o usuário, no caso 25-->
        <input class="barra-pesquisa" type="search" placeholder="PESQUISAR" maxlength="10" size="25" list="cidades">
        <!--Criará uma lista de opções dentro do input de forma dinâmica conforme o usuário digita-->
        <datalist id="cidades">
            <option value="Trabalhos"></option>
            <option value="Contatos"></option>
            <option value="Login"></option>
            <option value="Cadastro"></option>
        </datalist>
        <!--Imagem de login dentro do menu-->    
        <!--alt="" Serve para como texto alternativo para pessoas com conexão lenta entenderem o que está no lugar da imagem e para deficientes visuais que usem sintetizador de voz saberem que há uma imagem e suas características -->
        <a href="login.php"><img class="icone-login" src="img/login_atual_menor.png" alt="Um imagem que serve de Link para ir para a página de login"></a>
    </nav>
      <!--Linha azul de baixo do menu-->
<div class="linha_azul"></div>       
<div id="interface">
    <div class="container">
        <!--A caixa do menu do login-->
        <form>
          
            <h1 class="titulo"><b>Cadastrar</b></h1><br>

                <!--Letra estilizadas-->
                <!--O atributo for="cEndereco" é utilizado para quando clicar na palavra, o id da tag é selecionado-->
                <!--Tem esta utilidade prática, porém também tem valor semântico porque o google vai ver isso bem, objetos que leem tela para deficiente vão ver bem-->
                <br>
                <center>
                <div class="esquerda"> <label class="campo"  for="cNome" ><b>Nome</b></label><br>
                <!--O autocomplete=off serve para o navegador não exibir os dados guardados sobre um preenchimento anterior daquele campo-->
                <input placeholder="Escreva seu Nome" autocomplete=off class="login" type="text" name="txt_nome" id="cNome" onKeyPress="this.setCustomValidity('');" required/><br>

                <label class="campo" for="cMail" ><b>Email</b></label><br>
                <!--placeholder="Escreva seu Email" é uma dica para o usuário indentificar o que deve ser colocado ali"-->
                <input placeholder="Escreva seu Email" autocomplete=off class="login" type="email" name="txt_email" id="cMail" required/><br>

                <label class="campo"  ><b>CPF</b></label><br>
                <!--class="login" é usado para agrupar tags para uma possivel estilização posterior-->
                <input placeholder="Escreva seu CPF" autocomplete=off class="login" type="text" name="txt_cpf" id="cCPF" onblur="fncheckcpf()" required/><BR>
                
                <span id="cpfErro" style="color: white;"></span><BR>

                <label class="campo" for="cTelefone" ><b>Número para entrar em contato    </b></label><br>
                <!--O tipo tel é um controle para inserir um número de telefone; quebras de linha são automaticamente removidas do valor entrado, mas nenhuma outra sintaxe é imposta. Você pode usar atributos como pattern e maxlength para restringir os valores inseridos no controle. As pseudoclasses CSS :valid e :invalid são aplicadas apropriadamente.-->
                <input placeholder="Escreva seu número Celular(para contato via Whatsapp)" autocomplete=off class="login" type="tel" name="txt_telefone" id="cTelefone" /> <br>
                
                     
                

                
                <label class="campo" for="cEndereco" id="primeiro"><b>Endereço</b></label><br>
                <!--Barra preta para o usuario digitar-->
                
                <input placeholder="Escreva seu Endereço"  class="login" name="txt_endereco" id="cEndereco" required/><br>

                <label class="campo" for="cBairro" ><b>Bairro</b></label><br>
                <!--O tipo tel é um controle para inserir um número de telefone; quebras de linha são automaticamente removidas do valor entrado, mas nenhuma outra sintaxe é imposta. Você pode usar atributos como pattern e maxlength para restringir os valores inseridos no controle. As pseudoclasses CSS :valid e :invalid são aplicadas apropriadamente.-->
                <input placeholder="Escreva o nome do seu Bairro"  class="login" type="tel" name="txt_bairro" id="cBairro" /> <br>
                </div> 
                <div class="direita">
                <label class="campo" for="cCidade" id="primeiro"><b>Cidade</b></label><br>
                <!--Barra preta para o usuario digitar-->
                <input placeholder="Escreva o nome da sua cidade"  class="login" name="txt_cidade" id="cCidade" required/><br>
                
                <label class="campo" for="cUF" id="primeiro"><b>Estado/UF:</b></label><br>
                <!--Barra preta para o usuario digitar-->
                <input placeholder="Escreva a sua UF" class="login"  name="txt_uf" id="cUF" required/><br><br>

                <label class="campo" for="cUsuario"><b>Usuário</b></label><br>
                <input placeholder="Escreva o nome de seu usuário" autocomplete=off class="login" type="text" name="txt_login" id="cUsuario" onkeyup="validarUsuario()"/><br />

               
                <span id="usuarioErro" style="color: white;"></span><BR>

                <label class="campo" for="cSenha"><b>Senha</b></label><br>
                <input placeholder="Digite sua senha" autocomplete=off class="login" type="password" name="txt_senha" id="cSenha" onkeyup="validarSenhaForca()" >
                    <button type="button" id="ver" onclick="versenha()" ></button>
                
                
                <button type="button" id="nver" hidden="true" onclick="nversenha()"></button>
                <div id="impSenha"></div> 
                <div id="impForcaSenha"></div>  
                <br><div id="erroSenhaForca"></div>
            </center>
                
                <br><br><button  id="botao" name="btn_cadastrar" onclick="fncadastrar()">Cadastrar</button>
               
            
</div>
        </form>  
        <script src="personalizado.js"></script> 
    </div>
    <footer class="rodape">       
        <p class="texto_fundo">Copyright &#9400; 2020 - by Projeto Auxillium<br>Todos os direitos reservados ao FEABTA informática. </p>
    </footer>
</div>            
</body>
</html>
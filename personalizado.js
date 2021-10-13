function validarSenhaForca(){
	if(document.getElementById("botao").disabled == false)
	{
		document.getElementById("botao").disabled=true;
	}
	
	var senha = document.getElementById('cSenha').value;
	var forca = 0;

	if(document.getElementById("ver").hidden == true)
	{
		document.getElementById("impSenha").innerHTML = "Senha:  " + senha;
	}
	

	if((senha.length >= 4) && (senha.length <= 7)){
		forca += 10;
	}else if(senha.length > 7){
		forca += 25; 
	}

	if((senha.length >= 5) && (senha.match(/[a-z]+/))){
		forca += 10;
	}

	if((senha.length >= 6) && (senha.match(/[A-Z]+/))){
		forca += 20;
	}

	if((senha.length >= 7) && (senha.match(/[@#$%&;*]/))){
		forca += 25;
	}

	if(senha.match(/([1-9]+)\1{1,}/)){
		forca += 25;
	}


	mostrarForca(forca);
}

function versenha()
{
	var senha = document.getElementById('cSenha').value;
	document.getElementById("impSenha").innerHTML = "Senha:  " + senha;
	
	document.getElementById("ver").hidden=true;
	document.getElementById("nver").hidden=false;
}
function nversenha()
{
	var senha = " ";
	document.getElementById("impSenha").innerHTML =  senha;
	document.getElementById("ver").hidden=false;
	document.getElementById("nver").hidden=true;
}

function mostrarForca(forca){
	
	if(forca < 30 ){
		document.getElementById("erroSenhaForca").innerHTML = "<span style='color: #ff0000'>Senha Fraca</span>";
		
	}else if((forca >= 30) && (forca < 50)){
		document.getElementById("erroSenhaForca").innerHTML = "<span style='color: #FFD700'>Senha Média</span>";
		if(document.getElementById("cSenha").value.length > 7)
		{
			document.getElementById("botao").disabled=false;
		}
	}else if((forca >= 50) && (forca < 70)){
		document.getElementById("erroSenhaForca").innerHTML = "<span style='color: #7FFF00'>Senha Forte</span>";
		if(document.getElementById("botao").disabled == true)
		{
			document.getElementById("botao").disabled=false;	
		}
	   
	}else if((forca >= 70) && (forca < 100)){
		
		document.getElementById("erroSenhaForca").innerHTML = "<span style='color: #008000'>Senha Excelente</span>";
		document.getElementById("botao").disabled=false;
	}
}
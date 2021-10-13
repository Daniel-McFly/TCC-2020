//Mudar a logo ao passar o mouse por cima
function mudaFoto(foto)
{
    document.getElementById("ahover_btn_menu").src = foto;    
}

//Verifica se o campos forão preenchidos corretamente
function fnValidaForm()
{            

    document.all.txt_nome.setCustomValidity('');

    if(document.all.txt_endereco.value.trim().length == 0)
    {
        document.all.txt_endereco.setCustomValidity("O endereço não pode ser vazio.");
        return false;
    }

    if(document.all.txt_email.value.trim().length == 0)
    {
        document.all.txt_email.setCustomValidity("O email não pode ser vazio");
        return false;
    }

    if(document.all.txt_cpf.value.trim().length == 0)
    {
        document.all.txt_cpf.setCustomValidity("O CPF não pode ser vazio");
        return false;
    }

    if(document.all.txt_nome.value.trim().length == 0)
    {
        document.all.txt_nome.setCustomValidity("O nome não pode ser vazio.");
        return false;
    }            

    if(document.all.txt_nome.value.trim().length<4)
    {
        document.all.txt_nome.setCustomValidity("Por favor, informe o nome completo.");
        return false;
    }

    if(document.all.txt_nome.value.trim().indexOf(' ')<1)
    {
        document.all.txt_nome.setCustomValidity("Por favor, informe o nome e sobrenome.");
        return false;
    }
}


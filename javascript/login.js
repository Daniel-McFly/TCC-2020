//Mudar a logo ao passar o mouse por cima
function mudaFoto(foto)
{
    document.getElementById("ahover_btn_menu").src = foto;    
}

function fnValidaForm()
{           

    if(document.all.txt_login.value.trim().length == 0)
    {
        document.all.txt_endereco.setCustomValidity("O login não pode ser vazio.");
        return false;
    }

    if(document.all.txt_email.value.trim().length == 0)
    {
        document.all.txt_senha.setCustomValidity("A senha não pode ser vazia.");
        return false;
    }
}    
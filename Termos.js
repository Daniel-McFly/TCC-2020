function imagem_escolhida(){



    if(document.getElementById("aparece").checked == true)
    {
        document.getElementById("formu").style.display = 'block';
        document.getElementById("pop").style.display = 'none';

    }
    if(document.getElementById("some").checked == true)
    {
        document.getElementById("formu").style.display = 'none';
        document.getElementById("pop").style.display = 'block';

    }
  

}
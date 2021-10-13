function imagem_escolhida(){



    if(document.getElementById("imgs1").checked == false)
    {
        document.getElementById("divimg1").style.display = 'block';
        document.getElementById("divimg2").style.display = 'none';
        document.getElementById("anuncio").style.display = 'none';
    }
    if(document.getElementById("imgs1").checked == true)
    {
        document.getElementById("divimg1").style.display = 'none';
        document.getElementById("divimg2").style.display = 'block';
        document.getElementById("anuncio").style.display = 'block';
    }
  

}
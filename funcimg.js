function imagem_escolhida(){
    document.getElementById("divimg1").style.display = 'none';
    document.getElementById("divimg2").style.display = 'none';
    document.getElementById("divimg3").style.display = 'none';
    document.getElementById("divimg4").style.display = 'none';

    if(document.getElementById("imgs1").checked == true)
    {
        document.getElementById("divimg1").style.display = 'block';
    } 
    if(document.getElementById("imgs2").checked == true)
    {
        document.getElementById("divimg2").style.display = 'block';
    }
    if(document.getElementById("imgs3").checked == true)
    {
        document.getElementById("divimg3").style.display = 'block';
    }
    if(document.getElementById("imgs4").checked == true)
    {
        document.getElementById("divimg4").style.display = 'block';
    }

}
//soru ekleme
function duzenlemeBtn(){
    var sinavidüzenleDiv=document.getElementById('sinavidüzenleDiv');
    sinavidüzenleDiv.style.display='block';
    var sinav_aciklamasi=document.getElementById('sinav_aciklamasi');
    var sinav_adi=document.getElementById('sinav_adi');
    var sinav_tarihi=document.getElementById('sinav_tarihi');
    var sinav_saati=document.getElementById('sinav_saati');
    var okul=document.getElementById('okul');
    var email=document.getElementById('email');
    var sifre=document.getElementById('sifre');
    sinav_aciklamasi.removeAttribute('readonly');
    sinav_adi.removeAttribute('readonly');
    sinav_tarihi.removeAttribute('readonly');
    sinav_saati.removeAttribute('readonly');   
    okul.removeAttribute('readonly');
    email.removeAttribute('readonly');
    sifre.removeAttribute('readonly');
}

function dogruCevap(btnID){
    var btnCevap=document.getElementById(btnID);
    var cvpInput=document.getElementById("cvpInput");
    var btn1=document.getElementById("btn1");
    var btn2=document.getElementById("btn2");
    var btn3=document.getElementById("btn3");
    var btn4=document.getElementById("btn4");
    var btn5=document.getElementById("btn5");

    if(btnID=="btn1"){
     btnCevap.style.background="	#198754";
     btnCevap.style.color="white";
     btnCevap.innerText="Doğru"
     btn2.style.background="#dc3545";
     btn2.innerText="Yanlış";
     btn2.style.color="white";

     btn3.style.background="#dc3545";
     btn3.innerText="Yanlış";
     btn3.style.color="white";

     btn4.style.background="#dc3545";
     btn4.innerText="Yanlış";
     btn4.style.color="white";
     
     btn5.style.background="#dc3545";
     btn5.innerText="Yanlış";
     btn5.style.color="white";
     var secenek1=document.getElementById("secenek1");
     cvpInput.value=secenek1.name;
     

    }
    else if(btnID=="btn2"){
     btnCevap.style.background="	#198754";
     btnCevap.style.color="white";
     btnCevap.innerText="Doğru"
     btn1.style.background="#dc3545";
     btn1.innerText="Yanlış";
     btn1.style.color="white";

     btn3.style.background="#dc3545";
     btn3.innerText="Yanlış";
     btn3.style.color="white";

     btn4.style.background="#dc3545";
     btn4.innerText="Yanlış";
     btn4.style.color="white";
     
     btn5.style.background="#dc3545";
     btn5.innerText="Yanlış";
     btn5.style.color="white";
     var secenek2=document.getElementById("secenek2");
     cvpInput.value=secenek2.name;

    }
    else if(btnID=="btn3"){
     btnCevap.style.background="	#198754";
     btnCevap.style.color="white";
     btnCevap.innerText="Doğru"
     btn2.style.background="#dc3545";
     btn2.innerText="Yanlış";
     btn2.style.color="white";

     btn1.style.background="#dc3545";
     btn1.innerText="Yanlış";
     btn1.style.color="white";

     btn4.style.background="#dc3545";
     btn4.innerText="Yanlış";
     btn4.style.color="white";
     
     btn5.style.background="#dc3545";
     btn5.innerText="Yanlış";
     btn5.style.color="white";
     var secenek3=document.getElementById("secenek3");
     cvpInput.value=secenek3.name;

    }
 
    else if(btnID=="btn4"){
     btnCevap.style.background="	#198754";
     btnCevap.style.color="white";
     btnCevap.innerText="Doğru"
     btn2.style.background="#dc3545";
     btn2.innerText="Yanlış";
     btn2.style.color="white";

     btn3.style.background="#dc3545";
     btn3.innerText="Yanlış";
     btn3.style.color="white";

     btn1.style.background="#dc3545";
     btn1.innerText="Yanlış";
     btn1.style.color="white";
     
     btn5.style.background="#dc3545";
     btn5.innerText="Yanlış";
     btn5.style.color="white";
     var secenek4=document.getElementById("secenek4");
     cvpInput.value=secenek4.name;

    }
 
    else if(btnID=="btn5"){
     btnCevap.style.background="	#198754";
     btnCevap.style.color="white";
     btnCevap.innerText="Doğru"
     btn2.style.background="#dc3545";
     btn2.innerText="Yanlış";
     btn2.style.color="white";

     btn3.style.background="#dc3545";
     btn3.innerText="Yanlış";
     btn3.style.color="white";

     btn4.style.background="#dc3545";
     btn4.innerText="Yanlış";
     btn4.style.color="white";
     
     btn1.style.background="#dc3545";
     btn1.innerText="Yanlış";
     btn1.style.color="white";
     var secenek5=document.getElementById("secenek5");
     cvpInput.value=secenek5.name;

    }
 }
//soru düzenleme:
function dogruCevap_2(btnID){
    var btnCevap_2=document.getElementById(btnID);
    var cvpInput_2=document.getElementById("cvpInput_2");
    var btn1_2=document.getElementById("btn1_2");
    var btn2_2=document.getElementById("btn2_2");
    var btn3_2=document.getElementById("btn3_2");
    var btn4_2=document.getElementById("btn4_2");
    var btn5_2=document.getElementById("btn5_2");

    if(btnID=="btn1_2"){
     btnCevap_2.style.background="#198754";
     btnCevap_2.style.color="white";
     btnCevap_2.innerText="Doğru"
     btn2_2.style.background="#dc3545";
     btn2_2.innerText="Yanlış";
     btn2_2.style.color="white";

     btn3_2.style.background="#dc3545";
     btn3_2.innerText="Yanlış";
     btn3_2.style.color="white";

     btn4_2.style.background="#dc3545";
     btn4_2.innerText="Yanlış";
     btn4_2.style.color="white";
     
     btn5_2.style.background="#dc3545";
     btn5_2.innerText="Yanlış";
     btn5_2.style.color="white";
     var secenek1_2=document.getElementById("secenek1_2");
     cvpInput_2.value=secenek1_2.name;
     

    }
    else if(btnID=="btn2_2"){
        btnCevap_2.style.background="	#198754";
        btnCevap_2.style.color="white";
        btnCevap_2.innerText="Doğru"
        btn1_2.style.background="#dc3545";
        btn1_2.innerText="Yanlış";
        btn1_2.style.color="white";
   
        btn3_2.style.background="#dc3545";
        btn3_2.innerText="Yanlış";
        btn3_2.style.color="white";
   
        btn4_2.style.background="#dc3545";
        btn4_2.innerText="Yanlış";
        btn4_2.style.color="white";
        
        btn5_2.style.background="#dc3545";
        btn5_2.innerText="Yanlış";
        btn5_2.style.color="white";
        var secenek2=document.getElementById("secenek2");
        cvpInput_2.value=secenek2_2.name;
   
    }
    else if(btnID=="btn3_2"){
     btnCevap_2.style.background="	#198754";
     btnCevap_2.style.color="white";
     btnCevap_2.innerText="Doğru"
     btn2_2.style.background="#dc3545";
     btn2_2.innerText="Yanlış";
     btn2_2.style.color="white";

     btn1_2.style.background="#dc3545";
     btn1_2.innerText="Yanlış";
     btn1_2.style.color="white";

     btn4_2.style.background="#dc3545";
     btn4_2.innerText="Yanlış";
     btn4_2.style.color="white";
     
     btn5_2.style.background="#dc3545";
     btn5_2.innerText="Yanlış";
     btn5_2.style.color="white";
     var secenek3_2=document.getElementById("secenek3_2");
     cvpInput_2.value=secenek3_2.name;

    }
 
    else if(btnID=="btn4_2"){
     btnCevap_2.style.background="	#198754";
     btnCevap_2.style.color="white";
     btnCevap_2.innerText="Doğru"
     btn2_2.style.background="#dc3545";
     btn2_2.innerText="Yanlış";
     btn2_2.style.color="white";

     btn3_2.style.background="#dc3545";
     btn3_2.innerText="Yanlış";
     btn3_2.style.color="white";

     btn1_2.style.background="#dc3545";
     btn1_2.innerText="Yanlış";
     btn1_2.style.color="white";
     
     btn5_2.style.background="#dc3545";
     btn5_2.innerText="Yanlış";
     btn5_2.style.color="white";
     var secenek4_2=document.getElementById("secenek4_2");
     cvpInput_2.value=secenek4_2.name;

    }
 
    else if(btnID=="btn5_2"){
     btnCevap_2.style.background="	#198754";
     btnCevap_2.style.color="white";
     btnCevap_2.innerText="Doğru"
     btn2_2.style.background="#dc3545";
     btn2_2.innerText="Yanlış";
     btn2_2.style.color="white";

     btn3_2.style.background="#dc3545";
     btn3_2.innerText="Yanlış";
     btn3_2.style.color="white";

     btn4_2.style.background="#dc3545";
     btn4_2.innerText="Yanlış";
     btn4_2.style.color="white";
     
     btn1_2.style.background="#dc3545";
     btn1_2.innerText="Yanlış";
     btn1_2.style.color="white";
     var secenek5_2=document.getElementById("secenek5_2");
     cvpInput_2.value=secenek5_2.name;

    }
 }
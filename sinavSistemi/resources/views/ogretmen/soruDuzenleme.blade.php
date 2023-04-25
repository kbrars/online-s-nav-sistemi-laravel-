
@section("title")Soru Düzenleme @endsection
@section("eklenti")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection
@extends("layout.ogretmenSidebar")
@section("icerik")
 <div class="content-wrapper">
    <div class="card">
        <div class="card-header">Soru Düzenleme:</div>
        <div class="card-body">
            <form action="{{route('guncelleme')}}"  method="POST">
                @csrf
                <div>
                  @error('soru_metni')
                  <div class="alert alert-danger">
                    <span class="text-danger mb-2">{{ $message }}</span>
                  </div>     
                  @enderror
                  @error('secenek.*')
                  <div class="alert alert-danger">
                    <span class="text-danger mb-2">{{ $message }}</span>
                  </div>     
                  @enderror
                  @error('cevapInput')
                  <div class="alert alert-danger">
                    <span class="text-danger mb-2">{{ $message }}</span>
                  </div>     
                  @enderror
                    <label for="soru_metni">Soru Metni:</label>
                    <input type="hidden" name="soru_id" value="{{$data['soru_id']}}">
                    <input type="text" class="form-control" placeholder="Soru giriniz" value="{{$data['soru_metni']}}" name="soru_metni" id="soru_metni">
                </div>
               <?php $a=0; ?>
                <div>
                  <script>
                     var dizi=[];
                  </script>
                  <input type="hidden" name="cevapInput" id="cevapInput">
                   @foreach($secenekler as $secenek)
                   <script>
                     
                      dizi.push('cevapBtn{{$a}}');
                   </script>
                   <div class="input-group" id="seceneklerDiv{{$a}}"><button id="cevapBtn{{$a}}" onclick="dogruCevap(this.id)" class="btn btn-outline-primary mt-2" type="button">Seçenek</button><input class="form-control mt-2" placeholder="Seçenek" value="{{$secenek->secenek}}" name="secenek[{{$secenek->id}}]">
                       <button type="button" id="{{$a}}" onclick="secenekSil(this.id)" class="btn btn-danger mt-2">X</button>
                      <?php $a++; ?>
                   </div>
                   @endforeach
                </div>
                <div id="eklenecekSecenekler">
                </div>
                <div class="d-grid mt-4" id="secenekEkle">
                    <button type="button"  onclick="secenekYarat()"  class="btn btn-success d-block">Seçenek Ekle</button>
                </div>
                <div  style="width:100%">
                   <button style="float: right" type="submit" class="btn btn-primary mt-2" >Kaydet</button>
                </div>
            </form>
        </div>
      </div>
</div>
<script>
    function dogruCevap(btnID) {
      var btn=document.getElementById(btnID);
      var cevapInput=document.getElementById('cevapInput')
      
      btn.style.background="green";
      btn.style.color="white";
      btn.innerText="Doğru";
      var secenekDiv=btn.parentElement;  
      var secenekInput=secenekDiv.childNodes[1].name;
      cevapInput.value=secenekInput;
  
        for(var a=0;a<dizi.length;a++){
          console.log(dizi[a])
            if(dizi[a]!=btnID){
      

               var btn2=document.getElementById(dizi[a]);
               btn2.style.background="red";
               btn2.style.color="white";
               btn2.innerText="Yanlış";
      
            }
        }         
    }   
    function secenekSil(silBtnID){
      var cevapInput=document.getElementById("cevapInput");
       var activeBtn=document.getElementById(silBtnID);
       var deleteElement=activeBtn.parentElement;  
   
       deleteElement.style.display="none";
       silinecekIput="secenek"+silBtnID;

       var atrInpDelet=deleteElement.childNodes[1];

     if(cevapInput.value==atrInpDelet.name){
      cevapInput.value="";
     }
   
       console.log("sil");
       var sayi=silBtnID;
       var btnIDe= sayi++;
        btnIDe++;
        console.log();
        atrInpDelet.value="silindi456789";
        //atrInpDelet.removeAttribute('name');
       secenekSayisi--;
       
       for(var a=0;a<dizi.length;a++){
          if(dizi[a]==btnIDe){
            dizi.splice(a, 1);
          }             
        }

    
      
    }
    var id={{$a}}; 
    function secenekYarat(){           
      var secenekDiv=document.createElement('div');        
      var eklenecekSecenekler=document.getElementById('eklenecekSecenekler');
      var cevapBtn=document.createElement('button');
      var input=document.createElement('input');
      var silBtn=document.createElement('button');
      
      silBtn.setAttribute('type','button');
      silBtn.setAttribute('id',+id);
      silBtn.setAttribute('onclick','secenekSil(this.id)');
      cevapBtn.setAttribute('id','cevapBtn'+id);
      cevapBtn.setAttribute('onclick','dogruCevap(this.id)');
      cevapBtn.setAttribute('type','button');
      input.setAttribute('placeholder','Seçenek');
      secenekDiv.setAttribute('id',"seceneklerDiv"+id);
      input.setAttribute('name',"secenek[yeni]["+id+"]");

     silBtn.classList.add('btn','btn-danger','mt-2');
     input.classList.add('form-control','mt-2');
     cevapBtn.classList.add('btn','btn-outline-primary',"mt-2");
     secenekDiv.classList.add("input-group");
    
    
     silBtn.innerText="X";
     cevapBtn.innerText="Seçenek";
    
      eklenecekSecenekler.appendChild(secenekDiv);
      secenekDiv.appendChild(cevapBtn);
      secenekDiv.appendChild(input);
      secenekDiv.appendChild(silBtn);
      dizi.push('cevapBtn'+id);
      ++id;
     

    }
</script>
@endsection
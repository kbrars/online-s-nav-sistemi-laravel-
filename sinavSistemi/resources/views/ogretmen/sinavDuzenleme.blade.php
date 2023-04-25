@section("title")Sınav Oluştur @endsection
@section("eklenti")
<script src="../../../jsDosyalari/sinavDuzenleme.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    
@endsection
@extends("layout.ogretmenSidebar")
@section("icerik")


 <div class="content-wrapper">

  <!--SINAV DÜZENLEME -->
    <div class="card  container mt-2">
      <div class="card-header ">
        <button class="btn btn-outline-secondary" onclick="duzenlemeBtn()" style="float: right;">Sınav Bilgilerini Düzenle</button>
        <button class="btn btn-outline-success mr-2" data-bs-toggle="modal" data-bs-target="#soruEkleModal" style="float: right;">Yeni Soru Ekle</button>
        <label for=""> Sınav: <br> {{isset($sinav_adi)?$sinav_adi:'yok'}}</label>  
      </div>
      <div class="card-body">
        <form action="" method="post">
          @csrf
          <input type="hidden" value="{{isset($sinav_id)?$sinav_id:'yok'}}" name="sinav_id" id="">
          <label for="">Sınav başlık:</label>
          <input type="text" readonly value="{{isset($sinav_adi)?$sinav_adi:'yok'}}" class="form-control" name="sinav_adi" id="sinav_adi">
          <label for="">Sınav açıklaması:</label>
          <textarea name="sinav_aciklama" readonly class="form-control" id="sinav_aciklamasi" cols="30" rows="5">{{isset($sinav_aciklama)?$sinav_aciklama:'yok'}}</textarea>
          <div class="row">
            <div class="col-12 col-sm-6">
              <label class="form-label mt-2" for="sinav_tarihi">Sınav Tarihi:</label>
              <input type="datetime-local" readonly value="{{isset($sinav_tarihi)?$sinav_tarihi:'yok'}}" name="sinav_tarihi" id="sinav_tarihi" class="form-control">
            </div>

            <div class="col-12 col-sm-6">
              <label class="form-label mt-2" for="">Sınav Süresi:</label>
              <input type="time" value="{{isset($sinav_süresi)?$sinav_süresi:'yok'}}" readonly name="sinav_süresi" id="sinav_saati" class="form-control">
            </div>
            <div id="sinavidüzenleDiv" style="display:none">
              <button class="input-group mt-3 d-grid btn btn-success" type="submit" id="sinavidüzenleBtn" class="btn btn-success d-block">Kaydet </button>
            </div>
          </div>  
        </form>
      </div>
    </div>
  <!-- SINAV DÜZENLEME  SONU-->
  <!--SORU EKLEME MODAL-->
   <div class="modal" id="soruEkleModal">
     <div class="modal-dialog">
       <div class="modal-content">
         <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Soru Ekle</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
         <!-- Modal Header Sonu -->

         <!-- Modal body -->
           <div class="modal-body">
            <div class="container mt-3">
              <form action="{{ url('soruEklemeislemi') }}" method="post" id="soruEkleForm">      
                    @error('cevapInput')
                    <div class="alert alert-danger">
                      <span class="text-danger mb-2">{{ $message }}</b></span>
                    </div>     
                    @enderror
                  @error('soru_metni')
                  <div class="alert alert-danger">
                    <span class="text-danger mb-2">{{ $message }}</b></span>
                  </div> 
                  @enderror
                @error('secenek.*')
                <div class="alert alert-danger">
                  <span class="text-danger mb-2">{{ $message }}</b></span>
                </div> 
                @enderror
                 @csrf 
                 <input type="hidden" name="cevapInput" id="cvpInput">
              
                 <input type="hidden" name="sinav_id" value="{{$sinav_id}}" id="">  
                 <div>
                   <label for="#soru_metni">Soru Metni:</label>
                  
                   <input type="text" id="soru_metni" name="soru_metni" class="form-control" placeholder="Soru metni giriniz">
                 </div>
                 <div>
                 <div class="input-group" id="seceneklerDiv0"><button id="cevapBtn0" onclick="dogruCevap(this.id)" class="btn btn-outline-primary mt-2" type="button">Seçenek</button><input class="form-control mt-2" placeholder="Seçenek" name="secenek[0]">
                </div>
                 </div>
                 <div id="seceneklerDiv"></div>
                 <div class="secenekEkleDiv mt-2 d-grid">
                    <button id="secenekEkle" type="button" onclick="secenekYarat()" class="btn btn-outline-success d-block">Seçenek Ekle</button>
                  </div>                 
            </div>
           </div>
         <!-- Modal Body Sonu-->
         
         <!--Modal Footer-->
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" name="" value="Kaydet" id="">
            </form>
            </div>
         <!--Modal Footer Sonu--> 
      
          <script>
            var i=1;
            var silID=0;
            var divID=0;
            var btnID=1;
            var secenekSayisi=1;
            var dizi=["cevapBtn0"];
          var cevapInput=document.getElementById("cvpInput");
           
          
            function secenekYarat(){         
              var secenekEkleDiv=document.getElementById('secenekEkleDiv');
              var sec=document.createElement('div');
              var _inp=document.createElement('input');
              var cevapBtn=document.createElement('button');
              var silBtn=document.createElement('button');

              cevapBtn.classList.add('btn','btn-outline-primary','mt-2');
              silBtn.classList.add('btn','btn-danger','mt-2');
              sec.classList.add('input-group');
              _inp.classList.add('form-control','mt-2');

              _inp.setAttribute('placeholder',"Seçenek");
              _inp.setAttribute('name','secenek['+i+']');
              cevapBtn.setAttribute('type','button');
              cevapBtn.setAttribute('id','cevapBtn'+btnID);
              cevapBtn.setAttribute("onclick","dogruCevap(this.id)");
              silBtn.setAttribute('type','button');
              silBtn.setAttribute('id',silID);
              sec.setAttribute('id','seceneklerDiv'+divID);
              silBtn.setAttribute('onclick',"secenekSil(this.id)");

             cevapBtn.innerText="Seçenek";
             silBtn.innerText="X";
           
             seceneklerDiv.appendChild(sec);
             sec.appendChild(cevapBtn);
             sec.appendChild(_inp);
             sec.appendChild(silBtn);
             i++
             silID++;
             divID++;
             dizi.push("cevapBtn"+btnID);
             btnID++;
             secenekSayisi++;
           
             for(var a=0;a<dizi.length;a++){
              console.log(dizi[a]);
             }
               console.log("sınır");
              return sec;
            }
            var silinecekIput;
            
            function secenekSil(silBtnID){
              var activeBtn=document.getElementById(silBtnID);
              var deleteElement=activeBtn.parentElement;  
             
              deleteElement.style.display="none";
              silinecekIput="secenek"+silBtnID;
              var atrInpDelet=deleteElement.childNodes[1];
              console.log("sil");
              var sayi=silBtnID;
              var btnIDe= sayi++;
               btnIDe++;
              
              for(var a=0;a<dizi.length;a++){
                if(dizi[a]==btnIDe){
                  dizi.splice(a, 1);
                }             
              }
              atrInpDelet.removeAttribute('name');
              secenekSayisi--;
              console.log("sil tuşu: "+silBtnID+" cevap tuşu: " +btnIDe);
           }  
           function dogruCevap(btnID) {
            var btn=document.getElementById(btnID);
            btn.style.background="green";
            btn.style.color="white";
            btn.innerText="Doğru";
            var cevapDiv=btn.parentElement;  
            var cevapInputs=cevapDiv.childNodes[1].name;
            
            cevapInput.value=cevapInputs;
            for(var a=0;a<dizi.length;a++){
              if(dizi[a]!=btnID){
                var btn2=document.getElementById(dizi[a]);
                btn2.style.background="red";
                btn2.style.color="white";
                btn2.innerText="Yanlış";
  
              }
            }
         
           }

          </script>
        
       </div>
     </div>
   </div>
  <!--SORU EKLEME MODAL sONU-->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <!-- SORULARI LİSTELEME-->
    <div class="card container mt-5">
      <div class="card-body">
        <table id="example" class="table table-striped container-fluid  " style="width:100%">
          <h2 style="text-align: center;">Sorular</h2> <hr>
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Soru Metni</th>
              <th>Düzenle</th>
              <th>Sil</th>
            </tr>
          </thead>
          <tbody>            
            <?php $soruSirasi = 1; $d=0; ?>
            @foreach($sorular as $soru)
             <tr>
              <td>
                <?php echo $soruSirasi;
                  $soruSirasi++; ?>
                <?php $soru_id = $soru->soru_id; ?>
                <input type="text" name="soru_id" id="soru_id" value="{{ $soru->soru_id}}">
                <?php $data['soru_id'] = $soru->soru_id; ?>
              </td> <!--onclick="$('#inp_soru_id').val(' { { $soru->soru_id}}')"-->
              <td> {{$soru->soru_metni}}</td>
              <td> <form action="/soru/{{$soru->soru_id}}".$soru_id method="get">@csrf<button type="submit" class="btn btn-primary">Düzenle</button></form></td>
              <td> <?php $soru_id=374;?>
              <form action="/soru-sil/{{ $soru->soru_id}}" .$soru_id method="post">@csrf<button type="submit" class="btn btn-danger">Sil</button></form>
              </td>
             </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  <!-- SORULARI LİSTELEME SONU-->
  <!--SORU DÜZENLEME MODAL-->
    <div class="modal" id="soruDuzenleme">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <!-- Modal body -->
          <div class="modal-body" id="soruDuzenleBody">
            <input type="text" name="soru_id" id="inp_soru_id">
          </div>
        </div>
      </div>
    </div>

  <!--SORU DUZENLEME MODAL SONU-->
 <script>



  function updateSoru(id){
     var soruDuzenleBody=document.getElementById('soruDuzenleBody');
    $.ajax({
       url:"/deneme/"+id,
       headers:{'X-CSRF-TOKEN':'{{csrf_token()}}'},
       method:"POST",
       success:function(result){
        console.log(result);
      } 
     });
      
  }
    
 </script>
 

@endsection




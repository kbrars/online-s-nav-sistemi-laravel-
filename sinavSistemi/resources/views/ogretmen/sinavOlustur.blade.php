
@section("title")Sınav Oluştur @endsection
@extends("layout.ogretmenSidebar")
@section("icerik")
<div class="content-wrapper">
<div class="card container">
    <div class="card-header">Sınav Oluşturma</div>
    <div class="card-body">
        <form action="" method="post" action="{{route('sinavOlusturPost')}}">
           @csrf
           <input type="hidden" name="ogretmen" value="{{$data->isim }} {{$data->soyad}}" id="">
           @error('sinav_adi')
            <div class="alert alert-danger">
             {{ $message }}
            </div>
           @enderror
           @error('sinav_aciklama')
           <div class="alert alert-danger">
            {{ $message }}
           </div>
          @enderror
          @error('sinav_tarihi')
          <div class="alert alert-danger">
           {{ $message }}
          </div>
         @enderror
         @error('sinav_saati')
         <div class="alert alert-danger">
          {{ $message }}
         </div>
        @enderror

           <label class="form-label" for="">Başlık:</label> 
           <input type="text" name="sinav_adi" class="form-control" placeholder="Sınav başlığı giriniz.">
           <label class="form-label mt-2" for="">Açıklama:</label>         
           <textarea name="sinav_aciklama" id="" cols="30" rows="5" class="form-control "></textarea>
           <div class="row">
                <div class="col-12 col-sm-6"> 
                  <label class="form-label mt-2" for="">Sınav tarihi ve saati:</label>
                  <input type="datetime-local" name="sinav_tarihi" id="" class="form-control">
                </div>
                <div class="col-12 col-sm-6"> 
                  <label class="form-label mt-2" for="">Sınav Süresi:</label>
                  <input type="time" name="sinav_süresi" id="" class="form-control">
                </div>
            </div>
            <div id="sinaviKaydetDiv" class="input-group mt-5 d-grid">              
                <button type="submit" id="sinaviKaydetBtn" class="btn btn-success d-block"> Oluştur </button>                  
            </div>     
        </form>
    </div>             
</div>
</div>
<script>

</script>
@endsection

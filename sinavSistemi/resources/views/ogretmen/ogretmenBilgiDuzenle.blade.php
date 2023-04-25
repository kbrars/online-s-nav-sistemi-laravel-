
@section("title")Bilgileri Düzenle @endsection
@section("eklenti")
<script src="../../../jsDosyalari/sinavDuzenleme.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection
@extends("layout.ogretmenSidebar")
@section("icerik")
<div class="content-wrapper">
<div class="card container mt-4">
  <div class="card-header">
    <button class="btn btn-outline-secondary"  onclick="duzenlemeBtn()" style="float: right;">Bilgilerimi Düzenle</button>
    Profil: {{$data->isim}} {{$data->soyad}}<br> 
  </div>
  
  <div class="card-body">
    <form action="{{route('ogretmenBilgiDuzenleme')}}" method="post">
      @csrf
      <input type="hidden" value="" name="ogr_id" id="">
      <div class="row">
         <div class="col-12 col-sm-6 col-md-4">
            <label for="">İsim:</label>
            <input type="text"readonly value="{{$data->isim}}" class="form-control" name="isim" id="sinav_adi">
         </div>
         <div class="col-12 col-sm-6 col-md-4">
            <label for="">Soyad</label>
            <input type="text"readonly value="{{$data->soyad}}" class="form-control" name="soyad" id="sinav_aciklamasi">
         </div>
         <div class="col-12 col-sm-12 col-md-4">
            <label for="">E-mail:</label>
            <input type="email"readonly value="{{$data->email}}" class="form-control" name="email" id="email">
         </div>
      </div>
      <div class="row">
        <div class="col-12 col-sm-4"> 
          <label class="form-label mt-2" for="sinav_tarihi">TC Kimlik No:</label>
          <input type="text" readonly value="{{$data->tckn}}" name="tckn" id="sinav_tarihi" class="form-control">
        </div>
        <div class="col-12 col-sm-4"> 
          <label class="form-label mt-2" for="">Telefon</label>
          <input type="text" readonly name="telefon" value="{{$data->telefon}}" id="sinav_saati" class="form-control">
        </div>
        <div class="col-12 col-sm-4" > 
          <label class="form-label mt-2" for="">Doğum Tarihi:</label>
          <input type="date" value="{{$data->dogumTarihi}}" readonly name="dogumTarihi"  id="sinav_süresi" class="form-control">
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-sm-6">
            <label for="">Okul:</label>
            <input type="text"readonly value="{{$data->okul}}" class="form-control" name="okul" id="okul">
        </div>
        <div class="col-12 col-sm-6 ">
          <label for="">Şifre:</label>
           <input type="password"readonly value="{{$data->sifre}}" class="form-control" name="sifre" id="sifre">
        </div>       
      </div>      
      <div id="sinavidüzenleDiv" style="display:none">
        <button class="input-group mt-3 d-grid btn btn-success"  type="submit" id="sinavidüzenleBtn" class="btn btn-success d-block">Kaydet </button>   
      </div>  
    </form>
  </div>
</div>
</div>
@endsection



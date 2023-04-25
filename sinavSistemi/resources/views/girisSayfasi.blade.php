<!DOCTYPE html>
<html lang="en">
<head>
  <title> @yield("title")</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>,
  @yield("css")
</head>
<body>
<div class="card mb-3 kart h-100 w-auto"   style="margin:8%">
  <div class="row g-0">
    <div class="col-md-7">
      <img src="../../../images/sinavv.jpeg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-5">
      <div class="card-body">
        <h3>Online Sınav Sistemi</h3>
        <div class="form">
        <form  class="formKarti" method="POST" action="{{route('girisYapma')}}">
          @csrf
          @if(Session::has("success"))
      <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif

        @if(Session::has("fail"))
      <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
    <h5 style="margin-left:3%;">Giriş Yap</h5> <br>
  <div class="mb-3 container ">
    <input type="text" class="form-control GirisInputs" name="tckn" id="tckn" placeholder="TC kimlik numaranısı giriniz.">
    <span class="text-danger">@error('tckn') {{$message}} @enderror</span>
  </div>
  <br> 
    <div class="mb-3 container">
    <input type="password" class="form-control GirisInputs " name="sifre" id="password" placeholder="Şifre giriniz">
    <span class="text-danger">@error('sifre') {{$message}} @enderror</span>
    <label class="kayitLabel" for=""><a class="kayitLabel" data-bs-toggle="modal" data-bs-target="#kayitModal" href="">Kayıt Ol</a></label>
</div>
<br>
  <button  type="submit" class="btn btn-outline-primary girisbtn">Giriş Yap</button>
<br> <br> 
</form>
                        <!---modal--> 
<!-- The Modal -->
<div class="modal" id="kayitModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Kayıt Ol</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form class="container" method="post" action="{{route('kayıtOlma')}}">
        @csrf
        @if(Session::has("success"))
      <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif

        @if(Session::has("fail"))
      <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
  <div class="mb-3 mt-3">
    <label for="name" class="form-label">İsim:</label>
    @error('isim')
    <div class="alert alert-danger">
      <span class="text-danger mb-2">{{ $message }}</span>
    </div>     
    @enderror
    <input type="text" class="form-control" id="isim" placeholder="İsim giriniz." name="isim">
  </div>
  <div class="mb-3 mt-3">
    <label for="lastname" class="form-label">Soyisim:</label>
    @error('soyad')
    <div class="alert alert-danger">
      <span class="text-danger mb-2">{{ $message }}</span>
    </div>     
    @enderror
    <input type="text" class="form-control" id="soyad" placeholder="Soyisimm giriniz." name="soyad">
  </div>
  <div class="mb-3 mt-3">
    <label for="tckn" class="form-label">TC Kimlik no:</label>
    @error('tckn')
    <div class="alert alert-danger">
      <span class="text-danger mb-2">{{ $message }}</span>
    </div>     
    @enderror
    <input type="text" class="form-control" id="tckn" placeholder="TC kimlik numarası girim." name="tckn">
  </div>
  <div class="mb-3 mt-3">
    <label for="telefon" class="form-label">Telefon:</label>
    @error('telefon')
    <div class="alert alert-danger">
      <span class="text-danger mb-2">{{ $message }}</span>
    </div>     
    @enderror
    <input type="text" class="form-control" id="telefon" placeholder="Telefon numarası giriniz." name="telefon">
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email:</label>
    @error('email')
    <div class="alert alert-danger">
      <span class="text-danger mb-2">{{ $message }}</span>
    </div>     
    @enderror
    <input type="email" class="form-control" id="email" placeholder="Email giriniz." name="email">
  </div>
  <div class="mb-3 mt-3">
    <label for="okul" class="form-label">Okul:</label>
    @error('okul')
    <div class="alert alert-danger">
      <span class="text-danger mb-2">{{ $message }}</span>
    </div>     
    @enderror
    <input type="text" class="form-control" id="okul" name="okul" placeholder="Okulunuzu girin."> 
  </div>
  <div class="mb-3 mt-3">
    <label for="birthdate" class="form-label">Doğum Tarihi::</label>
    @error('dogumTarihi')
    <div class="alert alert-danger">
      <span class="text-danger mb-2">{{ $message }}</span>
    </div>     
    @enderror
    <input type="date" class="form-control" id="dogumTarihi" name="dogumTarihi">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Şifre:</label>
    @error('sifre')
    <div class="alert alert-danger">
      <span class="text-danger mb-2">{{ $message }}</span>
    </div>     
    @enderror

    <input type="password" class="form-control" id="pwd" placeholder="Şifre giriniz." name="sifre">
  </div>
      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Kayıt Ol</button>
</form>
      </div>
      </div>

    </div>
  </div>
</div>

        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

@extends("layout.adminSidebar")
@section("icerik")

<div class="content-wrapper">
    <div class="card">
        <div class="card-header">Admin Ekle</div>
        <div class="card-body">
            <form class="container" method="post" action="{{route('adminEklePost')}}">
                @csrf
                @if(Session::has("success"))
              <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
        
                @if(Session::has("fail"))
              <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @error('isim')
                <div class="alert alert-danger">
                  <span class="text-danger mb-2">{{ $message }}</span>
                </div>     
                @enderror
                @error('soyad')
                <div class="alert alert-danger">
                  <span class="text-danger mb-2">{{ $message }}</span>
                </div>     
                @enderror
                @error('tckn')
                <div class="alert alert-danger">
                  <span class="text-danger mb-2">{{ $message }}</span>
                </div>     
                @enderror
                @error('email')
                <div class="alert alert-danger">
                  <span class="text-danger mb-2">{{ $message }}</span>
                </div>     
                @enderror
               
                @error('okul')
                <div class="alert alert-danger">
                  <span class="text-danger mb-2">{{ $message }}</span>
                </div>     
                @enderror
                @error('dogumTarihi')
                <div class="alert alert-danger">
                  <span class="text-danger mb-2">{{ $message }}</span>
                </div>     
                @enderror
                @error('sifre')
                <div class="alert alert-danger">
                  <span class="text-danger mb-2">{{ $message }}</span>
                </div>     
                @enderror

                <div class="row">
                    <div class="mb-3 mt-3 col-6 col-sm-4 col-md-3">
                        <label for="name" class="form-label">İsim:</label>
                        <input type="text" class="form-control" id="isim" placeholder="İsim giriniz." name="isim">
                      </div>
                      <div class="mb-3 mt-3 col-6 col-sm-4 col-md-3">
                        <label for="lastname" class="form-label">Soyisim:</label>
                        <input type="text" class="form-control" id="soyad" placeholder="Soyisimm giriniz." name="soyad">
                      </div>
                      <div class="mb-3 mt-3 col-6 col-sm-4 col-md-3">
                        <label for="tckn" class="form-label">TC Kimlik no:</label>
                        <input type="text" class="form-control" id="tckn" placeholder="TC kimlik numarası girim." name="tckn">
                     </div>
                         
                      <div class="mb-3 mt-3 col-6 col-sm-4 col-md-3">
                        <label for="telefon" class="form-label">Telefon:</label>
                        <input type="text" class="form-control" id="telefon" placeholder="Telefon numarası giriniz." name="telefon">
                      </div>
                      <div class="mb-3 mt-3 col-6 col-sm-4 col-md-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Email giriniz." name="email">
                      </div>
                      <div class="mb-3 mt-3 col-6 col-sm-4 col-md-3">
                        <label for="okul" class="form-label">Okul:</label>
                        <input type="text" class="form-control" id="okul" name="okul" placeholder="Okulunuzu girin."> 
                      </div>
                      <div class="mb-3 mt-3 col-6 col-sm-4 col-md-3">
                        <label for="birthdate" class="form-label">Doğum Tarihi::</label>
                        <input type="date" class="form-control" id="dogumTarihi" name="dogumTarihi">
                      </div>
                      <div class="mb-3 mt-3 col-6 col-sm-4 col-md-3">
                        <label for="pwd" class="form-label">Şifre:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Şifre giriniz." name="sifre">
                      </div>
                </div>
              
        </div>
        <div class="card-footer d-grid">
            <button type="submit" class="btn btn-primary d-block">Kayıt Ol</button>
        </div>
      </div>
    </form>
</div>
 



@endsection

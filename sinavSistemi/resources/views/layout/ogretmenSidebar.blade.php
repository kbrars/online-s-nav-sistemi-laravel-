@extends("layout.ogretmenHeader")
  <!-- Main Sidebar Container -->
  <aside  style="background:black;" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a style="text-decoration:none;" href="/OgretmenGiris" class="brand-link">
    <i style="font-size:160%; margin-left:0px;" class="fa-solid fa-chalkboard-user"></i>  
      <span class="brand-text font-weight-light">Öğretmen Paneli</span>
    </a>
    <a style="text-decoration:none;" href="{{route('ogretmenBilgiSayfasi')}}" class="brand-link">
    <i style="font-size:160%; margin-left:0px;" class="fa-solid fa-user"></i>  
      <span class="brand-text font-weight-light">{{$data->isim}} {{$data->soyad}}</span>
    </a>
    <!-- Sidebar --> 
    <div style="background:black;" class="sidebar">
      <!-- Sidebar Menu <i class=""></i> -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">        
              <li class="nav-item">
                <a style="text-decoration:none;" href="/sinavlar" class="nav-link">
                <i  style="font-size:180%; margin-left:-10px;" class="fa-solid fa-file-circle-check"></i>            
                  <p>Sınavlar</p>
                </a>
              </li> 
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">        
        <li class="nav-item">
                <a href="/ogretmenGiris/sinavOlustur" class="nav-link">
                  <i  style="font-size:180%; margin-left:-10px;" class="fa-solid fa-file-circle-plus"></i>  
                  <p style="font-size:100%"> Sınav Oluştur</p>
                </a>
              </li>  
              <li class="nav-item">
                <a href="/cikis" class="nav-link">
                  <i  style="font-size:180%; margin-left:-10px;" class="fa-solid fa-arrow-right-from-bracket"></i>  
                  <p style="font-size:100%">Çıkış Yap</p>
                </a>
              </li>               
            </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</body>
</html>

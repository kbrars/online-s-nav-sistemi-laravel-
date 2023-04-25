
@extends("layout.adminHeader")
  <!-- /.navbar -->
 
  <!-- Main Sidebar Container -->
  <aside  style="background:black;" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a style="text-decoration:none;" href="/adminAnasayfa" class="brand-link">
    <i style="font-size:160%; margin-left:0px;" class="fa-regular fa-id-badge"></i>  
      <span class="brand-text font-weight-light">Admin Paneli</span>
    </a>
    <a style="text-decoration:none;" href="{{route('adminProfil')}}" class="brand-link">
    <i style="font-size:160%; margin-left:0px;" class="fa-solid fa-user"></i>  
      <span class="brand-text font-weight-light">{{$data->isim}} {{$data->soyad}}</span>
    </a>
    <!-- Sidebar -->  
    <div style="background:black;" class="sidebar">
      <!-- Sidebar Menu <i class=""></i> --> 
      <nav class="mt-2">  
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">   
        <li class="nav-item">
          <a style="text-decoration:none;"  href="{{route('adminEkleGet')}}" class="nav-link">
          <i  style="font-size:180%; margin-left:-10px;" class="fa-regular fa-square-plus"></i>            
            <p>Admin Ekle</p>
          </a>
        </li> 
        <li class="nav-item">
          <a style="text-decoration:none;"  href="{{route('ogretmenler')}}" class="nav-link">
          <i  style="font-size:180%; margin-left:-10px;" class="fa-solid fa-chalkboard-user"></i>            
            <p>öğretmenler</p>
          </a>
        </li> 
        <li class="nav-item">
          <a style="text-decoration:none;"  href="{{route('ogretmenEkle')}}" class="nav-link">
          <i  style="font-size:180%; margin-left:-10px;" class="fa-solid fa-user-plus"></i>            
            <p>Öğretmen Ekle</p>
          </a>
        </li> 
       
        <li class="nav-item">
          <a style="text-decoration:none;"  href="{{route('ogrenciler')}}" class="nav-link">
          <i  style="font-size:180%; margin-left:-10px;" class="fa-solid fa-users"></i>            
            <p>Öğrenciler</p>
          </a>
        </li> 
              <li class="nav-item">
                <a style="text-decoration:none;"  href="{{route('adminSinavlar')}}" class="nav-link">
                <i  style="font-size:180%; margin-left:-10px;" class="fa-solid fa-file-circle-check"></i>            
                  <p>Sınavlar</p>
                </a>
              </li> 
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">         
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

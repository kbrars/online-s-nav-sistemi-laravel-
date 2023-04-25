
@section("title")Sınavlar @endsection
@section("eklenti")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
@endsection
@extends("layout.ogretmenSidebar")
@section("icerik")

<div class="content-wrapper">
  <div class="card-body ">
  <table id="example" class="table table-striped container table-sm" >
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Sınav Adı</th>
                <th>Sınav Tarihi</th>
                <th>Düzenle</th>
                <th>Sil</th>
            </tr>
        </thead>
        <tbody>
          @foreach($sinavlar as $sinav)
           <tr>
               <td>{{ $sinav->sinav_id}} </p></td>
               <td> {{ $sinav->sinav_adi}}</td>
               <td> {{ $sinav->sinav_tarihi}}</td>
               
                 <?php $id=$sinav->sinav_id; ?>
               <td><a href="/sinav/{{ $sinav->sinav_id}}"><button type="button"  class="btn btn-primary">Düzenle</button></a></td>
               <td><form method="post" action="/sinav-sil/{{ $sinav->sinav_id}}/".$id>@csrf<button type="submit"  class="btn btn-danger">Sil</button></form> </td>   
           </tr>
          @endforeach
        </tbody>     
    </table>
  </div>
</div>
   
    <script>
        $(document).ready(function () {
         $('#example').DataTable();
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    




@endsection
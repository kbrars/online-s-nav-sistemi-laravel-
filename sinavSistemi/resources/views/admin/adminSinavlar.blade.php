@extends("layout.adminSidebar")
@section("icerik")

<div class="content-wrapper">
  <div class="card-body container ">
   <table id="example" class="table table-striped container table-sm" >
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Sınav Adı</th>
                <th>Sınav Tarihi</th>
                <th>Öğretmen</th>
            </tr>
        </thead>
        <tbody>
          @foreach($sinavlar as $sinav)
           <tr>
               <td>{{ $sinav->sinav_id}} </p></td>
               <td> {{ $sinav->sinav_adi}}</td>
               <td> {{ $sinav->sinav_tarihi}}</td>             
               <?php $id=$sinav->sinav_id; ?>
               <td>{{ $sinav->ogretmen }}</td>
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

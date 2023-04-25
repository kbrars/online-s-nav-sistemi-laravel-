@extends("layout.adminSidebar")
@section("icerik")

<div class="content-wrapper">
  <div class="card-body container ">
   <table id="example" class="table table-striped container table-sm" >
        <thead class="table-dark">
            <tr>
                <th>İsim</th>
                <th>Soyisim</th>
                <th>Telefon</th>
                <th>E-mail</th>
                <th>Okul</th>
            </tr>
        </thead>
        <tbody>
          @foreach($ogretmenler as $ogretmen)
           <tr>
             <td>{{ $ogretmen->isim }}</td>
            <td>{{ $ogretmen->soyad }}</td>
            <td>{{ $ogretmen->telefon }}</td>
            <td>{{ $ogretmen->email }}</td>
            <td>{{ $ogretmen->okul }}</td>
            

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

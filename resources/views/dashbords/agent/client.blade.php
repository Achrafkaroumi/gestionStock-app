@extends('dashbords.layouts.homeAg')
@section('titre','Client')

@section('content')
<div class="container mt-5">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <h3 class="mb-4">Liste des clients : </h3> 
          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0" style="border-bottom-color:transparent;">
            <thead class="table-dark">
              <tr>
                <th scope="col">N°</th>
                <th scope="col">SIREN </th>
                <th scope="col">Nom Client</th>
                <th scope="col">Telephone</th>
                <th scope="col">Email</th>
                <th scope="col">Adresse</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $i=0;
                @endphp

            @foreach ($client as $item)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td class="Cl_Siren">{{$item->SIREN_Cl}} </td>
                    <td class="Cl_Nom">{{$item->Nom_Cl}}</td>
                    <td class="Cl_Tel">{{$item->Tel_Cl}}</td>
                    <td class="Cl_Email">{{$item->Email_Cl}}</td>
                    <td class="Cl_Adresse">{{$item->Adresse_Cl}}</td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

  @section('script')
  <script>

  $(document).ready( function () {
      $('#myTable').DataTable();
  });
  </script>
  @endsection

@endsection

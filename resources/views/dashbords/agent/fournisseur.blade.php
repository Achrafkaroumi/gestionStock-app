@extends('dashbords.layouts.homeAg')
@section('titre','Fournisseur')

@section('content')

<div class="container mt-5">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <h3 class="mb-4">Liste des Fournisseurs : </h3> 
          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0" style="border-bottom-color:transparent;">
            <thead class="table-dark">
              <tr>
                <th>N°</th>
                <th>SIREN</th>
                <th>Fournisseur</th>
                <th>Secteur</th>
                <th>Telephone</th>
                <th>Adresse</th>
                <th>Email</th>
              </tr>
            </thead>
            @php
             $i=0;   
            @endphp
            <tbody>
            @foreach ($fournisseurs as $four)
              <tr>
                <td>{{++$i}}</td>
                <td class="f_siren">{{$four->siren}}</td>
                <td class="f_nom">{{$four->nom}}</td>
                <td class="f_secteur">{{$four->secteur}}</td>
                <td class="f_tel">{{$four->telephone}}</td>
                <td class="f_adr">{{$four->adresse}} </td>
                <td class="f_email">{{$four->email}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>

    <!-- Script -->
    @section('script')
        <script >   
            $(document).ready( function () {
                $('#myTable').DataTable();
            });

        </script>
    @endsection
@endsection

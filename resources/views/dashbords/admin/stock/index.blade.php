@extends('dashbords.layouts.homeAd')
@section('titre','Stock')

@section('content')

<div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <h3 class="mb-4">Liste des produits : </h3> 
        <table class="table table-bordered" id="tabstock" width="100%" cellspacing="0" style="border-bottom-color:transparent;">
          <thead>
            <tr>
                <th>N°</th>
                <th>Référence</th>
                <th>Désignation</th>
                <th>Catégorie</th>
                <th>Prix d'achat</th>
                <th>Prix vente</th>
                <th>Quantité stock</th>
                <th>Image produit</th>
            </tr>
          </thead>
           @php
             $i=0;   
            @endphp
          <tbody>
            
            @foreach ($produits as $produit)
            <tr>
              <td>{{++$i}}</td>
              <td>{{$produit->ref_produit}}</td>
              <td>{{$produit->design_produit}}</td>
              <td>{{$produit->categorie->nom_categorie}}</td>
              <td>{{$produit->prix_achat}} DH</td>
              <td>{{$produit->prix_vente}} DH</td>
              <td>{{$produit->qte}}</td>
              <td><img  src="{{ URL('img/'.$produit->image) }}" class="img-thumbnail" width="100px" height="100px"></td>
            </tr>
            @endforeach


          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>

    @section('script')
        <script >             
            $(document).ready( function () {
                $('#tabstock').DataTable();
            });
        </script>
    @endsection
@endsection

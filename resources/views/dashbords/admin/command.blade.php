@extends('dashbords.layouts.homeAd')
@section('titre','Commande')

@section('content')

<h3 class="mb-4">Liste des commandes :</h3>

<div class="container mt-5">
    <div class="card shadow mb-4">
      <div class="card-body">
        <h4 class="mb-4">Liste des achats :</h4>
        <div class="table-responsive">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0" style="border-bottom-color:transparent;">
              <thead>
                <tr>
                  <th>N°</th>
                  <th >Fournisseur</th>
                  <th >Produit</th>
                  <th >Quantité acheté </th>
                  <th >Prix par unité</th>
                  <th >Montant Total</th>
                  <th>Date d'achat</th>
                </tr>
              </thead>
              @php
                 $i=0; 
              @endphp
              <tbody>
                @foreach ($achats as $act)
                <tr>
                  <td>{{++$i}}</td>
                  <td class="tab_f">{{$act->fournisseur->nom}}</td>
                  <td class="tab_p">{{$act->produit->design_produit}}</td>
                  <td class="tab_qte">{{$act->qte_achat}}</td>
                  <td class="tab_prx">{{$act->prix_unitaire}}</td>
                  <td class="tab_mnt">{{$act->montant}}</td>
                  <td class="tab_dat">{{ date('j/m/Y',strtotime($act->created_at)) }}</td>
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
      $(document).ready(function () {
          $('#myTable').DataTable();
          $('#myTable1').DataTable();
      });
  </script>
  @endsection



<!--Listes des ventes-->
<hr class="my-5">
<div class="card shadow mb-4">
  <div class="card-body">
    <h4 class="mb-4">Liste des ventes :</h4>
    <div class="table-responsive">
      <table class="table table-bordered" id="myTable1" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>N° vente</th>
            <th>Désignation</th>
            <th>Client</th>
            <th>Quantité vendu </th>
            <th>Prix par unité</th>
            <th>Montant Total</th>
            <th>Date vente</th>
          </tr>
        </thead>
        @php
               $x=0; 
            @endphp
        <tbody>
          @foreach ($ventes as $vt)
          <tr>
            <td>{{++$x}}</td>
            <td class="t_prod">{{$vt->produit->design_produit}}</td>
            <td class="t_cli">{{$vt->relatedClient->Nom_Cl}}</td>
            <td class="t_qte">{{$vt->qte_vente}}</td>
            <td class="t_prix">{{$vt->prix}}</td>
            <td class="t_mnt">{{$vt->montant}}</td>
            <td>{{date('j/m/Y',strtotime($vt->created_at)) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
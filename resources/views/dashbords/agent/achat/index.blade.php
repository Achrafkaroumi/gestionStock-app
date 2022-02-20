@extends('dashbords.layouts.homeAg')
@section('titre','Achat')

@section('content')
<div class="container">

    @php
          $c=0;
          $v=0;
        foreach ($achats as $actee) {
          $c++;
          $v=$actee->id;
        }
    @endphp

      <form action="{{route('achat.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
  <div class="container mt-5">
      <div class="card shadow mb-4">
         <div class="card-body">
          @if (session()->has('statut'))
          <div class="alert alert-success" role="alert">
            {{session()->get('statut')}}
          </div>
          @endif

          <div class="form-row mt-3 mb-4">
            <label class="ln ml-2" ><strong>N° Achat : {{++$c}} </strong></label>
            <input type="text" value="{{++$v}}" name="idAc" hidden>
            <input type="text" value="fournisseur" name="ty_four" hidden>
          </div>

           <div class="form-row mb-0">
            <div class="col">
              <i class="fas fa-id-badge"></i> &nbsp;<label >Nom fournisseur: </label>
              <select name="fournisseur" class="form-control" aria-label="Default select example">
                <option value="0" disabled="true" selected="true">--Fournisseurs--</option>
                  @foreach ($fournisseurs as $fournisseur)
                  <option value="{{$fournisseur->id}}">{{$fournisseur->nom}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col">
              <i class="fas fa-id-card"></i>&nbsp;<label > Listes produits : </label>
              <select name="produit" class="form-control" aria-label="Default select example">
                <option value="0" disabled="true" selected="true">--Produits--</option>
                @foreach ($produits as $produit)
                  <option value="{{$produit->id}}">{{$produit->design_produit}}</option>
                  @endforeach
              </select>
           </div>
        </div>
          <!-- prix produit -->
          <div class="form-row mb-0">
          <div class="col">
            <i class="fas fa-dollar-sign"></i> &nbsp;<label >Prix unitaire du Produit : (DHs) </label>
              <input type="number" id="prix" class="form-control" name="prix_uni_ac" min="1"  placeholder="Ex : 100 Dh">
            </div>
          <!-- quantité  produit -->
            <div class="col">
              <i class="fas fa-layer-group"></i> &nbsp;<label >Quantité du Produit : (unité) </label>
              <input type="number" id="qtt" class="form-control" name="qte_ac" placeholder="Entrer quantité produit" min="1">
            </div>
          </div>

          <div class="form-row ">
            <div class="col mt-2">
              <i class="fas fa-coins"></i> &nbsp;<label >Montant Total : (DHs)</label>
              <input type="text" id="total" class="form-control" name="total_ac" readonly  placeholder="Montant total calculable ">
            </div> 

            <div class="col mt-2">
              <i class="fas fa-coins"></i> &nbsp;<label >Pourcentage bénefit (%)</label>
              <input type="number" class="form-control" name="tva"  placeholder="Pourcentage " min="1" max="100">
            </div>

            <div class="col">
              <i class="fas fa-comments-dollar mt-2"></i>&nbsp;<label class="ln ml-2 mt-2" for="inlineFormCustomSelectPref">Type réglement : </label>
              <select name="regl" class="custom-select" id="inlineFormCustomSelectPref1">
                <option value="Espèce">Espèce</option>
                <option value="Crédit">Crédit</option>
              </select>
            </div>
            <input type="text" class="form-control" value="fournisseur" name="ty_four" hidden >
          </div>
            <button type="submit" class="butn btn btn-success">Enregistrer</button>
      </form>
    </div>
  </div>
</div>
  </div>







<hr class="my-5">

<div class="container mt-5">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="myTable11" width="100%" cellspacing="0" style="border-bottom-color:transparent;">
            <thead>
              <tr>
                <th>N°</th>
                <th >Fournisseur</th>
                <th >Produit</th>
                <th >Qte acheté </th>
                <th >Prix unitaire</th>
                <th >Montant Total</th>
                <th>Date d'achat</th>
                <th>Action</th>
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
                <td>
                  <a class="edit text-info " data-toggle="modal" data-target="#staticBackdrop"> <i class="fas fa-2x fa-edit"></i> </a>
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel">Modifier achat</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{route('achat.update',$act->id)}}">
                                  @csrf
                                  @method('PUT')
                                  <div class="form-row mb-0">
                                       <div class="col">
                                        <i class="fas fa-id-card"></i>&nbsp;<label > Fournisseur : </label>
                                        <input id="fourn" type="text" readonly class="form-control" style="text-align: center" >
                                     </div>

                                     <div class="col">
                                      <i class="fas fa-id-card"></i>&nbsp;<label > Produit : </label>
                                      <input id="prod" type="text" readonly class="form-control" style="text-align: center" >
                                   </div>
                                  </div>
                                      <!-- prix produit -->
                                      <div class="form-row">
                                      <div class="col">
                                        <i class="fas fa-dollar-sign"></i> &nbsp;<label >Prix unitaire du Produit : </label>
                                          <input id="idprix" type="text" class="form-control" name="prix_upt"  style="text-align: center" >
                                        </div>
                                      <!-- quantité  produit -->
                                        <div class="col">
                                          <i class="fas fa-layer-group"></i> &nbsp;<label >Quantité acheté : </label>
                                          <input id="idqte" type="number" class="form-control" name="qte_upt"  style="text-align: center" min="1">
                                        </div>
                                      </div>

                                      <div class="input-group mt-3">
                                        <span class="mt-2"><i class="fas fa-coins"></i> &nbsp;Montant Total : </span>
                                        <input id="idmtt" type="text" readonly class="form-control ml-2" name="mont_upt" style="text-align: center">
                                      </div>


                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                  <button type="submit" class="enr btn btn-primary">Enregistrer</button>
                                </div>
                          </form>
                          </div>
                        </div>
                      </div>
                      <form method="POST" action="{{route('achat.destroy',$act->id)}}" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-danger" onclick="return confirm ('Confirmer la suppression')" style="outline: none; border:none; background-color: #fff;"><i class="fas fa-2x fa-trash-alt"></i></button>
                     </form>
                     <a href="{{route('agent.fact_ac',['id'=>$act->id])}}" class="btn btn-secondary" style="padding: 3px; font-size: 12px">PDF</a>
                </td>
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
   $(document).ready(function(){
     $("input").keyup(function(){
       var quantite=Number($("#qtt").val());
       var prix=Number($("#prix").val());
       var tot=prix*quantite;
      $("#total").val(tot);
     })

    });

    $(document).ready(function(){
     $("input").keyup(function(){
       var quantite1=Number($("#idqte").val());
       var prix1=Number($("#idprix").val());
       var tot1=prix1*quantite1;
      $("#idmtt").val(tot1);
     })

    });

  //Edit modal
    $(document).on('click','.edit' , function(){
    var _this=$(this).parents('tr'); fourn
    $('#fourn').val(_this.find('.tab_f').text());
    $('#prod').val(_this.find('.tab_p').text());
    $('#idprix').val(_this.find('.tab_prx').text());
    $('#idqte').val(_this.find('.tab_qte').text());
    $('#idmtt').val(_this.find('.tab_mnt').text());
    }); 


    $(document).ready(function () {
        $('#myTable11').DataTable();
    });

</script>
@endsection



@endsection

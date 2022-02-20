@extends('dashbords.layouts.homeAg')
@section('titre','Vente')

@section('content')
<div class="container">

      @php
      $c=0;
      $v=0;
    foreach ($vents as $vt) {
      $c++;
      $v=$vt->id;
    }
@endphp
      

            <div class="container mt-5">
              <div class="card shadow mb-4">
                 <div class="card-body">
                  @if (session()->has('statut'))
                  <div class="alert alert-success" role="alert">
                    {{session()->get('statut')}}
                  </div>
                  @endif
                  
    <form action="{{route('vente.store')}}" method="POST">
          @csrf    
                  <div class="form-row mt-3 mb-4">
                    <label class="ln ml-2" ><strong>N° Vente : {{++$c}} </strong></label>
                    <input type="text" value="{{++$v}}" name="idvt" hidden>
                    <input type="text" value="client" name="ty_cl" hidden>
                  </div>
    
  
            <div class="form-row mb-0">
              <div class="col">
                <i class="fas fa-id-badge"></i> &nbsp;<label >Nom Client : </label>
                <select name="nom_clt" class="form-control" aria-label="Default select example">
                  <option value="0" disabled="true" selected="true">--Clients--</option>
                  @foreach ($clients as $cl)
                  <option value="{{$cl->Code_Cl}}">{{$cl->Nom_Cl}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col">
                <i class="fab fa-product-hunt"></i>&nbsp;<label > Produits disponibes : </label>
                <select name="produit" id="updt_select" class="form-control" aria-label="Default select example">
                  <option value="0" disabled="true" selected="true">--Produits--</option>
                  @foreach ($products as $pr)
                  <option value="{{$pr->id}}">{{$pr->design_produit}}</option>
                  @endforeach
                </select>
             </div>
          </div>


            <!-- prix unitaire a vendre -->
            <div class="form-row mb-0">
            <div class="col">
              <i class="fas fa-dollar-sign"></i> &nbsp; <label >Prix unitaire : (DHs) </label>
                <input id="prixvt"  type="number" class="form-control" name="prix_uni_at" readonly placeholder="Ex : 100 Dhs">
              </div>
            <!-- quantite a vendre -->
                  <div class="col">
                    <i class="fas fa-layer-group"></i> &nbsp;<label >Quantité a vendre : (unité) </label>
                    <input id="qttt" type="number" class="form-control" name="qte_at" min="1" placeholder="EX : 10" >
                  </div>
                </div>
            <!--  date de vente -->
            <div class="form-row mb-0">
              <div class="col">
                <i class="fas fa-coins"></i> &nbsp;<label >Montant Total : (DHs)</label>
                <input id="tot" type="text" class="  form-control" name="mnt_ac" readonly placeholder="Ex : 200 Dhs">
              </div>

              <div class="col">
                <i class="fas fa-comments-dollar"></i>&nbsp;<label class="" for="inlineFormCustomSelectPref">Type réglement : </label>
                <select name="regle" class="custom-select" id="inlineFormCustomSelectPref">
                  <option value="Espèce">Espèce</option>
                  <option value="Crédit">Crédit</option>
                </select>
              </div>
            </div>

         <button type="submit" class="butn btn btn-success">Enregister</button>
            </form>
      </div>
    </div>

<hr class="my-5">
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>N° vente</th>
            <th>Désignation</th>
            <th>Client</th>
            <th>Qte acheté </th>
            <th>Prix unitaire</th>
            <th>Montant Total</th>
            <th>Date vente</th>
            <th style="width: 100px">Action</th>
          </tr>
        </thead>
        @php
               $x=0; 
            @endphp
        <tbody>
          @foreach ($vents as $vt)
          <tr>
            <td>{{++$x}}</td>
            <td class="t_prod">{{$vt->produit->design_produit}}</td>
            <td class="t_cli">{{$vt->relatedClient->Nom_Cl}}</td>
            <td class="t_qte">{{$vt->qte_vente}}</td>
            <td class="t_prix">{{$vt->prix}}</td>
            <td class="t_mnt">{{$vt->montant}}</td>
            <td>{{date('j/m/Y',strtotime($vt->created_at)) }}</td>
            <td><a class="edit text-info" data-toggle="modal" data-target="#staticBackdrop"> <i class="fas fa-2x fa-edit"></i> </a>
                <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Modifier Vente </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('vente.update',$vt->id)}}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="form-row mb-0">
                                <div class="col">
                                 <i class="fas fa-id-card"></i>&nbsp;<label > Client : </label>
                                 <input id="cli" type="text" readonly class="form-control" style="text-align: center" >
                              </div>

                              <div class="col">
                               <i class="fas fa-id-card"></i>&nbsp;<label > Produit : </label>
                               <input id="prod" type="text" name="prod_up" readonly class="form-control" style="text-align: center" >
                            </div>
                           </div>

                                  <!-- prix unitaire a vendre -->
                                <div class="form-row mb-0">
                                  <div class="col mt">
                                    <i class="fas fa-dollar-sign"></i> &nbsp; <label >Prix unitaire :</label>
                                      <input id="prixut" type="number" class="form-control" name="" readonly placeholder="Ex : 100 Dhs">
                                    </div>
                                  <!-- quantite a vendre -->
                                        <div class="col">
                                          <i class="fas fa-layer-group"></i> &nbsp;<label >Quantité a vendre : </label>
                                          <input id="qtte" type="number" class="form-control" name="qte_up" min="1" placeholder="EX : 10" >
                                        </div>
                                  </div>
                                  <!--  date de vente -->
                                  <div class="input-group mt-3">
                                    <span class="mt-2"><i class="fas fa-coins"></i> &nbsp;Montant Total : &nbsp;</span>
                                      <input id="mnt" type="text" class="  form-control" name="num_ac" readonly placeholder="Ex : 200 Dhs">
                                    </div>
                                  
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="enr btn btn-primary">Enregistrer</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
              
                  <form method="POST" action="{{route('vente.destroy',$vt->id)}}" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-danger" onclick="return confirm ('Confirmer la suppression')" style="outline: none; border:none; background-color: #fff;"><i class="fas fa-2x fa-trash-alt"></i></button>
                 </form>
                 <a href="{{route('agent.fact_vt',['id'=>$vt->id])}}" class="btn btn-secondary" style="padding: 3px; font-size: 12px">PDF</a>
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
      $(document).on('change','#updt_select',function(){
        var prod_id=$(this).val();
        var txt=$(this).parent();
        $.ajax({
          type:'get',
          url:'{{route("agent.vente.rechercheP")}}',
          dataType:'json',
          data:{'id':prod_id},
          success:function(data){
            $('#prixvt').val(data.prix_vente);
          }
        });
      });
    });

    $(document).ready(function(){
     $("input").keyup(function(){
       var quantite=Number($("#qttt").val());
       var prix=Number($("#prixvt").val());
       var tot=prix*quantite;
        $("#tot").val(tot);
     })
    });

    $(document).ready(function(){
     $("input").keyup(function(){
       var quantite1=Number($("#qtte").val());
       var prix1=Number($("#prixut").val());
       var tot1=prix1*quantite1;
        $("#mnt").val(tot1);
     })
    });


  //Edit modal
  $(document).on('click','.edit' , function(){
    var _this=$(this).parents('tr');
    $('#prod').val(_this.find('.t_prod').text());
    $('#cli').val(_this.find('.t_cli').text());
    $('#qtte').val(_this.find('.t_qte').text());
    $('#prixut').val(_this.find('.t_prix').text());
    $('#mnt').val(_this.find('.t_mnt').text());

    }); 


    $(document).ready(function () {
        $('#myTable').DataTable();
    });

</script>
@endsection
@endsection


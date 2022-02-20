@extends('dashbords.layouts.homeAg')
@section('titre','Stock')

@section('content')


    <div class="row">
        <!-- Categorie -->
        <div class="col-lg-5 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-gray">Catégorie</h6>
                </div>
                <div class="card-body">

                  @if (session()->has('valide'))
                  <div class="alert alert-success mb-2" role="alert" style="margin-top: -28px">
                    {{session()->get('valide')}}
                  </div>
                  @endif

                  <form action="{{route('categorie.store')}}" method="POST">
                    @csrf
                        <div class="col">
                            <label >Réference catégorie : </label>
                              <input type="text" class="form-control" name="ref_cat" placeholder="Enter réference">
                        </div>
                        <div class="col">
                            <label >Nom catégorie : </label>
                            <input type="text" class="form-control" name="nom_cat" placeholder="Enter nom catégorie">
                        </div>
                        <div class="form-inline mb-0">
                            <div class="container">
                                <div class="form-group">
                                <button type="submit" class="btn btn-success m-2">Ajouter</button>
                      </form>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>


        @section('script')
        <script>
           /* $(document).ready(function(){
              $(document).on('change','#updt_select',function(){
                var cat_id=$(this).val();
                var txt=$(this).parent();

                $.ajax({
                  type:'get',
                  url:'{{route("agent.categorie.recherche")}}',
                  dataType:'json',
                  data:{'id':cat_id},
                  success:function(data){
                    $('#ide').val(data.id);
                    $('#ref').val(data.ref_categorie);
                    $('#nom').val(data.nom_categorie);
                  }
                });

              });
            });*/
        </script>
          
        @endsection

        <!-- end categorie -->


        <!-- Produit -->
        <div class="col-lg-7 mb-4" >
            <div class="card shadow mb-4" style="height: 410px">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-gray">Produits</h6>
                </div> 
                <div class="card-body" >
                  @if (session()->has('msg'))
                  <div class="alert alert-success mb-2" role="alert" style="margin-top: -28px">
                    {{session()->get('msg')}}
                  </div>
                  @endif
                    <form action="{{route('produits.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="form-row mb-0">
                            <div class="col">
                              <label >Réference produit : </label>
                                <input type="text" class="form-control" name="refer"  placeholder="Réference produit">
                              </div>
                              <div class="col">
                                <label >Désignation :  </label>
                                <input type="text" class="form-control" name="desig" placeholder="Désignation produit">
                              </div>
                        </div>
                        <div class="form-row mb-2">
                            <div class="col">
                              <label > Catégorie : </label>
                             
                              <select name="categ" class="form-control" aria-label="Default select example">
                                <option value="0" disabled="true" selected="true">--Catégories--</option>
                                @foreach ($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->nom_categorie}}</option>
                                @endforeach
                              </select>
                              </div>
                              <div class="col ml-2">
                                <label for="exampleFormControlFile1">Image Produit : </label>
                                <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
                             </div>
                        </div>

                        <button type="submit" class="prf btn btn-success ml-3">Enregistrer</button>
                    </form>
                </div>
            </div>   
        </div>
        <!-- end produit  -->
    </div>
    <hr class="my-5">
    @if (session()->has('supp'))
    <div class="alert alert-success mb-2" role="alert" style="margin-top: -28px">
      {{session()->get('supp')}}
    </div>
    @endif

    
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($produits as $prod)
      <div class="col">
        <div class="card">
          <img src="{{ URL('img/'.$prod->image) }}" class="card-img-top" height="250px"/>
          <div class="card-body">
            <h5 class="card-title">{{$prod->design_produit}}</h5>
            <p class="catg">
              {{$prod->categorie->nom_categorie}}
            </p>
              <div class="sinfo">
                  <p>
                    Vente : {{$prod->prix_vente}} DH
                  </p>
                  <p class="">
                    Achat : {{$prod->prix_achat}} DH
                  </p>
                  <p class="">
                    Stock : {{$prod->qte}}
                  </p>
            </div>
           <i> <p class="">
             Enregistrer le : {{ date('j/m/Y',strtotime($prod->created_at)) }}
            </p> </i>
            <form method="POST" action="{{route('produits.destroy',$prod->id)}}">
              @csrf
              @method('DELETE')
              <button type="submit" class="text-danger" onclick="return confirm ('Confirmer la suppression')" style="outline: none; border:none; background-color:#fff;float:right;margin-top:-20px"><i class="fas fa-2x fa-trash-alt" style="font-size: 25px"></i></button>
           </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
 

@endsection
@extends('dashbords.layouts.homeAd')
@section('titre','Fournisseur')

@section('content')
<div class="container">

<form action="{{route('fournisseurs.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  
    <div class="container mt-5">
        <div class="card shadow mb-4">
          <div class="card-body">

            @if (session()->has('valide'))
          <div class="alert alert-success" role="alert">
            {{session()->get('valide')}}
          </div>
          @endif
          
          @if (session()->has('message'))
          <div class="alert alert-success" role="alert">
            {{session()->get('message')}}
          </div>
          @endif

        @php
          $count=0;
          foreach ($fournisseurs as $four) {
            $count++;
          }
        @endphp

        <h3 class="mb-4">Nouveau Fournisseur :</h3> 
      <!-- code fournisseur  -->
        <div class="numr form-row mb-1">
           <label style="font-size: 20px;">N° : <span>{{++$count}}</span></label>
        </div>

    <!-- nom  fournisseur  -->
    <div class="form-row mb-0">

     <!-- siren  fournisseur-->
        <div class="col">
            <i class="far fa-building"></i> &nbsp;<label >SIREN : </label>
            <input type="text" class="form-control" name="SIRENFr" required placeholder="SIREN">
        </div>

        <div class="col">
            <i class="far fa-address-card"></i> &nbsp; <label>Fournisseur : </label>
            <input type="text" class="form-control" name="nomFr" required placeholder="Nom fournisseur" >
        </div>
    </div>
    <!-- Tel fournisseur  -->
    <div class="form-row mb-0">
      <!-- secteur  fournisseur-->
        <div class="col">
            <i class="far fa-building"></i> &nbsp;<label >Secteur : </label>
            <input type="text" class="form-control" name="secteurFr"  placeholder="Secteur d'emploi">
        </div>
        <div class="col">
            <i class="fas fa-phone"></i> &nbsp;<label >N° Téléphone : </label>
            <input type="text" class="form-control" name="telFr"  required placeholder="Numéro téléphone">
        </div>
    </div>
    <!-- adresse  fournisseur  -->
    <div class="form-row">
     <!-- email  fournisseur  -->
        <div class="col">
            <i class="fas fa-mail-bulk"></i> &nbsp;<label >Email : </label>
            <input type="email" class="form-control" name="emailFr"  required placeholder="Ex : info@gmail.com">
        </div>
        <div class="col">
            <i class="fas fa-map-marker-alt"></i>&nbsp;<label >Adresse : </label>
            <input type="text" class="form-control" name="adresseFr" required placeholder=" Ex : Appartement 11 N°9 Salé">
        </div>
    </div>
    <button type="submit" class="enr btn btn-success ">Enregister</button>

</form>
</div>
</div>

<hr class="my-5">

<div class="container mt-5">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="myTable" width="100%" cellspacing="0" style="border-bottom-color:transparent;">
            <thead>
              <tr>
                <th>N°</th>
                <th>SIREN</th>
                <th>Fournisseur</th>
                <th>Secteur</th>
                <th>Telephone</th>
                <th>Adresse</th>
                <th>Email</th>
                <th style="width: 110px;">Action</th>
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
                <td>
                    <a class="edit text-info " data-toggle="modal" data-target="#staticBackdrop"> <i class="fas fa-2x fa-edit"></i> </a>
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">Modifier info de fournisseur</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('fournisseurs.update',$four->id)}}" method="POST">
                                      @csrf
                                      @method('PUT')
                                        <div class="form-row mb-0">
                                          <!-- siren  fournisseur-->
                                            <div class="col">
                                                <i class="far fa-building"></i> &nbsp;<label >SIREN : </label>
                                                <input type="text" readonly class="form-control" id="siren" name="siren_up"  placeholder="SIREN">
                                            </div>
                                           <!-- nom  fournisseur  -->
                                            <div class="col">
                                                <i class="far fa-address-card"></i> &nbsp; <label>Fournisseur : </label>
                                                <input type="text" id="nom" class="form-control" name="nom_up" >
                                            </div>
                                        
                                        </div>
                                        
                                        <div class="form-row mb-0">
                                        <!-- secteur  fournisseur-->
                                            <div class="col">
                                                <i class="far fa-building"></i> &nbsp;<label >Secteur : </label>
                                                <input type="text" id="secteur" class="form-control" name="secteur_up">
                                            </div>
                                        <!-- Tel fournisseur  -->
                                            <div class="col">
                                                <i class="fas fa-phone"></i> &nbsp;<label >N° Téléphone : </label>
                                                <input type="text" id="telep" class="form-control" name="tel_up" >
                                            </div>
                                       
                                        </div>
                                        
                                        <div class="form-row">
                                             <!-- email  fournisseur  -->
                                            <div class="col">
                                                <i class="fas fa-mail-bulk"></i> &nbsp;<label >Email : </label>
                                                <input type="text" id="emaile" class="form-control" name="email_up">
                                            </div>
                                          <!-- adresse  fournisseur  -->
                                            <div class="col">
                                                <i class="fas fa-map-marker-alt"></i>&nbsp;<label >Adresse : </label>
                                                <input type="text" id="adresse" class="form-control" name="adresse_up">
                                            </div>
                                        </div>
                                </div>
                              
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                  <button type="submit" class="enr btn btn-primary">Modifier</button>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>


                <form method="POST" action="{{route('fournisseurs.destroy',$four->id)}}" style="display: inline-block">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="text-danger" onclick="return confirm ('Confirmer la suppression')" style="outline: none; border:none; background-color: #fff;"><i class="fas fa-2x fa-trash-alt"></i></button>
                </form>
                    
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

    <!-- Script -->
    @section('script')
        <script >
          //Edit modal
            $(document).on('click','.edit' , function(){
            var _this=$(this).parents('tr');
            $('#code').val(_this.find('.f_id').text());
            $('#siren').val(_this.find('.f_siren').text());
            $('#nom').val(_this.find('.f_nom').text());
            $('#secteur').val(_this.find('.f_secteur').text());
            $('#telep').val(_this.find('.f_tel').text());
            $('#emaile').val(_this.find('.f_email').text());
            $('#adresse').val(_this.find('.f_adr').text());
            }); 
             
            $(document).ready( function () {
                $('#myTable').DataTable();
            });

            
        </script>
    @endsection
@endsection

@extends('dashbords.layouts.homeAd')
@section('titre','Client')

@section('content')
<div class="container">
   
    <form action="{{route('clients.store')}}" method="POST" enctype="multipart/form-data">
       @csrf
       <div class="container mt-5">
            <div class="card shadow mb-4">
                <div class="card-body">

                @if (session()->has('status'))
                    <div class="alert alert-success" role="alert">
                    {{session()->get('status')}}
                    </div>
                @endif

                @php
                    $count=0;
                    foreach ($cls as $itemes){$count++;}
                @endphp
           <h3 class="mb-5">Nouveau Client :</h3>



        <!-- code client  -->
        <div class="numr form-row mb-1">
            <label style="font-size: 20px;">N° : <span>{{++$count}}</span></label>
        </div>



    <div class="form-row mb-0">

        <!-- SIREN/CIN client-->
           <div class="col">
               <i class="far fa-building"></i> &nbsp;<label >SIREN/CIN : </label>
               <input type="text" class="form-control" name="SIREN_Cl" placeholder="SIREN/CIN Client" required>
           </div>
        <!-- nom client-->
           <div class="col">
               <i class="far fa-address-card"></i> &nbsp; <label>Client : </label>
               <input type="text" class="form-control" name="Nom_Cl" placeholder="Nom Client" required>
           </div>
    </div>

    <div class="form-row mb-0">

        <!-- Tel client  -->
            <div class="col">
                <i class="fas fa-phone-square-alt"></i> &nbsp;<label >N° téléphone : </label>
                <input type="tel" class="form-control" name="Tel_Cl" placeholder="Numéro téléphone" required>
            </div>
        <!-- email  client  -->
            <div class="col">
                <i class="fas fa-envelope-open-text"></i>&nbsp; <label >Email : </label>
                <input type="email" class="form-control" name="Email_Cl" placeholder="Ex : email@domaine.com" required>
            </div>
    </div>

    <div class="form-row">

        <!-- adresse  client  -->
            <div class="col">
                <i class="fas fa-map-marker-alt"></i>&nbsp;<label >Adresse Client : </label>
                <input type="text" class="form-control" name="Adresse_Cl" style="width: 450px;" placeholder="Ex : Appartement 10 temara rabat" required>
            </div>
    </div>

        <button type="submit" class="enr btn btn-success">Enregistrer</button>
    </div>
    </div>
    </div>
    </form>
</div>

<!-- ------------------------Affichage--------------------------------------- -->
    <hr class="my-5">

    <div class="container mt-5">
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="myTable" width="100%" cellspacing="0" style="border-bottom-color:transparent;">
                <thead>
                  <tr>
                    <th scope="col">N°</th>
                    <th scope="col">SIREN </th>
                    <th scope="col">Nom Client</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Adresse</th>
                    <th style="width: 110px;">Action</th>
                  </tr>
                </thead>
                    @php
                    $i=0;
                    @endphp
                <tbody>
                @foreach ($cls as $item)
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td class="Cl_Siren">{{$item->SIREN_Cl}} </td>
                        <td class="Cl_Nom">{{$item->Nom_Cl}}</td>
                        <td class="Cl_Tel">{{$item->Tel_Cl}}</td>
                        <td class="Cl_Email">{{$item->Email_Cl}}</td>
                        <td class="Cl_Adresse">{{$item->Adresse_Cl}}</td>

                        <td class="text-center">
                            <!-- BTN DELETE-->
                            <form action="{{route('clients.destroy',$item->Code_Cl)}}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-danger" onclick="return confirm ('Confirmer la suppression')" style="outline: none; border:none; background-color: #fff;">
                                    <i class="fas fa-2x fa-trash-alt"></i></button>
                            </form>
                            <!--  BTN UPDATE-->
                            <a class="edit text-info " data-toggle="modal" data-target="#staticBackdrop"> <i class="fas fa-2x fa-edit"></i> </a>
                            <!--  pop UP-->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="staticBackdropLabel">Modifier info de Client</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('clients.update',$item->Code_Cl) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <div class="form-row mb-0">
                                                <!-- SIREN/CIN client-->
                                                   <div class="col">
                                                       <i class="far fa-building"></i> &nbsp;<label >SIREN/CIN : </label>
                                                       <input type="text" readonly class="form-control" id="Siren_Cl" name="SIREN_Cl_up">
                                                   </div>
                                                <!-- nom client-->
                                                   <div class="col">
                                                       <i class="far fa-address-card"></i> &nbsp; <label>Client : </label>
                                                       <input type="text" class="form-control" id="Nom_Cl" name="Nom_Cl_up" >
                                                   </div>
                                            </div>

                                            <div class="form-row mb-0">

                                                <!-- Tel client  -->
                                                    <div class="col">
                                                        <i class="fas fa-phone-square-alt"></i> &nbsp;<label >N° téléphone : </label>
                                                        <input type="tel" class="form-control" id="Tel_Cl" name="Tel_Cl_up" >
                                                    </div>
                                                <!-- email  client  -->
                                                    <div class="col">
                                                        <i class="fas fa-envelope-open-text"></i>&nbsp; <label >Email : </label>
                                                        <input type="email" class="form-control" id="Email_Cl" name="Email_Cl_up" >
                                                    </div>
                                            </div>

                                            <div class="form-row">

                                                <!-- adresse  client  -->
                                                    <div class="col">
                                                        <i class="fas fa-map-marker-alt"></i>&nbsp;<label >Adresse Client : </label>
                                                        <input type="text" class="form-control" id="Adresse_Cl" name="Adresse_Cl_up" style="width: 450px;" >
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
                        </td>
                        
                        </tr>
                    @endforeach
                </tbody>
            </table>

  <!-- Script -->
  @section('script')
  <script>

    $(document).on('click','.edit',function(){

        var _this=$(this).parents('tr');
        $('#Siren_Cl').val(_this.find('.Cl_Siren').text());
        $('#Nom_Cl').val(_this.find('.Cl_Nom').text());
        $('#Tel_Cl').val(_this.find('.Cl_Tel').text());
        $('#Email_Cl').val(_this.find('.Cl_Email').text());
        $('#Adresse_Cl').val(_this.find('.Cl_Adresse').text());
    });

    $(document).ready( function () {
        $('#myTable').DataTable();
    });

</script>
@endsection
@endsection

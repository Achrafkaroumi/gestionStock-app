@extends('dashbords.layouts.homeAg')
@section('titre','Home')


@section('content')
<div class="container">
    <h2 class="mb-4">Information génerale : </h2>
    <div class="row ">
        <div class="card border-primary  m-3" style="width: 18rem; max-height:6rem;">
            <div class="card-body text-primary">
            <h5 class="card-title">Catégories</h5><i class="fas fa-sticky-note"></i>
            <p class="card-text">{{$categories->count()}}</p>
            </div>
        </div>

        <div class="card border-success m-3" style="width: 18rem; max-height:6rem;">
            <div class="card-body text-success">
            <h5 class="card-title">Produits disponible</h5><i class="fas fa-store"></i>
            <p class="card-text">{{$produit_notnull}}</p>
            </div>
        </div>
    
        
    <div class="card border-danger m-3" style="width: 18rem; max-height:6rem;">
        <div class="card-body text-danger">
        <h5 class="card-title">Produits indisponible</h5><i class="fas fa-store-slash"></i>
        <p class="card-text">{{$produit_null}}</p>
        </div>
    </div>


        <div class="card border-warning m-3" style="width: 18rem; max-height:6rem;">
            <div class="card-body text-warning">
            <h5 class="card-title">Clients</h5><i class="fas fa-users"></i>
            <p class="card-text">{{$client->count()}}</p>
            </div>
        </div>


        <div class="card border-dark m-3" style="width: 18rem; max-height:6rem;">
            <div class="card-body text-dark">
            <h5 class="card-title">Fournisseur</h5><i class="fas fa-id-badge"></i>
            <p class="card-text">{{$fournisseurs_total->count()}}</p>
            </div>
        </div>
            
    </div>

    <img src="/img/logo.png" alt="">
</div>
@endsection
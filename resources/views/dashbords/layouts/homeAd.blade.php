<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('titre')</title>
    <link rel="icon" href="/img/logo.png"/>
	  <link rel="stylesheet" href="/css/styleAdmin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="/resrc/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
</head>
<body>

    <div class="wrapper">
        <div class="sidebar">
              <div class="user">
                <i class="fas fa-user-circle" style="margin-left:73px"></i>
                  <div class="user-actif">
                    <i class="fas fa-circle"></i>&nbsp;<span>Admin</span> : <span>{{auth()->user()->name}}</span>
                  </div>
              </div>
            <ul>
                <li><a href="{{route('agent.dashbord')}}"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="{{route('admin.stock')}}"><i class="fas fa-store"></i></i>Stock</a></li>
                <li><a href="{{route('admin.fournisseur')}}"><i class="fas fa-tools"></i>Fournisseur</a></li>
                <li><a href="{{route('admin.clients')}}"><i class="fas fa-users"></i>Client</a></li>
                <li><a href="{{route('admin.commandes')}}"><i class="fas fa-shopping-cart"></i></i>Commandes</a></li>
            </ul> 
        </div>
        
        <div class="main_content">
            <div class="header">
               <button><a href='{{ route('logout') }}'><i class="fas fa-sign-out-alt"></i>&nbsp;Log out</a></button>
            </div> 
            <div class="info">
                <div class="container">
                  @yield('content')
                </div>
             </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

@yield('script')
</body>
</html>
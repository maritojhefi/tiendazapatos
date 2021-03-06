<!DOCTYPE html>
<html lang="es">
<head>
 
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
  

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
  <link href="{{asset('templatemain/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <title>ShopStore</title>
@section('sidebar')
<style>
  #form {
width: 250px;
margin: 0 auto;
height: 50px;
}

#form p {
text-align: center;
}

#form label {
font-size: 30px;
}

input[type="radio"] {
display: none;
}

label {
color: grey;
}

.clasificacion {
direction: rtl;
unicode-bidi: bidi-override;
}

label:hover,
label:hover ~ label {
color: orange;
}

input[type="radio"]:checked ~ label {
color: orange;
}
</style>

<body>



<body background="../imagenes/fon.jpg">


<nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="/anonimo">E.R.M. Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @guest
      <li class="nav-item active">
        <a class="nav-link" href="/login">Iniciar <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/register">Registrarse</a>
      </li>
      @endguest
      <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
>
    Categorias
  </button>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    @foreach ($categorias as $item)
            
        <a href="{{route('indexPersonalizado',$item->id)}}" class="list-group-item">{{$item->nombre}}</a>
            @endforeach

  </div>
</div>
@auth
<li class="nav-item dropdown ml-auto">
  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Bienvenid@! {{auth()->user()->name}}
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="{{ route('logout') }}"
       onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
Cerrar sesion
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>
</li>
<li class="nav-item">
<a class="nav-link" href="{{route('producto.index')}}">Ir al Panel</a>
</li>
@endauth
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Acerca De...</a>
      </li>
    </ul>

    <a href="/Compras" class="d-block text-light p-3"><i class="icon ion-ios-cart"></i>       <span class="badge badge-light"> 4 </span></a>
    <ion-icon name="cart-outline"></ion-icon>







    <form action="{{route('producto.index2')}}" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>












</body>
<script src="{{asset("js/app.js")}}"></script>
<script src="{{asset("templatemain/vendor/bootstrap/js/bootstrap.min.js")}}"></script>

<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

</html>
@show
  
  @yield('content')

@extends('dashboard.master')   
@section('content')




  

<div class="table-responsive">
  <div class="card ">
  <div class="card-header card-header-warning">
    <h4 class="card-title">
      Tienes el rol de {{auth()->user()->rol->nombre}}

    </h4>
    <div class="card-category">
      Listado de los productos</div>
  </div>
  <div class="ml-1 form-inline ">
    
    <a class="btn btn-success btn-sm mt-1 mb-3 ml-3  btn-round" href="{{route('producto.create')}}"><i class="fa fa-plus"></i> Registrar</a>

   
    
    <div class="btn-sm mt-3 mb-3 ml-3">{{$productos->appends(['search'=>request('search')])->links()}}</div>
    <form action="{{route('producto.index')}}" method="" class="form-inline">
      <label for="" class="nav-link">Buscar por categoria</label>
      <div class="form-group dropdown mr-2">
       
  <select name="categorysearch" class="form-control selectpicker" id="categorysearch"  data-live-search="true" >
    <option selected class="dropdown-item text-white"  value="">Seleccione</option>
    @foreach ($listCategorias  as $nombre=>$id)
    <option class="dropdown-item" aria-labelledby="dropdownMenuButton" value="{{$id}}">{{$nombre}}</option>
    
        @endforeach
  
   

  </select>
    </div>
    <input type="text" class="form-control" name="search" placeholder="Buscar por Nombre" value="{{request('search')}}">
      <button type="submit" class="ml-2 btn btn-success btn-round btn-sm" >Buscar</button>
      </form>
  </div>

  <div class="card-body table-responsive">
    <table class="table table-shopping">
      <thead>
        <td style="color:#FF7126 ">
          PRODUCTO
      </td>
      
      
      <td>
        COMPRADOR
    </td>
    <td>
      ESTADO
  </td>
   
  <td>
    TOTAL
</td>

    
 
  
  


  </tr>
      </thead>
      <tbody>
     
        <tr>
          @foreach ($ventas as $venta)
          <tr>
             
              <td>
                 

                  {{ $productos->find($venta->product_id)->nombre }}
              </td>
             
              
              <td>
                {{ $comprador->find($venta->comprador_id)->name }}
            </td>
            <td>
          
              <a href="" data-id="{{$venta->id}}" data="{{$venta->comprador_id}}" class="approved btn btn-{{$venta->estado=='pendiente'? "warning": "success"}} btn-sm  btn-round" data-toggle="modal" data-target="#confirmarestado">{{$venta->estado}}</a>
             
              
          </td>
          <td>
          
            {{$venta->total}}
           
            
        </td>
          
        
         <div class="modal fade" id="confirmasrestado-{{$venta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Porque fue rechazado?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('comentrechazado')}}" method="post">
                  @csrf
                <textarea name="comentario" id="" class="form-control"></textarea>
                <input type="hidden" value="{{$venta->id}}" name="id">
              </div>
              <div class="modal-footer">
                
              <button  type="submit" class=" btn btn-success" >Enviar Comentario</button>
            </form>
              </div>
            </div>
          </div>
        </div>
        
    
   

              
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>

<script>



  document.querySelectorAll(".approved").
forEach(link=>link.addEventListener("click", function(){

var id=link.getAttribute("data-id");
var user=link.getAttribute("data");
$.ajax({
  method: "POST",
  url: "{{URL::to("/")}}/dashboard/venta/cambiarestado/"+id,
  data:{'_token': '{{csrf_token()}}','id':id,'user':user}
})
  .done(function( approved ) {
   if(approved=="entregado"){
     $(link).removeClass('btn-success');
     $(link).addClass('btn-warning');
     $( link).text("pendiente")
   }
   else if(approved=="pendiente"){
     $(link).removeClass('btn-warning');
     $(link).addClass('btn-success');
     $( link).text("entregado")
   
   }
 
  });
}))



    

  </script>
@endsection
@extends('menu')

@section('contenido')
<div class="container">
<center><h3> Reporte de Usuarios </h3></center>
</br>
@if(Session::has('mensaje'))
 <div cclass='text-danger'> {{Session::get('mensaje')}}</div>
@endif
@if ($sessionrol<>"3")
<a href="{{route('nuevo')}}">
<button type="button" class="btn btn-success"> Agregar Nuevo Usuario </button></a>
</br>
@endif 
</br>
    <table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Rol</th>
      <th scope="col">Activo</th>
      <th scope="col">Operaciones</th>
    </tr>
  </thead>
  <tbody>

  @foreach($consulta as $c)

    <tr>
      <th scope="row">{{$c->nombre}}</th>
      <td>{{$c->apellido}}</td>
      <td>{{$c->roles}}</td>
      <td>{{$c->activo}}</td>
      <td>

      @if ($sessionrol<>"3")
      <a href="{{route('modifica',['idu'=>$c->idu])}}">
     <button type="button" class="btn btn-info">Modificar</button> </a>
     @endif 

     @if ($sessionrol=="1")
     <a href="{{route('elimina',['idu'=>$c->idu])}}">
     <button type="button" class="btn btn-danger">Eliminar</button> </a>
        </td> 
       @endif 
    </tr>
   @endforeach
  </tbody>
</table>
</div>

@stop
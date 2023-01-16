@extends('menu')

@section('contenido')


<form  action="{{route('guardacambios')}}" method = "POST">
    {{csrf_field()}}
  <fieldset>
    <legend>Modifica Usuario</legend>

    @if(Session::has('mensaje'))
 <div class='text-danger'> {{Session::get('mensaje')}}</div>
@endif 

       <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Nombre </label>
      <input type="text" style="width: 300px" value="{{$consulta->nombre}}" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp" placeholder="Nombre">
  </div>
  <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Apellido </label>
      <input type="text" class="form-control" value="{{$consulta->apellido}}" style="width: 300px" name="apellido" id="apellido" aria-describedby="emailHelp" placeholder="Apellido">
  </div>
  <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Usuario (email) </label>
      <input type="email" class="form-control" value="{{$consulta->user}}" style="width: 300px" name="usuario" id="usuario" aria-describedby="emailHelp" placeholder="Nombre Usuario">
  </div>
  <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Password </label>
      <input type="text" class="form-control" value="{{$consulta->pasw}}" style="width: 300px" name="passw" id="passw" aria-describedby="emailHelp" placeholder="Password">
  </div>
     
    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Rol</label>
      <select class="form-select" style="width: 300px" name="idRoles" id="idRoles">
        <option value="{{$consulta->idRoles}}">{{$consulta->roles}} </option>
        @foreach ($roles as $rol)
        <option value="{{$rol->idRoles}}">{{$rol->nombre}}</option> 
        @endforeach
          
    </select>
    </div>


    <label for="exampleInputEmail1" class="form-label mt-4"> Estado </label>

    @if($consulta->activo=='Si')
      <div class="form-check">
        <input class="form-check-input" type="radio" name="estado" id="estado" value="Si" checked="">
        <label class="form-check-label" for="optionsRadios1">
          Activo
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="estado" id="estado" value="No">
        <label class="form-check-label" for="optionsRadios2">
          Desactivado
        </label>
      </div>
      @else 
      <div class="form-check">
        <input class="form-check-input" type="radio" name="estado" id="estado" value="Si" >
        <label class="form-check-label" for="optionsRadios1">
          Activo
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="estado" id="estado" value="No" checked="">
        <label class="form-check-label" for="optionsRadios2">
          Desactivado
        </label>
      </div>
  @endif
    </br>
  </fieldset>
  <input type="hidden" name="idu" value="{{$consulta->idu}}">
    <button type="submit" class="btn btn-primary">Modificar</button>
  </fieldset>
</form>

@stop
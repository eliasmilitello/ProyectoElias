@extends('menu')

@section('contenido')


<form  action="{{route('guardar')}}" method = "POST">
    {{csrf_field()}}
  <fieldset>
  <center> <h3>Nuevo de Usuario</h3></center>

    @if(Session::has('mensaje'))
 <div class='text-danger'> {{Session::get('mensaje')}}</div>
@endif 

       <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Nombre </label>
      @if($errors->first('nombre'))
        <p class='text-danger' >{{$errors->first('nombre')}}</p>
        @endif
      <input type="text" style="width: 300px" class="form-control" name="nombre" id="nombre" aria-describedby="emailHelp" placeholder="Nombre">
  </div>
  <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Apellido </label>
      <input type="text" class="form-control" style="width: 300px" name="apellido" id="apellido" aria-describedby="emailHelp" placeholder="Apellido">
  </div>
  <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Usuario (email) </label>
      @if($errors->first('usuario'))
        <p class='text-danger' class='text-danger'>{{$errors->first('usuario')}}</p>
        @endif
      <input type="email" class="form-control" style="width: 300px" name="usuario" id="usuario" aria-describedby="emailHelp" placeholder="Nombre Usuario">
  </div>
  <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Password </label>
      @if($errors->first('pasw'))
        <p class='text-danger'>{{$errors->first('pasw')}}</p>
        @endif
      <input type="text" class="form-control" style="width: 300px" name="pasw" id="pasw" aria-describedby="emailHelp" placeholder="Password">
  </div>
     
    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Rol</label>
      <select class="form-select" style="width: 300px" name="idRoles" id="idRoles">
        <option selected>Seleccione un rol</option>
        @foreach ($roles as $rol)
        <option value="{{$rol->idRoles}}">{{$rol->nombre}}</option> 
        @endforeach
    
    </select>
    </div>


    <label for="exampleInputEmail1" class="form-label mt-4"> Estado </label>
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

    </br>
  </fieldset>
    <button type="submit" class="btn btn-primary">Cargar</button>
  </fieldset>
</form>

@stop
<html>
<head>
 <link href="https://bootswatch.com/5/darkly/bootstrap.min.css" rel="stylesheet">
</head>
<body>
</br>
</br>
<div id= "contenido">

<center> <h3 aling="center">Inicio de Sesion</h3></center>

</br>

<form action="{{route('valida')}}" method = "POST">
    {{csrf_field()}}
    <div class="well">

     <div class="form-group">
     <center><label for="dni">Usuario:
      @if($errors->first('user'))
        <p class='text-danger'>{{$errors->first('user')}}</p>
        @endif
      </label>
  <input type="text" style="width: 200px" class="form-control" name="user"  id="user" aria-describedby="emailHelp" placeholder="Ingrese Usuario">  </center> 
    </div>
    </br>
    <div class="form-group">
    <center> <label for="dni">Password:
        @if($errors->first('pasw'))
        <p class='text-danger'>{{$errors->first('pasw')}}</p>
        @endif
      </label>
      <input  type="password" style="width: 200px" class="form-control" name="pasw" id="pasw" placeholder="Password"></center>
    </div>
    </br>
  </fieldset>
  <center><button type="submit" class="btn btn-primary">Iniciar</button></center>
    
    </div>  
</form>
      </br>

@if(Session::has('mensaje'))
 <div class='text-danger'> {{Session::get('mensaje')}}</div>
@endif

</div>
</body>
</html>
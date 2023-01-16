@extends('menu')

@section('contenido')
<div class="container">
<h3> Reporte de Roles </h3>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">Rol</th>
      <th scope="col">Descripcion</th>
    </tr>
  </thead>
  <tbody>
   <tr>
      <td>admin</td>
      <td>El usuario con rol "admin" posee acceso completo al sistema. En otras palabras, puede ingresar al mismo crear usuarios, modificarlos y eliminarlos.</td>
</tr>
<tr>
<td>user</td>
      <td>El usuario con rol "user" posee un acceso restringuido. Es decir, puede ingresar al sistema, crear usuarios, modificarlos pero no puede eliminarlos.</td>
 
</tr> 
<td>operador</td>
      <td>El usuario con rol "operador" posee un acceso aun mas restringuido. En este caso, puede ingresar al sistema pero solo para ver la informacion, sin poder modificar,cargar o eliminar usuarios.</td>
 
</tr> 
    </tbody>
</table>


</div>
@stop
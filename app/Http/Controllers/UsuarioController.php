<?php

namespace App\Http\Controllers;

use Illuminate\Support\facades\Hash;
use Illuminate\Http\Request;
use App\Models\usuarios;
use App\Models\roles;
use Session;


class UsuarioController extends Controller
{

    public function salir() {
        Session::forget('sessionusuario');
        Session::forget('sessionidu');
        Session::flush();
        Session::flash('mensaje',"Session cerrada Correctamente");
            return redirect()->route('login');
        
    }

    public function menu(){
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
            return view('menu'); 
        } else{
            Session::flash('mensaje',"Inicie Sesion para continuar");
            return redirect()->route('login');
        }

        
    }
    public function login(){
        return view('login');
    } 

    public function valida(Request $request)
    {
        $this->validate($request,[
            'user' => 'required',
            'pasw' => 'required',
        ]);
    
    $consulta = usuarios::where('user',$request->user)
      
        -> where('activo','Si')
        -> get();
        $cuantos = count($consulta);
        if($cuantos==1 and $consulta[0]->pasw =="$request->pasw" ) {
        
            Session::put('sessionusuario',$consulta[0]->nombre . ' ' .$consulta[0]->apellido);
            Session::put('sessionrol',$consulta[0]->idRoles);
            Session::put('sessionidu',$consulta[0]->idu);
        
            return redirect()->route('menu');
        } else {
            Session::flash('mensaje',"El usuario o password no son correctos");
            return redirect()->route('login');
        }

    }


    public function reporte(){
         $sessionusuario = session('sessionusuario');
         $sessionrol = session('sessionrol');
  
            if($sessionusuario<>"" and $sessionrol <>""  ){
        
             $consulta = usuarios::join('roles','usuarios.idRoles','=','roles.idRoles')
             ->select ('usuarios.idu','usuarios.nombre','usuarios.activo', 'usuarios.apellido','roles.nombre as roles')
             ->orderBy('usuarios.nombre')
             ->get();
             return view('reporte')
             ->with('consulta',$consulta)
             ->with ('sessionrol',$sessionrol);
        }else {
              Session::flash('mensaje',"Inicie Sesion para continuar");
              return redirect()->route('login');
                            } 
      }   


     public function nuevo()
      {
        $sessionusuario = session('sessionusuario');
  
        if($sessionusuario<>""  ){
      $roles=roles::all();

          return view ('nuevo')
          ->with('roles',$roles);

      }else {
        Session::flash('mensaje',"Inicie Sesion para continuar");
        return redirect()->route('login');
                      } 
      }


      public function guardar(Request $request){
        $sessionusuario = session('sessionusuario');
        if($sessionusuario<>"")
        {
            $this->validate($request,[
            'nombre'=> 'required',
            'pasw'=> 'required',
            'usuario'=> 'required|email',
            'idRoles'=> 'required',
            ]);
         $usuarios = new usuarios;
         $usuarios->nombre =$request->nombre;
         $usuarios->apellido =$request->apellido;
         $usuarios->user =$request->usuario;
         $usuarios->pasw =$request->pasw;
         $usuarios->idRoles =$request->idRoles;
         $usuarios->activo =$request->estado;
         $usuarios->save();

         Session::flash('mensaje',"El usuario de Guardo Correctamente");
         return redirect()->route('nuevo');
        } else{
            Session::flash('mensaje',"Inicie Sesion para continuar");
            return redirect()->route('login');
        }

        }
        public function elimina($idu)
           {
        $sessionusuario = session('sessionusuario');
  
        if($sessionusuario<>""  ){
            $usuarios = usuarios::find($idu);
            $usuarios->delete();
            Session::flash('mensaje',"El empleado a sido Eliminado");
            return redirect()->route('reporte');

      }else {
        Session::flash('mensaje',"Inicie Sesion para continuar");
        return redirect()->route('login');
                      } 
      }


      public function modifica($idu)
         {
        $sessionusuario = session('sessionusuario');
  
        if($sessionusuario<>""  ){
            $consulta = usuarios::join('roles','usuarios.idRoles','=','roles.idRoles')
            ->select ('usuarios.idu','usuarios.nombre','usuarios.apellido','usuarios.user','usuarios.pasw','usuarios.activo','usuarios.idRoles','roles.nombre as roles')
            ->where('idu',$idu)
            ->get();
            $roles = roles::all();            
            return  view ('modifica')
            ->with('consulta',$consulta[0])
            ->with('roles',$roles);

      }else {
        Session::flash('mensaje',"Inicie Sesion para continuar");
        return redirect()->route('login');
                      } 
      }

      public function guardacambios(Request $request)
      {
        $sessionusuario = session('sessionusuario');
  
        if($sessionusuario<>""){
            
           $this->validate($request,[
            'nombre'=> 'required',
            'pasw'=> 'required',
            'usuario'=> 'required|email',
            'idRoles'=> 'required',
        
            ]);
         $usuarios = usuarios::find($request->idu);
         $usuarios->nombre =$request->nombre;
         $usuarios->apellido =$request->apellido;
         $usuarios->user =$request->usuario;
         $usuarios->pasw =$request->passw;
         $usuarios->idRoles =$request->idRoles;
         $usuarios->activo =$request->estado;
         $usuarios->idu =$request->idu;
         $usuarios->save();

         Session::flash('mensaje',"El usuario de Modificado Correctamente");
         return redirect()->route('reporte');

      }else {
        Session::flash('mensaje',"Inicie Sesion para continuar");
        return redirect()->route('login');
                      } 
      }

      public function roles()
      {
        $sessionusuario = session('sessionusuario');
  
        if($sessionusuario<>""  ){
   

          return view ('roles');
       

      }else {
        Session::flash('mensaje',"Inicie Sesion para continuar");
        return redirect()->route('login');
                      } 
      }



}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Rules\MatchOldPassword;

class UsuariosController extends Controller
{
  public function perfilUpdate(Request $req)
  {
$reglas = [
          'name' => 'required|string|max:255',
          // 'password' => 'required|string|min:6|confirmed',
          'surname' => 'required|string|max:255',
          // 'mes' => 'required|string|max:255',
          // 'ano' => 'required|string|max:255',
          // 'dia' => 'required|string|max:255',
          // 'sex' => 'required|string|max:255',
          // 'info' => 'required|int|max:1',
          // 'file' => 'required|image',
          'calle' => 'required|string|max:45',
          'calleNum' => 'required|string|max:45',
          'piso' => 'string|max:45',
          'country' => 'required|string|max:45',
          'province' => 'required|string|max:45',
          'ciudad' => 'required|string|max:45',
          'codigoPostal' => 'required|string|max:45',

      ];

      $mensajes = [
        "required" => "El campo :attribute es obligatorio",
        // "email" => "El campo :attribute tiene un formato incorrecto",
        "string" => "El campo :attribute debe ser un texto",
        "numeric" => "El :attribute debe ser numérico (sin guiones ni espacios)",
        // "min" => "La :attribute debe tener un mínimo de :min caracteres",
        // "mimes" => "La imagen debe ser .jpg o png",
        // "same" => "Las contraseñas no coinciden"
      ];

      $this->validate($req, $reglas, $mensajes);
          $user = Auth::user();
          $user->name = $req["name"];
          $user->surname = $req["surname"];
          $user->calle = $req["calle"];
          $user->calleNum = $req["calleNum"];
          $user->piso = $req["piso"];
          $user->pais = $req["country"];
          $user->provincia_fk = $req["province"];
          $user->ciudad = $req["ciudad"];
          $user->codigoPostal = $req["codigoPostal"];
          $user->save();
          return redirect ("/perfil");
        }

        public function direccionUpdate(Request $req)
        {
        $reglas = [
                // 'name' => 'required|string|max:255',
                // 'password' => 'required|string|min:6|confirmed',
                // 'surname' => 'required|string|max:255',
                // 'mes' => 'required|string|max:255',
                // 'ano' => 'required|string|max:255',
                // 'dia' => 'required|string|max:255',
                // 'sex' => 'required|string|max:255',
                // 'info' => 'required|int|max:1',
                // 'file' => 'required|image',
                'calle' => 'required|string|max:45',
                'calleNum' => 'required|string|max:45',
                'piso' => 'string|max:45',
                'country' => 'required|string|max:45',
                'province' => 'required|string|max:45',
                'ciudad' => 'required|string|max:45',
                'codigoPostal' => 'required|string|max:45',

            ];

            $mensajes = [
              "required" => "El campo :attribute es obligatorio",
              // "email" => "El campo :attribute tiene un formato incorrecto",
              "string" => "El campo :attribute debe ser un texto",
              "numeric" => "El :attribute debe ser numérico (sin guiones ni espacios)",
              // "min" => "La :attribute debe tener un mínimo de :min caracteres",
              // "mimes" => "La imagen debe ser .jpg o png",
              // "same" => "Las contraseñas no coinciden"
            ];

            $this->validate($req, $reglas, $mensajes);
                $user = Auth::user();
                // $user->name = $req["name"];
                // $user->surname = $req["surname"];
                $user->calle = $req["calle"];
                $user->calleNum = $req["calleNum"];
                $user->piso = $req["piso"];
                $user->pais = $req["country"];
                $user->provincia_fk = $req["province"];
                $user->ciudad = $req["ciudad"];
                $user->codigoPostal = $req["codigoPostal"];
                $user->save();
                return redirect ("/carrito");
              }


        // public function passUpdate(Request $req){
        //     $usuario = Auth::user();
        //     $reglas = [
        //       "old-pass" => 'required',
        //       "password" => "min:6|required|same:repeat-pass",
        //     ];
        //     $mensajes = [
        //       "required" => "El campo :attribute es obligatorio",
        //       "min" => "La :attribute debe tener un mínimo de :min caracteres",
        //       "same" => "Las contraseñas no coinciden"
        //     ];
        //
        //     $this->validate($req, $reglas, $mensajes);
        //     if (Hash::check($req->password, $usuario->password)) {
        //        $user->fill([
        //         'password' => Hash::make($req["password"])
        //         ])->save();
        //     return redirect ("/perfil");
        //     } else {
        //         $req->session()->flash('error', 'Password does not match');
        //         return redirect('/perfil');
        //     }
        // }
}

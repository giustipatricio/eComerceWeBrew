<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\prods;
use App\brand;
use App\style;
use App\origin;
use App\cat;
use App\carrito;
use App\User;


class carritoController extends Controller
{

public function carrito() {
        return view('carrito');
    }

   public function agregarProducto(Request $req, $productId) {
       $userId = Auth::user()->id;
       $productInCart = carrito::where('prod_id_fk', $productId)
           ->where('user_id_fk', $userId)
           ->first();
           // dd($productInCart);
       if ($productInCart) {
           $productInCart->cant = $productInCart->cant + $req->cant;
       } else {
           $productInCart = new carrito();
           $productInCart->prod_id_fk = $productId;
           $productInCart->cant = $req->cant;
           $productInCart->user_id_fk = $userId;
       }

       $productInCart->save();
       return redirect()->route('cart');
   }

   public function borrarProducto(Request $req,$productId) {
       $userId = Auth::user()->id;
       carrito::where('prod_id_fk', $productId)
           ->where('user_id_fk', $userId)
           ->delete();

       return redirect()->route('cart');
   }


}

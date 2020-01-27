<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','surname','born_date','sex','avatar','info','info','is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


  public function userProvincia(){
    return $this->belongsTo("App\provincia","provincia_fk");
    }

      public function productsInCart() {
          return $this->hasMany('App\carrito', 'user_id_fk');
      }

      public function cartTotal() {
          $total = $this->productsInCart->reduce(function ($acum, $productInCart) {
              return $acum + ($productInCart->products->price * $productInCart->cant);
          });

          return $total;
      }

      public function orders() {
          return $this->hasMany('App\orden', "user_id_ordfk");
      }





    }

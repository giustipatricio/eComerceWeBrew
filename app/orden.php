<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orden extends Model
{
  public $table = "orden";
  public $primaryKey = "orden_id";

  // public function userOrden(){
  // return $this->belongsTo("App\User", "user_id_ordfk");}
  public function productsInOrder() {
  return $this->hasMany('App\ordenProducto', 'orden_id');
}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class carrito extends Model
{
  public $table = "carrito";
  public $primaryKey = ['prod_id_fk','user_id_fk'];
  public $timestamps = false;
  public $incrementing = false;

  public function products(){
  return $this->belongsTo("App\prods", "prod_id_fk");}
  public function user(){
  return $this->belongsTo("App\User", "user_id_fk");}

  protected function setKeysForSaveQuery(Builder $query) {
      return $query->where('user_id_fk', $this->getAttribute('user_id_fk'))
          ->where('prod_id_fk', $this->getAttribute('prod_id_fk'));
  }

}

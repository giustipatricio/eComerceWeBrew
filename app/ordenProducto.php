<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ordenProducto extends Model
{
  public $table = "ordenproducto";
  public $primaryKey = ["orden_id", "prod_id"];
  public $incrementing = false;
  public $timestamps = false;


  public function products(){
  return $this->belongsTo("App\prods", "prod_id");}

  public function orden() {
     return $this->belongsTo('App\orden',"orden_id");
   }

  protected function setKeysForSaveQuery (Builder $query){
    return $query->where('orden_id' , $this->getAttribute('orden_id'))
    -> where('prod_id', $this->getAttribute('prod_id'));

  }

}

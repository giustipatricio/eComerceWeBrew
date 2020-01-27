<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class origin extends Model
{
  public $table = "origin";
  public $primaryKey = "country_id";
  public $timestamps = false;
  public $guarded = [];
  public function prods(){
  return $this->hasMany("App\prods", "fk_origin");}
}

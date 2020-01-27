<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cat extends Model
{
  public $table = "cat";
  public $primaryKey = "cat_id";
  public $timestamps = false;
  public $guarded = [];
  public function prods(){
  return $this->hasMany("App\prods", "fk_cat");
  }
}

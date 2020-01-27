<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class style extends Model
{
  public $table = 'style';
  public $primaryKey = 'style_id';
  public $timestamps = false;
  public $guarded = [];

  public function prods(){
    return $this->hasMany("App\prods", "fk_style");
  }
}

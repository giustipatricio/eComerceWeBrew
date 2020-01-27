<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class segment extends Model
{
  public $table = "segment";
  public $primaryKey = "segment_id";
  public $timestamps = false;
  public $guarded = [];
  public function prods(){
  return $this->hasMany("App\prods", "segment");
  }
}

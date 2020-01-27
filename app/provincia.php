<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class provincia extends Model
{
    public $table = "provincia";
    public $primaryKey= "provincia_id";
    public $timestamps = false;
    public $guarded = [];

    public function provinciaUser(){
      return $this->hasMany("App\Users", "provincia_fk");
    }

}

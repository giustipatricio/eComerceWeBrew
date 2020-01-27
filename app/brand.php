<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    public $table = "brand";
    public $primaryKey = "brand_id";
    public $timestamps = false;
    public $guarded = [];

    public function prods(){
    return $this->hasMany("App\prods", "fk_brand");
    }


}

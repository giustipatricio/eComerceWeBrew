<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class prods extends Model
{
  public $table = "prods";
  public $foreignKey = "prod_id";
  public $timestamps = false;
  public $guarded = [];
  protected $fillable = ['prods_name','fk_cat','fk_brand','fk_style','fk_segment','stock','ibu','alc','capacity_cm3','fk_origin','detail','picture','ishigh','price'];

  public function brand(){
    return $this->belongsTo("App\brand", "fk_brand");
  }
  public function cat(){
    return $this->belongsTo("App\cat","fk_cat");
  }
  public function origin(){
    return $this->belongsTo("App\origin","fk_origin");
    }
    public function segment(){
      return $this->belongsTo("App\segment","fk_segment");
    }
    public function style(){
      return $this->belongsTo("App\style","fk_style");
    }


}

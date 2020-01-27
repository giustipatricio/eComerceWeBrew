<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\prods;
use App\brand;
use App\style;
use App\origin;
use App\cat;
use App\carrito;
use App\User;



class productosController extends Controller
{
  public function listadoPorronesAll() {
    $productos = prods::where("fk_cat",1)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    // dd($origins);
    $vac = compact("productos","styles","brands","origins");
    return view("/porrones/porrones", $vac);
  }

  public function listadoPorronesMarcas($brand_id) {
    $productos = prods::where("fk_cat",1)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $brand = prods::where("fk_cat",1)->where("fk_brand",$brand_id)->get();
    $vac = compact("productos","styles","brands","origins","brand");
    // dd($brand);
    return view("/porrones/porronesbrand", $vac);
  }

  public function listadoPorronesStyle($style_id) {
    $productos = prods::where("fk_cat",1)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $style = prods::where("fk_cat",1)->where("fk_style",$style_id)->get();
    $vac = compact("productos","styles","brands","origins","style");
    // dd($brand);
    return view("/porrones/porronesstyle", $vac);
  }

  public function listadoPorronesCountry($country_id) {
    $productos = prods::where("fk_cat",1)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $origin = prods::where("fk_cat",1)->where("fk_origin",$country_id)->get();
    $vac = compact("productos","styles","brands","origins","origin");
    // dd($brand);
    return view("/porrones/porronescountry", $vac);
  }

  public function listadoPorronesRecomend() {
    $productos = prods::where("fk_cat",1)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $ishigh = prods::where("fk_cat",1)->where("ishigh",1)->get();
    $vac = compact("productos","styles","brands","origins","ishigh");
    // dd($brand);
    return view("/porrones/porronesrecomendados", $vac);
  }


  public function listadoLatasAll() {
    $productos = prods::where("fk_cat",2)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    // dd($origins);
    $vac = compact("productos","styles","brands","origins");
    return view("/latas/latas", $vac);
  }

  public function listadoLatasMarcas($brand_id) {
    $productos = prods::where("fk_cat",2)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $brand = prods::where("fk_cat",2)->where("fk_brand",$brand_id)->get();
    $vac = compact("productos","styles","brands","origins","brand");
    // dd($brand);
    return view("/latas/latasbrand", $vac);
  }

  public function listadoLatasStyle($style_id) {
    $productos = prods::where("fk_cat",2)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $style = prods::where("fk_cat",2)->where("fk_style",$style_id)->get();
    $vac = compact("productos","styles","brands","origins","style");
    // dd($brand);
    return view("/latas/latasstyle", $vac);
  }

  public function listadoLatasCountry($country_id) {
    $productos = prods::where("fk_cat",2)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $origin = prods::where("fk_cat",2)->where("fk_origin",$country_id)->get();
    $vac = compact("productos","styles","brands","origins","origin");
    // dd($brand);
    return view("/latas/latascountry", $vac);
  }

  public function listadoLatasRecomend() {
    $productos = prods::where("fk_cat",2)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $ishigh = prods::where("fk_cat",2)->where("ishigh",1)->get();
    $vac = compact("productos","styles","brands","origins","ishigh");
    // dd($brand);
    return view("/latas/latasrecomendados", $vac);
  }

  public function listadoBarrilesAll() {
    $productos = prods::where("fk_cat",3)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    // dd($origins);
    $vac = compact("productos","styles","brands","origins");
    return view("/barriles/barriles", $vac);
  }

  public function listadoBarrilesMarcas($brand_id) {
    $productos = prods::where("fk_cat",3)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $brand = prods::where("fk_cat",3)->where("fk_brand",$brand_id)->get();
    $vac = compact("productos","styles","brands","origins","brand");
    // dd($brand);
    return view("/barriles/barrilesbrand", $vac);
  }

  public function listadoBarrilesStyle($style_id) {
    $productos = prods::where("fk_cat",3)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $style = prods::where("fk_cat",3)->where("fk_style",$style_id)->get();
    $vac = compact("productos","styles","brands","origins","style");
    // dd($brand);
    return view("/barriles/barrilesstyle", $vac);
  }

  public function listadoBarrilesCountry($country_id) {
    $productos = prods::where("fk_cat",3)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $origin = prods::where("fk_cat",3)->where("fk_origin",$country_id)->get();
    $vac = compact("productos","styles","brands","origins","origin");
    // dd($brand);
    return view("/barriles/barrilescountry", $vac);
  }

  public function listadoBarrilesRecomend() {
    $productos = prods::where("fk_cat",3)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $ishigh = prods::where("fk_cat",3)->where("ishigh",1)->get();
    $vac = compact("productos","styles","brands","origins","ishigh");
    // dd($brand);
    return view("/barriles/barrilesrecomendados", $vac);
  }

  public function listadoGrowlersAll() {
    $productos = prods::where("fk_cat",4)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    // dd($origins);
    $vac = compact("productos","styles","brands","origins");
    return view("/growlers/growlers", $vac);
  }

  public function listadoGrowlersMarcas($brand_id) {
    $productos = prods::where("fk_cat",4)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $brand = prods::where("fk_cat",4)->where("fk_brand",$brand_id)->get();
    $vac = compact("productos","styles","brands","origins","brand");
    // dd($brand);
    return view("/growlers/growlersbrand", $vac);
  }

  public function listadoGrowlersStyle($style_id) {
    $productos = prods::where("fk_cat",4)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $style = prods::where("fk_cat",4)->where("fk_style",$style_id)->get();
    $vac = compact("productos","styles","brands","origins","style");
    // dd($brand);
    return view("/growlers/growlersstyle", $vac);
  }

  public function listadoGrowlersCountry($country_id) {
    $productos = prods::where("fk_cat",4)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $origin = prods::where("fk_cat",4)->where("fk_origin",$country_id)->get();
    $vac = compact("productos","styles","brands","origins","origin");
    // dd($brand);
    return view("/growlers/growlerscountry", $vac);
  }

  public function listadoGrowlersRecomend() {
    $productos = prods::where("fk_cat",4)->get();
    $brands = $productos->map(function($prod){
      return $prod->brand;
    })->unique();
    $styles = $productos->map(function($prod){
      return $prod->style;
    })->unique();
    $origins = $productos->map(function($prod){
      return $prod->origin;
    })->unique();
    $ishigh = prods::where("fk_cat",4)->where("ishigh",1)->get();
    $vac = compact("productos","styles","brands","origins","ishigh");
    // dd($brand);
    return view("/growlers/growlersrecomendados", $vac);
  }

  public function productos($urlSlug) {
    $productos = prods::where("urlSlug",$urlSlug)->get();
    $vac = compact("productos");
    // dd($productos);
    return view("/producto", $vac);
  }

  public function searchProds(Request $req) {
    $productos = prods::where("urlSlug",'LIKE', "%$req->search%")->get();
    $busquedas = $req->search;
    $vac = compact("productos", "busquedas");
    // dd($productos);
    return view("/search", $vac);
  }


}

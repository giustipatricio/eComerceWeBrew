<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use App\prods;
use App\segment;
use App\brand;
use App\style;
use App\origin;
use App\cat;
use App\carrito;
use App\User;



class admController extends Controller
{
public function listadoProds() {
$productos = prods::all();
$segments = segment::all();
$styles = style::all();
$origins = origin::all();
$brands = brand::all();
$cats = cat::all();
$vac = compact("productos","segments", "styles", "origins", "cats", "brands");
return view("/adm/admproductos", $vac);
}

public function listadoadmPaises() {
$origin = origin::all();
$vac = compact("origin");
return view("/adm/admpaises", $vac);
}

public function listadoadmmarcas() {
$brands = brand::all();
$vac = compact("brands");
return view("/adm/admmarcas",$vac);
}

public function listadoadmestilos() {
$styles = style::all();
$vac = compact("styles");
return view("/adm/admestilos",$vac);
}
public function listadoadmsegmentos() {
$segments = segment::all();
$vac = compact("segments");
return view("/adm/admsegmentos",$vac);
}

public function addProducto(Request $req)  {
if(!empty($req["picture"])){
$path = $req->file("picture")->store("public");
$imagenProducto = basename($path);
} else {
$imagenProducto = null;
}
$nuevoProducto = new prods;
$nuevoProducto->picture=$imagenProducto;
$nuevoProducto->prods_name= $req["prods_name"];
$nuevoProducto->fk_cat= $req["fk_cat"];
$nuevoProducto->fk_segment= $req["fk_segment"];
$nuevoProducto->fk_style= $req["fk_style"];
$nuevoProducto->stock= $req["stock"];
$nuevoProducto->alc= $req["alc"];
$nuevoProducto->ibu= $req["ibu"];
$nuevoProducto->capacity_cm3= $req["capacity_cm3"];
$nuevoProducto->fk_brand= $req["fk_brand"];
$nuevoProducto->fk_origin= $req["fk_origin"];
$nuevoProducto->detail= $req["detail"];
$nuevoProducto->ishigh= $req["ishigh"];
$nuevoProducto->price= $req["price"];
$nuevoProducto->urlSlug= Str::slug($req["prods_name"].$req["fk_style"].$req["fk_cat"]);
$nuevoProducto->save();
return redirect ("adm/admproductos");
}



public function borrarProducto($id_producto)  {
$producto = prods::where("id", "=", $id_producto)
->delete();
return redirect ("adm/admproductos");
}

public function addMarca(Request $req)  {
$nuevaMarca = new brand;
$nuevaMarca->brand_name = $req["brand_name"];
$nuevaMarca->save();
return redirect ("/adm/admmarcas");
}
public function borrarMarca($brand_id_brand)  {
$producto = brand::where("brand_id", "=", $brand_id_brand)
->delete();
return redirect ("/adm/admmarcas");
}


public function addPais(Request $req)  {
$nuevoPais = new origin;
$nuevoPais->country_origin = $req["country_origin"];
$nuevoPais->save();
return redirect ("/adm/admpaises");
}
public function borrarPais($country_id_origen)  {
$producto = origin::where("country_id", "=", $country_id_origen)
->delete();
return redirect ("/adm/admpaises");
}

public function addEstilo(Request $req)  {
$nuevoEstilo = new style;
$nuevoEstilo->style_name = $req["style_name"];
$nuevoEstilo->save();
return redirect ("/adm/admestilos");
}

public function borrarEstilo($style_id_style)  {
$producto = style::where("style_id", "=", $style_id_style)
->delete();
return redirect ("/adm/admestilos");
}

public function addSegmento(Request $req)  {
$nuevoSegmento = new segment;
$nuevoSegmento->segment_name = $req["segment_name"];
$nuevoSegmento->save();
return redirect ("/adm/admsegmentos");
}

public function borrarSegmento($segment_id_segmentoproducto)  {
$producto = segment::where("segment_id", "=", $segment_id_segmentoproducto)
->delete();
return redirect ("/adm/admsegmentos");
}

public function ProdAEditar($id_producto)  {
$productosE = prods::where("id", "=", $id_producto)->get();
$segments = segment::all();
$styles = style::all();
$origins = origin::all();
$brands = brand::all();
$cats = cat::all();
$vac = compact("productosE","segments", "styles", "origins", "cats", "brands");
// dd($productosE);
return view("/adm/admproductosEdit", $vac);
}

public function editar($id_producto, Request $req)  {
$producto = prods::find($id_producto);
if(!empty($req["picture"])){
      $path = $req->file("picture")->store("public");
      $imagenProducto = basename($path);
      $producto->picture= $imagenProducto;
    }
$producto->prods_name= $req["prods_name"];
$producto->fk_cat= $req["fk_cat"];
$producto->fk_segment= $req["fk_segment"];
$producto->fk_style= $req["fk_style"];
$producto->stock= $req["stock"];
$producto->ibu= $req["ibu"];
$producto->alc= $req["alc"];
$producto->capacity_cm3= $req["capacity_cm3"];
$producto->fk_brand= $req["fk_brand"];
$producto->fk_origin= $req["fk_origin"];
$producto->detail= $req["detail"];
$producto->ishigh= $req["ishigh"];
$producto->price= $req["price"];
$producto->urlSlug= Str::slug($req["prods_name"].$req["fk_style"].$req["fk_cat"]);
$producto->save();
return redirect ("adm/admproductos");
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class productController extends Controller
{
  public function allProducts()
  {
    $products = product::all();
    return $products;
  }

  public function saveProduct(Request $request)
  {
    $save = new product();
    $save->name = $request->name;
    $save->description = $request->desc;
    $save->value = $request->value;
    $save->url = "url";
    $save->save();
    return $save;
  }

  public function dropProduct(Request $request)
  {
    $drop = product::find($request->id);
    // $drop->delete();
  }

  public function upDateProducts(Request $request)
  {
    $update = product::find($request->id);
    $update->name = $request->name;
    $update->description = $request->description;
    $update->value = $request->value;
    $update->save();
  }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Card;
use App\Models\product;

class cardController extends Controller
{
  public function store()
  {
    // $cartItems = \Cart::getContent();
    return view('store');
  }

  public function allProducts()
  {
    $products = product::all();
    return $products;
  }

  public function cardAdd(Request $request)
  {
    \Cart::add([
      'id' => $request->id,
      'name' => $request->name,
      'price' => $request->price,
      'quantity' => $request->quantity,
      'attributes' => array(
        'image' => 'url')
    ]);
    $cartItems = \Cart::getContent();
    return $cartItems;
  }
  public function totalP()
  {
    $cartItems = \Cart::getContent();
    $total=0;
    foreach ($cartItems as $key) {
      $total += $key->price * $key->quantity;
    }
    return $total;
  }
  public function remove(Request $request)
  {
    \Cart::update(
      $request->id,
      [
        'quantity' => [
          'relative' => false,
          'value' => $request->quantity
        ],
      ]
    );
    $cartItems = \Cart::getContent();
    $n = 0;
    foreach ($cartItems as $key) {
      $n += $key->quantity * $key->price;
    }
    return $n;
  }

  public function delet(Request $request)
  {
    \Cart::clear();
    $cartItems = \Cart::getContent();
    return $cartItems;
  }

}

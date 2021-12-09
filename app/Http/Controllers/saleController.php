<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Card;
use App\Models\sale;
use App\Models\sale_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class saleController extends Controller
{
    public function sale(Request $request)
    {
      $id = Auth::id();
      $save = new sale_user();
      $save->id_user = $id;
      $save->total = $request->valueT;
      $save->save();

      foreach ($request->basket as $key => $value) {
        $saveSale = new sale();
        $saveSale->id_sale = $save->id;
        $saveSale->id_product = $value['id'];
        $saveSale->quantity = $value['quantity'];
        $saveSale->pay = $value['price'];
        $saveSale->save();
      }

      return $value['quantity'];
    }

    public function report()
    {
      // id_sale
      //
      // quantity
      // pay
      $report = DB::table('sales')
      ->join('products', 'sales.id_product', '=', 'products.id')
      ->join('sale_users', 'sales.id_sale', '=', 'sale_users.id')
      ->join('users', 'sale_users.id_user', '=', 'users.id')
      ->select('sales.*','products.name as nameProduct','users.name as nameUser')
      ->get();
      // $report = sale::all();
      return view('report', ['report' => $report]);
    }
}

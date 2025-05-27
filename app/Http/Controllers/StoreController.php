<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    // les requete elequent 
    
//? 1 – afficher le nom complet du client pour chaque commande.

    public function getNomClientparCommande()
    {
        $commandes = Order::join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select([
                'orders.id as order_id',
                DB::raw("CONCAT(customers.first_name, ' ', customers.last_name) as customer_name")
            ])
            ->get();

        return view('exercice.q1', compact('commandes'));
    }


//? 2 – afficher la listes des founisseurs qui ont livré les produits commandé par ‘Annabel Stehr’

public function getFournisseurParProduit()
{
    $fournisseurs = DB::table('suppliers')
        ->join('products', 'suppliers.id', '=', 'products.supplier_id')
        ->join('product_orders', 'products.id', '=', 'product_orders.product_id')
        ->join('orders', 'product_orders.order_id', '=', 'orders.id')
        ->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->where('customers.first_name', 'Abdullah')
        ->where('customers.last_name', 'Doyle')
        ->select([
            DB::raw("CONCAT(suppliers.first_name, ' ', suppliers.last_name) as supplier_name"),
            'products.name as product_name',
            'products.description as product_description',
            DB::raw("CONCAT(customers.first_name, ' ', customers.last_name) as customer_name"),
        ])
        ->distinct()
        ->get();

    return view('exercice.q2', compact('fournisseurs'));
}
 
//? 3– la liste des produits stockées dans les memes depots que les produits fournis par ‘Scottie Crona’

public function getProductStockeMemeDepot()
{
    $products = DB::table('products')
        ->join('stocks', 'products.id', '=', 'stocks.product_id')
        ->join('stores', 'stocks.store_id', '=', 'stores.id')
        ->join('stocks as s2', 'stores.id', '=', 's2.store_id')
        ->join('products as p2', 's2.product_id', '=', 'p2.id')
        ->join('suppliers', 'p2.supplier_id', '=', 'suppliers.id')
        ->where('suppliers.first_name', 'Scottie')
        ->where('suppliers.last_name', 'Crona')
        ->select([
            DB::raw("CONCAT(suppliers.first_name, ' ', suppliers.last_name) as supplier_name"),
            'stores.name as store_name',
            'products.name as product_name'
        ])
        ->distinct()
        ->get();

    return view('exercice.q3', compact('products'));
}
//? 4 – le nombre des produits par depot.
public function getnbProDepot(){
    $nbproduct=DB::table('stocks')
    ->join('products','stock.product_id','=','products.id')
    ->join('stores','stocks.store_id','=','stores.id')
    ->select([
        'store.name as store-name',
        DB::raw('COUNT(product.id) as product_count')
    ])
    ->groupBy('stores.id','store.name')
    ->get();
    return view('exercice.q4',compact('nbproduct')) ;
}

//? 5 – la valeur de chaque depot. (somme des valeurs des produits qu’il contient)

public function getValeurDepot(){
    $valeur_depot=DB::table('stock')
    ->join('store','stock.store_id','=','store.id')
    ->join('product','stock.product_id','=','product.id')
    ->select([
        'stores.name as store_name',
        DB::raw('SUM(product.price*stock.quantity_stock) as totalValue')
    ])
    ->groupBy('stores.id','stores.name')
    ->get();
    return view('exercice.q5',compact('valeur_depot'));
}

//? 6 – les depots qui ont une valeur surpérieur a la valeur du depot ‘Lind-Gislason’
public function getValueSupDepot(){
    $valueDepot=DB::table('stock')
    ->join('store','stock.store_id','=','store.id')
    ->join('product','stock.product_id','product.id')
    ->where('stores.name','Lind-Gislason')
    ->select([
        'store.name as store_name',
        DB::raw('SUM(product.price*stock.quantiy_stock) as total')
    ]);

    $value=DB::table('stock')
    ->join('store','stock.store_id','=','store.id')
    ->join('product','stock.product_id','product.id')
    ->select([
        'store.name as store_name ',
        DB::raw('SUM(product.price*stock.quantity_stock) as total_valeur')
    ])
    ->groupBy('store.id','store.name')
    ->having('total_valeur','>',$valueDepot)
    ->get();
      
    return view('exercie.q6',compact('value'));

}

}

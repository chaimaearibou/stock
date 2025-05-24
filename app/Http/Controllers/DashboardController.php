<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\App;

class DashboardController extends Controller
{
    public function index(): View
    {

        $user = User::find(1); //cherche l'utilisateur dont le id est 1
        return view('dashboard',['pic'=>$user->avatar]);

    }

    public function customers(): View
    {
        return view('customers.index', [
            'customers' => Customer::all()
        ]);
    }

    public function suppliers(): View
    {
        return view('suppliers.index', [
            'suppliers' => Supplier::all()
        ]);
    }

    public function products(): View
    {
        return view('products.index', [
            'products' => Product::with(['category', 'supplier', 'stock'])->get()
        ]);
    }

    public function productsBySupplier(): View
    {
        $suppliers = Supplier::all();
        return view('products.by-supplier', compact('suppliers'));

    }

    public function getProductsBySupplier(Supplier $supplier)
    {

        $products = Product::with(['stock','category'])
        ->where('supplier_id', $supplier->id)
        ->get();
        return view('products._products_by_supplier', compact('products'));
    }

    public function productsByStore(): View
    {
        $stores = Store::all();
        return view('products.by-store', compact('stores'));
    }

    public function getProductsByStore(Store $store)
    {
        $products = Product::with(['category', 'stock'])
            ->whereHas('stock', function($query) use ($store) {
                $query->where('store_id', $store->id);
            })
            ->get();

        return response()->json($products);
    }

    public function orders()
    {
        return view("orders.index");
    }


   public function saveCookie()
   {
      $name = request()->input("txtCookie");
      //Cookie::put("UserName",$name,6000000);
      Cookie::queue("UserName",$name,6000000);
      return redirect()->back();
   }


   public function saveSession(Request $request)
   {
            $name = $request->input("txtSession");
            $request->session()->put('SessionName', $name);
            return redirect()->back();
   }
   public function saveAvatar()
   {

    request()->validate([
        'avatarFile'=>'required|image',
            ]);
    $ext = request()->avatarFile->getClientOriginalExtension();
    $name = Str::random(30).time().".".$ext;
    request()->avatarFile->move(public_path('storage/avatars'),$name);
    $user = User::find(1);
    $user->update(['avatar'=>$name]);
    return redirect()->back();
   }


}

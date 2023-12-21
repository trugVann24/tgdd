<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductStore;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductStoreController extends Controller
{
    public function index() : View {
        $productstore = ProductStore::WhereNotIn('productStore_id',['admin'])->get();
        return view("admin.productstore.index", compact("productstore"));
    }
    public function create() : View {
        $product = Product::all();
        return view("admin.productstore.create",[
            "product"=> $product
        ]);
        
    }

    public function store(Request $request) {
        $validate = $request->validate([
            "productStore_id"=> "required",
            "productStore_name"=> "required",
            "price"=> "required",
            "quantity"=> "required",
            "description"=> "",
            "status"=> "",
        ]);

        $product = Product::find($request->input('product_id'));
        $product->quantity_instock -= $request->input('quantity');
        $product->save();

        dd($validate);
        ProductStore::create($validate);
        return redirect()->route("admin.productstore.index")->with("message","Thêm sản phẩm thành công");
    }



}

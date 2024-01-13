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
            "price"=> "required",
            "quantity"=> "",
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

    public function edit(ProductStore $productstore) : View {
        $product = Product::all();
        return view('admin.productstore.edit',[
            'product' => $product
        ], compact('productstore'));
    }

    public function update(Request $request, ProductStore $productstore)
    {
        $validated = $request->validate(
            [
                "productStore_id"=> "",
                "price"=> "",
                "quantity"=> "",
                "description"=> "",
                "status"=> "",
            ]
        );

        $productstore->update($validated);
        return redirect()->route('admin.productstore.index')->with('message', 'sửa sản phẩm thành công');

    }

    public function destroy(ProductStore $productstore) {
        $productstore->delete();
        return back()->with('message','Sản phẩm được xoá thành công');
    }


}

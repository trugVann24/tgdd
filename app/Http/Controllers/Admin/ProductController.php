<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\GoodReceivedNote;
use App\Models\Product;
use App\Models\Suppliler;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
        public function index() : View
        {
            $product = Product::whereNotIn('name', ['admin'])->get();
            return view('admin.product.index', compact('product'));
            foreach ($product as $product) {
                $product->status = $product->quantity_instock > 0 ? 1 : 0;
                $product->save();
            }
        }
        public function create() : View {
            $category_id = Category::all();
            $supplier_id = Suppliler::all();
            $goodreceivenote = GoodReceivedNote::all();
            return view('admin.product.create',[
                'category_id'=> $category_id,
                'supplier_id'=> $supplier_id,
                'goodreceivenote'=> $goodreceivenote
                
            ]);
        }

        //bỏ thêm sản phẩm , lấy tên, số lượng, giá nhập bên phiếu nhập
        
        public function store(Request $request)
        {
            $validated = $request->validate([
                'supplier_id' => 'nullable', 
                'category_id' => 'nullable', 
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
                'name' => '',
                'import_price' => 'numeric',
                'sell_price' => 'nullable|numeric',
                'quantity_instock' => 'integer',
                'description' => 'nullable|string',
                'status' => 'nullable',
            ]);

            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = $imagePath;
            Product::create($validated);

            return redirect()->route('admin.product.index')->with('message', 'Thêm sản phẩm thành công');
        }


        public function edit(product $product) : View {
            return view('admin.product.edit', compact('product'));
        }


        public function update(Request $request, product $product)
        {
            $validated = $request->validate([
                'supplier_id' => 'nullable', 
                'category_id' => 'nullable', 
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
                'name' => '',
                'import_price' => 'numeric',
                'sell_price' => 'nullable|numeric',
                'quantity_instock' => 'integer',
                'description' => 'nullable|string',  
                'status' => 'nullable',
            ]);
            if ($request->hasFile('image')) {

                $imagePath = $request->file('image')->store('images', 'public');
                $product->update(['image' => $imagePath]);
            }
            $product->update([
                'supplier_id' => $validated['supplier_id'] , 
                'category_id' =>$validated['category_id'] , 
                'name' => $validated['name'],
                'import_price' => $validated['import_price'],
                'sell_price' => $validated['sell_price'],
                'quantity_instock' => $validated['quantity_instock'],
                'description' => $validated['description'],  
                'status' =>$validated['status'] ,
            ]);
             return redirect()->route('admin.product.index')->with('message', 'Sửa sản phẩm thành công');
        }


    public function destroy(product $product) {
        $product->delete();
        return back()->with('message','Sản phẩm được xoá thành công');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GoodReceivedNote;
use App\Models\Product;
use App\Models\Suppliler;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GoodReceivedNoteController extends Controller
{
    public function index() : View
    {
        $goodReceivedNote = GoodReceivedNote::whereNotIn('supplier_id', ['admin'])->get();
        return view('admin.goodReceivedNote.index', compact('goodReceivedNote'));
    }
    public function create() : View {
            $supplier_id = Suppliler::all();
            $product_id = Product::all();
            $user_id = User::all();
            return view('admin.goodReceivedNote.create', [
                'supplier_id' => $supplier_id,
                'product_id' => $product_id,
                'user_id' => $user_id,

            ]);
        }
        public function store(Request $request, Product $product)
        {
            $validated = $request->validate([
                'supplier_id' => '',
                'name' => '',
                'user_id' => '',
                'received_date' => 'date', 
                'quantity' => 'numeric',
                'price' => 'numeric',
                'total_cost' => 'numeric',
            ]); 

            $productId = $request->input('name');
           
            $existingProduct = Product::find($productId);

            if ($existingProduct) {
                $product->quantity_instock += $request->input('quantity');
                $product->save();
                GoodReceivedNote::create($validated);

            }else{
                $product->name = $request->input('name');
                $product->quantity_instock = $request->input('quantity');
                $product->import_price = $request->input('price');
                $product->save();
                GoodReceivedNote::create($validated);
            }

             return redirect()->route('admin.goodReceivedNote.index')->with('message', 'Thêm phiếu nhập thành công');
        }


    public function edit(GoodReceivedNote $goodReceivedNote) : View {

        return view('admin.goodReceivedNote.edit', compact('goodReceivedNote'));
    }


        public function update(Request $request, GoodReceivedNote $goodReceivedNote)
        {
            $validated = $request->validate([
                'supplier_id' => '',
                'name' => '',
                'user_id' => '',
                'received_date' => 'date', 
                'quantity' => 'numeric',
                'price' => 'numeric',
                'total_cost' => 'numeric',
            ]);

            $goodReceivedNote->update($validated);
           
        return redirect()->route('admin.goodReceivedNote.index')->with('message', 'Sửa phiếu nhập thành công');
}


    public function destroy(GoodReceivedNote $goodReceivedNote) {
        $goodReceivedNote->delete();
        return back()->with('message','Phiếu nhập được xoá thành công');
    }
}

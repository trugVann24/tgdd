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
            $supplier_id = $request->input('supplier_id');
            $productName = $request->input('name');
            $quantity = $request->input('quantity');
            $import_price = $request->input('price');
            $product = Product::where('name', $productName)->first();
             if ($product) {
                $product->quantity_instock += $quantity;
                $product->import_price = $import_price;
                $product->save();
             }else{
                Product::create([
                    'name' => $productName,
                    'quantity_instock' => $quantity,
                    'import_price' => $import_price,
                    'supplier_id' => $supplier_id
                ]);
             }
            GoodReceivedNote::create($validated);
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

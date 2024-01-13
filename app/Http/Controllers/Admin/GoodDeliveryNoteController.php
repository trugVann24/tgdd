<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AgentStore;
use App\Models\Brand;
use App\Models\GoodDeliveryNote;
use App\Models\Product;
use App\Models\ProductStore;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GoodDeliveryNoteController extends Controller
{
    public function index() : View
    {
        $goodDeliveryNote = GoodDeliveryNote::whereNotIn('agent_store_id', ['admin'])->get();
        return view('admin.goodDeliveryNote.index', compact('goodDeliveryNote'));
    }
    public function create() : View {
        $agent_store_id = AgentStore::all();
        $product_id = Product::all();
        $user_id = User::all();
        return view('admin.goodDeliveryNote.create', [
            'agent_store_id' => $agent_store_id,
            'product_id' => $product_id,
            'user_id' => $user_id
        ]);
    }


        public function store(Request $request)
        {
            $validated = $request->validate([
                'agent_store_id' => '',
                'product_id' => '',
                'user_id' => '',
                'delivery_date' => 'required|date', 
                'quantity' => 'required|numeric',
                'price' => 'required|numeric',
                'total_cost' => 'required|numeric',
            ]); 

            $product_id = $request->input('product_id');
            $price = $request->input('price');
            $quantity = $request->input('quantity');
            $product = Product::where('id', $product_id)->first();
            $productstore = ProductStore::where('productStore_id',$product_id)->first();
            if ($product) {
                $product->quantity_instock -= $quantity;
                $product->save();
             }else{
                Product::create([
                    'quantity_instock' => $quantity,
                ]);
             }
             if($productstore){
                $productstore->quantity += $quantity;
                $productstore->save();

             }else{
                ProductStore::create([
                    'productStore_id' =>  $product_id,
                    'price' =>  $price,
                    'quantity' => $quantity
                    
                ]);
            }

            goodDeliveryNote::create($validated);

            return redirect()->route('admin.goodDeliveryNote.index')->with('message', 'Thêm phiếu nhập thành công');
        }


        public function edit(goodDeliveryNote $goodDeliveryNote) : View {

            return view('admin.goodDeliveryNote.edit', compact('goodDeliveryNote'));
        }


        public function update(Request $request, goodDeliveryNote $goodDeliveryNote)
        {
            $validated = $request->validate([
                'agent_store_id' => '',
                'product_id' => '',
                'user_id' => '',
                'delivery_date' => 'required|date',
                'quantity' => 'required|numeric',
                'price' => 'required|numeric',
                'total_cost' => 'required|numeric',
            ]);

            $goodDeliveryNote->update($validated);
           
        return redirect()->route('admin.goodDeliveryNote.index')->with('message', 'Sửa phiếu xuất thành công');
}


    public function destroy(goodDeliveryNote $goodDeliveryNote) {
        $goodDeliveryNote->delete();
        return back()->with('message','Phiếu xuất được xoá thành công');
    }
}

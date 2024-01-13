<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\InvoiceDetail;
use App\Models\Product;
use App\Models\ProductStore;
use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class InvoiceDetailController extends Controller
{
    public function index() : View{
        $invoicedetail = InvoiceDetail::WhereNotIn('code_bill',['admin'])->get();
        return view("admin.invoicedetail.index",compact("invoicedetail"));
    }
    public function create() : View {
        $productStore = ProductStore::all();
        $product = Product::all();
        $bill_code = Bill::all();
        $customer = Customer::all();
        return view("admin.invoicedetail.create",[
           'bill_code'=> $bill_code,
           'customer_id' => $customer,
           'product' => $product,
           'productStore_name' => $productStore
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'code_bill' => '',
            'productStore_name' => '',
            'customer_id' => '',
            'price' => '',
            'quantity' => 'numeric',
            'discount' => 'numeric',
            'total_money' => 'numeric',
        ]); 
        $code_bill = $request->input('code_bill');
        $customer_id = $request->input('customer_id');
        $total_money = $request->input('total_money');
        $product_id = $request->input('productStore_name');
        $quantity = $request->input('quantity');
        $productstore = ProductStore::where('productStore_id', $product_id)->first();
    
        if ($productstore) {
            $productstore->quantity -= $quantity;
            $productstore->save();
            Bill::create([
                'bill_code'=>$code_bill,
                'customer_id'=>$customer_id,
                'total_money'=>$total_money
            ]);
         }
        InvoiceDetail::create($validated);
        return redirect()->route('admin.invoicedetail.index')->with('message', 'Thêm thành công');
    }
    public function edit(InvoiceDetail $invoicedetail) : View {
        $productStore = ProductStore::all();
        $product = Product::all();
        $bill_code = Bill::all();
        $customer = Customer::all();
        return view("admin.invoicedetail.edit",[
           'invoicedetail' => $invoicedetail,
           'bill_code'=> $bill_code,
           'customer_id' => $customer,
           'product' => $product,
           'productStore_name' => $productStore 
        ]);
    }


        public function update(Request $request, InvoiceDetail $invoiceDetail)
        {
            $validated = $request->validate([
                    'code_bill' => '',
                    'productStore_name' => '',
                    'customer_id' => '',
                    'price' => '', 
                    'quantity' => 'numeric',
                    'discount' => 'numeric',
                    'total_money' => 'numeric',
                ]);
                // $product_id = $request->input('productStore_name');
                // $invoicedetail = InvoiceDetail::where('productStore_name', $product_id)->first();
                // $productstore = ProductStore::where('productStore_id', $product_id)->first();
                // $quantity = $request->input('quantity');
                // if($productstore && $invoicedetail->quantity == $quantity){
                //     $invoicedetail->update($validated);
                // }else if($productstore && $invoicedetail->quantity > $quantity){
                //     $productstore->quantity += ($invoicedetail->quantity - $quantity);
                //     $productstore->save();
                //     $invoicedetail->update($validated);
                // } else if($productstore && $invoicedetail->quantity < $quantity){
                //     $productstore->quantity -= ($quantity - $invoicedetail->quantity);
                //     $productstore->save();
                //     $invoicedetail->update($validated);
                // }
                $invoiceDetail->update($validated);

            return redirect()->route('admin.invoicedetail.index')->with('message', 'Sửa thành công');
        }


    public function destroy(InvoiceDetail $invoicedetail) {
        $invoicedetail->delete();
        return back()->with('message','Được xoá thành công');
    }
}

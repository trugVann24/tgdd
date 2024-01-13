<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index() : View{
        $customer = Customer::whereNotIn('customer_id',['admin'])->with('bills') ->get();
            return view('admin.customer.index', compact('customer'));
    }

    public function create() : View {
        return view('admin.customer.create');
    }

    public function store(Request $request)
        {
            $validated = $request->validate([
                'customer_id' => 'required', 
                'name' => 'required', 
                'address' => 'required',
                'date_of_birth' => 'required',
                'phone_number' => 'required|numeric',
                'revenue' => '',
            ]);

            $revenue = $request->input('revenue');
            Customer::create($validated);

            return redirect()->route('admin.customer.index')->with('message', 'Thêm sản phẩm thành công');
        }
        public function edit(Customer $customer) : View {
            return view('admin.customer.edit', compact('customer'));
        }


        public function update(Request $request, Customer $customer)
        {
            $validated = $request->validate([
                'customer_id' => 'required', 
                'name' => 'required', 
                'address' => 'required',
                'date_of_birth' => 'required',
                'phone_number' => 'required|numeric',
                'revenue' => '',
            ]);

            $customer->update($validated);
             return redirect()->route('admin.customer.index')->with('message', 'Sửa sản phẩm thành công');
        }


        public function destroy($customer_id) {
            $customer_id = Customer::where('customer_id', $customer_id)->first();
        
            if (!$customer_id) {
                return back()->with('error', 'Không tìm thấy nhân viên');
            }
        
            $customer_id->delete();
        
            return back()->with('message', 'Sản phẩm được xoá thành công');
        }
}

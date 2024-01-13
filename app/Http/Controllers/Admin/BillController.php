<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Customer;
use App\Models\InvoiceDetail;
use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index() : View{
        $bill = Bill::whereNotIn('bill_code',['admin'])->get();
        return view("admin.bill.index", compact("bill"));
    }
    public function create() : View{
        $invoicedetail = InvoiceDetail::all();
        $staff_code = Staff::all();
        $customer_id = Customer::all();
        return view("admin.bill.create", [
            "staff_code"=> $staff_code,
            "customer_id"=> $customer_id,
            'invoicedetail' =>$invoicedetail
        ]);
    }
    public function store(Request $request)
        {
            $validated = $request->validate([
                "bill_code"=> "required",
                "staff_code"=> "",
                "customer_id"=> "",
                "sale_date"=> "required",
                "total_money"=> "required|numeric",
            ]);

            Bill::create($validated);

            return redirect()->route('admin.bill.index')->with('message', 'Thêm hóa đơn thành công');
        }

        public function edit(Bill $bill) : View{
            $invoicedetail = InvoiceDetail::all();
            $staff = Staff::all();
            $customer = Customer::all();
            return view("admin.bill.edit", [
                "staff"=> $staff,
                "customer"=> $customer,
                'invoicedetail'=>$invoicedetail
            ],compact("bill"));
        }
        public function update(Request $request, Bill $bill){
            $validated = $request->validate([
                "bill_code"=> "required",
                "staff_code"=> "",
                "customer_id"=> "",
                "sale_date"=> "required",
                "total_money"=> "required|numeric",
            ]);
            $bill->update($validated);
            return redirect()->route("admin.bill.index")->with("message","Sửa hóa đơn thành công");
        }

        public function destroy($bill) {
            $bill = Bill::where('bill_code', $bill)->first();
        
            if (!$bill) {
                return back()->with('error', 'Không tìm thấy hóa đơn');
            }
        
            $bill->delete();
        
            return back()->with('message', 'Hóa đơn được xoá thành công');
        }
}

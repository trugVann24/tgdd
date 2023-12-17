<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Supplier::orderBy('id','ASC')->get();
        return view('admin.supplier.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Supplier::all();
        return view('admin.supplier.create', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' =>'required|unique:supplilers|max:255',
                'email' =>'required|unique:supplilers|max:255',
                'phone' =>'required|unique:supplilers|max:255',
                'address' =>'required|unique:supplilers|max:255',
            ],
            [
                'name.unique' =>'Tên Nhà cung cấp đã tồn tại ,xin điền tên khác',
                'name.required' =>'Vui lòng điền tên Nhà cung cấp!',
                'email.unique' =>'Địa chỉ Email đã tồn tại ,xin điền tên khác',
                'email.required' =>'Vui lòng điền địa chỉ Email!',
                'phone.unique' =>'Số điện thoại Nhà cung cấp đã tồn tại ,xin điền tên khác',
                'phone.required' =>'Vui lòng điền Số điện thoại Nhà cung cấp!',
                'address.unique' =>'Địa chỉ Nhà cung cấp đã tồn tại ,xin điền tên khác',
                'address.required' =>'Vui lòng điền Địa chỉ Nhà cung cấp!',
            ]
        );

        $suppliler = new Supplier();
        $suppliler->name =$data['name'];
        $suppliler->email =$data['email'];
        $suppliler->phone =$data['phone'];
        $suppliler->address =$data['address'];
        $suppliler->save();
        return redirect()->route('supplier.index')->with('message', 'Thêm Nhà cung cấp thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $suppliler = Supplier::find($id);
        return view('admin.supplier.edit', compact('suppliler'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $suppliler = Supplier::find($id);
        return view('admin.supplier.edit', compact('suppliler'));
    }

    public function search_supplier(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $search_supp = Supplier::where('name', 'LIKE', '%' . $search . '%')->get();
            return view('admin.supplier.search', compact('search_supp'));
        } else if ($search==""){
            return redirect()->route('supplier.index')->with('alert_message', 'Vui lòng nhập từ khóa tìm kiếm');
        }
         else {
            return redirect()->route('admin.supplier.search_supp');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'name' =>'required|max:255',
                'email' =>'required|max:255',
                'phone' =>'required|max:255',
                'address' =>'required|max:255',
            ],
            [
                'name.required' =>'Vui lòng điền tên Nhà cung cấp!',
                'email.required' =>'Vui lòng điền địa chỉ Email!',
                'phone.required' =>'Vui lòng điền Số điện thoại Nhà cung cấp!',
                'address.required' =>'Vui lòng điền Địa chỉ Nhà cung cấp!',
            ]
        );

        $data = $request->all();
        $suppliler =  Supplier::find($id);
        $suppliler->name =$data['name'];
        $suppliler->email =$data['email'];
        $suppliler->phone =$data['phone'];
        $suppliler->address =$data['address'];
        $suppliler->save();
        return redirect()->route('supplier.index')->with('message', 'Sửa nhà cung cấp thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Supplier::find($id)->delete();
        return redirect()->route('supplier.index');
    }
}

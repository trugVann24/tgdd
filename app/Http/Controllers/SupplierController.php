<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('q');
        $list = Supplier::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->paginate(10);
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
                'name' => 'required|unique:suppliers|max:255',
                'email' => 'required|email',
                'phone' => 'required|max:11|min:11',
                'address' => 'required|max:255',
            ],
            [
                'name.unique' => 'Tên nhà cung cấp đã có ,xin điền tên khác',
                'name.required' => 'Vui lòng điền tên nhà cung cấp!',
                'email.required' => 'Vui lòng điền email',
                'email.email' => 'Vui lòng điền đúng định dạng email',
                'phone.required' => 'Vui lòng điền số điện thoại ',
                'phone.max' => 'Ký tự vượt quá 11, Vui lòng điền lại',
                'phone.min' => 'Ký tự dưới 11, Vui lòng điền lại ',
                'address' => 'Vui lòng điền địa chỉ'
            ]
        );

        $supplier = new Supplier();
        $supplier->name = $data['name'];
        $supplier->email = $data['email'];
        $supplier->phone = $data['phone'];
        $supplier->address = $data['address'];

        $supplier->save();
        return redirect()->route('supplier.index')->with('message', 'Thêm nhà cung cấp thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::find($id);
        return view('admin.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'phone' => 'required|max:11|min:11',
                'address' => 'required|max:255',
            ],
            [

                'name.required' => 'Vui lòng điền tên nhà cung cấp!',
                'email.required' => 'Vui lòng điền email',
                'email.email' => 'Vui lòng điền đúng định dạng email',
                'phone.required' => 'Vui lòng điền số điện thoại ',
                'phone.max' => 'Ký tự vượt quá 11, Vui lòng điền lại',
                'phone.min' => 'Ký tự dưới 11, Vui lòng điền lại ',
                'address' => 'Vui lòng điền địa chỉ'
            ]
        );

        $data = $request->all();
        $supplier =  Supplier::find($id);
        $supplier->name = $data['name'];
        $supplier->email = $data['email'];
        $supplier->phone = $data['phone'];
        $supplier->address = $data['address'];

        $supplier->save();
        return redirect()->route('supplier.index')->with('message', 'sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        supplier::find($id)->delete();
        return redirect()->route('supplier.index');
    }
}

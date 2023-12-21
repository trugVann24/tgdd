<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Suppliler;
use Illuminate\Support\Facades\Schema;

class SupplilerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $suppliler = Suppliler::whereNotIn('name', ['admin'])->get();
        return view('admin.suppliler.index', compact('suppliler'));
    }

    public function create()
    {
        return view('admin.suppliler.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' =>'required|unique:categories',
                'email'=> 'required|email',
                'phone'=> 'required|numeric',
                'address'=> 'required',
            ],
            [
                'name.unique' =>'Tên danh mục đã có ,xin điền tên khác',
                'name.required' =>'Vui lòng điền tên danh mục!',
                'email.unique' =>'email đã có ,xin điền emailkhác',
                'email.required' =>'Vui lòng điền email!',
                'email.email'=> 'Nhập đúng định dạng email',
                'phone.unique' =>'Số điện thoại đã có ,xin điền Số điện thoại khác',
                'phone.required' =>'Vui lòng điền Số điện thoại danh mục!',
                'phone.numeric'=> 'Số điện thoại phải là số',
                'address.unique' =>'Địa chỉ đã có ,xin điền Địa chỉ khác',
                'address.required' =>'Vui lòng điền Địa chỉ danh mục!',
            ]
        );
         Suppliler::create($validated);
         return to_route('admin.suppliler.index')->with('message', 'Thêm nhà cung cấp thành công');
    }
    public function edit(Suppliler $suppliler)
    {
        return view('admin.suppliler.edit', compact('suppliler'));  
    }
    public function update(Request $request, Suppliler $suppliler)
    {
        $validated = $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'address'=> 'required',
        ]);
        $suppliler->update($validated);
        return to_route('admin.suppliler.index')->with('message','Sửa nhà cung cấp thành công!');
    }

    public function destroy(Suppliler $suppliler)
    {
        $suppliler->delete();
        return back()->with('message','Nhà cung cấp được xoá thành công');
    }
}

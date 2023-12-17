<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Staff::orderBy('id', 'asc')->get();
        return view('admin.staff.index', compact('list'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Staff::all();
        return view('admin.staff.create', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:staff|max:255',
                'address' => 'required|unique:staff|max:255',
                'phone_number' => 'required|unique:staff|max:255',
                'status' => 'required|in:0,1,2',

            ],
            [
                'name.unique' => 'Tên Nhân viên đã tồn tại ,xin điền tên khác',
                'name.required' => 'Vui lòng điền tên Nhân viên!',
                'phone_munber.unique' => 'Số điện thoại Nhân viên đã tồn tại ,xin điền tên khác',
                'phone_munber.required' => 'Vui lòng điền Số điện thoại Nhân viên!',
                'address.unique' => 'Địa chỉ Nhân viên đã tồn tại ,xin điền tên khác',
                'address.required' => 'Vui lòng điền Địa chỉ Nhân viên!',
            ]
        );

        $staf = new Staff();
        $staf->name = $data['name'];
        $staf->address = $data['address'];
        $staf->phone_number = $data['phone_number'];
        $staf->status = $data['status'];
        // echo $staf;
        $staf->save();
        return redirect()->route('staff.index')->with('message', 'Thêm Nhân viên thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $staf = Staff::find($id);
        return view('admin.staff.edit', compact('staf'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staf = Staff::find($id);
        return view('admin.staff.edit', compact('staf'));
    }

    public function search_staff(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $search_staff = Staff::where('name', 'LIKE', '%' . $search . '%')->get();
            return view('admin.staff.search', compact('search_staff'));
        }else if ($search==""){
            return redirect()->route('staff.index')->with('alert_message', 'Vui lòng nhập từ khóa tìm kiếm');
        }
         else {
            return redirect()->route('admin.staff.search');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'address' => 'required|max:255',
                'phone_number' => 'required|max:255',
                'status' => 'required|in:0,1,2',

            ],
            [
                'name.required' => 'Vui lòng điền tên Nhân viên!',
                'phone_munber.required' => 'Vui lòng điền Số điện thoại Nhân viên!',
                'address.required' => 'Vui lòng điền Địa chỉ Nhân viên!',
            ]
        );

        $staf =  Staff::find($id);
        $staf->name = $data['name'];
        $staf->address = $data['address'];
        $staf->phone_number = $data['phone_number'];
        $staf->status = $data['status'];
        $staf->save();
        return redirect()->route('staff.index')->with('message', 'Sửa nhân viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Staff::find($id)->delete();
        return redirect()->route('staff.index');
    }
}

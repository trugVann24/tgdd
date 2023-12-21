<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index() : View{
        $staff = Staff::whereNotIn('staff_code',['admin'])->get();
            return view('admin.staff.index', compact('staff'));
    }

    public function create() : View {
        return view('admin.staff.create');
    }

    public function store(Request $request)
        {
            $validated = $request->validate([
                'staff_code' => 'required', 
                'name' => 'required', 
                'address' => 'required',
                'day_in_work' => 'required',
                'phone_number' => 'required|numeric',
                'status' => 'required',
            ]);

            Staff::create($validated);

            return redirect()->route('admin.staff.index')->with('message', 'Thêm sản phẩm thành công');
        }
        public function edit(Staff $staff) : View {
            return view('admin.staff.edit', compact('staff'));
        }


        public function update(Request $request, Staff $staff)
        {
            $validated = $request->validate([
                'staff_code' => 'required', 
                'name' => 'required', 
                'address' => 'required',
                'day_in_work' => 'required',
                'phone_number' => 'required|numeric',
                'status' => 'required',
            ]);
            
            $staff->update($validated);
             return redirect()->route('admin.staff.index')->with('message', 'Sửa sản phẩm thành công');
        }


        public function destroy($staff_code) {
            $staff = Staff::where('staff_code', $staff_code)->first();
        
            if (!$staff) {
                return back()->with('error', 'Không tìm thấy nhân viên');
            }
        
            $staff->delete();
        
            return back()->with('message', 'Sản phẩm được xoá thành công');
        }
}

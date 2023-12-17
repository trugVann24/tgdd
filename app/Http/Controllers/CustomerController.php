<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use DateTime;
class CustomerController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Customer::orderBy('id', 'asc')->get();
        return view('admin.customer.index', compact('list'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Customer::all();
        return view('admin.customer.create', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'address' => 'required|max:255',
                'phone_number' => 'required|max:255',
                'day_of_birth'=> 'required|max:255',
                'revenue' => 'required',

            ],
            [
                'name.required' => 'Vui lòng điền tên Khách hàng!',
                'phone_munber.required' => 'Vui lòng điền Số điện thoại Khách hàng!',
                'address.required' => 'Vui lòng điền Địa chỉ Khách hàng!',
                'day_of_birth.required' => 'Vui lòng điền Ngày sinh Khách hàng!',
                'revenue.required' => 'Vui lòng điền Chi tiêu của Khách hàng!',
            ]
        );
        $dateTime = DateTime::createFromFormat('d/m/Y', $data['day_of_birth']);
        $formattedDate = $dateTime ? $dateTime->format('Y-m-d') : null;
        $custo = new Customer();
        $custo->name = $data['name'];
        $custo->address = $data['address'];
        $custo->phone_number = $data['phone_number'];
        $custo->day_of_birth = $formattedDate;
        $custo->revenue = $data['revenue'];

        // echo $formattedDate;
        $custo->save();
        return redirect()->route('customer.index')->with('message', 'Thêm Nhân viên thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $custo = Customer::find($id);
        return view('admin.customer.edit', compact('custo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $custo = Customer::find($id);
        return view('admin.customer.edit', compact('custo'));
    }

    public function search_customer(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $search_custo = customer::where('name', 'LIKE', '%' . $search . '%')->get();
            return view('admin.customer.search', compact('search_custo'));
        } else if ($search==""){
            return redirect()->route('customer.index')->with('alert_message', 'Vui lòng nhập từ khóa tìm kiếm');
        }
        else {
            return redirect()->route('admin.customer.search');
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
                'day_of_birth'=> 'required|max:255',
                'revenue' => 'required',

            ],
            [
                'name.required' => 'Vui lòng điền tên Khách hàng!',
                'phone_munber.required' => 'Vui lòng điền Số điện thoại Khách hàng!',
                'address.required' => 'Vui lòng điền Địa chỉ Khách hàng!',
                'day_of_birth.required' => 'Vui lòng điền Ngày sinh Khách hàng!',
                'revenue.required' => 'Vui lòng điền Chi tiêu của Khách hàng!',

            ]
        );
        $dateTime = DateTime::createFromFormat('d/m/Y', $data['day_of_birth']);
        $formattedDate = $dateTime ? $dateTime->format('Y-m-d') : null;
        $custo =  Customer::find($id);
        $custo->name = $data['name'];
        $custo->address = $data['address'];
        $custo->phone_number = $data['phone_number'];
        $custo->day_of_birth = $formattedDate;
        $custo->revenue = $data['revenue'];
        $custo->save();
        return redirect()->route('customer.index')->with('message', 'Sửa nhân viên thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::find($id)->delete();
        return redirect()->route('customer.index');
    }
}

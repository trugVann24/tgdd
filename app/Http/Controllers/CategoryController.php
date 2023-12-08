<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('q');
        $list = Category::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })->paginate(10);
        return view('admin.category.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Category::all();
        return view('admin.category.create', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|unique:categories|max:255',
                'status' => 'required',
            ],
            [
                'name.unique' => 'Tên danh mục đã có ,xin điền tên khác',
                'name.required' => 'Vui lòng điền tên danh mục!',
                'status.required' => 'Vui lòng chọn trạng thái danh mục!',
            ]
        );

        $category = new Category();
        $category->name = $data['name'];
        $category->status = $data['status'] == 'display' ? 1 : 0;
        $category->save();
        return redirect()->route('category.index')->with('message', 'Thêm danh mục thành công');
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
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'status' => 'required',
            ],
            [
                'name.required' => 'Vui lòng điền tên danh mục!',
                'status.required' => 'Vui lòng chọn trạng thái danh mục!',

            ]
        );

        $data = $request->all();
        $category =  Category::find($id);
        $category->name = $data['name'];
        $category->status = $data['status']  == 'display' ? 1 : 0;
        $category->save();
        return redirect()->route('category.index')->with('message', 'sửa danh mục thành công');
    }

    public function destroy(string $id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index');
    }
}

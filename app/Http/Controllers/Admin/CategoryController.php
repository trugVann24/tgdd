<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class CategoryController extends Controller
{


    public function index(Request $request)
    {
        $category = Category::whereNotIn('name', ['admin'])->get();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' =>'required|unique:categories',
            ],
            [
                'name.unique' =>'Tên danh mục đã có ,xin điền tên khác',
                'name.required' =>'Vui lòng điền tên danh mục!',
            ]
        );
         Category::create($validated);
        return to_route('admin.category.index')->with('message', 'Thêm danh mục thành công');
    }
    public function edit(Category $category) : View {

        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate(
            [
                'name' =>'required',
            ],
            [
                'name.required' =>'Vui lòng điền tên danh mục!',
                'status.required' =>'Vui lòng chọn trạng thái danh mục!',

            ]
        );

        $category->update($validated);
        return redirect()->route('admin.category.index')->with('message', 'sửa danh mục thành công');

    }

    public function destroy(Category $category) {
        $category->delete();
        return back()->with('message','Danh mục được xoá thành công');
    }
}

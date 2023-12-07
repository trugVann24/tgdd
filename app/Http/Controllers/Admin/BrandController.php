<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index() : View
    {
        $brand = Brand::whereNotIn('name', ['admin'])->get();
        return view('admin.brand.index', compact('brand'));
    }
    public function create() : View {
        return view('admin.brand.create');
    }


        public function store(Request $request)
        {
            $validated = $request->validate([
                'name' => ['required', 'string'],
                'image' => ['required', 'image'], 
                'description' => ['string'],
            ], [
                'name.required' => 'Thương hiệu là bắt buộc.',
                'name.string' => 'Thương hiệu phải là một chuỗi ký tự.',
                'image.required' => 'Ảnh là bắt buộc.',
                'image.image' => 'Ảnh phải là một file hình ảnh.',
                'description.string' => 'Mô tả phải là một chuỗi ký tự.',
            ]);

            $imagePath = $request->file('image')->store('brand_images', 'public');

            $validated['image'] = $imagePath;
            
            Brand::create($validated);

            return redirect()->route('admin.brand.index')->with('message', 'Thêm Thương hiệu thành công');
        }


    public function edit(Brand $brand) : View {

        return view('admin.brand.edit', compact('brand'));
    }


        public function update(Request $request, Brand $brand)
        {
            $validated = $request->validate([
                'name' => ['required', 'string'],
                'image' => ['image'], 
                'description' => ['string'],
            ], [
                'name.required' => 'Thương hiệu là bắt buộc.',
                'name.string' => 'Thương hiệu phải là một chuỗi ký tự.',
                'image.image' => 'Ảnh phải là một file hình ảnh.',
                'description.string' => 'Mô tả phải là một chuỗi ký tự.',
            ]);

            $brand->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
            ]);

            if ($request->hasFile('image')) {

                $imagePath = $request->file('image')->store('brand_images', 'public');
                $brand->update(['image' => $imagePath]);
            }

    return redirect()->route('admin.brand.index')->with('message', 'Sửa Thương hiệu thành công');
}


    public function destroy(Brand $brand) {
        $brand->delete();
        return back()->with('message','Thương hiệu được xoá thành công');
    }
}

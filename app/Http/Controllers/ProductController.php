<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Product::orderBy('id','DESC')->get();
        $category = Category::pluck('name','id');
        return view('admin.product.index',compact('list','category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Product::all();
        $category = Category::pluck('name','id');
        return view('admin.product.create', compact('list','category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->validate(
            [
                'quantity_instock'=> 'required',
                'description' =>'required',
                'category_id'=>'required',
                'suppliler_id'=>'required',
                'image'=>'required',
                'name' =>'required',
                'status' =>'required',
            ],
            [
               
                'name.required' =>'Vui lòng điền tên danh mục!',
                'status.required' =>'Vui lòng chọn trạng thái danh mục!',
            ]
        );

        $product = new Product();
        $product->name =$data['name'];
        $product->category_id =$data['category_id'];
       // $product->supplier_id =$data['supplier_id'];
        $product->quantity_instock =$data['quantity_instock'];
        $product->description =$data['description'];
        $product->status =$data['status'] == 'display' ? 1 : 0;
        $get_image = $request->file('image');

        // $path = 'public/upload/movie/';

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); // hinhanh1.jpg
            $name_image = current(explode('.', $get_name_image)); //[0]=> hinhanh1.jpg . [1]=> jpg
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('image/', $new_image);
            // File::copy($path.$new_image);
            $product->image = $new_image;
        }
        $product->save();
        return redirect()->route('product.index')->with('message', 'Thêm sản phẩm thành công');
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
        $product = Product::find($id);
        return view('admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate(
            [
                'name' =>'required',
                'status' =>'required',
            ],
            [
                'name.required' =>'Vui lòng điền tên danh mục!',
                'status.required' =>'Vui lòng chọn trạng thái danh mục!',

            ]
        );

        $data = $request->all();
        $product =  Product::find($id);
        $product->name =$data['name'];
        $product->category_id =$data['category_id'];
        $product->supplier_id =$data['supplier_id'];
        $product->quantity_instock =$data['quantity_instock'];
        $product->description =$data['description'];
        $product->status =$data['status'] == 'display' ? 1 : 0;
        $get_image = $request->file('image');

        // $path = 'public/upload/movie/';

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); // hinhanh1.jpg
            $name_image = current(explode('.', $get_name_image)); //[0]=> hinhanh1.jpg . [1]=> jpg
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('image/', $new_image);
            // File::copy($path.$new_image);
            $product->image = $new_image;
        }
        $product->save();
        return redirect()->route('product.index')->with('message', 'sửa danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        product::find($id)->delete();
        return redirect()->route('product.index');
    }
}

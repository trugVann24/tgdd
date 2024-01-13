<x-app-layout>
    {{ __('Sửa sản phẩm') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.product.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="category_id" :value="__('Danh mục')" />
            
                @php
                    $category = \App\Models\Category::all();
                @endphp
            
                <x-select id="category_id" class="block mt-1 text-black w-full" name="category_id" required readonly>
                    @foreach($category as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </x-select> 
            </div>
            <div class="mt-4">
                <x-input-label for="supplier_id" :value="__('Nhà cung cấp')" />
            
                @php
                    $suppliler = \App\Models\Suppliler::all();
                @endphp
            
                <x-select id="supplier_id" class="block mt-1 text-black w-full" name="supplier_id" required readonly>
                    @foreach($suppliler as $suppliler)
                        <option value="{{ $suppliler->id }}" {{ old('supplier_id', $product->supplier_id) == $suppliler->id ? 'selected' : '' }}>
                            {{ $suppliler->name }}
                        </option>
                    @endforeach
                </x-select> 
            </div>

            
            <div class="mt-4">
                <x-input-label for="name" :value="__('Tên sản phẩm')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" 
                value="{{ old('name', $product->name) }}" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div> 

            <div class="mt-4">
                <x-input-label for="quantity_instock" :value="__('Số lượng tồn kho')" />
                <x-text-input id="quantity_instock" class="block mt-1 w-full" type="text" name="quantity_instock" 
                value="{{old('quantity_instock', $product->quantity_instock)}}" required autofocus readonly/>
                <x-input-error :messages="$errors->get('quantity_instock')" class="mt-2" />
            </div> 

            <div class="mt-4">
                <x-input-label for="image" :value="__('Ảnh sản phẩm')" />
                <input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="current_image" :value="__('Ảnh Hiện Tại')" />
                <x-text-input id="current_image" class="block mt-1 w-full" type="text" name="current_image" 
                value="{{ $product->image }}" readonly />
            </div>
            
            <div class="mt-4">
                <x-input-label for="import_price" :value="__('Giá nhập ($)')" />
                <x-text-input id="import_price" class="block mt-1 w-full" type="text" name="import_price" 
                value="{{old('import_price',$product->import_price)}}" required autofocus />
                <x-input-error :messages="$errors->get('import_price')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="sell_price" :value="__('Giá bán ($)')" />
                <x-text-input id="sell_price" class="block mt-1 w-full" type="text" name="sell_price" 
                value="{{old('sell_price', $product->sell_price)}}" required autofocus />
                <x-input-error :messages="$errors->get('sell_price')" class="mt-2" />
            </div> 
            <div class="mt-4">
                <x-input-label for="description" :value="__('Mô tả')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" 
                value="{{old('description', $product->description)}}" required autofocus />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="status" :value="__('Trạng Thái')" />
                <select id="status" name="status" class="block text-black mt-1 w-full" required autofocus >
                    <option  class="" value="1" {{ $product->status === '1' ? 'selected' : '' }}>Còn hàng</option>
                    <option  class="" value="0" {{ $product->status === '0' ? 'selected' : '' }}>Hết hàng</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>
            <x-primary-button class="mt-6">
                {{ __('Sửa sản phẩm') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>

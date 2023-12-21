<x-app-layout>
    {{ __('Thêm sản phẩm') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <x-input-label for="category_id" :value="__('Danh mục sản phẩm')" />
                <x-select id="category_id" class="block mt-1 w-full text-black" name="category_id" required autofocus>
                    <option value="" disabled selected>Chọn danh mục </option>
                    @foreach($category_id as $category_id)
                        <option value="{{ $category_id->id }}" {{ old('category_id') == $category_id->id ? 'selected' : '' }}>
                            {{ $category_id->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>
            <div class="mt-4">
                <x-input-label for="supplier_id" :value="__('nhà cung cấp')" />
                
                <x-select id="supplier_id" class="block mt-1 w-full text-black" name="supplier_id" required autofocus>
                    <option value="" disabled selected>Chọn cung cấp </option>
                    @foreach($supplier_id as $supplier_id)
                        <option value="{{ $supplier_id->id }}" {{ old('supplier_id') == $supplier_id->id ? 'selected' : '' }}>
                            {{ $supplier_id->name }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div class="mt-4">
                <x-input-label for="name" :value="__('Sản phẩm')" />
                <x-select id="name" class="block mt-1 w-full text-black" name="name"  autofocus>
                    <option value="" disabled selected>Chọn sản phẩm </option>
                    @foreach($goodreceivenote as $goodreceivenote)
                        <option value="{{ $goodreceivenote->name }}" {{ old('name') == $goodreceivenote->id ? 'selected' : '' }}>
                            {{ $goodreceivenote->name }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('sản phẩm')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="quantity_instock" :value="__('Số lượng tồn kho')" />
                <x-text-input id="quantity_instock" class="block mt-1 w-full" type="text" name="quantity_instock" :value="old('quantity_instock')" required autofocus />
                <x-input-error :messages="$errors->get('quantity_instock')" class="mt-2" />
            </div> 

            <div class="mt-4">
                <x-input-label for="image" :value="__('Ảnh sản phẩm')" />
                <input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" required />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div> 

            <div class="mt-4">
                <x-input-label for="import_price" :value="__('Giá nhập ($)')" />
                <x-text-input id="import_price" class="block mt-1 w-full" type="text" name="import_price" :value="old('import_price')" required autofocus />
                <x-input-error :messages="$errors->get('import_price')" class="mt-2" />
            </div>


            <div class="mt-4">
                <x-input-label for="sell_price" :value="__('Giá bán ($)')" />
                <x-text-input id="sell_price" class="block mt-1 w-full" type="text" name="sell_price" :value="old('sell_price')" required autofocus />
                <x-input-error :messages="$errors->get('sell_price')" class="mt-2" />
            </div> 

            <div class="mt-4">
                <x-input-label for="description" :value="__('Mô tả')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="status" :value="__('Trạng Thái')" />
                <select id="status" name="status" class="block text-black mt-1 w-full" required autofocus >
                    <option  class="" value="1" {{ old('status') === '1' ? 'selected' : '' }}>Còn hàng</option>
                    <option  class="" value="0" {{ old('status') === '0' ? 'selected' : '' }}>Hết hàng</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>
            <x-primary-button class="mt-6">
                {{ __('Thêm sản phẩm') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>

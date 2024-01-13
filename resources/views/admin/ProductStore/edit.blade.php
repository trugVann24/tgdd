<x-app-layout>
    {{ __('sửa sản phẩm') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.productstore.update', ['productstore' => $productstore->id]) }}">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="productStore_id" :value="__('Danh mục')" />
                <x-select id="productStore_id" class="block mt-1 text-black w-full" name="productStore_id" required readonly>
                    @foreach($product as $product)
                        <option value="{{ $product->id }}" {{ old('productStore_id', $productstore->productStore_id) == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </x-select> 
            </div>
            
            <div class="mt-4">
                <x-input-label for="price" :value="__('Giá ($)')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" 
                value="{{old('price', $productstore->price)}}" required autofocus readonly  />
                <span id="display-price"></span>
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="quantity" :value="__('Số lượng')" />
                <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" 
                value="{{old('quantity',$productstore->quantity)}}"
                    required readonly autofocus />
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Mô tả')" />
                <textarea id="description" class="block mt-1 w-full text-black" name="description" rows="4" required>{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="status" :value="__('Trạng Thái')" />
                <select id="status" name="status" class="block text-black mt-1 w-full" required autofocus >
                    <option  class="" value="1" {{ old('status') === '1' ? 'selected' : '' }}>Còn hàng</option>
                    <option  class="" value="0" {{ old('status') === '0' ? 'selected' : '' }}>hết hàng</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            <x-primary-button class="mt-6">
                {{ __('Thêm sản phẩm') }}
            </x-primary-button>
    </div>
    </form>
    </div>
    <script src="/js/app.js"></script>
</x-app-layout>

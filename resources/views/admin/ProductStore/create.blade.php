<x-app-layout>
    {{ __('Thêm sản phẩm') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.productstore.store') }}">
            @csrf
            <div>
                <x-input-label for="productStore_id" :value="__('Mã sản phẩm')" />
                <x-text-input id="productStore_id" class="block mt-1 w-full" type="text" name="productStore_id" :value="old('productStore_id')"
                    required autofocus />
                <x-input-error :messages="$errors->get('productStore_id')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-select id="productStore_name" class="block mt-1 w-full text-black" name="productStore_name" onchange="updatePriceProductStore()" required autofocus>
                    <option value="" disabled selected>Tên sản phẩm</option>
                    @foreach($product as $product)
                        <option value="{{ $product->id }}" data-sell-price="{{ $product->sell_price }}" {{ old('productStore_name') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
            </x-select>
            </div>
            
            <div>
                <x-input-label for="price" :value="__('Giá ($)')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus readonly  />
                <span id="display-price"></span>
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="quantity" :value="__('Số lượng')" />
                <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" :value="old('quantity')"
                    required autofocus />
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

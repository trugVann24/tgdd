<x-app-layout>
    {{ __('Thêm Phiếu xuất') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.goodDeliveryNote.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <x-input-label for="agent_store_id" :value="__('Địa chỉ cửa hàng')" />
                <x-select id="agent_store_id" class="block mt-1 w-full text-black" name="agent_store_id" required autofocus>
                    <option value="" disabled selected>Chọn địa chỉ cửa hàng </option>
                    @foreach($agent_store_id as $agent_store)
                        @if($agent_store->status ==1)
                            <option value="{{ $agent_store->id }}" {{ old('agent_store_id') == $agent_store->id ? 'selected' : '' }}>
                                {{ $agent_store->address }}
                            </option>
                        @endif
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('đại lí')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="product_id" :value="__('Sản phẩm')" />
                <x-select id="product_id" class="block mt-1 w-full text-black" name="product_id" required autofocus onchange="updatePriceProduct()">
                    <option value="" disabled selected>Chọn sản phẩm</option>
                    @foreach($product_id as $product)
                        @if ($product->status == 1)
                            <option value="{{ $product->id }}" data-sell-price="{{ $product->sell_price }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endif
                    @endforeach
                </x-select>              
            </div>

            <div class="mt-4">
                <x-input-label for="user_id" :value="__('User')" />
            
                <x-select id="user_id" class="block mt-1 w-full text-black" name="user_id" required autofocus>
                    <option value="" disabled selected>User</option>
                    @foreach($user_id as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </x-select>
            
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="delivery_date" :value="__('Ngày xuất')" />
            
                <x-date id="delivery_date" class="block mt-1 w-full text-black" name="delivery_date" required autofocus />
            
                <x-input-error :messages="$errors->get('delivery_date')" class="mt-2" />
            </div>
            
            <div class="mt-4">
                <x-input-label for="quantity" :value="__('Số lượng')" />
                <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" :value="old('quantity')" required autofocus oninput="calculateTotalCost()" />
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            
            <div class="mt-4">
                <x-input-label for="price" :value="__('Giá ($)')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus readonly oninput="calculateTotalCost()" />
                <span id="display-price"></span>
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            
            <div>
                <x-input-label for="total_cost" :value="__('Tổng giá($)')" />
                <x-text-input id="total_cost" class="block mt-1 w-full" type="text" name="total_cost" :value="old('total_cost')" required autofocus readonly />
                <x-input-error :messages="$errors->get('total_cost')" class="mt-2" />
            </div>
            

            <x-primary-button class="mt-6">
                {{ __('Thêm Phiếu xuất') }}
            </x-primary-button>
        </form>
        <script src="/js/app.js"></script>
    </div>
</x-app-layout>

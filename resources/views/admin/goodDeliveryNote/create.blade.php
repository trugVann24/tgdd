<x-app-layout>
    {{ __('Thêm Phiếu xuất') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.goodDeliveryNote.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <x-input-label for="agent_store_id" :value="__('đại lí')" />
                
                <x-select id="agent_store_id" class="block mt-1 w-full text-black" name="agent_store_id" required autofocus>
                    <option value="" disabled selected>Select </option>
                    @foreach($agent_store_id as $agent_store_id)
                        <option value="{{ $agent_store_id->id }}" {{ old('agent_store_id') == $agent_store_id->id ? 'selected' : '' }}>
                            {{ $agent_store_id->address }}
                        </option>
                    @endforeach
                </x-select>
            
                <x-input-error :messages="$errors->get('đại lí')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="product_id" :value="__('Sản phẩm')" />
                
                <x-select id="product_id" class="block mt-1 w-full text-black" name="product_id" required autofocus>
                    <option value="" disabled selected>Select </option>
                    @foreach($product_id as $product_id)
                        <option value="{{ $product_id->id }}" {{ old('product_id') == $product_id->id ? 'selected' : '' }}>
                            {{ $product_id->name }}
                        </option>
                    @endforeach
                </x-select>
                <x-input-error :messages="$errors->get('product_id')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="user_id" :value="__('User')" />
            
                <x-select id="user_id" class="block mt-1 w-full text-black" name="user_id" required autofocus>
                    <option value="" disabled selected>Select</option>
                    @foreach($user_id as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </x-select>
            
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            </div>
            
            <div>
                <x-input-label for="brand_id" :value="__('Thương hiệu')" />
                
                <x-select id="brand_id" class="block mt-1 w-full text-black" name="brand_id" required autofocus>
                    <option value="" disabled selected>Select </option>
                    @foreach($brand_id as $brand_id)
                        <option value="{{ $brand_id->id }}" {{ old('brand_id') == $brand_id->id ? 'selected' : '' }}>
                            {{ $brand_id->name }}
                        </option>
                    @endforeach
                </x-select>
            
                <x-input-error :messages="$errors->get('brand_id')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="delivery_date" :value="__('Ngày xuất')" />
            
                <x-date id="delivery_date" class="block mt-1 w-full text-black" name="delivery_date" required autofocus />
            
                <x-input-error :messages="$errors->get('delivery_date')" class="mt-2" />
            </div>
            
            <div>
                <x-input-label for="quantity" :value="__('Số lượng')" />
                <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" :value="old('quantity')" required autofocus oninput="calculateTotalCost()" />
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="price" :value="__('Giá ($)')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required autofocus oninput="calculateTotalCost()" />
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

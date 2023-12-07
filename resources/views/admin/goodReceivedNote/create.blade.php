<x-app-layout>
    {{ __('Thêm Phiếu Nhập') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.goodReceivedNote.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <x-input-label for="supplier_id" :value="__('nhà cung cấp')" />
                
                <x-select id="supplier_id" class="block mt-1 w-full text-black" name="supplier_id" required autofocus>
                    <option value="" disabled selected>Chọn cung cấp </option>
                    @foreach($supplier_id as $supplier_id)
                        <option value="{{ $supplier_id->id }}" {{ old('supplier_id') == $supplier_id->id ? 'selected' : '' }}>
                            {{ $supplier_id->name }}
                        </option>
                    @endforeach
                </x-select>
            
                <x-input-error :messages="$errors->get('đại lí')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="product_id" :value="__('Sản phẩm')" />
                
                <x-select id="product_id" class="block mt-1 w-full text-black" name="product_id" required autofocus>
                    <option value="" disabled selected>Chọn sản phẩm </option>
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
                    <option value="" disabled selected>Chọn User</option>
                    @foreach($user_id as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </x-select>
            
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            </div>
            
        
            <div>
                <x-input-label for="received_date" :value="__('Ngày nhập')" />
            
                <x-date id="received_date" class="block mt-1 w-full text-black" name="received_date" required autofocus />
            
                <x-input-error :messages="$errors->get('received_date')" class="mt-2" />
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

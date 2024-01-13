<x-app-layout>
    {{ __('Sửa hoá đơn') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.invoicedetail.update', $invoicedetail->id) }}">
            @csrf
            @method('PUT')           
            <div>
                <x-input-label for="code_bill" :value="__('Mã hoá đơn')" />
                <x-text-input id="code_bill" class="block mt-1 w-full" type="text" name="code_bill" 
                value="{{old('code_bill',$invoicedetail->code_bill)}}"
                    required autofocus />
                <x-input-error :messages="$errors->get('code_bill')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="productStore_name" :value="__('Sản phẩm')" />
                <x-select id="productStore_name" class="block mt-1 w-full text-black" name="productStore_name" required autofocus onchange="updatePriceProductStore()">
                    <option value="" disabled selected>Chọn sản phẩm</option>
                    @foreach($product as $product)
                        @if ($product->status == 1)
                            <option value="{{ $product->id }}" data-sell-price="{{ $product->sell_price }}" {{ old('productStore_name', $invoicedetail->productStore_name) == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endif
                    @endforeach
                </x-select>              
            </div>

            <div class="mt-4">
                <x-input-label for="customer_id" :value="__('Mã khách hàng')" />
                
                <x-select id="customer_id" class="block mt-1 w-full text-black" name="customer_id" required autofocus>
                    <option value="" disabled selected>Mã khách hàng</option>
                    @foreach($customer_id as $customer)
                        <option value="{{ $customer->customer_id }}" {{ old('customer_id', $invoicedetail->customer_id) == $customer->customer_id ? 'selected' : '' }}>
                            {{ $customer->customer_id }}
                        </option>
                    @endforeach
                </x-select>
            </div>

             <div class="mt-4">
                <x-input-label for="quantity" :value="__('Số lượng')" />
                <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity" 
                value="{{old('quantity', $invoicedetail->quantity)}}" required autofocus oninput="calculateTotalMoney()" />
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            
            <div class="mt-4">
                <x-input-label for="price" :value="__('Giá ($)')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" 
                value="{{old('price', $invoicedetail->price)}}" required autofocus readonly oninput="calculateTotalMoney()" />
                <span id="display-price"></span>
            </div>

            <div class="mt-4">
                <x-input-label for="discount" :value="__('Giảm Giá ($)')" />
                <x-text-input id="discount" class="block mt-1 w-full" type="text" name="discount" 
                value="{{old('discount', $invoicedetail->discount)}}" required autofocus   oninput="calculateTotalMoney()"/>
            </div>

            <div class="mt-4">
                <x-input-label for="total_money" :value="__('Tổng tiền($)')" />
                <x-text-input id="total_money" class="block mt-1 w-full" type="text" name="total_money" 
                value="{{old('total_money', $invoicedetail->total_money)}}" required autofocus readonly />
                <x-input-error :messages="$errors->get('total_money')" class="mt-2" />
            </div>


            <x-primary-button class="mt-6">
                {{ __('Sửa') }}
            </x-primary-button>
    </div>
    </form>
    </div>
</x-app-layout>

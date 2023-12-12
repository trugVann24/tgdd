<x-app-layout>
    {{ __('Sửa Phiếu xuất') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.goodDeliveryNote.update', ['goodDeliveryNote' => $goodDeliveryNote->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="agent_store_id" :value="__('Đại lí')" />
            
                @php
                    $AgentStores = \App\Models\AgentStore::all();
                @endphp
            
                <x-select id="agent_store_id" class="block mt-1 text-black w-full" name="agent_store_id" required readonly>
                    <option value="" disabled>Select</option>
                    @foreach($AgentStores as $agentStore)
                        <option value="{{ $agentStore->id }}" {{ old('agent_store_id', $goodDeliveryNote->agent_store_id) == $agentStore->address ? 'selected' : '' }}>
                            {{ $agentStore->address }}
                        </option>
                    @endforeach
                </x-select> 
            
                <x-input-error :messages="$errors->get('agent_store_id')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="product_id" :value="__('Sản phẩm')" />
            
                @php
                    $Products = \App\Models\Product::all();
                @endphp
            
                <x-select id="product_id" class="block mt-1 text-black w-full" name="product_id" required readonly>
                    <option value="" disabled>Select</option>
                    @foreach($Products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id', $goodDeliveryNote->product_id) == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </x-select> 
            
                <x-input-error :messages="$errors->get('product_id')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="user_id" :value="__('User')" />
            
                @php
                    $Users = \App\Models\User::all();
                @endphp
            
                <x-select id="user_id" class="block mt-1 text-black w-full" name="user_id" required readonly>
                    <option value="" disabled>Select</option>
                    @foreach($Users as $User)
                        <option value="{{ $User->id }}" {{ old('user_id', $goodDeliveryNote->user_id) == $User->id ? 'selected' : '' }}>
                            {{ $User->name }}
                        </option>
                    @endforeach
                </x-select> 
            
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="brand_id" :value="__('Thương hiệu')" />
            
                @php
                    $brands = \App\Models\Brand::all();
                @endphp
            
                <x-select id="brand_id" class="block mt-1 text-black w-full" name="brand_id" required readonly>
                    <option value="" disabled>Select</option>
                    @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id', $goodDeliveryNote->brand_id) == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                    @endforeach
                </x-select>
            
                <x-input-error :messages="$errors->get('brand_id')" class="mt-2" />
            </div>
            
            

            <div>
                <x-input-label for="delivery_date" :value="__('Ngày xuất')" />
            
                <x-date id="delivery_date" class="block mt-1 w-full text-black" name="delivery_date" 
                value="{{ old('delivery_date', $goodDeliveryNote->delivery_date) }}" required autofocus />
            
                <x-input-error :messages="$errors->get('delivery_date')" class="mt-2" />
            </div>
            
            <div>
                <x-input-label for="quantity" :value="__('Số lượng')" />
                <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" 
                value="{{ old('quantity', $goodDeliveryNote->quantity) }}" required autofocus oninput="calculateTotalCost()" />
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="price" :value="__('Giá ($)')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" 
                value="{{ old('price', $goodDeliveryNote->price) }}" required autofocus oninput="calculateTotalCost()" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="total_cost" :value="__('Tổng giá($)')" />
                <x-text-input id="total_cost" class="block mt-1 w-full" type="text" name="total_cost" 
                value="{{ old('total_cost', $goodDeliveryNote->total_cost) }}" required autofocus readonly />
                <x-input-error :messages="$errors->get('total_cost')" class="mt-2" />
            </div>
            

            <x-primary-button class="mt-6">
                {{ __('Sửa Phiếu xuất') }}
            </x-primary-button>
        </form>
        <script src="/js/app.js"></script>
    </div>
</x-app-layout>

<x-app-layout>
    {{ __('Sửa Phiếu nhập') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.goodReceivedNote.update', ['goodReceivedNote' => $goodReceivedNote->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="supplier_id" :value="__('Nhà cung cấp')" />
            
                @php
                    $suppliler = \App\Models\Suppliler::all();
                @endphp
            
                <x-select id="supplier_id" class="block mt-1 text-black w-full" name="supplier_id" required readonly>
                    <option value="" disabled>Select</option>
                    @foreach($suppliler as $suppliler)
                        <option value="{{ $suppliler->id }}" {{ old('supplier_id', $goodReceivedNote->supplier_id) == $suppliler->name ? 'selected' : '' }}>
                            {{ $suppliler->name }}
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
                        <option value="{{ $product->id }}" {{ old('product_id', $goodReceivedNote->product_id) == $product->id ? 'selected' : '' }}>
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
                        <option value="{{ $User->id }}" {{ old('user_id', $goodReceivedNote->user_id) == $User->id ? 'selected' : '' }}>
                            {{ $User->name }}
                        </option>
                    @endforeach
                </x-select> 
            
                <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="received_date" :value="__('Ngày nhập')" />
            
                <x-date id="received_date" class="block mt-1 w-full text-black" name="received_date" 
                value="{{ old('received_date', $goodReceivedNote->received_date) }}" required autofocus />
            
                <x-input-error :messages="$errors->get('received_date')" class="mt-2" />
            </div>
            
            <div>
                <x-input-label for="quantity" :value="__('Số lượng')" />
                <x-text-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" 
                value="{{ old('quantity', $goodReceivedNote->quantity) }}" required autofocus oninput="calculateTotalCost()" />
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="price" :value="__('Giá ($)')" />
                <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" 
                value="{{ old('price', $goodReceivedNote->price) }}" required autofocus oninput="calculateTotalCost()" />
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="total_cost" :value="__('Tổng giá($)')" />
                <x-text-input id="total_cost" class="block mt-1 w-full" type="text" name="total_cost" 
                value="{{ old('total_cost', $goodReceivedNote->total_cost) }}" required autofocus readonly />
                <x-input-error :messages="$errors->get('total_cost')" class="mt-2" />
            </div>
            

            <x-primary-button class="mt-6">
                {{ __('Sửa Phiếu nhập') }}
            </x-primary-button>
        </form>
        <script src="/js/app.js"></script>
    </div>
</x-app-layout>

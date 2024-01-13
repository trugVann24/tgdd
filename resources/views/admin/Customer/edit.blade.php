<x-app-layout>
    {{ __('Sửa thông tin khách hàng') }}
    <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
        <div class="w-full mx-auto p-5 rounded-md">
            <form method="POST" action="{{ route('admin.customer.update', $customer->customer_id) }}">
                @method('PUT')
                @csrf
                <div>
                    <x-input-label for="customer_id" :value="__('Mã khách hàng')" />
                    <x-text-input id="customer_id" class="block mt-1 w-full" type="text" name="customer_id" 
                    value="{{old('customer_id', $customer->customer_id)}}"
                        required autofocus />
                    <x-input-error :messages="$errors->get('customer_id')" class="mt-2" />
                </div>
    
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Tên khách hàng')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" 
                    value="{{old('name', $customer->name)}}"
                        required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
    
                <div class="mt-4">
                    <x-input-label for="address" :value="__('Địa chỉ')" />
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" 
                    value="{{old('address', $customer->address)}}"
                        required autofocus />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
    
                <div class="mt-4">
                    <x-input-label for="phone_number" :value="__('Số điện thoại')" />
                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" 
                    value="{{old('phone_number', $customer->phone_number)}}"
                        required autofocus />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>
    
                <div class="mt-4">
                    <x-input-label for="date_of_birth" :value="__('Ngày sinh')" />
                    <x-date id="date_of_birth" class="block mt-1 w-full text-black"
                    value="{{old('date_of_birth', $customer->date_of_birth)}}"
                    name="date_of_birth" required autofocus />
                    <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="revenue" :value="__('Doanh số')" />
                    <x-text-input id="revenue" class="block mt-1 w-full" type="text" name="revenue" 
                    value="{{old('revenue', $customer->revenue)}}"
                        required autofocus readonly />
                    <x-input-error :messages="$errors->get('revenue')" class="mt-2" />
                </div>
                
    
                <x-primary-button class="mt-6">
                    {{ __('Sửa thông tin khách hàng') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

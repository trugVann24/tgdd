<x-app-layout>
    {{ __('Thêm hoá đơn') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.bill.store') }}">
            @csrf
            <div>
                <x-input-label for="bill_code" :value="__('Mã hoá đơn')" />
                <x-text-input id="bill_code" class="block mt-1 w-full" type="text" name="bill_code" :value="old('bill_code')"
                    required autofocus />
                <x-input-error :messages="$errors->get('bill_code')" class="mt-2" />
            </div>

           
            <div>
                <x-input-label for="staff_code" :value="__('Mã nhân viên')" />
                
                <x-select id="staff_code" class="block mt-1 w-full text-black" name="staff_code" required autofocus>
                    <option value="" disabled selected>Mã nhân viên</option>
                    @foreach($staff_code as $staff_code)
                        <option value="{{ $staff_code->staff_code }}" {{ old('staff_code') == $staff_code->staff_code ? 'selected' : '' }}>
                            {{ $staff_code->staff_code }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div>
                <x-input-label for="customer_id" :value="__('Mã khách hàng')" />
                
                <x-select id="customer_id" class="block mt-1 w-full text-black" name="customer_id" required autofocus>
                    <option value="" disabled selected>Mã khách hàng</option>
                    @foreach($customer_id as $customer_id)
                        <option value="{{ $customer_id->customer_id }}" {{ old('customer_id') == $customer_id->customer_id ? 'selected' : '' }}>
                            {{ $customer_id->customer_id }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div class="mt-4">
                <x-input-label for="sale_date" :value="__('Ngày mua')" />
                <x-date id="sale_date" class="block mt-1 w-full text-black" name="sale_date" required autofocus />
                <x-input-error :messages="$errors->get('sale_date')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="total_money" :value="__('Tổng tiền ($)')" />
                <x-text-input id="total_money" class="block mt-1 w-full" type="text" name="total_money" :value="old('total_money')"
                    required autofocus />
                <x-input-error :messages="$errors->get('total_money')" class="mt-2" />
            </div>



            <x-primary-button class="mt-6">
                {{ __('Thêm hoá đơn') }}
            </x-primary-button>
    </div>
    </form>
    </div>
</x-app-layout>

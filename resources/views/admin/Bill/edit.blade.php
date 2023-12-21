<x-app-layout>
    {{ __('Sửa hoá đơn') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.bill.update', $bill->bill_code) }}">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="bill_code" :value="__('Mã hoá đơn')" />
                <x-text-input id="bill_code" class="block mt-1 w-full" type="text" name="bill_code" 
                value="{{old('bill_code',$bill->bill_code)}}"
                    required readonly autofocus />
                <x-input-error :messages="$errors->get('bill_code')" class="mt-2" />
            </div>

           
            <div>
                <x-input-label for="staff_code" :value="__('Mã nhân viên')" />
                
                <x-select id="staff_code" class="block mt-1 w-full text-black" name="staff_code" required autofocus>
                    <option value="{{old('staff_code',$bill->staff_code)}}" disabled selected>Mã nhân viên</option>
                    @foreach($staff as $staff)
                        <option value="{{ $staff->staff_code }}" {{ old('staff_code',$bill->staff_code) == $staff->staff_code ? 'selected' : '' }}>
                            {{ $staff->staff_code }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div>
                <x-input-label for="customer_id" :value="__('Mã khách hàng')" />
                
                <x-select id="customer_id" class="block mt-1 text-black w-full" name="customer_id" required readonly>
                    <option value="" disabled>Select</option>
                    @foreach($customer as $customer)
                        <option value="{{ $customer->customer_id }}" {{ old('customer_id', $bill->customer_id) == $customer->customer_id ? 'selected' : '' }}>
                            {{ $customer->customer_id }}
                        </option>
                    @endforeach
                </x-select> 
            </div>

            <div class="mt-4">
                <x-input-label for="sale_date" :value="__('Ngày mua')" />
                <x-date id="sale_date" class="block mt-1 w-full text-black" name="sale_date"
                value="{{old('sale_date',$bill->sale_date)}}" required autofocus />
                <x-input-error :messages="$errors->get('sale_date')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="total_money" :value="__('Tổng tiền ($)')" />
                <x-text-input id="total_money" class="block mt-1 w-full" type="text" name="total_money" 
                value="{{old('total_money', $bill->total_money)}}"
                    required autofocus />
                <x-input-error :messages="$errors->get('total_money')" class="mt-2" />
            </div>



            <x-primary-button class="mt-6">
                {{ __('Sửa hoá đơn') }}
            </x-primary-button>
    </div>
    </form>
    </div>
</x-app-layout>

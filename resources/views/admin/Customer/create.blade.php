<x-app-layout>
    {{ __('Thêm Khách hàng') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.customer.store') }}">
            @csrf
            <div>
                <x-input-label for="customer_id" :value="__('Mã Khách hàng')" />
                <x-text-input id="customer_id" class="block mt-1 w-full" type="text" name="customer_id" :value="old('customer_id')"
                    required autofocus />
                <x-input-error :messages="$errors->get('customer_id')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="name" :value="__('Tên Khách hàng')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="address" :value="__('Địa chỉ')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    required autofocus />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="phone_number" :value="__('Số điện thoại')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')"
                    required autofocus />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="date_of_birth" :value="__('Ngày sinh')" />
                <x-date id="date_of_birth" class="block mt-1 w-full text-black" name="date_of_birth" required autofocus />
                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="revenue" :value="__('Doanh số ($)')" />
                <x-text-input id="revenue" class="block mt-1 w-full" type="text" name="revenue" :value="old('revenue')"
                    required autofocus readonly />
                <x-input-error :messages="$errors->get('revenue')" class="mt-2" />
            </div>

            <x-primary-button class="mt-6">
                {{ __('Thêm Khách hàng') }}
            </x-primary-button>
    </div>
    </form>
    </div>
</x-app-layout>

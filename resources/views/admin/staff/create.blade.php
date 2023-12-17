<x-app-layout>
    {{ __('Thêm Nhân Viên') }}
    <div class="w-80 mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('staff.store') }}">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Tên Nhân Viên')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="address" :value="__('Địa chỉ')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    required autofocus />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <div>

            <div>
                <x-input-label for="phone_number" :value="__('Số điện thoại')" />
                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="old('phone_number')"
                    required autofocus />
                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="status" :value="__('Trạng thái')" />
                <select id="status" name="status" class="block mt-1 w-full bg-gray-900 text-white border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Hoạt động</option>
                    <option value="1" {{ old('status') == '1' || !old('status') ? 'selected' : '' }}>Ngưng hoạt động</option>
                    <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Nghỉ phép</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            <x-primary-button class="mt-6 ">
                {{ __('Thêm Nhân viên') }}
            </x-primary-button>
    </div>
    </form>
    </div>
</x-app-layout>

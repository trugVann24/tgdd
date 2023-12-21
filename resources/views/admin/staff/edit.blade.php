<x-app-layout>
    {{ __('Sửa thông tin nhân viên') }}
    <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
        <div class="w-full mx-auto p-5 rounded-md">
            <form method="POST" action="{{ route('admin.staff.update', $staff->staff_code) }}">
                @method('PUT')
                @csrf
                <div>
                    <x-input-label for="staff_code" :value="__('Mã nhân viên')" />
                    <x-text-input id="staff_code" class="block mt-1 w-full" type="text" name="staff_code" 
                    value="{{old('staff_code', $staff->staff_code)}}"
                        required autofocus />
                    <x-input-error :messages="$errors->get('staff_code')" class="mt-2" />
                </div>
    
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Tên nhân viên')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" 
                    value="{{old('name', $staff->name)}}"
                        required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
    
                <div class="mt-4">
                    <x-input-label for="address" :value="__('Địa chỉ')" />
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" 
                    value="{{old('address', $staff->address)}}"
                        required autofocus />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
    
                <div class="mt-4">
                    <x-input-label for="phone_number" :value="__('Số điện thoại')" />
                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" 
                    value="{{old('phone_number', $staff->phone_number)}}"
                        required autofocus />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>
    
                <div class="mt-4">
                    <x-input-label for="day_in_work" :value="__('Ngày vào làm')" />
                    <x-date id="day_in_work" class="block mt-1 w-full text-black"
                    value="{{old('day_in_work', $staff->day_in_work)}}"
                    name="day_in_work" required autofocus />
                    <x-input-error :messages="$errors->get('day_in_work')" class="mt-2" />
                </div>
    
                <div class="mt-4">
                    <x-input-label for="status" :value="__('Trạng Thái')" />
                    <select id="status" name="status" class="block text-black mt-1 w-full" required autofocus >
                        <option  value="1" {{ $staff->status == '1' ? 'selected' : '' }}>Còn làm </option>
                        <option  value="0" {{ $staff->status == '0' ? 'selected' : '' }}>Đã nghỉ làm</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
    
                <x-primary-button class="mt-6">
                    {{ __('Sửa danh mục') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

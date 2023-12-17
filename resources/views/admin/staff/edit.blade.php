<x-app-layout>
    {{ __('Sửa Nhân viên') }}
    <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
        <div class="w-80 mx-auto p-5 rounded-md">
            <form method="POST" action="{{ route('staff.update', $staf->id) }}">
                @method('PUT')
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Tên nhà cung cấp')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        value="{{ old('name', $staf->name) }}" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="address" :value="__('Địa chỉ')" />
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                        value="{{ old('address', $staf->address) }}" required autofocus />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="phone_number" :value="__('Số điện thoại')" />
                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                        value="{{ old('phone_number', $staf->phone_number) }}" required autofocus />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="status" :value="__('Trạng thái')" />
                    <select id="status" name="status" class="block mt-1 w-full bg-gray-900 text-white border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="{{$staf->status}}" {{ isset($staf) && $staf->status == '0' ? 'selected' : '' }}>Hoạt động</option>
                    <option value="{{$staf->status}}" {{ isset($staf) && $staf->status == '1' ? 'selected' : '' }}>Ngưng hoạt động</option>
                    <option value="{{$staf->status}}" {{ isset($staf) && $staf->status == '2' ? 'selected' : '' }}>Nghỉ việc</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
             
                <x-primary-button class="mt-6">
                    {{ __('Sửa nhân viên') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

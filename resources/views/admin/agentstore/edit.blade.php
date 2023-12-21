<x-app-layout>
    {{ __('Sửa địa chỉ đại lí') }}
    <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
        <div class="w-full mx-auto p-5 rounded-md">
            <form method="POST" action="{{ route('admin.agentstore.update', $agentstore->id) }}">
                @method('PUT')
                @csrf
                <div>
                    <x-input-label for="address" :value="__('Tên Đại Lý')" />
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                        value="{{ old('address', $agentstore->address) }}" required autofocus />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="status" :value="__('Trạng Thái')" />
                    <select id="status" name="status" class="block mt-1 w-full text-black" required autofocus>
                        <option  value="1" {{ $agentstore->status == '1' ? 'selected' : '' }}>Hoạt động</option>
                        <option  value="0" {{ $agentstore->status == '0' ? 'selected' : '' }}>Ngưng hoạt động</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
                
                <x-primary-button class="mt-6">
                    {{ __('Sửa Đại Lý') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

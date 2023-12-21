<x-app-layout>
    {{ __('Thêm Đại lí') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.agentstore.store') }}">
            @csrf
            <!-- Name Permission -->
            <div>
                <x-input-label for="address" :value="__('Địa chỉ đại lí')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    required autofocus />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="status" :value="__('Trạng Thái')" />
                <select id="status" name="status" class="block mt-1 text-black w-full" required autofocus >
                    <option  class="" value="1" {{ old('status') === '1' ? 'selected' : '' }}>Hoạt động</option>
                    <option  class="" value="0" {{ old('status') === '0' ? 'selected' : '' }}>Ngưng hoạt động</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>
            

            <x-primary-button class="mt-6">
                {{ __('Thêm Đại lí') }}
            </x-primary-button>
    </div>
    </form>
    </div>
</x-app-layout>

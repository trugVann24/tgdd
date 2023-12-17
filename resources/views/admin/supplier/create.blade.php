<x-app-layout>
    {{ __('Thêm Nhà cung cấp') }}
    <div class="w-80 mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('supplier.store') }}">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Tên Nhà cung cấp')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Emal')" />
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>

            <div>
                <x-input-label for="phone" :value="__('Số điện thoại')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                    required autofocus />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="address" :value="__('Đia chỉ')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    required autofocus />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <x-primary-button class="mt-6">
                {{ __('Thêm Nhà Cung Câp') }}
            </x-primary-button>
    </div>
    </form>
    </div>
</x-app-layout>

<x-app-layout>
    {{ __('Sửa Category') }}
    <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
        <div class="w-80 mx-auto p-5 rounded-md">
            <form method="POST" action="{{ route('supplier.update', $suppliler->id) }}">
                @method('PUT')
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Tên nhà cung cấp')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        value="{{ old('name', $suppliler->name) }}" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                        value="{{ old('email', $suppliler->email) }}" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="phone" :value="__('Phone')" />
                    <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                        value="{{ old('phone', $suppliler->phone) }}" required autofocus />
                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="address" :value="__('Địa chỉ')" />
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                        value="{{ old('address', $suppliler->address) }}" required autofocus />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
             
                <x-primary-button class="mt-6">
                    {{ __('Sửa nhà cung cấp') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    {{ __('Thêm Thương hiệu') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <x-input-label for="name" :value="__('Tên Thương hiệu')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="image" :value="__('Ảnh Thương hiệu')" />
                <input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" required />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Mô tả Thương hiệu')" />
                <textarea id="description" class="block mt-1 w-full text-black" name="description" rows="4" required>{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            

            <x-primary-button class="mt-6">
                {{ __('Thêm Thương hiệu') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>

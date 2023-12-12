<x-app-layout>
    {{ __('Sửa Thương hiệu') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.brand.update', ['brand' => $brand->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <x-input-label for="name" :value="__('Tên Thương hiệu')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" 
                 value="{{ old('name', $brand->name) }}" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="image" :value="__('Ảnh Thương hiệu')" />
                <input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="current_image" :value="__('Tên Ảnh Hiện Tại')" />
                <x-text-input id="current_image" class="block mt-1 w-full" type="text" name="current_image" value="{{ $brand->image }}" readonly />
            </div>

            <div class="mt-4">
                <x-input-label for="description" :value="__('Mô tả Thương hiệu')" />
                <textarea id="description" class="block mt-1 w-full text-black" name="description" rows="4" required>{{ old('description', $brand->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            
            <x-primary-button class="mt-6">
                {{ __('Sửa Thương hiệu') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>

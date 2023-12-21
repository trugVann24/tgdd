<x-app-layout>
    {{ __('Sửa Category') }}
    <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
        <div class="w-full mx-auto p-5 rounded-md">
            <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
                @method('PUT')
                @csrf
                <!-- Name category -->
                <div>
                    <x-input-label for="name" :value="__('Tên category')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        value="{{ old('name', $category->name) }}" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <x-primary-button class="mt-6">
                    {{ __('Sửa danh mục') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

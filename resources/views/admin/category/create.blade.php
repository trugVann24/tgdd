<x-app-layout>
    {{ __('Thêm Danh mục') }}
    <div class="w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.category.store') }}">
            @csrf
            <div>
                <x-input-label for="name" :value="__('Tên Category')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <x-primary-button class="mt-6">
                {{ __('Thêm danh mục') }}
            </x-primary-button>
    </div>
    </form>
    </div>
</x-app-layout>

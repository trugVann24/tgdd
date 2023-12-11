<x-app-layout>
<<<<<<< HEAD
    {{ __('Thêm Danh Mục') }}
    <div class="mt-5 w-full mx-auto p-5 rounded-md border dark:border-gray-700">
=======
    {{ __('Thêm Category') }}
    <div class="w-80 mx-auto p-5 rounded-md border dark:border-gray-700">
>>>>>>> 8033170498f0a1addd585841d194691c30656de2
        <form method="POST" action="{{ route('category.store') }}">
            @csrf
            <!-- Name Permission -->
            <div>
<<<<<<< HEAD
                <x-input-label for="name" :value="__('Tên Danh Mục')" />
=======
                <x-input-label for="name" :value="__('Tên Category')" />
>>>>>>> 8033170498f0a1addd585841d194691c30656de2
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="status" :value="__('Trạng Thái')" />
                <select id="status" name="status" class="block mt-1 w-full" required autofocus style = "background: black">
                    <option style = "background: black" class="" value="display" {{ old('status') === 'display' ? 'selected' : '' }}>Hiển thị</option>
                    <option style = "background: black" class="" value="hide" {{ old('status') === 'hide' ? 'selected' : '' }}>Không hiển thị</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            <x-primary-button class="mt-6">
<<<<<<< HEAD
                {{ __('Thêm Danh Mục') }}
=======
                {{ __('Thêm category') }}
>>>>>>> 8033170498f0a1addd585841d194691c30656de2
            </x-primary-button>
    </div>
    </form>
    </div>
</x-app-layout>

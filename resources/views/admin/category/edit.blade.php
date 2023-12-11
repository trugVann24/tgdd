<x-app-layout>
<<<<<<< HEAD
    {{ __('Sửa Danh Mục') }}
=======
    {{ __('Sửa Category') }}
>>>>>>> 8033170498f0a1addd585841d194691c30656de2
    <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
        <div class="w-80 mx-auto p-5 rounded-md">
            <form method="POST" action="{{ route('category.update', $category->id) }}">
                @method('PUT')
                @csrf
                <!-- Name category -->
                <div>
<<<<<<< HEAD
                    <x-input-label for="name" :value="__('Tên Danh Mục')" />
=======
                    <x-input-label for="name" :value="__('Tên category')" />
>>>>>>> 8033170498f0a1addd585841d194691c30656de2
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        value="{{ old('name', $category->name) }}" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="status" :value="__('Trạng Thái')" />
                    <select id="status" name="status" class="block mt-1 w-full" required autofocus
                        style="background: black">
                        <option style="background: black" value="display"
                            {{ old('status', $category->status) === 'display' ? 'selected' : '' }}>Hiển thị</option>
                        <option style="background: black" value="hide"
                            {{ old('status', $category->status) === 'hide' ? 'selected' : '' }}>Không hiển thị</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
                <x-primary-button class="mt-6">
                    {{ __('Sửa category') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

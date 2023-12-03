<x-app-layout>
    {{__('Thêm permission')}}
    <div class="w-80 mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('admin.permissions.store') }}">
            @csrf
            <!-- Name Permission -->
            <div>
                <x-input-label for="name" :value="__('Tên Permission')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

                <x-primary-button class="mt-6">
                    {{ __('Thêm permission') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

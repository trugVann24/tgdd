<x-app-layout>
    {{ __('Sửa permission') }}
    <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
        <div class="w-80 mx-auto p-5 rounded-md">
            <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
                @method('PUT')
                @csrf
                <!-- Name Permission -->
                <div>
                    <x-input-label for="name" :value="__('Tên Permission')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        value="{{ $permission->name }}" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <x-primary-button class="mt-6">
                    {{ __('Sửa permission') }}
                </x-primary-button>
            </form>
        </div>
    </div>
    <div class="p-5">
        <div class="dark:bg-gray-900 p-4 rounded-md">
            <h3 class="text-base dark:text-white">Role </h3>
            <div class="">
                @if ($permission->roles)
                    @foreach ($permission->roles as $permission_role)
                        <span class="dark:text-white text-xs py-2 px-1">{{ $permission_role->name }},</span>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
            <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                    @foreach ($roles as $role)
                        <div class="flex items-center">
                            <input type="checkbox" name="roles[]" id="role_{{ $role->id }}"
                                value="{{ $role->id }}"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                                {{ $permission->roles->contains($role) ? 'checked' : '' }}>
                            <label for="role_{{ $role->id }}"
                                class="ml-2 text-sm text-gray-600 dark:text-white">{{ $role->name }}</label>
                        </div>
                    @endforeach
                </div>
                <x-primary-button class="mt-4">
                    {{ __('Cập nhật role') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

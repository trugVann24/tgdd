    <x-app-layout>
        {{ __('Sửa role') }}
        <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
            <div class="w-80 mx-auto p-5 rounded-md">
                <form method="POST" action="{{ route('admin.roles.update', $role->id) }}">
                    @method('PUT')
                    @csrf
                    <!-- Name Role -->
                    <div>
                        <x-input-label for="name" :value="__('Tên role')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                            value="{{ $role->name }}" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <x-primary-button class="mt-6">
                        {{ __('Sửa role') }}
                    </x-primary-button>
                </form>
            </div>
        </div>
        <div class="p-5">
            <div class="dark:bg-gray-900 p-4 rounded-md">
                <h3 class="text-base dark:text-white">Role Permissions</h3>
                <div class="">
                    @if ($role->permissions)
                        @foreach ($role->permissions as $role_permission)
                            <span class="dark:text-white text-xs py-2 px-1">{{ $role_permission->name }},</span>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
                <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                        @foreach ($permissions as $permission)
                            <div class="flex items-center">
                                <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}"
                                    value="{{ $permission->id }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                                    {{ $role->permissions->contains($permission) ? 'checked' : '' }}>
                                <label for="permission_{{ $permission->id }}"
                                    class="ml-2 text-sm text-gray-600 dark:text-white">{{ $permission->name }}</label>
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

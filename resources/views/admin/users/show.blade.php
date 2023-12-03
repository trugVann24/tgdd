<x-app-layout>
    {{ __('Thông tin phân quyền tài khoản') }}
    <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
        <div class="text-sm dark:text-gray-400">
            <span class="block my-2">Tên tài khoản: {{$user->name}}</span>
            <span class="block my-2">Email: {{$user->email}}</span>
        </div>
    </div>
    <div class="mt-2">
        <div class="dark:bg-gray-900 p-4 rounded-md">
            <h3 class="text-sm dark:text-white">Role Permissions</h3>
            <div class="">
                @if ($user->roles)
                    @foreach ($user->roles as $user_roles)
                        <span class="dark:text-white text-xs py-2 px-1">{{ $user_roles->name }},</span>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
            <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                    @foreach ($roles as $role)
                    <div class="flex items-center">
                        <input type="checkbox" name="roles[]" id="role_{{ $role->id }}"
                            value="{{ $role->id }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                            {{ $user->roles->contains($role) ? 'checked' : '' }}>
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
    <div class="mt-2">
        <div class="dark:bg-gray-900 p-4 rounded-md">
            <h3 class="text-sm dark:text-white">Role Permissions</h3>
            <div class="">
                @if ($user->permissions)
                    @foreach ($user->permissions as $user_permission)
                        <span class="dark:text-white text-xs py-2 px-1">{{ $user_permission->name }},</span>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
            <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                    @foreach ($permissions as $permission)
                    <div class="flex items-center">
                        <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}"
                            value="{{ $permission->id }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                            {{ $user->permissions->contains($permission) ? 'checked' : '' }}>
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

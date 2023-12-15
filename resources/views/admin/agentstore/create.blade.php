<x-app-layout>
    {{ __('Thêm AgentStore') }}
    <div class="w-80 mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('agentstore.store') }}">
            @csrf
            <!-- Name Permission -->
            <div>
                <x-input-label for="address" :value="__('Tên AgentStore')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    required autofocus />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            {{-- <div>
                <x-input-label for="status" :value="__('Trạng Thái')" />
                <select id="status" name="status" class="block mt-1 w-full" required autofocus style = "background: black">
                    <option style = "background: black" class="" value="display" {{ old('status') === 'display' ? 'selected' : '' }}>Hiển thị</option>
                    <option style = "background: black" class="" value="hide" {{ old('status') === 'hide' ? 'selected' : '' }}>Không hiển thị</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div> --}}

            <x-primary-button class="mt-6">
                {{ __('Thêm AgentStore') }}
            </x-primary-button>
    </div>
    </form>
    </div>
</x-app-layout>

<x-app-layout>
    {{ __('Sửa khách hàng') }}
    <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
        <div class="w-80 mx-auto p-5 rounded-md">
            <form method="POST" action="{{ route('customer.update', $custo->id) }}">
                @method('PUT')
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Tên nhà cung cấp')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        value="{{ old('name', $custo->name) }}" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="address" :value="__('Địa chỉ')" />
                    <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                        value="{{ old('address', $custo->address) }}" required autofocus />
                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="phone_number" :value="__('Số điện thoại')" />
                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                        value="{{ old('phone_number', $custo->phone_number) }}" required autofocus />
                    <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="phone_number" :value="__('Ngày sinh')" />
                    <input
                        type="text"
                        id="day_of_birth"
                        name="day_of_birth"
                        placeholder="__/__/____"
                        class="w-full bg-gray-900 p-2 rounded-md focus:outline-none focus:border-blue-500"
                        value="{{ \Carbon\Carbon::parse($custo->day_of_birth)->format('d/m/Y') }}"
                        oninput="formatDate(this)"
                    />
                
                    <script>
                        function formatDate(input) {
                            var numericValue = input.value.replace(/\D/g, '');
                            input.value = formatDateString(numericValue);
                        }
                
                        function formatDateString(value) {
                            var formattedValue = value.replace(/(\d{2})(\d{2})?(\d{0,4})/, function (match, p1, p2, p3) {
                                var result = [p1];
                                if (p2) result.push('/' + p2);
                                if (p3) result.push('/' + p3);
                                return result.join('');
                            });
                            return formattedValue;
                        }
                    </script>
                </div>
                
                <div>
                    <x-input-label for="revenue" :value="__('Chi tiêu ($)')" />
                    <x-text-input id="revenue" class="block mt-1 w-full" type="text" name="revenue"
                        value="{{ old('revenue', $custo->revenue) }}" required autofocus />
                    <x-input-error :messages="$errors->get('revenue')" class="mt-2" />
                </div>

                
             
                <x-primary-button class="mt-6">
                    {{ __('Sửa khách hàng') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    {{ __('Thêm Khách hàng') }}
    <div class="w-80 mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('customer.store') }}">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Tên khách hàng')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="address" :value="__('Địa chỉ')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    required autofocus />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
            <div>

                <div>
                    <x-input-label for="phone_number" :value="__('Số điện thoại')" />
                    <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                        :value="old('phone_number')" required autofocus />
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
                      oninput="formatDate(this)"
                    />
                
                    <script>
                      function formatDate(input) {
                        var numericValue = input.value.replace(/\D/g, '');
                        input.value = formatDateString(numericValue);
                      }
                
                      function formatDateString(value) {
                        var formattedValue = value.replace(/(\d{2})(\d{2})?(\d{0,4})/, function(match, p1, p2, p3) {
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
                    <x-input-label for="revenue" :value="__('Chi tiêu')" />
                    <x-text-input id="revenue" class="block mt-1 w-full" type="text" name="revenue"
                        :value="old('revenue')" required autofocus />
                    <x-input-error :messages="$errors->get('revenue')" class="mt-2" />
                </div>


                <x-primary-button class="mt-6 ">
                    {{ __('Thêm khách hàng') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>

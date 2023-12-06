<x-app-layout>
    {{ __('Sửa Sản Phẩm') }}
    <div class="dark:bg-gray-900 p-4 rounded-md mt-2">
        <div class="w-80 mx-auto p-5 rounded-md">
            <form method="POST" action="{{ route('product.update', $product->id) }}">
                @method('PUT')
                @csrf
                <!-- Name product -->
                <div>
                    <x-input-label for="name" :value="__('Tên Sản Phẩm')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        value="{{ old('name', $product->name) }}" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="category_id" :value="__(' Danh Mục')" />
                    <x-text-input id="category_id" class="block mt-1 w-full" type="text" name="category_id"
                        value="{{ old('category_id', $product->category_id) }}" required autofocus />
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="suppliler_id" :value="__('Nhà Cung Cấp')" />
                    <x-text-input id="suppliler_id" class="block mt-1 w-full" type="text" name="suppliler_id"
                        value="{{ old('suppliler_id', $product->suppliler_id) }}" required autofocus />
                    <x-input-error :messages="$errors->get('suppliler_id')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="image" :value="__('Hình Ảnh')" />
                    <x-text-input id="image" class="block mt-1 w-full" type="file" name="image"
                        value="{{ old('image', $product->image) }}" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="quantity_instock" :value="__('Số Lượng Tồn Kho')" />
                    <x-text-input id="quantity_instock" class="block mt-1 w-full" type="text" name="quantity_instock"
                        value="{{ old('quantity_instock', $product->quantity_instock) }}" required autofocus />
                    <x-input-error :messages="$errors->get('quantity_instock')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="description" :value="__('Mô Tả')" />
                    <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                        value="{{ old('description', $product->description) }}" required autofocus />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="status" :value="__('Trạng Thái')" />
                    <select id="status" name="status" class="block mt-1 w-full" required autofocus
                        style="background: black">
                        <option style="background: black" value="display"
                            {{ old('status', $product->status) === 'display' ? 'selected' : '' }}>Hiển thị</option>
                        <option style="background: black" value="hide"
                            {{ old('status', $product->status) === 'hide' ? 'selected' : '' }}>Không hiển thị</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
                <x-primary-button class="mt-6">
                    {{ __('Sửa Sản Phẩm') }}
                </x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

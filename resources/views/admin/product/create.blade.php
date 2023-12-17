<x-app-layout>
    {{ __('Thêm Sản Phẩm') }}
    <div class="mt-5 w-full mx-auto p-5 rounded-md border dark:border-gray-700">
        <form method="POST" action="{{ route('product.store') }}" enctype = "multipart/form-data">
            @csrf
            <!-- Name Permission -->
            <div>
                <x-input-label for="name" :value="__('Tên Sản Phẩm')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="category_id" :value="__('Danh Mục')" />
                <select id="category_id" name="category_id" class="block mt-1 w-full" required autofocus
                    style='background:black'>
                    <option value="#">---Chọn Danh mục---</option>
                    @foreach ($category as $key => $cate)
                        <option value="{{ $key }}">{{ $cate }}</option>
                    @endforeach
                </select>

                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="supplier_id" :value="__('Nhà Cung Câp')" />
               <select id="supplier_id" name="supplier_id" class="block mt-1 w-full" required autofocus style ="background: black">
                <option value="#">---Chọn Nhà Cung Cấp---</option>
                    @foreach ($supplier as $key => $sup)
                        <option value="{{ $key }}">{{ $sup }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('supplier_id')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="image" :value="__('Hình Ảnh')" />
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                <img id="image-preview" src="#" style="display: none; max-width: 200px; max-height: 200px;" />
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="quantity_instock" :value="__('Số Lượng Tồn Kho')" />
                <x-text-input id="quantity_instock" class="block mt-1 w-full" type="text" name="quantity_instock"
                    :value="old('quantity_instock')" required autofocus />
                <x-input-error :messages="$errors->get('quantity_instock')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="description" :value="__('Mô Tả')" />
                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description"
                    :value="old('description')" required autofocus />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="status" :value="__('Trạng Thái')" />
                <select id="status" name="status" class="block mt-1 w-full" required autofocus
                    style = "background: black">
                    <option style = "background: black" class="" value="display"
                        {{ old('status') === 'display' ? 'selected' : '' }}>Hiển thị</option>
                    <option style = "background: black" class="" value="hide"
                        {{ old('status') === 'hide' ? 'selected' : '' }}>Không hiển thị</option>
                </select>
                <x-input-error :messages="$errors->get('status')" class="mt-2" />
            </div>

            <x-primary-button class="mt-6">
                {{ __('Thêm Sản Phẩm') }}
            </x-primary-button>

        </form>
    </div>
</x-app-layout>

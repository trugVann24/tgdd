<x-app-layout>

    <div class="flex items-center justify-between border-b border-gray-700 pb-3">
        <div class="">
            {{__('Danh sách thương')}}
        </div>
        <div class="flex items-center">
            <input type="text" id="search" placeholder="Tìm kiếm" class="px-3 py-2 text-black rounded-md border border-gray-300 focus:outline-none focus:border-indigo-700">
        </div>
        <div class="">
            <a href="{{route('admin.brand.create')}}" class="bg-indigo-700 px-3 py-2 rounded-sm font-inter-500 text-sm hover:bg-indigo-800">Thêm thương hiệu</a>
        </div>
    </div>
    <div class="flex flex-col mt-2">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">ID</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Tên brand
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Hình ảnh
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Mô tả
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-end text-xs font-inter-500 text-gray-500 uppercase">Thao tác
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($brand as $brand)
                                <tr class="">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-inter-500 text-gray-800 dark:text-gray-200">
                                        {{ $brand->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $brand->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}" class="w-16 h-16 object-cover">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $brand->description }}</td>
                                    <td class="px-6 py-4 flex items-center justify-end font-inter-500 ">
                                        <div
                                            class="w-9 h-9 rounded-full hover:bg-gray-900 flex items-center justify-center">
                                            <a href="{{route('admin.brand.edit', $brand->id)}}" class="">
                                                <i class='bx bx-edit text-lg'></i>
                                            </a>
                                        </div>
                                        <form action="{{route('admin.brand.destroy', $brand->id)}}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xoá ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-9 h-9 rounded-full hover:bg-gray-900"> <i class="bx bx-trash text-lg"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
</x-app-layout>

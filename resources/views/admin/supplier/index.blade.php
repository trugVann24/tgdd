<x-app-layout>
    <div class="flex items-center justify-between border-b border-gray-700 pb-3">
        <div>
            {{ __('Danh sách Nhà Cung Cấp') }}
        </div>
        <div style="color: black">
            <form action="{{ route('supplier.index') }}" method="GET">
                <input type="text" name="q" placeholder="Search..." autocomplete="off">
                <button type="submit">Tìm kiếm</button>
            </form>
        </div>
        <div>
            <a href="{{ route('supplier.create') }}"
                class="bg-indigo-700 px-3 py-2 rounded-sm font-inter-500 text-sm hover:bg-indigo-800">Thêm Nhà Cung
                Cấp</a>
        </div>
    </div>
    <div class="flex flex-col mt-2">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table table="myTable" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">ID</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Tên
                                    Nhà Cung Cấp
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">
                                    SĐT
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">
                                    Địa Chỉ
                                </th>

                                <th scope="col"
                                    class="px-6 py-3 text-end text-xs font-inter-500 text-gray-500 uppercase">Thao tác
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($list as $key => $sup)
                                <tr class="">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-inter-500 text-gray-800 dark:text-gray-200">
                                        {{ $sup->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $sup->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $sup->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $sup->phone }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $sup->address }}</td>

                                    <td class="px-6 py-4 flex items-center justify-end font-inter-500 ">
                                        <div
                                            class="w-9 h-9 rounded-full hover:bg-gray-900 flex items-center justify-center">
                                            <a href="{{ route('supplier.edit', $sup->id) }}" class="">
                                                <i class='bx bx-edit text-lg'></i>
                                            </a>
                                        </div>
                                        <form action="{{ route('supplier.destroy', $sup->id) }}" method="POST"
                                            onsubmit="return confirm('Bạn có chắc chắn muốn xoá ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-9 h-9 rounded-full hover:bg-gray-900">
                                                <i class="bx bx-trash text-lg"></i>
                                            </button>
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
</x-app-layout>
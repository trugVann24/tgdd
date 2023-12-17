<x-app-layout>
    @if(session('alert_message'))
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4" role="alert">
        <p class="font-bold">Cảnh báo!</p>
        <p>{{ session('alert_message') }}</p>
    </div>
@endif
    <div class="flex items-center justify-between border-b border-gray-700 pb-3">
        <div>
            {{ __('Danh sách Nhân viên') }}
        </div>
        <div style="color: black;">
            <form action="{{ route('admin.search-staff') }}" method="GET">
                <input type="text" name="search" placeholder="Search..." autocomplete="off" class="bg-gray-900 text-white p-2 rounded-md focus:outline-none focus:border-blue-500">
                <button type="submit" class="bg-gray-900 text-white p-2 rounded-md">Tìm kiếm</button>
            </form>
        </div>
        <div>
            <a href="{{ route('staff.create') }}"
                class="bg-indigo-700 px-3 py-2 rounded-sm font-inter-500 text-sm hover:bg-indigo-800">Thêm Nhân viên</a>
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
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Tên Nhân
                                    viên
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-start text-xs font-inter-500 text-gray-500 uppercase">Địa chỉ
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-end text-xs font-inter-500 text-gray-500 uppercase">Số điện
                                    thoại
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-end text-xs font-inter-500 text-gray-500 uppercase">Trạng thái
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-end text-xs font-inter-500 text-gray-500 uppercase">Thao tác
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($list as $key => $staf)
                                <tr class="">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-inter-500 text-gray-800 dark:text-gray-200">
                                        {{ $staf->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $staf->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $staf->address }}</td>
                                    <td class="px-6 py-4 text-end text-xm text-gray-800 dark:text-gray-200">
                                        {{ $staf->phone_number }}</td>
                                    <td class="px-6 py-4 text-end text-xm text-sm text-gray-800 dark:text-gray-200">
                                        @if ($staf->status == '0')
                                            Hoạt động
                                        @elseif($staf->status == '1')
                                            Ngưng hoạt động
                                        @elseif($staf->status == '2')
                                            Nghỉ phép
                                        @else
                                            {{ $staf->status }}
                                        @endif
                                    </td>


                                    <td class="px-6 py-4 flex items-center justify-end font-inter-500 ">
                                        <div
                                            class="w-9 h-9 rounded-full hover:bg-gray-900 flex items-center justify-center">
                                            <a href="{{ route('staff.edit', $staf->id) }}" class="">
                                                <i class='bx bx-edit text-lg'></i>
                                            </a>
                                        </div>
                                        <form action="{{ route('staff.destroy', $staf->id) }}" method="POST"
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

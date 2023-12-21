<x-app-layout>
    <div class="flex items-center justify-between border-b border-gray-700 pb-3">
        <div>
            {{ __('Danh sách nhân viên') }}
        </div>
        <div class="flex items-center">
            <input type="text" id="search" placeholder="Tìm kiếm" class="px-3 py-2 text-black rounded-md border border-gray-300 focus:outline-none focus:border-indigo-700">
        </div>
        <div>
            <a href="{{ route('admin.staff.create') }}"
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
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Mã nhân viên</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Tên nhân viên</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Địa chỉ</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Ngày vào làm</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Số điện thoại</th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Trạng thái</th>
                                    <th scope="col"
                                    class="px-6 py-3 text-end text-xs font-inter-500 text-gray-500 uppercase">Thao tác
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($staff as $staff )
                                <tr class="">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-inter-500 text-gray-800 dark:text-gray-200">
                                        {{ $staff->staff_code }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $staff->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $staff->address }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $staff->day_in_work }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $staff->phone_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        @if( $staff->status == 1 )
                                            Còn làm
                                        @else
                                            Đã nghỉ làm
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 flex items-center justify-end font-inter-500 ">
                                        <div
                                            class="w-9 h-9 rounded-full hover:bg-gray-900 flex items-center justify-center">
                                            <a href="{{ route('admin.staff.edit', $staff->staff_code) }}" class="">
                                                <i class='bx bx-edit text-lg'></i>
                                            </a>
                                        </div>
                                        <form action="{{ route('admin.staff.destroy', $staff->staff_code) }}" method="POST"
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
    <script src="/js/app.js"></script>
</x-app-layout>

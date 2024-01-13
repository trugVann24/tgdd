<x-app-layout>

    <div class="flex items-center justify-between border-b border-gray-700 pb-3">
        <div class="">
            {{__('Danh sách phiếu nhập')}}
        </div>
        <div class="flex items-center">
            <input type="text" id="search" placeholder="Tìm kiếm" class="px-3 py-2 text-black rounded-md border border-gray-300 focus:outline-none focus:border-indigo-700">
        </div>
        <div class="">
            <a href="{{route('admin.goodReceivedNote.create')}}" class="bg-indigo-700 px-3 py-2 rounded-sm font-inter-500 text-sm hover:bg-indigo-800">Thêm phiếu nhập</a>
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
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Nhà cung cấp
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Sản phẩm
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">User
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Ngày nhập
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Số lượng
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Giá
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-start text-xs font-inter-500 text-gray-500 uppercase">Tổng giá
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-end text-xs font-inter-500 text-gray-500 uppercase">Thao tác
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($goodReceivedNote as $goodReceivedNote)
                                <tr class="">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $goodReceivedNote->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-inter-500 text-gray-800 dark:text-gray-200">
                                        @php
                                            $suppliler = \App\Models\Suppliler::find($goodReceivedNote->supplier_id);
                                        @endphp
                                        {{ $suppliler ? $suppliler->name : '' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-inter-500 text-gray-800 dark:text-gray-200">
                                        {{$goodReceivedNote->name}}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-inter-500 text-gray-800 dark:text-gray-200">
                                        @php
                                            $user = \App\Models\User::find($goodReceivedNote->user_id);
                                        @endphp
                                        {{ $user ? $user->name : '' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $goodReceivedNote->received_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $goodReceivedNote->quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $goodReceivedNote->price }} $</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                        {{ $goodReceivedNote->total_cost }} $</td>
                                    <td class="px-6 py-4 flex items-center justify-end font-inter-500 ">
                                        <div
                                            class="w-9 h-9 rounded-full hover:bg-gray-900 flex items-center justify-center">
                                            <a href="{{route('admin.goodReceivedNote.edit', $goodReceivedNote->id)}}" class="">
                                                <i class='bx bx-edit text-lg'></i>
                                            </a>
                                        </div>
                                        <form action="{{route('admin.goodReceivedNote.destroy', $goodReceivedNote->id)}}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xoá ?')">
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

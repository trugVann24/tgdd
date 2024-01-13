<x-app-layout>
    <div class="flex items-center justify-between border-b border-gray-700 pb-3">
        <div>
            {{ __('Báo cáo thống kê') }}
        </div>
        <div class="flex items-center">
            <input type="text" id="search" placeholder="Tìm kiếm" class="px-3 py-2 text-black rounded-md border border-gray-300 focus:outline-none focus:border-indigo-700">
        </div>
    </div>
    <div class="flex flex-col mt-2">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="overflow-hidden">
                    <table table="myTable" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <div class="flex flex-wrap">
                            <div class="mt-4 mr-4 mb-4" style="width: 300px; height: 300px;">
                                <div class="bg-blue-500 flex text-white p-5 rounded-lg items-center justify-between">
                                    <div>
                                        <div style="font-size: 35px;">
                                            {{$productCount}} 
                                        </div>
                                        <p class="mt-2">Số lượng sản phẩm tồn kho</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 mr-4 mb-4" style="width: 300px; height: 300px;">
                                <div class="bg-green-600 flex text-white p-5 rounded-lg items-center justify-between">
                                    <div>
                                        <div style="font-size: 35px;">
                                            {{$TongVonDauTu}}$
                                        </div>
                                        <p class="mt-2">Tổng vốn đầu tư </p>
                                    </div>
                                </div>
                            </div>  

                            <div class="mt-4 mr-4 mb-4" style="width: 300px; height: 300px;">
                                <div class="bg-orange-400 flex text-white p-5 rounded-lg items-center justify-between">
                                    <div>
                                        <div style="font-size: 35px;">
                                            {{$TongDoanhSo}}$
                                        </div>
                                        <p class="mt-2">doanh số bán hàng </p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 mb-4 w-full" style="width: 300px; height: 300px;">
                                <div class="bg-red-600 flex text-white p-5 rounded-lg items-center justify-between">
                                    <div>
                                        <div style="font-size: 35px;">
                                            {{$LoiNhuan}}$
                                        </div>
                                        <p class="mt-2">lợi nhuận thu về</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
</x-app-layout>

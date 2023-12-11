<section>
    <div class=" flex relative">
        <!-- Menu Sidebar -->
        <section
            class="w-64 fixed top-0 left-0 bottom-0 scrollbar-track-gray-900 scrollbar-thin scrollbar-thumb-gray-800"
            aria-label="Sidebar">
            <div class=" bg-white dark:bg-gray-800 border-r dark:border-gray-700 h-screen">
                <div class="flex items-center justify-center px-2 py-[13px] ">
                    <span class="text-2xl font-inter-600 text-black dark:text-white italic">Admin
                        <span class="text-yellow-500 ">TGDD</span>
                    </span>
                    <div class="w-9 h-9 overflow-hidden ml-2">
                        <img src="{{ asset('image_logo/logo.svg') }}" alt="">
                    </div>
                </div>
                <ul class="">
                    <li>
                        <a href=""
                            class="flex items-center text-sm px-2 py-3 text-gray-900 border-l-[4px] border-sky-700 bg-sky-50 dark:bg-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-950 group transition-colors ease-linear duration-100">
                            <i class="bx bx-home mr-2"></i>
                            Trang chủ
                        </a>
                        <!-- Sub Menu Sidebar -->
                        <ul class="bg-white text-sm text-black dark:bg-gray-900/60 dark:text-gray-400 group">
                            <li class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 ">
                                <a href="" class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                    <i class='bx bx-group mr-2'></i>
                                    Thống kê
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div
                            class="flex items-center text-sm px-2 py-3 text-gray-900 border-l-[4px] border-sky-700 bg-sky-50 dark:bg-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-950 group transition-colors ease-linear duration-100">
                            <i class='bx bx-purchase-tag-alt mr-2'></i>
                            Quản lý bán hàng
                        </div>
                        <!-- Sub Menu Sidebar -->
                        <ul class="bg-white text-sm text-black dark:bg-gray-900/60 dark:text-gray-400 ">
                            {{-- <li
                                class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 border-b dark:border-gray-700 group">
                                <a href="" class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                    <i class='bx bx-group mr-2'></i>
                                    Quản lý đơn hàng
                                </a>
                            </li>
                            <li class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 ">
                                <a href="" class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                    <i class='bx bx-cycling mr-2'></i>
                                    Quản lý vận chuyển
                                </a>
                            </li>
                            <li
                                class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 border-b dark:border-gray-700 group">
                                <a href="" class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                    <i class='bx bx-mail-send mr-2'></i>
                                    Thống kê thông tin
                                </a>
                            </li> --}}
                        </ul>
                    </li>
                    <li>
                        <div
                            class="flex items-center text-sm px-2 py-3 text-gray-900 border-l-[4px] border-sky-700 bg-sky-50 dark:bg-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-950 group transition-colors ease-linear duration-100">
                            <i class='bx bx-cable-car mr-2'></i>
                            Quản lý kho
                        </div>
                        <!-- Sub Menu Sidebar -->
                        <ul class="bg-white text-sm text-black dark:bg-gray-900/60 dark:text-gray-400 ">
                            <li
                                class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 border-b dark:border-gray-700 group">
                                <a href="{{ route('category.index') }}" class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                    <i class='bx bx-trending-up mr-2'></i>
                                    Quản lý danh mục
                                </a>
                            </li>
                            <li
                                class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 border-b dark:border-gray-700 group">
                                <a href="{{ route('suppliler.index') }}" class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                    <i class='bx bx-shopping-bag mr-2'></i>
                                    Quản lý nhà cung cấp
                                </a>
                            </li>
                            <li
                                class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 border-b dark:border-gray-700 group">
                                <a href="{{route('admin.brand.index')}}" class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                    <i class='bx bx-shopping-bag mr-2'></i>
                                    Quản lý thương hiệu
                                </a>
                            </li>
                            <li
                                class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 border-b dark:border-gray-700 group">
                                <a href="{{route('admin.goodReceivedNote.index')}}" class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                    <i class='bx bx-trending-up mr-2'></i>
                                    Quản lý hoá đơn nhập
                                </a>
                            </li>
                            <li
                                class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 border-b dark:border-gray-700 group">
                                <a href="{{route('admin.goodDeliveryNote.index')}}" class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                    <i class='bx bx-shopping-bag mr-2'></i>
                                    Quản lý hoá đơn xuất
                                </a>
                            </li>
                            <li
                                class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 border-b dark:border-gray-700 group">
                                <a href="{{ route('agentstore.index') }}" class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                    <i class='bx bx-trending-up mr-2'></i>
                                    Quản lý đại lý phân phối
                                </a>
                            </li>
                                <li
                                    class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 border-b dark:border-gray-700 group">
                                    <a href="{{ route('product.index') }}" class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                        <i class='bx bx-train mr-2'></i>
                                        Quản lý sản phẩm
                                    </a>
                                </li>

                            <li class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 group">
                                <a href="" class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                    <i class='bx bx-line-chart mr-2'></i>
                                    Báo cáo, thống kê
                                </a>
                            </li>
                        </ul>
                    </li>
                    @role('admin')
                        <li>
                            <div
                                class="flex items-center text-sm px-2 py-3 text-gray-900 border-l-[4px] border-sky-700 bg-sky-50 dark:bg-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-950 group transition-colors ease-linear duration-100">
                                <i class='bx bx-check-shield mr-2'></i>
                                Administrator
                            </div>
                            <!-- Sub Menu Sidebar -->
                            <ul class="bg-white text-sm text-black dark:bg-gray-900/60 dark:text-gray-400 ">
                                <li
                                    class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 border-b dark:border-gray-700 group">
                                    <a href="{{ route('admin.permissions.index') }}"
                                        class="px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                        <i class='bx bx-aperture mr-2'></i>
                                        Permission
                                    </a>
                                </li>
                                <li
                                    class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 border-b dark:border-gray-700 group">
                                    <a href="{{ route('admin.roles.index') }}"
                                        class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                        <i class='bx bx-leaf mr-2'></i>
                                        Roles
                                    </a>
                                </li>
                                <li
                                    class=" dark:hover:bg-gray-950/80 transition-colors ease-linear duration-100 border-b dark:border-gray-700 group">
                                    <a href="{{ route('admin.users.index') }}"
                                        class=" px-5 py-3 ml-4 flex items-center dark:group-hover:text-white">
                                        <i class='bx bx-user-check mr-2'></i>
                                        Tài khoản
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endrole
                </ul>
            </div>
        </section>
        <div class="flex-1">
            <!-- Header -->
            <div
                class="border-b px-2 py-2 text-black bg-white dark:bg-gray-800 dark:text-white dark:border-gray-700 fixed top-0 left-64 right-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="mt-1">
                            <button
                                class="w-9 h-9 rounded-full hover:bg-gray-50 text-gray-600 flex items-center justify-center transition-colors duration-100 ease-linear cursor-pointer dark:text-white dark:hover:bg-gray-900">
                                <i class='bx bx-menu text-2xl'></i>
                            </button>
                        </div>
                    </div>
                    <div class="mt-1 flex items-center gap-4">
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150 dark:hover:bg-gray-900">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Cá nhân') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Đăng xuất') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class=" bg-white dark:bg-gray-900 ml-64 mt-6 ">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

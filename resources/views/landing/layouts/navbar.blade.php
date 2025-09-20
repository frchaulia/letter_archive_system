@if (!Request::is('services/*'))
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-[999] lg:text-white">
        <div class="container mx-auto">
            <div class="flex justify-between items-end relative py-4">
                <a href="{{ route('landing.home.index') . '#beranda' }}"><img id="navbar-logo"
                        src="{{ $siteSetting->logo_white_url }}" alt="" class="w-36 md:w-52"></a>
                <!-- menu bars -->
                <div class="flex items-center px-4">
                    <button id="bars" name="bars" type="button" class="lg:hidden">
                        <div class="menu-bar transition duration-300 ease-in-out origin-top-left"></div>
                        <div class="menu-bar transition duration-300 ease-in-out"></div>
                        <div class="menu-bar transition duration-300 ease-in-out origin-bottom-left"></div>
                    </button>

                    <!-- menu item -->
                    <nav id="nav-menu"
                        class="hidden absolute bg-white p-5 lg:p-0 shadow-lg rounded-lg max-w-[300px] w-full top-full right-4 lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex lg:mx-auto">
                            <li class="nav-item">
                                <a class="nav-link flex py-2 px-7 hover:text-secondary-500 font-nm font-medium hover:font-bold"
                                    href="{{ route('landing.home.index') . '#beranda' }}">
                                    Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link flex py-2 px-7 hover:text-secondary-500 font-nm font-medium hover:font-bold {{ Request::is('services*') ? 'active' : '' }}"
                                    href="{{ route('landing.home.index') . '#services' }}">Layanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link flex py-2 px-7 hover:text-secondary-500 font-nm font-medium hover:font-bold {{ Request::is('portfolios*') ? 'active' : '' }}"
                                    href="{{ Request::is('portfolios/*') ? route('landing.portfolio.index') : route('landing.home.index') . '#portfolio' }}">Portofolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link flex py-2 px-7 hover:text-secondary-500 font-nm font-medium hover:font-bold"
                                    href="{{ route('landing.home.index') . '#blog' }}">Blog</a>
                            </li>
                            <li class="nav-item">
                                {{-- direct to form click up --}}
                                <a class="nav-link flex py-2 px-7 hover:text-secondary-500 font-nm font-medium hover:font-bold {{ Request::is('joinus*') ? 'active' : '' }}"
                                    href="{{ route('landing.joinus.index') }}">Gabung Mitra Tukang</a>
                            </li>

                            {{-- direct to whatsApp --}}
                            {{-- <button
                                onclick="window.open('{{ getWhatsAppLink($siteSetting->contact_number) }}', '_blank')"
                                class="btn bg-secondary-500 font-inter font-semibold text-white w-full mt-6 lg:hidden">Konsultasi</button> --}}
                        </ul>

                    </nav>
                </div>
                {{-- <button onclick="window.open('{{ getWhatsAppLink($siteSetting->contact_number) }}', '_blank')"
                    class="btn bg-secondary-500 text-white hidden lg:flex hover:bg-amber-400 transition-colors duration-300">Konsultasi</button> --}}
            </div>
        </div>
    </header>
@endif



@if (Request::is('services/*'))
    <header
        class="bg-white absolute top-0 left-0 w-full flex flex-col lg:flex-row md:items-center z-[999] lg:text-white">
        <div class="container mx-auto">
            <div class="flex justify-between items-end relative py-4">
                <a href="{{ route('landing.home.index') . '#beranda' }}"><img src="{{ $siteSetting->logo_url }}"
                        alt="" class="w-36 md:w-52"></a>
                <!-- menu bars -->
                <div class="flex items-center px-4">
                    <button id="bars" name="bars" type="button" class="lg:hidden">
                        <div class="menu-bar transition duration-300 ease-in-out origin-top-left"></div>
                        <div class="menu-bar transition duration-300 ease-in-out"></div>
                        <div class="menu-bar transition duration-300 ease-in-out origin-bottom-left"></div>
                    </button>

                    <!-- menu item -->
                    <nav id="nav-menu"
                        class="hidden absolute bg-white p-5 lg:p-0 shadow-lg rounded-lg max-w-[300px] w-full top-full right-4 lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex lg:mx-auto">
                            <li class="nav-item">
                                <a class="nav-link flex py-2 px-7 text-gray-900 hover:text-secondary-500 font-nm font-medium hover:font-bold"
                                    href="{{ route('landing.home.index') . '#beranda' }}">
                                    Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link flex py-2 px-7 text-gray-900 hover:text-secondary-500 font-nm font-medium hover:font-bold {{ Request::is('services*') ? 'active' : '' }}"
                                    href="{{ route('landing.home.index') . '#services' }}">Service</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link flex py-2 px-7 text-gray-900 hover:text-secondary-500 font-nm font-medium hover:font-bold"
                                    href="{{ route('landing.home.index') . '#blog' }}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link flex py-2 px-7 text-gray-900 hover:text-secondary-500 font-nm font-medium hover:font-bold {{ Request::is('portfolios*') ? 'active' : '' }}"
                                    href="{{ Request::is('portfolios/*') ? route('landing.portfolio.index') : route('landing.home.index') . '#portfolio' }}">Portofolio</a>
                            </li>
                            <li class="nav-item">
                                {{-- direct to form click up --}}
                                <a class="nav-link flex py-2 px-7 text-gray-900 hover:text-secondary-500 font-nm font-medium hover:font-bold {{ Request::is('joinus*') ? 'active' : '' }}"
                                    href="{{ route('landing.joinus.index') }}">Gabung Mitra Tukang</a>
                            </li>

                            {{-- direct to whatsApp --}}
                            {{-- <button
                                onclick="window.open('{{ getWhatsAppLink($siteSetting->contact_number) }}', '_blank')"
                                class="btn bg-secondary-500 font-inter font-semibold text-white w-full mt-6 lg:hidden">Konsultasi</button> --}}
                        </ul>

                    </nav>
                </div>

                {{-- <div class="w-full hidden lg:block">
                    <div class="flex justify-center">
                        <button
                            class="px-4 tab-btn font-medium text-center border-secondary-500 hover:text-secondary-500 py-2 focus:outline-none border-b-2 text-secondary-500 hover:border-secondary-500"
                            data-tab="tab1">Pengisian Form</button>
                        <button
                            class="px-4 tab-btn font-medium text-center text-gray-300 hover:text-secondary-500 py-2 focus:outline-none border-b-2 border-gray-300 hover:border-secondary-500"
                            data-tab="tab2">Layanan</button>
                    </div>
                </div> --}}
                {{-- <button onclick="window.open('{{ getWhatsAppLink($siteSetting->contact_number) }}', '_blank')"
                    class="btn bg-secondary-500 text-white hidden lg:flex hover:bg-amber-400 transition-colors duration-300">Konsultasi</button> --}}
            </div>
        </div>
        {{-- <div class="w-full flex justify-center lg:hidden">
            <button
                class="w-1/2 px-4 tab-btn font-medium text-sm sm:text-base text-center border-secondary-500 hover:text-secondary-500 py-2 focus:outline-none border-b-2 text-secondary-500 hover:border-secondary-500"
                data-tab="tab1">
                Pengisian Form
            </button>
            <button
                class="w-1/2 px-4 tab-btn font-medium text-sm sm:text-base text-center text-gray-300 hover:text-secondary-500 py-2 focus:outline-none border-b-2 border-gray-300 hover:border-secondary-500"
                data-tab="tab2">
                Layanan & Alur <span class="hidden sm:inline">Pemesanan</span>
            </button>
        </div> --}}
    </header>
@endif

@extends('landing.main-landing')

@section('lib-style')
@endsection

@section('page-style')
    <style>
        html {
            scroll-padding-top: 5.5rem;
        }

        .hero .hero-bg {
            z-index: -1;
            position: absolute;
            top: 0;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(0deg, rgba(13, 25, 40, 0.40) 0%, rgba(13, 25, 40, 0.40) 100%), url("{{ $siteSetting->hero_image_url }}") lightgray 0px 0px / 100% 100% no-repeat;
            background-size: cover;
        }

        .scrollbar-thin::-webkit-scrollbar {
            height: 12px;
        }

        .scrollbar-thin::-webkit-scrollbar-thumb {
            /* background-color: #F39915;  */
            background-color: #6b7280;
            border-radius: 9999px;
        }

        .scrollbar-thin::-webkit-scrollbar-track {
            background-color: #e5e7eb;
        }

        .portfolio-img {
            position: relative;
            float: left;
        }

        .portfolio-img .text {
            position: absolute;
            bottom: 0;
            right: 0;
            background: black;
            border-bottom-right-radius: 16px;
            border-bottom-left-radius: 16px;
            color: white;
            opacity: 0;
            visibility: hidden;
            -webkit-transition: visibility 0s, opacity 0.5s ease-in-out;
            transition: visibility 0s, opacity 0.5s ease-in-out;
        }

        .portfolio-img:hover {
            cursor: pointer;
        }

        .portfolio-img:hover .text {
            width: 100%;
            height: 60%;
            padding: 8px 15px;
            visibility: visible;
            opacity: 0.7;
        }

        .card-hover:hover {
            border: 1px solid #FAE5D3;
            border-radius: 16px;
            box-shadow: 0px 5px 20px 20px rgba(255, 255, 255, 0.5);
        }

        .swiper {
            width: 100%;
        }

        .swiper-pagination-bullet {
            background-color: #F39915;
            width: 1.5rem;
            border-radius: 20px;
        }

        .promotion-pagination .swiper-pagination-bullet {
            width: 1.2rem
        }

        .swiper-container {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            width: 80%;
        }

        .promo-swiper {
            --add-bottom: 50px;
            padding-bottom: var(--add-bottom);
        }

        .promo-swiper [class^="swiper-button-"] {
            top: calc(50% - var(--add-bottom) / 2);
        }

        .port-categories.swiper-slide {
            width: max-content;
        }

        .testimonial-swiper {
            --add-bottom: 50px;
            padding-bottom: var(--add-bottom);
        }

        .testimonial-swiper [class^="swiper-button-"] {
            top: calc(50% - var(--add-bottom) / 2);
        }

        /* Order flow */
        .order-wrapper:last-child .line::after {
            width: 0;
            height: 0;
        }

        @media (max-width: 768px) {
            .scrollbar-thin::-webkit-scrollbar {
                height: 2px;
            }

            .after\:bg-gray-200::after {
                display: none;
            }

            .card-step {
                border-width: 1px 0 !important;
                border-radius: 0 !important;
                padding: 1rem 0.25rem;
            }
        }
    </style>
@endsection

@section('content')
    {{-- BERANDA --}}
    {{-- <section id="beranda" class="section">
    <article class="relative hero bg-cover bg-no-repeat bg-top h-screen w-full flex flex-col justify-center">
        <div class="w-full h-full flex justify-center items-center">
            <div class="container h-full">
                <h1 class="absolute top-28 md:top-[20%] lg:w-8/12 lg:max-w-[810px] text-gray-50 text-4xl md:text-5xl font-nmb leading-tight md:leading-normal lg:leading-[79.50px] z-50 pr-5"
                    data-aos="fade-up" data-aos-duration="2000" data-aos-delay="50">
                    {!! $siteSetting->hero_title !!}
                </h1>
            </div>
        </div>
    </article>
</section> --}}

    <!-- SERVICE -->
    {{-- <section id="services" class="section">
    <article class="z-20">
        <div class="container relative flex flex-col left-0 right-0 -mt-16 md:-mt-28">
            <img src="{{ $siteSetting->foreground_image_url }}" alt="" class="absolute right-0 lg:-right-16 bottom-full"
                width="900">
            <div class="bg-white rounded-[20px] text-center py-7 h-3/4">
                <div class="w-full max-w-[799px] mx-auto px-5">
                    <h3 class="text-gray-900 text-xl font-normal font-inter leading-7">Layanan</h3>
                    <h1 class="section-title text-gray-900 my-2">Eksplorasi jasa & <span
                            class="text-secondary-500">solusi paktukang</span>.</h1>
                    <p class="title-desc" data-aos="fade-up">Kami menyediakan berbagai layanan untuk Anda, mulai dari
                        bangun rumah hingga hitung kebutuhan pembangunan dan perbaikan.</p>
                </div>

                <!-- List services -->
                <div
                    class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-x-8 gap-y-4 lg:gap-0 lg:gap-y-5 lg:grid-rows-2 justify-between mt-14">
                    @foreach ($services as $service)
                    <a href="{{ route('landing.service.detail', $service->slug) }}"
                        class="flex flex-col items-center border border-transparent hover:border hover:border-secondary-500 rounded-2xl lg:px-2 py-7"
                        data-aos="zoom-in">
                        <img src="{{ $service->icon_url }}" alt="{{ $service->title }}" width="87">
                        <h4 class="text-gray-900 text-xl lg:text-2xl font-nmb leading-normal mt-5 mb-2">
                            {{ $service->title }}
                        </h4>
                        <p class="hidden md:block text-gray-600 tex-base font-normal font-inter leading-normal px-1">
                            {{ $service->detail }}
                        </p>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </article>
</section> --}}


    {{-- BERANDA & SERVICE NEW --}}
    <section id="beranda" class="section">
        <article class="mb-24 relative hero relative w-full min-h-screen flex flex-col justify-center">
            <div class="hero-bg"></div>
            <div class="container w-full h-full flex flex-col pt-20 lg:pt-32">
                <div class="lg:mb-16 h-fit self-end flex flex-col items-end justify-start lg:w-8/12 lg:max-w-[810px]">
                    <h1 class="text-gray-50 text-3xl md:text-4xl font-nmb mb-0 lg:m-4 leading-tight z-50 pr-5"
                        data-aos="fade-up" data-aos-duration="2000" data-aos-delay="50">
                        Satu - Satunya Platform <span class="text-secondary-500"> Jasa Tukang Bangunan </span> Bergaransi!
                    </h1>

                    <div class="relative flex w-full">
                        <!-- SEARCH SERVICE -->
                        <form id="searchForm" class="w-full bg-white flex rounded-full pl-6 md:pl-8 pr-2 py-2 my-7 lg:my-0"
                            data-aos="fade-up" data-aos-duration="2000" data-aos-delay="50">
                            <input type="text" id="searchInput" class="flex-1 pr-4 outline-none text-sm md:text-xl"
                                placeholder="Apa yang Anda perlukan?" aria-label="Search service" />
                            <button type="button"
                                class="rounded-full py-3 px-3 bg-secondary-500 text-white text-xs md:text-base"
                                id="searchButton" aria-label="Search button">
                                <img src="{{ url('/images/icons/search.svg') }}" alt="Hot Icon" class="w-6" />
                            </button>
                        </form>

                        <!-- SUGGESTION BOX -->
                        <div id="suggestionBox"
                            class="w-full bg-white border border-secondary-500 rounded-lg mt-20 p-4 shadow-md absolute hidden z-50 top-0">
                            <ul id="suggestionList"></ul>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col-reverse lg:flex-row relative" data-aos="fade-up" data-aos-duration="2000"
                    data-aos-delay="50">
                    <div
                        class="relative lg:absolute p-4 md:pt-8 md:px-6 lg:mr-5 bg-white rounded-xl w-full lg:max-w-[360px] z-[99]">

                        <img src="{{ $siteSetting->foreground_image_url }}" alt=""
                            class="absolute left-0 bottom-full w-full hidden lg:block" data-aos="fade-up"
                            data-aos-duration="2000" data-aos-delay="50">

                        <div class="mb-4 md:mb-6 flex items-start">
                            <img id="service-icon" src="{{ $services[0]->icon_url }}" alt=""
                                class="w-14 h-14 md:w-20 md:h-20 object-cover mr-4" />
                            <div>
                                <h4 id="service-title"
                                    class="text-secondary-500 text-lg md:text-2xl font-nmb leading-normal">
                                    {{ $services[0]->title }}
                                </h4>
                                <p id="service-detail" class="text-gray-900 text-xs md:text-base">
                                    {{ $services[0]->detail }}
                                </p>
                            </div>
                        </div>
                        <div class="p-md:p-4 pl-6 md:pl-8 py-2 mb-4 md:mb-6 rounded-xl border-2 border-[#FDEBD0]">
                            <ul class="list-disc list-outside">
                                <li class="text-gray-900 text-xs md:text-base">Renovasi Rumah Sesuai Budget - Kami memahami
                                    pentingnya perencanaan anggaran.</li>
                                <li class="text-gray-900 text-xs md:text-base">Oleh karena itu, kami menawarkan berbagai
                                    pilihan paket renovasi yang dapat disesuaikan dengan budget Anda. Konsultasikan dengan
                                    paktukang untuk mendapatkan solusi terbaik.</li>
                            </ul>
                        </div>
                        <a id="service-link" href=""
                            class="py-3 px-5 inline-block w-full rounded-full bg-secondary-500 text-white text-center font-semibold">
                            DAPATKAN PENAWARAN!
                        </a>
                    </div>
                    <div
                        class="flex-1 h-fit pb-3 mb-4 overflow-x-auto scrollbar-thin scrollbar-thumb-gray-500 scrollbar-track-gray-200 lg:ml-[380px]">
                        <div class="flex gap-4">
                            <!-- Card Template -->
                            @foreach ($services as $index => $service)
                                <button data-index="{{ $index }}"
                                    class="btn-services outline-0 flex-none pt-0 pb-2 px-3 md:pb-4 md:px-6 border-b-4 border-slate-500 flex flex-col items-center"
                                    data-aos="zoom-in">
                                    <img src="{{ $service->icon_url }}" alt="{{ $service->title }}"
                                        class="w-14 h-14 md:w-20 md:h-20 object-cover">
                                    <h4
                                        class="text-white text-xs md:text-base text-center font-normal font-nmb leading-normal mt-2">
                                        {{ $service->title }}
                                    </h4>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="bg-[#fbddb161] hidden lg:flex justify-end rounded-2xl text-center p-8 h-3/4">
                    <img id="service-hero" src="{{ $services[0]->hero_image_url }}" alt=""
                        class="w-10/12 object-cover h-[450px] rounded-2xl">
                </div>
            </div>
        </article>
    </section>

    {{-- PROMO --}}
    @if (count($promotions) > 0)
        <article class="container">
            <h2 class="section-title text-gray-900">Penawaran Menarik</h2>
            <div class="swiper promo-swiper mt-12">
                <div class="swiper-wrapper">
                    @foreach ($promotions as $promo)
                        <div class="swiper-slide">
                            <img src="{{ $promo->image_url }}" alt="{{ $promo->title }}"
                                class="flex rounded-md w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination promotion-pagination text-start"></div>
            </div>
        </article>
    @endif

    {{-- ACHIEVEMENTS --}}
    @if (count($achievements) > 0)
        <article id="achievements" class="bg-secondary-300 py-16 mt-24 relative">
            <div class="container">
                <h2 class="section-title text-gray-900">Pencapaian Kami</h2>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-20 mt-12">
                    @foreach ($achievements as $achievement)
                        <div
                            class="flex flex-col py-6 px-3 sm:py-0 sm:px-0 border-2 border-[#F7D4B5] rounded-xl sm:border-0">
                            <p
                                class="text-secondary-500 text-2xl sm:text-4xl font-nmb text-center sm:text-left leading-10 count">
                                {{ $achievement->value }}
                            </p>
                            <span
                                class="text-gray-600 text-base font-normal font-inter text-center sm:text-left leading-7">{{ $achievement->name }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- ornament -->
            <img src="{{ asset('images/ornaments/ornament.svg') }}" alt="ornament" class="absolute top-[15%] right-0">
        </article>
    @endif

    {{-- ORDER STEPS --}}
    <article id="order">
        <div class="container mt-28">
            <div>
                <h3 class="flex flex-col md:flex-row items-center justify-start gap-3 text-gray-900 small-title section-title"
                    data-aos="fade-up">
                    Mengapa Memilih <span class="text-secondary-500">Paktukang?</span>
                    {{-- <img id="navbar-logo" src="{{ $siteSetting->logo_url }}" alt="" class="w-36 md:w-44 inline-block"> --}}
                </h3>
            </div>
            {{-- parent --}}
            <div class="mt-8 flex flex-col lg:flex-row flex-wrap justify-between gap-x-4 gap-y-0 md:gap-y-10">
                @foreach ($orderFlows as $flow)
                    {{-- order --}}
                    <div
                        class="flex flex-row lg:flex-col justify-center items-center gap-3 lg:gap-6 w-full lg:w-[23%] order-wrapper">
                        <span
                            class="hidden md:block w-8 h-8 aspect-square bg-secondary-500 text-center text-white text-[20px] rounded-full z-20">
                            {{ $flow->order }}
                        </span>
                        {{-- card --}}
                        <div
                            class="card card-step card-hover h-full after:content[''] after:absolute after:w-[2px] lg:after:w-full after:h-[calc(100%+2rem)] lg:after:h-[2px] after:bg-gray-200 after:top-1/2 after:-left-[1.8rem] lg:after:left-[57%] lg:after:-top-10 relative line {{ count($orderFlows) > 4 ? 'after:w-0 after:h-0 lg:after:w-0 lg:after:h-0' : '' }}">
                            <div class="toggle-collapsed flex items-center justify-between w-full">
                                <div>
                                    {{-- text --}}
                                    <img src="{{ $flow->icon_url }}" alt="" width="24" height="24"
                                        class="mb-2">
                                    <span class="text-gray-900 text-2xl font-nmb">{{ $flow->name }}</span>
                                    <p
                                        class="hidden md:block text-gray-600 text-sm lg:text-base font-normal font-inter leading-normal">
                                        {{ $flow->desc }}
                                    </p>
                                </div>
                                <div class="icon block md:hidden">
                                    <!-- Icon: default is minus -->
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                </div>
                            </div>
                            <p
                                class="collapsed-description hidden text-gray-600 text-sm lg:text-base font-normal font-inter leading-normal">
                                {{ $flow->desc }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </article>

    {{-- PORTFOLIO --}}
    <section id="portfolio" class="section">
        <article>
            <div class="container">
                <div class="max-w-[620px] w-full mt-36 mb-4">
                    <h1 class="section-title text-gray-900" data-aos="fade-up">Portofolio</h1>
                    <p class="title-desc" data-aos="fade-up">Masih ragu? Berikut hasil proyek yang telah kami kerjakan di
                        beberapa daerah seperti Surabaya dan Malang.</p>
                </div>

                <!-- button categories -->
                <div class="hidden md:flex flex-wrap gap-3">
                    <button
                        class="filter-portfolio btn btn-secondary hover:bg-secondary-500 hover:text-white text-secondary-500 text-sm lg:text-base font-normal lg:font-semibold font-inter"
                        data-filter="">
                        Semua
                    </button>
                    @foreach ($services as $service)
                        <button
                            class="filter-portfolio btn btn-outline hover:bg-secondary-500 hover:text-white text-secondary-500 text-sm lg:text-base font-normal lg:font-semibold font-inter"
                            data-filter="{{ $service->id }}">
                            {{ $service->title }}
                        </button>
                    @endforeach
                </div>
            </div>
            {{-- mobile categories button --}}
            <div class="flex md:hidden flex-wrap pl-9">
                <div class="swiper portfolio-cat-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($services as $service)
                            <div class="port-categories swiper-slide">
                                <button
                                    class="filter-portfolio btn btn-outline hover:bg-secondary-500 hover:text-white text-secondary-500 text-sm lg:text-base font-normal lg:font-semibold font-inter"
                                    data-filter="{{ $service->id }}">
                                    {{ $service->title }}
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="portfolioContainer"
                class="hidden md:grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-8 mt-12 container">
            </div>

            <div class="block md:hidden pl-9">
                <div class="swiper portfolio-swiper mt-14">
                    <div class="swiper-wrapper" id="portfolioMobileContainer">

                    </div>

                    <div id="loadingOrNotFoundContainer"></div>
                    {{-- portfolio mobile --}}
                    <div class="flex justify-center mt-14">
                        <a href="{{ route('landing.portfolio.index') }}"
                            class="border border-secondary-500 hover:border-secondary-500 hover:bg-secondary-500 hover:text-white hover:border-none rounded-full pl-4 pr-3 py-1 lg:pr-5 lg:pl-6 lg:py-3 text-secondary-500 text-sm lg:text-base font-semibold font-inter">Lihat
                            semua <i class="bi bi-arrow-right-short"></i></a>
                    </div>
        </article>
    </section>

    {{-- TESTIMONI --}}
    @if (count($testimonials) > 0)
        <section id="testimoni">
            <article>
                <div class="container mt-36">
                    <div class="w-full max-w-[799px]">
                        <h3 class="text-gray-900 text-xl font-normal font-inter leading-7" data-aos="fade-up">Testimoni
                        </h3>
                        <h1 class="section-title text-gray-900" data-aos="fade-up">Apa Kata Mereka?
                        </h1>
                    </div>
                    <div class="grid lg:grid-cols-2 grid-cols-1 items-center">
                        <img src="{{ asset('images/testimoni/testimoni_illustration.svg') }}" alt=""
                            class="mx-auto hidden md:block" data-aos="zoom-in">

                        <!-- list testimoni -->
                        <div class="swiper testimonial-swiper">
                            <div class="swiper-wrapper">
                                @foreach ($testimonials as $testimoni)
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <div class="flex gap-4">
                                                <img src="{{ $testimoni->photo_url == null ? asset('images/testimoni/user.png') : $testimoni->photo_url }}"
                                                    alt="person" class="w-12 h-12 rounded-md object-cover">
                                                <div class="">
                                                    <h5
                                                        class="text-gray-900 text-lg font-semibold font-inter leading-normal">
                                                        {{ Str::limit($testimoni->name, 20) }}
                                                    </h5>
                                                    </h5>
                                                    <p
                                                        class="text-neutral-500 text-base font-normal font-inter leading-tight">
                                                        {{ $testimoni->job_title }}
                                                    </p>
                                                </div>
                                            </div>
                                            <q class="mt-6 text-gray-900 text-sm lg:text-base font-medium font-inter">
                                                {{ $testimoni->content }}
                                            </q>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="swiper-pagination testimonial-pagination"></div>
                        </div>
                    </div>
            </article>
        </section>
    @endif

    {{-- BLOG --}}
    <section id="blog" class="section">
        <article>
            <div class="container mt-36">
                <div class="relative flex flex-col lg:flex-row justify-between lg:items-center mt-5" data-aos="fade-up">
                    <div class="max-w-[620px] w-full mt-5">
                        <h1 class="section-title text-gray-900">Blog dan Cerita</h1>
                        <p class="title-desc">Ikuti kami melalui cerita, tips & tricks, serta kegiatan kami setiap harinya.
                        </p>
                    </div>
                    <div id="controls"
                        class="absolute top-full md:top-5 right-0 flex justify-center flex-shrink-0 gap-3 mt-3 ml-auto lg:ml-0">
                        <button
                            class="previous swiper-button-prev text-gray-900 font-bold md:border md:border-gray-400 bg-white p-6 rounded-xl left-auto right-20"
                            style="--swiper-navigation-size: 18px;"></button>
                        <button
                            class="next swiper-button-next text-gray-900 font-bold md:border md:border-gray-400 bg-white p-6 rounded-xl"
                            style="--swiper-navigation-size: 18px;"></button>
                    </div>
                </div>
                <!-- cards blog -->
                <div class="swiper blog-swiper mt-14">
                    <div class="swiper-wrapper" id="blogContainer">
                    </div>

                </div>

                <div class="flex justify-center mt-14">
                    <a href="{{ env('GHOST_URL') }}"
                        class="border border-secondary-500 hover:border-secondary-500 hover:bg-secondary-500 hover:text-white hover:border-none rounded-full pl-4 pr-3 py-1 lg:pr-5 lg:pl-6 lg:py-3 text-secondary-500 text-sm lg:text-base font-semibold font-inter">
                        Lihat semua
                        <i class="bi bi-arrow-right-short"></i>
                    </a>
                </div>
        </article>
    </section>

    {{-- PARTNERSHIP --}}
    @if (count($partners))
        <section id="partnership">
            <article class="container my-36">
                <div class="max-w-[720px] w-full mt-5">
                    <h1 class="section-title text-gray-900" data-aos="fade-up">Telah <span
                            class="text-secondary-500">dipercaya oleh </span></h1>
                    <p class="title-desc" data-aos="fade-up">Beberapa partner dan collaborator kami dari sektor
                        Pemerintah,
                        Akademisi, Asosiasi/Komunitas, Lembaga Pembiayaan,
                        Industri, Inkubator Bisnis.</p>
                </div>
                <div class="hidden mx-auto items-center lg:flex lg:flex-wrap gap-6 mt-14">
                    @foreach ($partners as $partner)
                        <div class="flex justify-center">
                            <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}"
                                class="grayscale hover:grayscale-0 flex justify-center" width="120" height="80">
                        </div>
                    @endforeach
                </div>

                {{-- mobile --}}
                <div class="swiper partner-swiper mt-12 lg:hidden">
                    <div class="swiper-wrapper">
                        @foreach ($partners as $partner)
                            <div class="swiper-slide">
                                <img src="{{ $partner->logo_url }}" alt="{{ $partner->name }}"
                                    class="grayscale hover:grayscale-0 flex justify-center" width="120"
                                    height="80">
                            </div>
                        @endforeach
                    </div>
                </div>
            </article>
        </section>
    @endif
@endsection

@section('lib-script')
@endsection

@section('page-script')
    <script>
        // Service Data
        $(document).ready(function() {
            // Data dinamis dari backend, dikirimkan sebagai array JSON
            const services = @json($services);

            // Fungsi untuk memperbarui konten berdasarkan data layanan
            function updateServiceContent(service) {
                $('#service-title').text(service.title); // Perbarui judul
                $('#service-icon').attr('src', service.icon_url).attr('alt', service.title); // Perbarui ikon
                $('#service-hero').attr('src', service.hero_image_url).attr('alt', service.title); // Perbarui ikon
                $('#service-link').attr('href', ('/services/' + service.slug)); // Perbarui ikon
                $('#service-detail').text(service.detail); // Perbarui detail
            }

            // Inisialisasi halaman dengan data pertama
            if (services.length > 0) {
                $('.btn-services').eq(0).removeClass('border-slate-500').addClass('border-secondary-500');
                updateServiceContent(services[0]);
            }

            // Event listener untuk tombol
            $('.btn-services[data-index]').on('click', function() {

                $(this).removeClass('border-slate-500').addClass('border-secondary-500');
                $(this).siblings().removeClass('border-secondary-500').addClass('border-slate-500');

                // Ambil index dari tombol yang diklik
                const index = $(this).data('index');

                // Ambil data layanan sesuai index
                const service = services[index];

                // Perbarui konten dinamis
                updateServiceContent(service);
            });

            // Event listener untuk search bar
            $('#searchInput').on('input', function() {
                const input = $(this).val().toLowerCase();

                if (input.length > 0) {
                    $('#suggestionList').empty();

                    // Filter data layanan sesuai dengan keyword yang dimasukkan
                    const filteredSuggestions = services.filter(service =>
                        service.title.toLowerCase().includes(input.toLowerCase())
                    );

                    if (filteredSuggestions.length > 0) {
                        // Menampilkan kotak saran
                        $('#suggestionBox').show();

                        // Menampilkan data layanan dengan ikon khusus untuk "Tukang Harian"
                        filteredSuggestions.forEach(service => {
                            const isTukangHarian = service.title.toLowerCase() === 'tukang harian';
                            const iconSvg = isTukangHarian ?
                                `<span class='flex items-center text-xs'>
                                    Paling Banyak Dicari
                                    <img src="{{ url('/images/icons/icn_hot.svg') }}" alt="Hot Icon" class="w-4 h-4 ml-2" />
                                </span>` :
                                '';

                            $('#suggestionList').append(
                                `<li class="py-2 cursor-pointer flex justify-between items-center text-gray-500" data-slug="${service.slug}">
                                ${service.title}
                                <span class="flex items-center">${iconSvg}</span>
                            </li>`
                            );
                        });

                        // Menyesuaikan keyword pencarian saat di klik
                        $('#suggestionList li').on('click', function() {
                            const selectedServiceTitle = $(this).clone().children().remove().end()
                                .text().trim();
                            const selectedSlug = $(this).data('slug');

                            $('#searchInput').val(selectedServiceTitle);
                            $('#searchButton').data('slug', selectedSlug);
                            $('#suggestionBox').hide();
                        });
                    } else {
                        $('#suggestionList').append(
                            `<li class="py-2 text-gray-500">Layanan tidak ditemukan.</li>`);
                    }

                    // Trigger tombol pencarian saat diklik sesuai dengan keyword yang dipilih
                    $('#searchButton').off('click').on('click', function() {
                        const inputValue = $('#searchInput').val().trim().toLowerCase();

                        if (inputValue.length > 0) {
                            const matchedService = services.find(service =>
                                service.title.toLowerCase() === inputValue
                            );

                            window.location.href = `/services/${matchedService.slug}`;
                        }
                    });
                } else {
                    $('#suggestionBox').hide();
                }
            });

            // Trigger tombol pencarian saat diklik enter
            $('#searchForm').on('submit', function(event) {
                event.preventDefault();
                $('#searchButton').trigger('click');
            });
        });
    </script>

    <script>
        // Collapsed Order Flow
        $(document).ready(function() {
            const mediaQuery = window.matchMedia("(max-width: 768px)");

            function toggleDescription() {
                $(".toggle-collapsed").on("click", function() {
                    const content = $(this).next(".collapsed-description");

                    if (content.is(":visible")) {
                        content.slideUp(300, function() {
                            $(this).addClass("hidden");
                        });

                        $(this).find(".icon").html(`
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                        `);
                    } else {
                        content.hide().removeClass("hidden").slideDown(300);

                        $(this).find(".icon").html(`
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <line x1="5" y1="12" x2="19" y2="12" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                            </svg>
                        `);
                    }
                });
            }

            function checkMediaQuery(e) {
                if (e.matches) {
                    toggleDescription();
                } else {
                    $(".toggle-collapsed").off("click");
                }
            }

            mediaQuery.addEventListener("change", checkMediaQuery);
            checkMediaQuery(mediaQuery);
        });
    </script>

    <script>
        const observerAchievement = new IntersectionObserver(function(entries) {
            if (entries[0].isIntersecting === true)
                animateAchievement();
        }, {
            threshold: [0]
        });
        observerAchievement.observe(document.querySelector(".count"));

        function animateAchievement() {
            $(".count").each(function() {
                let num = 0;
                let achievementValue = parseInt($(this).text().trim());

                const animation = setInterval(function() {
                    num += 50;
                    if (num > achievementValue) num = achievementValue;
                    $(this).text(num + "+");
                    if (num >= achievementValue) clearInterval(animation);
                }.bind(this), 60);
            });
        }

        $(document).ready(function() {
            animateAchievement();
            const firstMenuItem = $('nav ul li a').first();
            firstMenuItem.addClass('active');
            // testimoni slider
            @if (count($testimonials) > 0)
                const testiSwiper = new Swiper('.testimonial-swiper', {
                    loop: true,
                    speed: 1000,
                    autoplay: {
                        delay: 4000,
                    },
                    spaceBetween: 30,
                    grabCursor: true,
                    centeredSlides: false,
                    slidesPerView: 1,
                    pagination: {
                        el: '.testimonial-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                        },
                        1024: {
                            slidesPerView: 1,
                        },
                        1200: {
                            slidesPerView: 2
                        }
                    }
                });
            @endif

            @if (count($promotions) > 0)
                const promotionSwiper = new Swiper('.promo-swiper', {
                    loop: true,
                    speed: 1000,
                    autoplay: {
                        delay: 4000,
                    },
                    freeMode: true,
                    spaceBetween: 30,
                    grabCursor: true,
                    centeredSlides: false,
                    slidesPerView: 1,
                    pagination: {
                        el: '.promotion-pagination',
                        clickable: true,
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                        },
                        1024: {
                            slidesPerView: 1,
                        },
                        1200: {
                            slidesPerView: 3
                        }
                    }
                });
            @endif

            // portfolio mobile
            const portfolioCatSwiper = new Swiper(".portfolio-cat-swiper", {
                loop: false,
                centeredSlides: false,
                spaceBetween: 12,
                slidesPerView: 'auto',
                freeMode: false,
                navigation: {
                    nextEl: ".port-next",
                    prevEl: ".port-prev",
                },
            });
            const portfolioSwiper = new Swiper(".portfolio-swiper", {
                loop: false,
                centeredSlides: false,
                spaceBetween: 20,
                slidesPerView: 'auto',
                freeMode: false,
                navigation: {
                    nextEl: ".port-next",
                    prevEl: ".port-prev",
                },
            });

            // Blog Slider
            const blogSwiper = new Swiper(".blog-swiper", {
                loop: false,
                centeredSlides: false,
                spaceBetween: 30,
                slidesPerView: 1,
                freeMode: false,
                navigation: {
                    nextEl: ".next",
                    prevEl: ".previous",
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                },
            });

            // partner in mobile view
            const partnerSwiper = new Swiper(".partner-swiper", {
                loop: true,
                speed: 2000,
                slidesPerView: 2,
                autoplay: {
                    delay: 0,
                },
            })
        })


        const endpoint = "{{ route('landing.portfolio.get') }}";
        const queryParams = {
            limit: 6,
            page: 1,
            service: ''
        }

        $(document).ready(function() {
            setLoading('#loadingOrNotFoundContainer');
            getPortfolios(endpoint, queryParams);
        })

        $('.filter-portfolio').click(function() {
            setActiveButton(this);
            setEmptyPortfolio();
            setLoading('#loadingOrNotFoundContainer');

            queryParams.service = $(this).data('filter');

            getPortfolios(endpoint, queryParams);
        })

        function getPortfolios(endpoint, queryParams) {
            $.ajax({
                url: endpoint,
                type: 'GET',
                data: queryParams,
                success: function(response) {
                    if (response.data.length > 0) {
                        removeLoadingOrNotFound('#loadingOrNotFoundContainer');
                        setPortfolioList(response.data);
                    } else {
                        setNotFound('#loadingOrNotFoundContainer');
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function setActiveButton(target) {
            $('.filter-portfolio').removeClass('btn-secondary');
            $('.filter-portfolio').addClass('btn-outline');
            $(target).removeClass('btn-outline');
            $(target).addClass('btn-secondary');
        }

        function renderPortfolioCard(portfolio) {
            return `
                <a class="mr-3 portfolio-img" href="${getDetailUrl(portfolio.slug)}">
                    <img src="${portfolio.images[0]}" alt="${portfolio.title}"
                        class="rounded-xl w-full h-full max-h-[300px] object-cover aspect-[4/3]">
                    <div
                        class="text absolute bottom-0 bg-black rounded-b-2xl text-white opacity-0">
                        <p class="title text-xl mb-3 font-nm">${mbStrimWidth(portfolio.title, 0, 50, '...')}</p>
                        <p class="desc text-sm font-nm">
                            ${mbStrimWidth(portfolio.desc, 0, 80, '...')}
                        </p>
                    </div>
                </a>
            `;
        }

        function renderPortfolioMobileCard(portfolio) {
            return `
              <div class="swiper-slide">
                <a class="mr-0 portfolio-img" href="${getDetailUrl(portfolio.slug)}">
                    <img src="${portfolio.images[0]}" alt="${portfolio.title}"
                        class="rounded-xl w-full h-full max-h-[300px] object-cover aspect-[4/3]">
                    <div
                        class="text absolute bottom-0 bg-black rounded-b-2xl text-white opacity-0">
                        <p class="title text-xl mb-3 font-nm">${mbStrimWidth(portfolio.title, 0, 50, '...')}</p>
                        <p class="desc text-sm font-nm">
                            ${mbStrimWidth(portfolio.desc, 0, 80, '...')}
                        </p>
                    </div>
                </a>
              </div>
            `;
        }

        function getDetailUrl(slug) {
            return "{{ route('landing.portfolio.detail', ':slug') }}".replace(':slug', slug);
        }

        function mbStrimWidth(str, start, width, trimmarker) {
            var len = 0;
            var trimmarker = trimmarker || '...';
            var w = '';
            var width = width - trimmarker.length;

            for (var i = start, l = str.length; i < l; i++) {
                var c = str.charCodeAt(i);
                len += c < 128 ? 1 : 2;
                if (len > width) {
                    return w + trimmarker;
                }
                w += str[i];
            }
            return str;
        }

        function setPortfolioList(portfolios) {
            portfolios.forEach(portfolio => {
                $('#portfolioContainer').append(renderPortfolioCard(portfolio));
                $('#portfolioMobileContainer').append(renderPortfolioMobileCard(portfolio));
            });
        }

        function setLoading(id) {
            $(`${id}`).html(`
                <div class="flex justify-center items-center w-full h-[300px]">
                    <div role="status">
                        <svg aria-hidden="true" class="inline w-10 h-10text-gray-200 animate-spin dark:text-gray-600 fill-yellow-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            `);
        }

        function setNotFound(id) {
            $(`${id}`).html(`
                <div class="flex justify-center items-center w-full h-[300px]">
                    <p class="text-gray-500">Belum ada data yang ditampilkan</p>
                </div>
            `);
        }

        function removeLoadingOrNotFound(id) {
            $(`${id}`).html('');
        }

        function setEmptyPortfolio() {
            $('#portfolioContainer').html('');
            $('#portfolioMobileContainer').html('');
        }

        const ghostApiUrl = "{{ env('GHOST_API_URL') }}";
        const ghostApiKey = "{{ env('GHOST_API_KEY') }}";
        const plcaceholderImage = "{{ asset('images/placeholder.png') }}";

        $(document).ready(function() {
            getBlogPosts();
        })

        function getBlogPosts() {
            setLoading('#blogContainer');
            $.ajax({
                url: `${ghostApiUrl}/content/posts`,
                type: 'GET',
                data: {
                    key: ghostApiKey,
                    limit: 10,
                    fields: 'id,title,feature_image,url,created_at',
                    order: 'created_at DESC'
                },
                success: function(response) {
                    removeLoadingOrNotFound('#blogContainer');
                    if (response.posts.length > 0) {
                        setBlogList(response.posts);
                    } else {
                        setNotFound('#blogContainer');
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function setBlogList(posts) {
            posts.forEach(post => {
                $('#blogContainer').append(renderBlogCard(post));
            });
        }

        function renderBlogCard(post) {
            return `
                <div class="swiper-slide card card-hover justify-between" style="height: 460px">
                            <a href="${post.url}" class="">
                                <div class="">
                                    <img src="${post.feature_image || plcaceholderImage}" alt="blog"
                                        class="w-full object-cover h-[200px] rounded-xl mb-4">
                                    <h5 class="card-title">${mbStrimWidth(post.title, 0, 40, '...')}</h5>
                                    <p
                                        class="text-gray-900 text-sm lg:text-base font-normal font-inter leading-normal mt-2 mb-6">
                                        ${formatDate(post.created_at)}
                                    </p>
                                </div>
                                </a>
                                <a href="${post.url}" class="text-secondary-500 font-semibold text-start">
                                    Lihat selengkapnya
                                    <i class="bi bi-arrow-right-short"></i>
                                </a>
                        </div>
            `;
        }

        function formatDate(date) {
            const options = {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            };
            return new Date(date).toLocaleDateString('id-ID', options);
        }
    </script>
@endsection

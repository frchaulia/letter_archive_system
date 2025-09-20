@extends('landing.main-landing')

@section('lib-style')
@endsection

@section('page-style')
    <style>
        html {
            scroll-padding-top: 5rem;
        }

        .hero {
            background-image: url({{ $service->hero_image_url }});
        }

        .portfolio-img {
            position: relative;
            float: left;
            margin-right: 10px;
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
            -webkit-transition: visibility 0s, opacity 0.5s linear;
            transition: visibility 0s, opacity 0.5s linear;
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

        /* order flow */
        .order-wrapper:last-child .line::after {
            width: 0;
            height: 0;
        }

        .clickup-embed {
            border: none !important;
            border-radius: 20px;
        }

        /* Form Steper */
        .step .step-number {
            background-color: #D4DBE4;
        }

        .step.active-step .step-number {
            background-color: #F39915;
        }

        .line-step {
            height: 6px;
            border-radius: 6px;
            background: linear-gradient(90deg, #F39915 50%, #D4DBE4 50%);
        }

        .line-step.half-line {
            background: linear-gradient(90deg, #D4DBE4 50%, #D4DBE4 50%);
        }

        .line-step.active-line {
            background: linear-gradient(90deg, #F39915 50%, #F39915 50%);
        }
    </style>
@endsection

{{-- @section('content')
    <section id="roofer" class="flex flex-col gap-24">
        <!-- hero -->
        <article id="hero-roofer" class="hero bg-cover bg-no-repeat bg-top h-screen w-full flex flex-col justify-center">
            <!-- hero content -->
            <div class="container flex flex-col gap-4 mt-24 sm:mt-0" data-aos="fade-up" data-aos-duration="2000"
                data-aos-delay="50">
                <!-- hero img -->
                <img src="{{ $service->icon_url }}" alt="" class="w-20 h-20 object-cover" />
                <!-- title -->
                <h1 class="text-5xl lg:text-7xl font-nmb text-white">
                    {{ substr($service->title, 0, strpos($service->title, ' ')) }}
                    <span class="text-secondary-500">
                        {{ substr($service->title, strpos($service->title, ' ')) }}
                    </span>
                </h1>
                <!-- desc -->
                <p class="text-base lg:text-xl font-inter text-white md:w-7/12">
                    {{ $service->tagline }}
                </p>
                <!-- cta button -->
                <a href="#form"
                    class="bg-secondary-500 pl-6 pr-5 py-3 rounded-3xl text-white mt-6 lg:font-semibold font-inter hover:bg-amber-400 transition-colors duration-300 w-fit">
                    Pesan Sekarang
                    <i class="bi bi-arrow-right-short ml-3"></i>
                </a>
            </div>
        </article>

        <!-- jenis kategory -->
        @if (count($service->categories ?? []) > 0)
            <article id="jenis-category" class="container">
                <div class="flex flex-col-reverse md:flex-col lg:flex-row lg:items-center lg:gap-4">
                    <!-- img category -->
                    <div class="relative hidden lg:block lg:w-4/12">
                        <img src="{{ asset('images/bg-ornament.png') }}" alt="" class="">
                        <div class="absolute inset-0">
                            <img src="{{ $service->category_image_url }}" alt=""
                                class="object-contain max-h-64 lg:max-h-full" />
                        </div>
                    </div>
                    <!-- content category -->
                    <div class="flex flex-col gap-10 lg:w-8/12">
                        <h2 class="text-gray-900 text-3xl md:text-5xl font-nmb" data-aos="fade-up"
                            data-aos-duration="900">
                            Jenis Kategori
                            {{ substr($service->title, 0, strpos($service->title, ' ')) }}
                            <span class="text-secondary-500">
                                {{ substr($service->title, strpos($service->title, ' ')) }}
                            </span>
                        </h2>
                        <div
                            class="grid md:grid-cols-2 gap-6 {{ count($service->categories) == 3 ? 'md:grid-cols-3' : '' }}">
                            @foreach ($service->categories as $category)
                                <div class="card flex flex-col justify-between">
                                    <div class="flex flex-col gap-3">
                                        <img src="{{ $category['icon_url'] }}" alt="icon-bocor"
                                            class="w-16 h-16 object-cover aspect-square" />
                                        <h3 class="text-secondary-500 font-bold text-2xl md:text-3xl font-nm">
                                            {{ $category['name'] }}
                                        </h3>
                                        <p class="text-zinc-600 font-inter">
                                            {{ $category['desc'] }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </article>
        @endif

        <!-- ORDER STEPS -->
        <article id="order">
            <div class="container mt-28">
                <h2 class="section-title text-gray-900 text-center" data-aos="fade-up">Alur <span class="text-secondary-500">Pemesanan</span>.</h2>
                <p class="title-desc text-center" data-aos="fade-up">Sangat mudah! Berikut adalah alur pemesanan jasa paktukang.</p>
                <!-- parent -->
                <div class="mt-8 flex flex-col lg:flex-row flex-wrap justify-between gap-x-4 gap-y-10">
                    @foreach ($orderFlows as $flow)
                        <!-- order -->
                        <div
                            class="flex flex-row lg:flex-col justify-center items-center gap-3 lg:gap-6 w-full lg:w-[23%] order-wrapper">
                            <span
                                class="w-8 h-8 aspect-square bg-secondary-500 text-center text-white text-[20px] rounded-full z-20">{{ $flow->order }}</span>
                            <!-- card -->
                            <div
                                class="card card-hover h-full after:content[''] after:absolute after:w-[2px] lg:after:w-full after:h-[calc(100%+2rem)] lg:after:h-[2px] after:bg-gray-200 after:top-1/2 after:-left-[1.8rem] lg:after:left-[57%] lg:after:-top-10 relative line {{ count($orderFlows) > 4 ? 'after:w-0 after:h-0 lg:after:w-0 lg:after:h-0' : '' }}">
                                <!-- text -->
                                <img src="{{ $flow->icon_url }}" alt="" width="24" height="24">
                                <span class="text-gray-900 text-2xl font-nmb">{{ $flow->name }}</span>
                                <p class="text-gray-600 text-sm lg:text-base font-normal font-inter leading-normal">
                                    {{ $flow->desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>

        <!-- FORM ORDER GET FROM CLICK UP -->
        <article id="form" class="container">
            {!! $service->order_form_iframe !!}
        </article>

        <!-- portofolio -->
        @if ($portfolios->count() > 0)
            <article id="portofolio" class="container">
                <!-- title -->
                <div class="text-start" data-aos="fade-up" data-aos-duration="900">
                    <h2 class="text-gray-900 font-bold text-3xl md:text-5xl font-nm">
                        Portofolio
                        <span class="text-secondary-500">
                            {{ substr($service->title, strpos($service->title, ' ')) }}
                        </span>
                        yang Sudah Kami Kerjakan.
                    </h2>
                    <p class="text-gray-600 md:text-xl font-inter mt-3 w-full lg:w-6/12">
                        Masih ragu? Berikut hasil proyek yang telah kami kerjakan di
                        beberapa daerah seperti Surabaya dan Malang.
                    </p>
                </div>

                <!-- content -->
                <div id="portfolioContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-8 mt-12">
                </div>

                <div id="loadingOrNotFoundContainer"></div>

                <div class="flex justify-center mt-14" id="showMoreContainer">
                    <button id="showMore"
                        class="border border-secondary-500 hover:border-secondary-500 hover:bg-secondary-500 hover:text-white hover:border-none rounded-full pl-4 pr-3 py-1 lg:pr-5 lg:pl-6 lg:py-3 text-secondary-500 text-sm lg:text-base font-semibold font-inter">
                        Lihat Lebih Banyak
                        <i class="bi bi-arrow-down-short"></i>
                    </button>
                </div>
            </article>
        @endif
    </section>
@endsection --}}

@section('content')
    {{-- {{ dd($service) }} --}}
    {{-- Headers --}}
    <div class="flex mt-16 md:mt-28 justify-between items-center container px-0 md:px-4 sm:px-8 py-4 bg-white">
        {{-- <a href="{{ route('landing.home.index') . '#beranda' }}"><img src="{{ $siteSetting->logo_url }}" alt=""
                class="w-36 md:w-52"></a> --}}
        <div class="w-full">
            <div class="flex justify-center">
                <button
                    class="tab-btn w-full font-medium text-center border-secondary-500 hover:text-secondary-500 py-2 focus:outline-none border-b-2 text-secondary-500 hover:border-secondary-500"
                    data-tab="tab1">Pesan Sekarang</button>
                <button
                    class="md:px-4 tab-btn w-full font-medium text-center text-gray-300 hover:text-secondary-500 py-2 focus:outline-none border-b-2 border-gray-300 hover:border-secondary-500"
                    data-tab="tab2">Layanan & Alur Pemesanan</button>
            </div>
        </div>
        {{-- <button onclick="window.open('{{ getWhatsAppLink($siteSetting->contact_number) }}', '_blank')"
            class="btn bg-secondary-500 text-white hidden lg:flex hover:bg-amber-400 transition-colors duration-300">Konsultasi</button> --}}
    </div>

    {{-- Form Pengisian --}}
    <section id="tab1" class="tab-content mb-4 pb-8 pt-0 lg:pt-8 container px-4 md:px-8">

        <!-- Title & Fteper -->
        <div class="flex items-center flex-col md:flex-row">
            <h2 class="hidden sm:block md:mr-8 text-[30px] font-nmb font-bold text-primary-500">Jasa <span
                    class="text-secondary-500">{{ $service->title }}</span></h2>
            <div class="flex-1 w-full md:w-auto flex items-center justify-between mb-7 sm:mb-2">
                <!-- Step 1 -->
                <div id="step1" class="step active-step flex flex-col items-center text-center relative">
                    <div class="step-number w-6 h-6 rounded-full bg-blue-500 text-white flex items-center justify-center">1
                    </div>
                </div>

                <!-- Line between Step 1 and Step 2 -->
                <div class="line-step flex-1 mx-2"></div>

                <!-- Step 2 -->
                <div id="step2" class="step flex flex-col items-center text-center relative">
                    <div class="step-number w-6 h-6 rounded-full bg-gray-300 text-white flex items-center justify-center">2
                    </div>
                </div>

                <!-- Line between Step 2 and Step 3 -->
                <div class="line-step flex-1 mx-2"></div>

                <!-- Step 3 -->
                <div id="step3" class="step flex flex-col items-center text-center relative">
                    <div class="step-number w-6 h-6 rounded-full bg-gray-300 text-white flex items-center justify-center">3
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Content -->
        <div class="bg-[#fbddb161] rounded-xl p-2 sm:p-4 md:p-8 w-full">
            <!-- Header -->
            <div class="flex items-center md:items-start">
                <img src="{{ $service->icon_url }}" alt="" class="mr-6 w-20 h-20 object-cover" />
                <div>
                    <h2 class="text-xl font-semibold text-primary-500 mb-2">
                        Mari Rencanakan Renovasi Anda Agar Lebih Terukur!
                    </h2>
                    <ul class="hidden md:block list-outside list-disc pl-5 text-sm font-inter text-gray-600 mb-6">
                        <li>Formulir ini akan digunakan oleh konsultan untuk memahami kebutuhan dan keinginan Anda terkait
                            perencanaan aktivitas renovasi Anda.</li>
                        <li>Konsultan akan menghubungi Anda untuk menjadwalkan konsultasi atau pertemuan untuk membahas
                            hasil formulir ini lebih lanjut.</li>
                    </ul>
                </div>
            </div>

            <ul class="md:hidden list-outside list-disc pl-5 text-sm font-inter text-gray-600 mt-2 mb-4">
                <li>Formulir ini akan digunakan oleh konsultan untuk memahami kebutuhan dan keinginan Anda terkait
                    perencanaan aktivitas renovasi Anda.</li>
                <li>Konsultan akan menghubungi Anda untuk menjadwalkan konsultasi atau pertemuan untuk membahas hasil
                    formulir ini lebih lanjut.</li>
            </ul>

            <!-- Form -->
            <form action="#" method="POST">
                <!-- Step 1 -->
                <div data-step="1" class="step-content">
                    <div class="mb-4 md:mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Customer Name -->
                        <div>
                            <label for="custName" class="block text-sm font-medium text-gray-800 mb-1">
                                Siapakah Nama Anda <span class="text-red-500">*</span>
                            </label>
                            <input required type="text" id="custName" name="custName" placeholder="Masukan Nama Anda"
                                class="w-full rounded-lg focus:ring-orange-500 focus:border-orange-500 px-3 py-2">
                        </div>

                        <!-- Customer Phone -->
                        <div>
                            <label for="custPhone" class="block text-sm font-medium text-gray-800 mb-1">
                                Nomor Handphone / Whatsapp Aktif <span class="text-red-500">*</span>
                            </label>
                            <input required type="tel" id="custPhone" name="custPhone" placeholder="Nomor Whatsapp"
                                pattern="^(\+62|62|0)8[1-9][0-9]{9,11}$"
                                class="w-full rounded-lg focus:ring-orange-500 focus:border-orange-500 px-3 py-2">
                        </div>
                    </div>

                    <div class="mb-4 md:mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Customer City -->
                        <div>
                            <label for="custCity" class="block text-sm font-medium text-gray-800 mb-1">
                                Asal Kota / Kabupaten <span class="text-red-500">*</span>
                            </label>
                            <select id="custCity" name="custCity"
                                class="w-full rounded-lg focus:ring-orange-500 focus:border-orange-500 px-3 py-2">
                                <option value="" disabled selected>Pilih Opsi</option>
                                <option value="kota malang">KOTA MALANG</option>
                                <option value="kabupaten malang">KAB. MALANG</option>
                                <option value="batu">KOTA BATU</option>
                                <option value="surabaya">SURABAYA</option>
                                <option value="sidoarjo">SIDOARJO</option>
                                <option value="gresik">KOTA GRESIK</option>
                                <option value="kediri">KEDIRI</option>
                            </select>
                        </div>

                        <!-- Customer Address -->
                        <div>
                            <label for="custAddress" class="block text-sm font-medium text-gray-800 mb-1">
                                Alamat Lokasi <span class="text-red-500">*</span>
                            </label>
                            <input required type="text" id="custAddress" name="custAddress" placeholder="Masukan Lokasi"
                                class="w-full rounded-lg focus:ring-orange-500 focus:border-orange-500 px-3 py-2">
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end items-center mt-8">
                        <button type="button"
                            class="w-full sm:w-auto py-3 px-4 sm:px-12 font-inter btn-next bg-secondary-500 text-sm sm:text-semibold text-white rounded-full hover:bg-amber-400 transition-colors duration-300">
                            Lanjutkan
                            <i class="bi bi-arrow-right-short"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 2 -->
                <div data-step="2" class="step-content">
                    <div class="mb-4 md:mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Source -->
                        <div>
                            <label for="source" class="block text-sm font-medium text-gray-800 mb-1">
                                Dari mana mengetahui PakTukang.com? <span class="text-red-500">*</span>
                            </label>
                            <select id="source" name="source"
                                class="w-full rounded-lg focus:ring-orange-500 focus:border-orange-500 px-3 py-2">
                                <option value="" disabled selected>Pilih Opsi</option>
                                <option value="Pesan Sebelumnya">PERNAH PESAN SEBELUMNYA</option>
                                <option value="Sales">SALES MARKETING</option>
                                <option value="Teman/Keluarga">REFERENSI TEMAN / KELUARGA</option>
                                <option value="Instagram">INSTAGRAM</option>
                                <option value="Google">GOOGLE</option>
                                <option value="Google Maps">GOOGLE MAPS</option>
                                <option value="OLX">OLX</option>
                                <option value="Facebook">FACEBOOK</option>
                                <option value="TikTok">TikTok</option>
                            </select>
                        </div>
                        <!-- Building Type -->
                        <div>
                            <label for="buildingType" class="block text-sm font-medium text-gray-800 mb-1">
                                Tipe Bangunan yang akan direnovasi <span class="text-red-500">*</span>
                            </label>
                            <select id="buildingType" name="buildingType"
                                class="w-full rounded-lg focus:ring-orange-500 focus:border-orange-500 px-3 py-2">
                                <option value="" disabled selected>Pilih Opsi</option>
                                <option value="Rumah">RUMAH</option>
                                <option value="Kantor">KANTOR</option>
                                <option value="Appartemen">APPARTEMEN</option>
                                <option value="Kos">KOS</option>
                                <option value="Penginapan">PENGINAPAN HOTEL</option>
                                <option value="Ruko">RUKO / KIOS</option>
                                <option value="Cafe">CAFE / RESTAURANT</option>
                                <option value="Lainnya">LAINNYA</option>
                            </select>
                        </div>
                    </div>

                    {{-- <div class="mb-4 md:mb-6 grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Room Size -->
                        <div>
                        <label for="roomSize" class="block text-sm font-medium text-gray-800 mb-1">
                            Luas Ruangan yang akan direnovasi <span class="text-red-500">*</span>
                        </label>
                        <select id="roomSize" name="roomSize" class="w-full rounded-lg focus:ring-orange-500 focus:border-orange-500 px-3 py-2">
                            <option value="" disabled selected>Pilih Opsi</option>
                            <option value="10-20">10-20 m²</option>
                            <option value="20-50">20-50 m²</option>
                            <option value="50+">Lebih dari 50 m²</option>
                        </select>
                        </div>
                        <!-- Budget -->
                        <div>
                        <label for="budget" class="block text-sm font-medium text-gray-800 mb-1">
                            Berapa perkiraan anggaran renovasi yang akan dialokasikan? <span class="text-red-500">*</span>
                        </label>
                        <select id="budget" name="budget" class="w-full rounded-lg focus:ring-orange-500 focus:border-orange-500 px-3 py-2">
                            <option value="" disabled selected>Pilih Opsi</option>
                            <option value="5t">< Rp5.000.000</option>
                            <option value="5t-20jt">Rp5.000.001 - Rp20.000.000</option>
                            <option value="20jt-50jt">Rp20.000.001 - Rp50.000.000</option>
                            <option value="50jt-100jt">Rp50.000.001 - Rp100.000.000</option>
                            <option value="100jt-250jt">Rp100.000.001 - Rp250.000.000</option>
                            <option value="250t">> Rp250.000.000</option>
                        </select>
                        </div>
                    </div> --}}

                    <!-- Buttons -->
                    <div class="flex justify-end items-center mt-8">
                        <button type="button"
                            class="w-1/2 sm:w-auto py-3 px-12 font-inter btn-prev text-secondary-500 text-semibold rounded-full hover:text-primary-500 transition-colors duration-300">
                            Kembali
                        </button>
                        <button type="button"
                            class="w-1/2 sm:w-auto py-3 px-4 sm:px-12 font-inter btn-next bg-secondary-500 text-sm sm:text-semibold text-white rounded-full hover:bg-amber-400 transition-colors duration-300">
                            Lanjutkan
                            <i class="bi bi-arrow-right-short"></i>
                        </button>
                    </div>
                </div>

                <!-- Step 3 -->
                <div data-step="3" class="step-content">
                    <div class="mb-6 grid grid-cols-1">
                        <!-- Customer Name -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-800 mb-1">
                                Perubahan atau renovasi apa yang ingin Anda lakukan? (contoh : penambahan dapur, pengecatan,
                                dan ganti keramik). <span class="text-red-500">*</span>
                            </label>
                            <textarea required id="description" rows="3" name="description"
                                placeholder="Penjelasan Lengkap terkait Kondisi Saat Ini"
                                class="w-full rounded-lg focus:ring-orange-500 focus:border-orange-500 px-3 py-2"></textarea>
                        </div>
                    </div>

                    <div class="mb-6 grid grid-cols-1">
                        <!-- Customer Address -->
                        <div>
                            <label for="custAddress" class="block text-sm font-medium text-gray-800 mb-1">
                                Lampirkan ada foto lokasi dan referensi yang Anda Inginkan.
                            </label>
                            <!-- Drag & Drop Area -->
                            <div id="dropArea"
                                class="border-2 border-dashed border-primary-500 rounded-md bg-secondary-300 p-6 text-center">
                                <p class="mt-1 text-[#4B4B4B]">Drag & Drop atau <span
                                        class="text-blue-600 underline cursor-pointer" id="fileInputTrigger">Cari
                                        File</span></p>
                                <p class="mb-1 text-sm  text-[#4B4B4B]">Maksimal 2 MB per file</p>
                                <input type="file" id="fileInput" name="files" class="hidden" multiple
                                    accept="image/*" />

                                <!-- Preview Container -->
                                <div id="previewContainer" class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-6 gap-4">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end items-center mt-8">
                        <button type="button"
                            class="w-1/2 sm:w-auto py-3 px-12 font-inter btn-prev text-secondary-500 text-semibold rounded-full hover:text-primary-500 transition-colors duration-300">
                            Kembali
                        </button>
                        <button type="Submit"
                            class="w-1/2 sm:w-auto py-3 px-4 sm:px-12 font-inter btn-next bg-secondary-500 text-sm sm:text-semibold text-white rounded-full hover:bg-amber-400 transition-colors duration-300">
                            Kirim Sekarng
                            <i class="bi bi-arrow-right-short"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </section>

    {{-- Layanan & Alur --}}
    <section id="tab2" class="tab-content hidden pb-8 pt-0 lg:pt-8 container">

        <!-- hero -->
        <div class="container flex flex-col md:flex-row gap-4 mt-0 border p-[32px] rounded-3xl" data-aos="fade-up"
            data-aos-duration="2000" data-aos-delay="50">
            <!-- hero img -->
            <img src="{{ $service->icon_url }}" alt="" class="w-20 h-20 object-cover" />
            <div>
                <!-- title -->
                <h1 class="text-[36px] font-nmb text-primary-500">
                    {{ substr($service->title, 0, strpos($service->title, ' ')) }}
                    <span class="text-secondary-500">
                        {{ substr($service->title, strpos($service->title, ' ')) }}
                    </span>
                </h1>
                <!-- desc -->
                <p class="text-base lg:text-xl font-inter text-gray-600">
                    {{ $service->tagline }}
                </p>
            </div>
        </div>

        <!-- ORDER STEPS -->
        {{-- <article id="order">
            <div class="container mt-6 border p-[32px] rounded-3xl">
                <div class="flex gap-3">
                    <h2 class="flex items-center justify-start gap-3 text-[36px] font-bold text-primary-500"
                        data-aos="fade-up">Mengapa <span class="text-secondary-500">Memilih </span></h2>
                    <img id="navbar-logo" src="{{ $siteSetting->logo_url }}" alt=""
                        class="w-36 md:w-44 inline-block">
                </div>
                <!-- parent -->
                <div class="mt-8 flex flex-col lg:flex-row flex-wrap justify-between gap-x-4 gap-y-10">
                    @foreach ($orderFlows as $flow)
                        <!-- order -->
                        <div
                            class="flex flex-row lg:flex-col justify-center items-center gap-3 lg:gap-6 w-full lg:w-[23%] order-wrapper">
                            <span
                                class="w-8 h-8 aspect-square bg-secondary-500 text-center text-white text-[20px] rounded-full z-20">{{ $flow->order }}</span>
                            <!-- card -->
                            <div
                                class="card card-hover h-full after:content[''] after:absolute after:w-[2px] lg:after:w-full after:h-[calc(100%+2rem)] lg:after:h-[2px] after:bg-gray-200 after:top-1/2 after:-left-[1.8rem] lg:after:left-[57%] lg:after:-top-10 relative line {{ count($orderFlows) > 4 ? 'after:w-0 after:h-0 lg:after:w-0 lg:after:h-0' : '' }}">
                                <!-- text -->
                                <img src="{{ $flow->icon_url }}" alt="" width="24" height="24">
                                <span class="text-gray-900 text-2xl font-nmb">{{ $flow->name }}</span>
                                <p class="text-gray-600 text-sm lg:text-base font-normal font-inter leading-normal">
                                    {{ $flow->desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </article> --}}
        <article id="order">
            <div class="container mt-6 border p-[32px] rounded-3xl">
                <h2 class="section-title text-primary-500 text-left md:text-center" data-aos="fade-up">Alur <span
                        class="text-secondary-500">Pemesanan</span></h2>
                <p class="title-desc text-left md:text-center" data-aos="fade-up">Sangat mudah! Berikut adalah alur
                    pemesanan jasa
                    paktukang.</p>
                <!-- parent -->
                <div class="mt-8 flex flex-col lg:flex-row flex-wrap justify-between gap-x-4 gap-y-10">
                    @foreach ($orderFlows as $flow)
                        <!-- order -->
                        <div
                            class="flex flex-row lg:flex-col justify-center items-center gap-3 lg:gap-6 w-full lg:w-[23%] order-wrapper">
                            <span
                                class="w-8 h-8 aspect-square bg-secondary-500 text-center text-white text-[20px] rounded-full z-20">{{ $flow->order }}</span>
                            <!-- card -->
                            <div
                                class="card card-hover h-full after:content[''] after:absolute after:w-[2px] lg:after:w-full after:h-[calc(100%+2rem)] lg:after:h-[2px] after:bg-gray-200 after:top-1/2 after:-left-[1.8rem] lg:after:left-[57%] lg:after:-top-10 relative line {{ count($orderFlows) > 4 ? 'after:w-0 after:h-0 lg:after:w-0 lg:after:h-0' : '' }}">
                                <!-- text -->
                                <img src="{{ $flow->icon_url }}" alt="" width="24" height="24">
                                <span class="text-gray-900 text-2xl font-nmb">{{ $flow->name }}</span>
                                <p class="text-gray-600 text-sm lg:text-base font-normal font-inter leading-normal">
                                    {{ $flow->desc }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </article>

        <article id="portofolio" class="container mt-6 border p-[32px] rounded-3xl">
            <!-- title -->
            <div class="text-start" data-aos="fade-up" data-aos-duration="900">
                <h2 class="section-title text-primary-500 text-2xl md:text-5xl font-nm">
                    Portofolio
                    <span class="text-secondary-500">
                        {{ substr($service->title, strpos($service->title, ' ')) }}
                    </span>
                    yang Sudah Kami Kerjakan.
                </h2>
                <p class="text-gray-600 md:text-xl font-inter mt-3 w-full">
                    Masih ragu? Berikut hasil proyek yang telah kami kerjakan di
                    beberapa daerah seperti Surabaya dan Malang.
                </p>
            </div>

            <!-- content -->
            <div id="portfolioContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-8 mt-12">
            </div>

            <div id="loadingOrNotFoundContainer"></div>

            <div class="flex justify-center mt-14" id="showMoreContainer">
                <button id="showMore"
                    class="border border-secondary-500 hover:border-secondary-500 hover:bg-secondary-500 hover:text-white hover:border-none rounded-full pl-4 pr-3 py-1 lg:pr-5 lg:pl-6 lg:py-3 text-secondary-500 text-sm lg:text-base font-semibold font-inter">
                    Lihat Lebih Banyak
                    <i class="bi bi-arrow-down-short"></i>
                </button>
            </div>
        </article>

    </section>
@endsection

@section('lib-script')
@endsection

@section('page-script')
    <script>
        // Tab Functionality
        $('.tab-btn').click(function() {
            $(this).siblings().removeClass('border-secondary-500 text-secondary-500').addClass(
                'text-gray-300 border-gray-300');
            $(this).removeClass('text-gray-300 border-gray-300').addClass(
                'border-secondary-500 text-secondary-500');
            $('#' + $(this).attr('data-tab')).removeClass('hidden').siblings('.tab-content').addClass('hidden');
        });
    </script>

    <script>
        // Form Steper
        let currentStep = 1;
        const totalSteps = 3;

        function updateStepper() {
            for (let i = 1; i <= totalSteps; i++) {
                const $stepElement = $(`#step${i}`);
                if (i < currentStep) { // Next
                    $stepElement.addClass("active-step");
                } else if (i === currentStep) { // Current
                    $stepElement.addClass("active-step");
                } else { // Back
                    $stepElement.removeClass("active-step").addClass("inactive");
                }
            }

            $(".line-step").each(function(index) {
                if (index + 1 < currentStep) { // Active
                    $(this).addClass("active-line").removeClass("half-line");
                } else if (index === currentStep) { // Current
                    $(this).addClass("half-line").removeClass("active-line");
                } else { // Inactive
                    $(this).removeClass("active-line half-line");
                }
            });

            $(".step-content").each(function() {
                $(this).toggleClass("hidden", $(this).data("step") != currentStep);
            });
        }

        $(".btn-next").on("click", function() {
            if (currentStep < totalSteps) {
                currentStep++;
                updateStepper();
            }
        });

        $(".btn-prev").on("click", function() {
            if (currentStep > 1) {
                currentStep--;
                updateStepper();
            }
        });

        updateStepper();
    </script>

    <script>
        // Drag & Drop File Input
        $(document).ready(function() {
            const filesList = [];

            // File Input Trigger
            $('#fileInputTrigger').on('click', function() {
                $('#fileInput').click();
            });

            // Drag & Drop Events
            $('#dropArea')
                .on('dragover', function(e) {
                    e.preventDefault();
                    $(this).addClass('drag-active');
                })
                .on('dragleave', function() {
                    $(this).removeClass('drag-active');
                })
                .on('drop', function(e) {
                    e.preventDefault();
                    $(this).removeClass('drag-active');
                    handleFiles(e.originalEvent.dataTransfer.files);
                });

            // File Input Change Event
            $('#fileInput').on('change', function(e) {
                handleFiles(e.target.files);
            });

            // Handle Files
            function handleFiles(files) {
                Array.from(files).forEach((file) => {
                    if (file.type.startsWith('image/') && !filesList.some((f) => f.name === file.name)) {
                        if (file.size <= 2 * 1024 * 1024) {
                            filesList.push(file);
                            renderPreview(file);
                        } else {
                            alert(`File "${file.name}" terlalu besar! Maksimal 2 MB.`);
                        }
                    } else {
                        alert(`File "${file.name}" bukan gambar yang valid atau sudah ditambahkan.`);
                    }
                });
            }

            // Render File Preview
            function renderPreview(file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = $(`
                <div class="relative rounded-md overflow-hidden shadow-sm bg-white">
                    <img src="${e.target.result}" alt="${file.name}" class="w-full h-32 object-cover rounded-md">
                    <button class="absolute top-1 right-1 bg-red-500 text-white rounded-full px-2 py-1 text-xs remove-button">Remove</button>
                </div>
                `);

                    // Remove Button Click Event
                    preview.find('.remove-button').on('click', function() {
                        const index = filesList.findIndex((f) => f.name === file.name);
                        if (index > -1) filesList.splice(index, 1);
                        preview.remove();
                    });

                    $('#previewContainer').append(preview);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

    <script>
        // Form Submission
        $(document).ready(function() {
            $('#uploadForm').on('submit', function(e) {
                e.preventDefault();

                if (filesList.length === 0) {
                    alert('Harap unggah setidaknya satu file.');
                    return;
                }

                const formData = new FormData();
                filesList.forEach((file) => formData.append('files[]', file));

                // AJAX Request
                $.ajax({
                    url: '_ENDPOINT_',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#result').text('File berhasil diunggah!');
                    },
                    error: function() {
                        $('#result').text('Gagal mengunggah file!');
                    },
                });
            });
        });
    </script>

    <script>
        const endpoint = "{{ route('landing.portfolio.get') }}";
        const queryParams = {
            limit: 6,
            page: 1,
            service: '{{ $service->id }}'
        }

        $(document).ready(function() {
            hideBtnShowMore();
            setLoading();
            getPortfolios(endpoint, queryParams);
        })

        $('#showMore').click(function() {
            setLoading();

            queryParams.page++;
            getPortfolios(endpoint, queryParams);
        })

        function getPortfolios(endpoint, queryParams) {
            hideBtnShowMore();
            $.ajax({
                url: endpoint,
                type: 'GET',
                data: queryParams,
                success: function(response) {
                    if (response.data.length > 0) {
                        removeLoadingOrNotFound();
                        setPortfolioList(response.data);

                        if (response.next_page_url) {
                            showBtnShowMore();
                            addEventBtnShowMore();
                        } else {
                            hideBtnShowMore();
                        }
                    } else {
                        setNotFound();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

        function renderPortfolioCard(portfolio) {
            return `
                <a href="${getDetailUrl(portfolio.slug)}" class="portfolio-img">
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
            });
        }

        function setLoading() {
            $('#loadingOrNotFoundContainer').html(`
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

        function setNotFound() {
            $('#loadingOrNotFoundContainer').html(`
                <div class="flex justify-center items-center w-full h-[300px]">
                    <p class="text-gray-500">Belum ada portofolio yang ditampilkan</p>
                </div>
            `);
        }

        function removeLoadingOrNotFound() {
            $('#loadingOrNotFoundContainer').html('');
        }

        function showBtnShowMore() {
            $('#showMoreContainer').show();
        }

        function hideBtnShowMore() {
            $('#showMoreContainer').hide();
        }
    </script>
@endsection

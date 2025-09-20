@extends('landing.main-landing')

@section('lib-style')
@endsection

@section('page-style')
@endsection

@section('content')
    <section id="blog" class="mt-36 flex flex-col gap-24">
        <article class="container">
            <div class="w-full md:w-7/12">
                <!-- text header -->
                <div class="w-10/12 md:w-8/12">
                    <h1 class="text-gray-900 font-nmb text-3xl lg:text-5xl">Blog & Cerita <span
                            class="text-secondary-500">Hari
                            Ini</span></h1>
                    <p class="text-gray-600 text-xl font-inter">Berikut kami share portofolio yang sudah kami kerjakan
                        dibeberapa daerah seperti Surabaya dan
                        Malang</p>
                </div>

                <div class="flex gap-3 mt-6">
                    <!-- button filter -->
                    <div class="relative">
                        <select id="filter"
                            class="flex gap-2 items-center border border-secondary-500 rounded-lg text-secondary-500 bg-white appearance-none font-semibold font-inter pl-9 pr-5 py-3">
                            <option value="" selected hidden>Filter</option>
                            <option value="">2</option>
                            <option value="">3</option>
                        </select>
                        <i class="bi bi-funnel absolute top-3 left-2 text-secondary-500"></i>
                    </div>
                    <!-- input filter -->
                    <div class="relative flex w-full items-center">
                        <i class="bi bi-search text-gray-950 absolute top-3 left-3"></i>
                        <input type="text" placeholder="Cari Konten.."
                            class="bg-gray-100 rounded-lg py-3 pl-10 pr-5 outline-none focus:ring-1 focus:ring-secondary-500 w-full">
                    </div>
                </div>
            </div>
        </article>

        <!-- konten terfavorit -->
        <article id="favorit-content" class="container">
            <h2 class="text-gray-900 text-3xl lg:text-5xl font-nmb">Konten Terfavorit</h2>
            <div class="flex flex-col md:flex-row gap-4 mt-6">
                <div class="p-6 bg-white rounded-2xl border md:flex flex-col md:w-6/12 w-full">
                    <!-- img card -->
                    <img src="{{ asset('images/image.jpg') }}" alt="content"
                        class="w-full rounded-xl object-cover max-h-[200px] h-full mb-3">
                    <!-- text card -->
                    <div class="flex flex-col justify-between md:h-full gap-6">
                        <div class="flex flex-col gap-1.5">
                            <!-- card title -->
                            <h5 class="text-2xl lg:text-3xl font-nm font-bold text-gray-900">Cara Ngepel Dengan Bugdet Minim
                            </h5>
                            <p class="text-gray-600 text-base font-normal font-inter leading-normal mt-2">1 Nov 2023</p>
                            <!-- card content -->
                            <p class="text-gray-600 font-inter text-base">Lorem ipsum dolor sit amet consectetur. Velit non
                                nam
                                mauris eleifend sapien. Nibh pharetra amet
                                elementum dolor est posuere suspendisse nec. Volutpat faucibus amet porttitor odio malesuada
                                mattis scelerisque amet. Sed vestibulum nec vel vitae vitae accumsan. Faucibus libero lorem
                                pulvinar euismod faucibus arcu lacus. Sagittis ultricies dolor quam quis viverra euismod
                                diam
                                est. </p>
                        </div>
                        <!-- card footer -->
                        <a class="text-secondary-500 font-semibold" href="">Lihat selengkapnya <i class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
                <!-- side content -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-rows-2 gap-4 w-full md:w-6/12">
                    <div class="bg-white rounded-2xl p-6 border flex flex-col">
                        <!-- img card -->
                        <img src="{{ asset('images/image.jpg') }}" alt="content"
                            class="w-full rounded-xl object-cover max-h-[200px] h-full mb-3">
                        <!-- text card -->
                        <div class="flex flex-col justify-between gap-6">
                            <!-- card title -->
                            <div class="flex flex-col gap-1.5">
                                <h5 class="font-bold text-xl lg:text-2xl font-nm text-gray-900">Cara Ngepel Dengan Bugdet
                                    Minim</h5>
                                <p class="text-gray-600 text-base font-normal font-inter leading-normal">1 Nov 2023</p>
                            </div>
                            <!-- card footer -->
                            <a class="text-secondary-500 font-semibold" href="">Lihat selengkapnya <i
                                    class="bi bi-arrow-right-short"></i></a>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-6 border flex flex-col">
                        <!-- img card -->
                        <img src="{{ asset('images/image.jpg') }}" alt="content"
                            class="w-full rounded-xl object-cover max-h-[200px] h-full mb-3">
                        <!-- text card -->
                        <div class="flex flex-col justify-between gap-6">
                            <!-- card title -->
                            <div class="flex flex-col gap-1.5">
                                <h5 class="font-bold text-xl lg:text-2xl font-nm text-gray-900">Cara Ngepel Dengan Bugdet
                                    Minim</h5>
                                <p class="text-gray-600 text-base font-normal font-inter leading-normal">1 Nov 2023</p>
                            </div>
                            <!-- card footer -->
                            <a class="text-secondary-500 font-semibold" href="">Lihat selengkapnya <i
                                    class="bi bi-arrow-right-short"></i></a>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-6 border flex flex-col">
                        <!-- img card -->
                        <img src="{{ asset('images/image.jpg') }}" alt="content"
                            class="w-full rounded-xl object-cover max-h-[200px] h-full mb-3">
                        <!-- text card -->
                        <div class="flex flex-col justify-between gap-6">
                            <!-- card title -->
                            <div class="flex flex-col gap-1.5">
                                <h5 class="font-bold text-xl lg:text-2xl font-nm text-gray-900">Cara Ngepel Dengan Bugdet
                                    Minim</h5>
                                <p class="text-gray-600 text-base font-normal font-inter leading-normal">1 Nov 2023</p>
                            </div>
                            <!-- card footer -->
                            <a class="text-secondary-500 font-semibold" href="">Lihat selengkapnya <i
                                    class="bi bi-arrow-right-short"></i></a>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-6 border flex flex-col">
                        <!-- img card -->
                        <img src="{{ asset('images/image.jpg') }}" alt="content"
                            class="w-full rounded-xl object-cover max-h-[200px] h-full mb-3">
                        <!-- text card -->
                        <div class="flex flex-col justify-between gap-6">
                            <!-- card title -->
                            <div class="flex flex-col gap-1.5">
                                <h5 class="font-bold text-xl lg:text-2xl font-nm text-gray-900">Cara Ngepel Dengan Bugdet
                                    Minim</h5>
                                <p class="text-gray-600 text-base font-normal font-inter leading-normal">1 Nov 2023</p>
                            </div>
                            <!-- card footer -->
                            <a class="text-secondary-500 font-semibold" href="">Lihat selengkapnya <i
                                    class="bi bi-arrow-right-short"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </article>

        <!-- other -->
        <article id="other-article" class="container">
            <h2 class="text-gray-900 text-3xl lg:text-5xl font-nmb">Baca Juga Yang Lainnya!</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
                <div class="bg-white rounded-2xl p-6 border flex flex-col">
                    <!-- img card -->
                    <img src="{{ asset('images/image.jpg') }}" alt="content"
                        class="w-full rounded-xl object-cover max-h-[200px] h-full mb-3">
                    <!-- text card -->
                    <div class="flex flex-col justify-between gap-6">
                        <!-- card title -->
                        <div class="flex flex-col gap-1.5">
                            <h5 class="font-bold text-xl lg:text-2xl font-nm text-gray-900">Cara Ngepel Dengan Bugdet
                                Minim </h5>
                            <p class="text-gray-600 text-base font-normal font-inter leading-normal">1 Nov 2023</p>
                        </div>
                        <!-- card footer -->
                        <a class="text-secondary-500 font-semibold" href="">Lihat selengkapnya <i
                                class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 border flex flex-col">
                    <!-- img card -->
                    <img src="{{ asset('images/image.jpg') }}" alt="content"
                        class="w-full rounded-xl object-cover max-h-[200px] h-full mb-3">
                    <!-- text card -->
                    <div class="flex flex-col justify-between gap-6">
                        <!-- card title -->
                        <div class="flex flex-col gap-1.5">
                            <h5 class="font-bold text-xl lg:text-2xl font-nm text-gray-900">Cara Ngepel Dengan Bugdet
                                Minim</h5>
                            <p class="text-gray-600 text-base font-normal font-inter leading-normal">1 Nov 2023</p>
                        </div>
                        <!-- card footer -->
                        <a class="text-secondary-500 font-semibold" href="">Lihat selengkapnya <i
                                class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 border flex flex-col">
                    <!-- img card -->
                    <img src="{{ asset('images/image.jpg') }}" alt="content"
                        class="w-full rounded-xl object-cover max-h-[200px] h-full mb-3">
                    <!-- text card -->
                    <div class="flex flex-col justify-between gap-6">
                        <!-- card title -->
                        <div class="flex flex-col gap-1.5">
                            <h5 class="font-bold text-xl lg:text-2xl font-nm text-gray-900">Cara Ngepel Dengan Bugdet
                                Minim</h5>
                            <p class="text-gray-600 text-base font-normal font-inter leading-normal">1 Nov 2023</p>
                        </div>
                        <!-- card footer -->
                        <a class="text-secondary-500 font-semibold" href="">Lihat selengkapnya <i
                                class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 border flex flex-col">
                    <!-- img card -->
                    <img src="{{ asset('images/image.jpg') }}" alt="content"
                        class="w-full rounded-xl object-cover max-h-[200px] h-full mb-3">
                    <!-- text card -->
                    <div class="flex flex-col justify-between gap-6">
                        <!-- card title -->
                        <div class="flex flex-col gap-1.5">
                            <h5 class="font-bold text-xl lg:text-2xl font-nm text-gray-900">Cara Ngepel Dengan Bugdet
                                Minim</h5>
                            <p class="text-gray-600 text-base font-normal font-inter leading-normal">1 Nov 2023</p>
                        </div>
                        <!-- card footer -->
                        <a class="text-secondary-500 font-semibold" href="">Lihat selengkapnya <i
                                class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 border flex flex-col">
                    <!-- img card -->
                    <img src="{{ asset('images/image.jpg') }}" alt="content"
                        class="w-full rounded-xl object-cover max-h-[200px] h-full mb-3">
                    <!-- text card -->
                    <div class="flex flex-col justify-between gap-6">
                        <!-- card title -->
                        <div class="flex flex-col gap-1.5">
                            <h5 class="font-bold text-xl lg:text-2xl font-nm text-gray-900">Cara Ngepel Dengan Bugdet
                                Minim</h5>
                            <p class="text-gray-600 text-base font-normal font-inter leading-normal">1 Nov 2023</p>
                        </div>
                        <!-- card footer -->
                        <a class="text-secondary-500 font-semibold" href="">Lihat selengkapnya <i
                                class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 border flex flex-col">
                    <!-- img card -->
                    <img src="{{ asset('images/image.jpg') }}" alt="content"
                        class="w-full rounded-xl object-cover max-h-[200px] h-full mb-3">
                    <!-- text card -->
                    <div class="flex flex-col justify-between gap-6">
                        <!-- card title -->
                        <div class="flex flex-col gap-1.5">
                            <h5 class="font-bold text-xl lg:text-2xl font-nm text-gray-900">Cara Ngepel Dengan Bugdet
                                Minim</h5>
                            <p class="text-gray-600 text-base font-normal font-inter leading-normal">1 Nov 2023</p>
                        </div>
                        <!-- card footer -->
                        <a class="text-secondary-500 font-semibold" href="">Lihat selengkapnya <i
                                class="bi bi-arrow-right-short"></i></a>
                    </div>
                </div>
            </div>
        </article>

        <!-- category -->
        <article id="category" class="container">
            <h2 class="text-gray-900 text-3xl lg:text-5xl font-nmb">Artikel Berdasarkan Kategori</h2>
            <div class="flex items-center flex-wrap gap-3 mt-6">
                <button
                    class="btn btn-outline text-secondary-500 font-semibold hover:bg-secondary-500 hover:text-white transition-all duration-300">
                    Berita
                </button>
                <button
                    class="btn btn-outline text-secondary-500 font-semibold hover:bg-secondary-500 hover:text-white transition-all duration-300">
                    Rekomendasi
                </button>
                <button
                    class="btn btn-outline text-secondary-500 font-semibold hover:bg-secondary-500 hover:text-white transition-all duration-300">
                    Promo
                </button>
                <button
                    class="btn btn-outline text-secondary-500 font-semibold hover:bg-secondary-500 hover:text-white transition-all duration-300">
                    Tips & Trik
                </button>
            </div>
        </article>
    </section>
@endsection

@section('lib-script')
@endsection

@section('page-script')
    <script>
      $(document).ready(function() {
        if ($('header')) {
          $('header').addClass('navbar-fixed');
          $('#navbar-logo').attr('src', '{{ asset('images/logo/logo-blue.svg') }}');
        }
        $(window).scroll(() => {
          if ($(document).scrollTop() === 0) {
              $('header').addClass('navbar-fixed');
              $('#navbar-logo').attr('src', '{{ asset('images/logo/logo-blue.svg') }}');
          }
        })
      })
    </script>
@endsection

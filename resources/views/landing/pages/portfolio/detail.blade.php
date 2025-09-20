@extends('landing.main-landing')

@section('lib-style')
@endsection

@section('page-style')
  <style>

.gallery-thumbs .swiper-slide-thumb-active img{
    opacity: 100% !important;
  }
  .gallery-thumbs .swiper-slide img{
    background: #000;
    opacity: 60%;
  }
  </style>
@endsection

@section('content')
    <section>
        <article>
            <div class="container">
                <!-- breadcrumb -->
                <nav class="w-full p-3 mt-36">
                    <ol class="list-reset flex">
                      <li class="text-primary-500 last:text-gray-600"><a href="{{ route('landing.home.index') }}" class="">Beranda</a></li>
                      <li><span class="mx-2">/</span></li>
                      <li class="text-primary-500 last:text-gray-600"><a href="{{ route('landing.portfolio.index') }}" class="">Portofolio</a></li>
                      <li><span class="mx-2">/</span></li>
                      <li class="text-primary-500 last:text-gray-600"><a href="{{ route('landing.portfolio.detail', $portfolio->slug) }}" class="">{{ $portfolio->title }}</a></li>
                    </ol>
                </nav>
                <!-- slider -->
                <div class="mt-20">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper gallery">
                        <div class="swiper-wrapper">
                            @foreach ($portfolio->images as $image)
                                <div class="swiper-slide">
                                    <a data-fslightbox="portfolio" href="{{ $image }}">
                                        <img src="{{ $image }}" alt="..."
                                            class="rounded-2xl w-full max-w-[1200px] h-full max-h-[640px] object-cover">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <button class="swiper-button-next portfolio-next text-gray-900 font-bold bg-white p-6 rounded-xl"
                            style="--swiper-navigation-size: 28px;"></button>
                        <button class="swiper-button-prev portfolio-prev text-gray-900 font-bold bg-white p-6 rounded-xl"
                            style="--swiper-navigation-size: 28px;"></button>
                    </div>
                    {{-- portfolio thumbs --}}
                    <div thumbsSlider="" class="swiper gallery-thumbs mt-5">
                        <div class="swiper-wrapper">
                            @foreach ($portfolio->images as $image)
                                <div class="swiper-slide">
                                    <a href="{{ $image }}" data-fslightbox="portfolioThumb">
                                        <img src="{{ $image }}" alt="..."
                                            class="rounded-sm lg:rounded-2xl w-full max-w-[1200px] h-full max-h-[640px] aspect-[4/3] object-cover">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <button class="swiper-button-next thumb-next text-gray-900 font-bold bg-white p-6 rounded-xl"
                            style="--swiper-navigation-size: 18px;"></button>
                        <button class="swiper-button-prev thumb-prev text-gray-900 font-bold bg-white p-6 rounded-xl"
                            style="--swiper-navigation-size: 18px;"></button>
                    </div>

                    <h1
                        class="text-gray-900 text-3xl lg:text-5xl font-nmb capitalize leading-10 lg:leading-[72px] mt-16">
                        {{ $portfolio->title }}</h1>

                    <div class="flex items-start gap-6 mt-8">
                        <img src="{{ $portfolio->service->icon_url }}" alt="{{ $portfolio->service->title }}"
                            width="80">
                        <div class="">
                            <h4
                                class="text-gray-900 text-2xl lg:text-[32px] font-nmb leading-normal whitespace-nowrap">
                                {{ $portfolio->service->title }}
                            </h4>
                            <div class="flex flex-col md:flex-row md:items-center gap-2 md:gap-4">
                                @if ($portfolio->area)
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('images/icons/icn_wide.svg') }}" alt="" width="30">
                                        <span
                                            class="text-gray-600 text-sm lg:text-base font-normal font-inter leading-normal whitespace-nowrap">
                                            {{ $portfolio->area }}
                                        </span>
                                    </div>
                                @endif
                                @if ($portfolio->city)
                                    <div class="flex gap-2 items-center">
                                        <img src="{{ asset('images/icons/icn_marker_pin.svg') }}" alt=""
                                            width="30">
                                        <span
                                            class="text-gray-600 text-sm lg:text-base font-normal font-inter capitalize leading-normal">
                                            {{ $portfolio->city }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="w-full max-w-[869px] flex flex-col gap-20 mt-20">
                        <!-- description -->
                        <div class="">
                            <h5 class="text-gray-900 text-2xl lg:text-[32px] font-nmb leading-[48px]">Mengenai
                                Portofolio ini</h5>

                            <p class="col-span-2 text-gray-600 text-xl font-normal font-inter leading-[30px]">
                                {{ $portfolio->desc }}
                            </p>
                        </div>

                        <!-- time -->
                        @if ($portfolio->work_time)
                            <div class="">
                                <h5 class="text-gray-900 text-2xl lg:text-[32px] font-nmb leading-[48px]">Waktu
                                    Pengerjaan Proyek</h5>

                                <p class="col-span-2 text-gray-600 text-xl font-normal font-inter leading-[30px]">
                                    {{ $portfolio->work_time }}
                                </p>
                            </div>
                        @endif

                        <!-- address (will be linked to maps location)-->
                        @if ($portfolio->location)
                            <div class="">
                                <h5 class="text-gray-900 text-2xl lg:text-[32px] font-nmb leading-[48px]">Lokasi
                                </h5>
                                <a href="{{ $portfolio->location_url ?? '#' }}"
                                    class="flex flex-col md:flex-row items-start gap-3 w-full max-w-sm" target="_blank">
                                    <img src="{{ asset('images/maps.jpg') }}" alt=""
                                        class="border border-secondary-500 rounded-lg w-full md:w-24 h-24 object-cover">
                                    <p class="text-neutral-600 text-xl font-normal font-inter">
                                        {{ $portfolio->location }}
                                    </p>
                                </a>
                            </div>
                        @endif

                        <!-- design images -->
                    </div>
                    @if (count($portfolio->design_images ?? []) > 0)
                        <div class="mt-20">
                            <h5 class="text-gray-900 text-2xl lg:text-[32px] font-nmb leading-[48px]">Gambar Desain
                            </h5>

                            <div class="swiper design-swiper mt-5">
                                <div class="swiper-wrapper">
                                    @foreach ($portfolio->design_images as $image)
                                        <div class="swiper-slide">
                                            <a href="{{ $image }}" data-fslightbox="designImage">
                                                <img src="{{ $image }}" alt="Rumah Nuansa Alam"
                                                    class="rounded-2xl w-full max-w-[235px] h-full max-h-40 aspect-[4/3] object-cover">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev design-prev text-gray-900 font-bold bg-white p-6 rounded-xl"
                                    style="--swiper-navigation-size: 28px;"></div>
                                <div class="swiper-button-next design-next text-gray-900 font-bold bg-white p-6 rounded-xl"
                                    style="--swiper-navigation-size: 28px;"></div>
                            </div>
                    @endif
                </div>
              </div>
            </div>
        </article>
    </section>
@endsection

@section('lib-script')
    <script src="{{ asset('plugins/tabler/dist/libs/fslightbox/index.js') }}" defer></script>
@endsection

@section('page-script')
    <script>
        $(document).ready(function() {
            // navbar
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

            const swiper = new Swiper(".gallery-thumbs", {
                spaceBetween: 20,
                slidesPerView: 5,
                centeredSlides: false,
                freeMode: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                navigation: {
                    nextEl: ".thumb-next",
                    prevEl: ".thumb-prev",
                },
            });
            const thumbSwiper = new Swiper(".gallery", {
                spaceBetween: 30,
                navigation: {
                    nextEl: ".portfolio-next",
                    prevEl: ".portfolio-prev",
                },
                thumbs: {
                    swiper: swiper,
                },
            });

            const designSwiper = new Swiper(".design-swiper", {
                loop: true,
                centeredSlides: false,
                spaceBetween: 30,
                slidesPerView: 1,
                freeMode: true,
                navigation: {
                    nextEl: ".design-next",
                    prevEl: ".design-prev",
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 4,
                    },
                    1024: {
                        slidesPerView: 5,
                    },
                },
            });
        })
    </script>
@endsection

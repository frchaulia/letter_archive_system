@extends('landing.main-landing')

@section('lib-style')
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/tailwindcss@1.4.6/dist/tailwind.css'>
@endsection

@section('page-style')
    <style>
        .hero {
            background-color: #264C77;
        }

        .order-wrapper:last-child .line::after {
            width: 0;
            height: 0;
        }

        .clickup-embed {
            border: none !important;
            border-radius: 20px;
        }
    </style>
@endsection

@section('content')
    <section id="beranda" class="">
        <article class="relative hero bg-cover bg-no-repeat bg-top h-screen w-full flex flex-col justify-center">
            <div class="w-full h-full flex justify-center items-center">
                <div class="container h-full flex justify-center">
                    <h1 class="container absolute top-40 md:top-[16%] lg:w-8/12 lg:max-w-[810px] text-gray-50 text-4xl md:text-5xl font-nmb leading-tight md:leading-normal lg:leading-[79.50px] z-50 text-center"
                        data-aos="fade-up" data-aos-duration="2000" data-aos-delay="50">
                        {!! $join_setting->hero_title !!}
                    </h1>
                </div>
                {{-- ornament --}}
                <img src="{{ asset('images/ornaments/hero-clip-path.svg') }}" alt=""
                    class="absolute bottom-0 md:-bottom-40 z-0">
                <img src="{{ $join_setting->foreground_image_url }}" alt=""
                    class="absolute bottom-0 md:-bottom-10 z-0">
            </div>
        </article>
    </section>

    <section id="aboutUs" class="relative bg-secondary-300 z-40 pt-[72px] pb-40 md:py-[72px]">
        <div class="container flex flex-col md:flex-row justify-between items-center gap-10">
            <div class="flex flex-col justify-between gap-6">
                <h2 class="flex flex-col gap-1 text-primary-500 text-2xl font-nmb leading-7" data-aos="fade-up">
                    {{ $join_setting->question }} <span
                        class="text-primary-500 text-4xl font-nmb leading-10">{{ $join_setting->asked }}</span>
                </h2>
                <p class="text-primary-500 font-inter text-lg font-normal leading-7">
                    {{ $join_setting->answer }}
                </p>
                <a class="flex justify-start z-50" href="#join-form">
                    <span href="#join-form"
                        class="border border-secondary-500 bg-secondary-500 hover:text-white hover:border-none rounded-full pl-4 pr-3 py-2 lg:pr-5 lg:pl-6 lg:py-3 text-white text-sm lg:text-base font-semibold font-inter">
                        Gabung Sekarang
                        <i class="bi bi-arrow-right-short ml-4"></i>
                    </span>
                </a>
            </div>
            <div class="px-5 md:px-0 absolute md:relative -bottom-32 md:bottom-0">
                <img src="{{ $join_setting->intro_image_url }}" alt=""
                    class="w full md:max-w-lg h-full max-h-72 rounded-xl object-cover relative z-50">
            </div>
        </div>
        {{-- ornament --}}
        <img src="{{ asset('images/ornaments/ornament.svg') }}" alt="ornament"
            class="absolute -right-20 top-10 lg:-right-52 lg:top-20">
    </section>

    <section id="whyUs" class="mt-28 md:mt-0">
        <div class="container pt-28 md:py-[72px]">
            <h2 class="flex flex-col gap-1 text-slate-900 text-xl font-normal font-inter leading-7" data-aos="fade-up">
                Kenapa
                harus jadi mitra Paktukang? <span class="text-primary-500 text-4xl font-nmb leading-10">Membangun
                    Peradaban Indonesia Yang Layak Huni Dengan Pak Tukang.</span>
            </h2>

            <div class="hidden md:flex flex-col gap-7 mx-auto mt-12 max-w-xl">
                @foreach ($builder_benefits as $benefit)
                    <div class="flex flex-row justify-center items-start gap-3 lg:gap-6 w-full order-wrapper">
                        <span
                            class="w-8 h-8 aspect-square bg-secondary-500 text-center text-white text-[20px] rounded-full z-20">{{ $loop->iteration }}</span>
                        {{-- card --}}
                        <div
                            class="card card-hover w-full h-full after:content[''] after:absolute after:w-[2px] after:h-[calc(100%+2rem)] after:bg-gray-200 after:top-0 after:-left-[1.8rem] lg:after:-left-[2.6rem] relative line">
                            {{-- text --}}
                            <span class="text-primary-500 text-2xl font-nmb">{{ $benefit->title }}</span>
                            <p class="text-gray-600 text-base lg:text-lg font-normal font-inter leading-normal">
                                {{ $benefit->desc }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- mobile --}}
            <div id="accordion-collapse" data-accordion="collapse" class="block md:hidden mt-8">
                <div class="relative font-inter antialiased">
                    <div class="w-full max-w-2xl mx-auto">
                        <div class="">
                            @foreach ($builder_benefits as $builder)
                                <div x-data="{ expanded: false }" class="">
                                    <h2>
                                        <button id="faqs-title-0{{ $builder->id }}" type="button"
                                            class="flex items-center justify-between w-full text-left font-semibold p-5 text-primary-500 text-2xl font-nmb border border-gray-200 focus:outline-gray-100"
                                            @click="expanded = !expanded" :aria-expanded="expanded"
                                            aria-controls="faqs-text-0{{ $builder->id }}">
                                            <span>{{ $loop->iteration }}. {{ $builder->title }}</span>
                                            <svg class="fill-indigo-500 shrink-0 ml-8" width="16" height="16"
                                                xmlns="http://www.w3.org/2000/svg">

                                                <i class="bi bi-chevron-down transform origin-center transition duration-200 ease-out text-lg font-black stroke-2"
                                                    :class="{ '!rotate-180': expanded }"></i>
                                            </svg>
                                        </button>
                                    </h2>
                                    <div id="faqs-text-0{{ $builder->id }}" role="region"
                                        aria-labelledby="faqs-title-0{{ $builder->id }}"
                                        class="grid text-sm text-slate-600 overflow-hidden transition-all duration-300 ease-in-out"
                                        :class="expanded ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                                        <div class="overflow-hidden ">
                                            <p
                                                class="mb-2 text-gray-600 text-base lg:text-lg font-normal font-inter leading-normal border border-gray-200 p-5">
                                                {{ $builder->desc }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- form click up --}}
    <section class="my-36" id="join-form">
        <div class="container">
            {!! $join_setting->join_form_iframe !!}
        </div>
    </section>

    {{-- embed video --}}
    <section class="container">
        <div class="flex flex-col-reverse md:flex-row justify-between items-start gap-4">
            <div class="flex justify-center lg:justify-start lg:basis-3/5 w-full h-96 rounded-2xl">
                {!! $join_setting->video_iframe !!}
            </div>

            <div class="basis-2/5">
                <h2 class="text-primary-500 text-4xl font-nmb leading-10">{{ $join_setting->video_title }}
                </h2>
                <p class="mt-8 text-primary-500 text-lg font-normal font-inter leading-7">
                    {{ $join_setting->video_desc }}
                </p>
            </div>
        </div>
    </section>
@endsection

@section('lib-script')
@endsection

@section('page-script')
    <script src='https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js'></script>
@endsection

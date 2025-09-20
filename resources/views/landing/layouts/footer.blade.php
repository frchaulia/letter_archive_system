<footer id="contact" class="mt-auto">
    <article id="cta" class="container my-36">
        <div class="flex md:justify-end relative bg-secondary-300 p-6 md:py-16 rounded-2xl">
            <div class="md:w-8/12">
                <img src="{{ $siteSetting->cta_image_url }}" alt="cta"
                    class="absolute bottom-0 left-0 md:w-4/12 hidden md:block">
                <!-- cta konten -->
                <h3 class="text-gray-900 text-3xl md:text-5xl font-nmb lg:leading-relaxed">
                    {{ $siteSetting->cta_title }}
                </h3>
                <p class="text-gray-600 text-lg md:text-2xl font-nm">{{ $siteSetting->cta_desc }}</p>
                {{-- window location blank --}}
                <button onclick="window.open('{{ getWhatsAppLink($siteSetting->contact_number) }}', '_blank')"
                    class="pl-5 pr-4 py-3 bg-secondary-500 rounded-full text-white mt-6 font-semibold font-inter hover:bg-amber-400 transition-colors duration-300">Konsultasi
                    Sekarang
                    <i class="bi bi-arrow-right-short ml-3"></i>
                </button>
            </div>
        </div>
    </article>
    <div class="bg-primary-500 pb-6">
        <div class="container">
            <div class="flex flex-col lg:items-start lg:flex-row gap-8 lg:gap-40 pt-10 pb-5">
                <div class="flex flex-col lg:w-5/12">
                  <a href="{{ route('landing.home.index') . '#beranda' }}" class=""><img src="{{ $siteSetting->logo_white_url }}" alt="" class="w-36 lg:w-52"></a>
                    <p class="text-white text-base lg:text-xl font-medium font-nm mt-6">
                        {{ $siteSetting->slogan }}
                    </p>
                    @php
                        $sosmedLinks = json_decode($siteSetting->sosmed_links);
                    @endphp
                    <div class="flex gap-5 my-4 lg:mt-10">
                        <a href="{{ $sosmedLinks->instagram }}" target="_blank" title="instagram">
                            <i class="bi bi-instagram text-white"></i>
                        </a>
                        <a href="{{ $sosmedLinks->twitter }}" target="_blank" title="twitter">
                            <i class="bi bi-twitter-x text-white"></i>
                        </a>
                        <a href="{{ $sosmedLinks->facebook }}" target="_blank" title="facebook">
                            <i class="bi bi-facebook text-white"></i>
                        </a>
                        <a href="{{ $sosmedLinks->linkedin }}" target="_blank" title="linkedin">
                            <i class="bi bi-linkedin text-white"></i>
                        </a>
                    </div>
                </div>
                <div class="flex flex-col lg:gap-7">
                    <h3 class="text-white text-[26px] font-nmb leading-loose">Kontak</h3>
                    <div class="flex flex-col">
                      <a href="mailto:{{ $siteSetting->email }}"
                          class="text-white text-base lg:text-xl font-normal font-nm leading-loose">{{ $siteSetting->email }}</a>
                      <a href="{{ $siteSetting->address_url }}" class="text-white text-base lg:text-xl font-normal font-nm leading-loose">
                          {{ $siteSetting->address }}
                      </a>
                    </div>
                </div>
            </div>
            <p class="mb-0 pt-5 text-center text-white small">
                © All rights reserved - PT PAKTUKANG TEKNOLOGI KARYAGLOBAL
            </p>
        </div>
    </div>
</footer>

@extends('landing.main-landing')

@section('lib-style')
@endsection

@section('page-style')
  <style>
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
  </style>
@endsection

@section('content')
    <section>
      <article>
        <div class="container">
      <div class="mt-36" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="50">
        <h1 class="section-title text-gray-900">Portofolio yang Sudah Kami <span class="text-secondary-500">Kerjakan</span>.</h1>
        <p class="title-desc max-w-[620px] w-full " data-aos="fade-up">Masih ragu? Berikut hasil proyek yang telah kami kerjakan di beberapa daerah
          seperti Surabaya dan Malang.</p>
      </div>
      <!-- button categories -->
      <div class="flex flex-wrap gap-3 mt-10">
        <button
          class="filter-portfolio btn btn-secondary hover:bg-secondary-500 hover:text-white text-secondary-500 text-sm lg:text-base font-normal lg:font-semibold font-inter">Semua</button>
        @foreach ($services as $service)
          <button
            class="filter-portfolio btn btn-outline hover:bg-secondary-500 hover:text-white text-secondary-500 text-sm lg:text-base font-normal lg:font-semibold font-inter" data-filter="{{ $service->id }}">
            {{ $service->title }}
          </button>
        @endforeach
      </div>

        <!-- content -->
        <div id="portfolioContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-8 mt-12">
        </div>

        <div id="loadingOrNotFoundContainer"></div>

        <div class="flex justify-center mt-14" id="showMoreContainer">
          <button id="showMore" class="border border-secondary-500 hover:border-secondary-500 hover:bg-secondary-500 hover:text-white hover:border-none rounded-full pl-4 pr-3 py-1 lg:pr-5 lg:pl-6 lg:py-3 text-secondary-500 text-sm lg:text-base font-semibold font-inter">
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

      const endpoint = "{{ route('landing.portfolio.get') }}";
      const queryParams = {
          limit: 6,
          page: 1,
          service: ''
      }

      $(document).ready(function() {
          hideBtnShowMore();
          setLoading();
          getPortfolios(endpoint, queryParams);
      })

      $('.filter-portfolio').click(function() {
        setActiveButton(this);
        setEmptyPortfolio();
        setLoading();

        queryParams.page = 1;
          queryParams.service = $(this).data('filter');

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

      function setActiveButton(target) {
          $('.filter-portfolio').removeClass('btn-secondary');
          $('.filter-portfolio').addClass('btn-outline');
          $(target).removeClass('btn-outline');
          $(target).addClass('btn-secondary');
      }

      function renderPortfolioCard(portfolio) {
          return `
              <a href="${getDetailUrl(portfolio.slug)}" class="portfolio-img">
                  <img src="${portfolio.images[0]}" alt="${portfolio.title}"
                      class="rounded-xl w-full h-full max-h-[300px] object-cover aspect-[4/3]">
                  <div class="text absolute bottom-0 bg-black rounded-b-2xl text-white opacity-0">
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
                  <p class="text-gray-500">Belum ada data yang ditampilkan</p>
              </div>
          `);
      }

      function removeLoadingOrNotFound() {
          $('#loadingOrNotFoundContainer').html('');
      }

      function setEmptyPortfolio() {
          $('#portfolioContainer').html('');
      }

      function showBtnShowMore() {
          $('#showMoreContainer').show();
      }

      function hideBtnShowMore() {
          $('#showMoreContainer').hide();
      }
    </script>
@endsection

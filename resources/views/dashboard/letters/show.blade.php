@extends('dashboard.main')

@section('custom-css')
  <style>
    .pdf-container {
      width: 100%;
      height: 800px;
      overflow: auto;
      background: #e9ecef;
      padding: 20px;
      border-radius: 4px;
    }

    #pdf-viewer {
      background: white;
      box-shadow: 0 2px 8px rgba(0, 0, 0, .1);
      padding: 20px;
      max-height: 800px;
      overflow-y: auto;
    }

    #pdf-viewer canvas {
      width: 100% !important;
      height: auto !important;
      display: block;
    }

    .pdf-page {
      background: white;
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .pdf-controls {
      margin-bottom: 1rem;
      display: flex;
      gap: 0.5rem;
      align-items: center;
      flex-wrap: wrap;
    }

    .pdf-controls .page-info {
      margin: 0 1rem;
    }

    @media (max-width: 768px) {
      .pdf-container {
        height: 500px;
      }
    }
  </style>
@endsection

@section('content')
  <div class="page-header d-print-none mt-2">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Detail Surat
          </h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
          <div class="btn-list d-flex">
            <a href="{{ route('dashboard.letters.edit', $letter->id) }}" class="btn btn-primary d-none d-sm-inline-block">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                <path d="M16 5l3 3" />
              </svg>
              Edit Surat
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">
        <div class="col-12 col-lg-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title">Informasi Surat</div>
              <div class="mb-2">
                <div class="text-muted mb-1">Nomor Surat</div>
                <strong>{{ $letter->number }}</strong>
              </div>
              <div class="mb-2">
                <div class="text-muted mb-1">Judul</div>
                <strong>{{ $letter->title }}</strong>
              </div>
              <div class="mb-2">
                <div class="text-muted mb-1">Kategori</div>
                <strong>{{ $letter->category->name }}</strong>
              </div>
              <div class="mb-2">
                <div class="text-muted mb-1">Tanggal Surat</div>
                <strong>{{ formatDate($letter->date, 'd F Y') }}</strong>
              </div>
              <div class="mb-2">
                <div class="text-muted mb-1">Deskripsi</div>
                <strong>{{ $letter->description }}</strong>
              </div>
              <div class="mb-2">
                <div class="text-muted mb-1">Dibuat Pada</div>
                <strong>{{ formatDate($letter->created_at, 'd F Y H:i') }}</strong>
              </div>
              <div class="mb-2">
                <div class="text-muted mb-1">Terakhir Diubah</div>
                <strong>{{ formatDate($letter->updated_at, 'd F Y H:i') }}</strong>
              </div>
              @if ($letter->file_path)
                <div class="mt-4">
                  <a href="{{ asset('storage/' . $letter->file_path) }}" class="btn btn-primary w-100" download>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                      <path d="M7 11l5 5l5 -5"></path>
                      <path d="M12 4l0 12"></path>
                    </svg>
                    Unduh File
                  </a>
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-8">
          <div class="card">
            <div class="card-body">
              <div class="card-title">Preview Dokumen</div>
              @if (strtolower(pathinfo($letter->file_path, PATHINFO_EXTENSION)) === 'pdf')
                <div id="pdf-viewer"></div>
              @else
                <div class="empty">
                  <div class="empty-img"><img src="{{ asset('img/error/undraw_file_bundle_re_6q1e.svg') }}"
                      height="128">
                  </div>
                  <p class="empty-title">Preview tidak tersedia</p>
                  <p class="empty-subtitle text-muted">
                    File bukan merupakan dokumen PDF. Silakan unduh file untuk melihat isinya.
                  </p>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('library-js')
  @if (strtolower(pathinfo($letter->file_path, PATHINFO_EXTENSION)) === 'pdf')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js"></script>
  @endif
@endsection

@section('custom-js')
  @if (strtolower(pathinfo($letter->file_path, PATHINFO_EXTENSION)) === 'pdf')
    <script>
      // PDF.js viewer initialization
      pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

      const url = '{{ asset('storage/' . $letter->file_path) }}';
      const container = document.getElementById('pdf-viewer');

      // Load the PDF
      const loadingTask = pdfjsLib.getDocument(url);
      loadingTask.promise.then(function(pdf) {
        // Loop through all pages
        for (let pageNumber = 1; pageNumber <= pdf.numPages; pageNumber++) {
          pdf.getPage(pageNumber).then(function(page) {
            const scale = 1.5;
            const viewport = page.getViewport({
              scale: scale
            });

            // Create page container
            const pageContainer = document.createElement('div');
            pageContainer.className = 'pdf-page';
            pageContainer.style.marginBottom = '20px';

            // Prepare canvas using PDF page dimensions
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            pageContainer.appendChild(canvas);
            container.appendChild(pageContainer);

            // Render PDF page into canvas context
            const renderContext = {
              canvasContext: context,
              viewport: viewport
            };
            page.render(renderContext);
          });
        }
      });
    </script>
  @endif
@endsection

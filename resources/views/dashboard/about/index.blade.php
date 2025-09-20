@extends('dashboard.main')

@section('content')
  <div class="page-header d-print-none mt-2">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h3 class="page-title">
            Tentang
          </h3>
        </div>
      </div>
    </div>
  </div>

  <div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-4 text-center">
                  <img src="{{ asset('img/frchaulia-semiformal.jpg') }}" alt="Profile Picture" class="rounded-circle" width="200"
                    height="200">
                </div>
                <div class="col-12 col-md-8">
                  <h3 class="mb-3 mt-3">Aplikasi Ini dibuat oleh:</h3>
                  <div class="datagrid mt-3 mt-md-0">
                    <div class="datagrid-item">
                      <div class="datagrid-title">Nama</div>
                      <div class="datagrid-content">Faricha Aulia</div>
                    </div>
                    <div class="datagrid-item">
                      <div class="datagrid-title">Prodi</div>
                      <div class="datagrid-content">D4-TI</div>
                    </div>
                    <div class="datagrid-item">
                      <div class="datagrid-title">NIM</div>
                      <div class="datagrid-content">2141720155</div>
                    </div>
                    <div class="datagrid-item">
                      <div class="datagrid-title">Tanggal</div>
                      <div class="datagrid-content">19 September 2025</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@extends('dashboard.main')

@section('content')
  {{-- Page Header --}}
  <div class="page-header d-print-none mt-2">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h3 class="page-title">
            Ubah Kategori
          </h3>
        </div>
      </div>
    </div>
  </div>

  <!-- Page body -->
  <div class="page-body">
    <div class="container-xl">
      <div class="row row-cards">
        <div class="col-12">
          <form action="{{ route('dashboard.letter-categories.update', $category->id) }}" method="post" class="card">
            @csrf
            @method('put')
            <input type="hidden" name="previous_url" value="{{ url()->previous() }}">
            <div class="card-body">
              <div class="row">
                <div class="col-12 mb-3">
                  <label class="form-label required">Nama Kategori</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    placeholder="Masukkan nama kategori" value="{{ old('name', $category->name) }}" />
                  @error('name')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-12">
                  <label class="form-label">Deskripsi</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                    placeholder="Masukkan deskripsi kategori" rows="3">{{ old('description', $category->description) }}</textarea>
                  @error('description')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
              </div>
            </div>
            <div class="card-footer d-flex">
              <a href="{{ url()->previous() }}" class="btn btn-outline-secondary me-auto">Kembali</a>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

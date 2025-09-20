@extends('dashboard.main')

@section('content')
  <div class="page-header d-print-none mt-2">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">
            Ubah Surat
          </h2>
        </div>
      </div>
    </div>
  </div>

  <div class="page-body">
    <div class="container-xl">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('dashboard.letters.update', $letter->id) }}" method="post" enctype="multipart/form-data"
            class="card">
            @csrf
            @method('PUT')
            <input type="hidden" name="previous_url" value="{{ url()->previous() }}">
            <div class="card-body">
              <div class="row">
                <div class="col-12 mb-3">
                  <label class="form-label required">Nomor Surat</label>
                  <input type="text" class="form-control @error('number') is-invalid @enderror" name="number"
                    placeholder="Masukkan nomor surat" value="{{ old('number', $letter->number) }}" />
                  @error('number')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label required">Judul</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    placeholder="Masukkan judul surat" value="{{ old('title', $letter->title) }}" />
                  @error('title')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label required">Kategori</label>
                  <select class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                    <option value="" disabled>Pilih kategori</option>
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}"
                        {{ old('category_id', $letter->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                      </option>
                    @endforeach
                  </select>
                  @error('category_id')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label required">Deskripsi</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                    placeholder="Masukkan deskripsi surat" rows="3">{{ old('description', $letter->description) }}</textarea>
                  @error('description')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-12 mb-3">
                  <label class="form-label required">Tanggal Surat</label>
                  <input type="date" class="form-control @error('date') is-invalid @enderror" name="date"
                    value="{{ old('date', $letter->date) }}" />
                  @error('date')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="mb-3">
                    <label class="form-label">File Surat Saat Ini</label>
                    @if ($letter->file_path)
                      <div class="mb-2">
                        <a href="{{ asset('storage/' . $letter->file_path) }}" class="btn btn-outline-primary"
                          target="_blank">
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file me-2"
                            width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                          </svg>
                          Lihat File Saat Ini
                        </a>
                      </div>
                    @else
                      <div class="text-muted">Tidak ada file</div>
                    @endif
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Upload File Baru</label>
                    <input name="file_path" type="file" class="form-control" accept="application/pdf,.doc,.docx">
                    <small class="form-hint">Biarkan kosong jika tidak ingin mengubah file</small>
                    @error('file_path')
                      <div class="text-danger fs-5 d-block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="d-flex justify-content-between">
                <a href="{{ url()->previous() }}" class="btn btn-link">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('library-js')
  <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
  <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
  <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
@endsection

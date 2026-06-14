@extends('admin.template')

@section('content')
<section class="pcoded-main-container">
  <div class="pcoded-content">
    <div class="card">
      <div class="card-header">
        <h4>Edit Kategori Event - {{ $event->judul }}</h4>
      </div>

      <div class="card-body">
        <form action="{{ route('event_categories.update', $event->id) }}" method="POST">
          @csrf
          @method('PUT')

          {{-- Informasi Event --}}
          <div class="mb-3">
            <label class="form-label">Pilih Event</label>
            <input type="text" class="form-control" value="{{ $event->judul }}" readonly>
          </div>

          {{-- Kategori Event --}}
          <div class="mb-3">
            <label class="form-label">Nama Kategori:</label>
            <div id="kategori-wrapper">
              @forelse ($event->categories as $category)
                <div class="input-group mb-2">
                  <input type="text" name="nama_kategori[]" class="form-control"
                         value="{{ $category->nama_kategori }}" placeholder="Contoh: 3K, 5K, 10K">
                  <button type="button" class="btn btn-danger remove-row">Hapus</button>
                </div>
              @empty
                <div class="input-group mb-2">
                  <input type="text" name="nama_kategori[]" class="form-control"
                         placeholder="Contoh: 3K, 5K, 10K">
                  <button type="button" class="btn btn-danger remove-row">Hapus</button>
                </div>
              @endforelse
            </div>

            <button type="button" id="add-row" class="btn btn-secondary mt-2">+ Tambah Kategori</button>
          </div>

          {{-- Tombol Aksi --}}
          <div class="mt-4">
            <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
            <a href="{{ route('events.index') }}" class="btn btn-danger">Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

{{-- Script dinamis untuk tambah / hapus kategori --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const wrapper = document.getElementById('kategori-wrapper');
  const addBtn = document.getElementById('add-row');

  // Tambah input baru
  addBtn.addEventListener('click', () => {
    const newRow = document.createElement('div');
    newRow.classList.add('input-group', 'mb-2');
    newRow.innerHTML = `
      <input type="text" name="nama_kategori[]" class="form-control" placeholder="Contoh: 3K, 5K, 10K">
      <button type="button" class="btn btn-danger remove-row">Hapus</button>
    `;
    wrapper.appendChild(newRow);
  });

  // Hapus baris input
  wrapper.addEventListener('click', (e) => {
    if (e.target.classList.contains('remove-row')) {
      e.target.closest('.input-group').remove();
    }
  });
});
</script>
@endpush
@endsection

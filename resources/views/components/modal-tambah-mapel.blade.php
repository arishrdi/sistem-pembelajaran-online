@php
$kelas = ['X', 'XI', 'XII', 'XIII'];
@endphp

<label for="modal-tambah" class="btn btn-ghost gap-2 text-primary font-bold">
  <span class="material-symbols-outlined">
    add
  </span>
  Tambah Mapel
</label>
<input type="checkbox" id="modal-tambah" class="modal-toggle" />
<label for="modal-tambah" class="modal cursor-pointer">
  <label class="modal-box relative" for="">
    <label for="modal-tambah" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Tambah Mata Pelajaran Baru</h3>
    <form action="{{route('mapel-simpan')}}" method="POST" class="flex-col">
      @csrf
      <label class="label mt-3">
        <span class="label-text-alt">Nama mapel</span>
      </label>
      <input type="text" name="nama_mapel" id="kelas" class="input input-secondary w-full"
        placeholder="Masukkan mata pelajaran">
      <label class="label">
        <span class="label-text-alt">Pilih kelas</span>
      </label>
      <select name="kelas" class="select select-bordered select-secondary w-full">
        <option disabled selected>Pilih kelas</option>
        @foreach ($kelas as $x)
        <option value="{{$x}}">{{$x}}</option>
        @endforeach
      </select>
      <div class="modal-action">
        <label for="modal-tambah" class="btn btn-ghost">Batal</label>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </label>
</label>
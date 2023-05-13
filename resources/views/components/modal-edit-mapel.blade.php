@php
$kelas = ['X', 'XI', 'XII', 'XIII'];
@endphp

@props(['mapel'])
<button class="btn btn-circle btn-ghost">
  <label for="modal-edit/{{$mapel->id_mapel}}" class="tooltip" data-tip="Edit">
    <span class="material-symbols-outlined">
      edit
    </span>
  </label>
</button>
<input type="checkbox" id="modal-edit/{{$mapel->id_mapel}}" class="modal-toggle" />
<label for="modal-edit/{{$mapel->id_mapel}}" class="modal cursor-pointer">
  <label class="modal-box relative" for="">
    <label for="modal-edit/{{$mapel->id_mapel}}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Edit Mata Pelajaran</h3>
    <form action="{{route('mapel-update', ['mataPelajaran' => $mapel->id_mapel])}}" method="POST" class="flex-col">
      @method('PUT')
      @csrf
      <label class="label mt-3">
        <span class="label-text-alt">Nama mapel</span>
      </label>
      <input type="text" name="nama_mapel" id="kelas" class="input input-secondary w-full"
        placeholder="Masukkan mata pelajaran" value="{{$mapel->nama_mapel}}">
      <label class="label">
        <span class="label-text-alt">Pilih kelas</span>
      </label>
      <select name="kelas" class="select select-bordered select-secondary w-full">
        <option disabled>Pilih kelas</option>
        @foreach ($kelas as $x)
        <option value="{{$x}}" {{$x===$mapel->kelas ? "selected" : ""}}>{{$x}}</option>
        @endforeach
      </select>
      <div class="modal-action">
        <label for="modal-edit/{{$mapel->id_mapel}}" class="btn btn-ghost">Batal</label>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </label>
</label>
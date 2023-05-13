@props(['mapel'])

<button class="btn btn-circle btn-ghost">
  <label for="modal-hapus-{{$mapel->id_mapel}}" class="tooltip" data-tip="Hapus">
    <span class="material-symbols-outlined">
      delete
    </span>
  </label>
</button>
<input type="checkbox" id="modal-hapus-{{$mapel->id_mapel}}" class="modal-toggle" />
<label for="modal-hapus-{{$mapel->id_mapel}}" class="modal cursor-pointer">
  <label class="modal-box relative" for="">
    <label for="modal-hapus-{{$mapel->id_mapel}}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Hapus mapel: {{$mapel->nama_mapel}} ?</h3>
    <div class="modal-action">
      <form action="{{route('mapel-delete', ['mataPelajaran' => $mapel->id_mapel])}}" method="POST">
        @method('DELETE')
        @csrf
        <label for="modal-hapus-{{$mapel->id_mapel}}" class="btn btn-ghost">Batal</label>
        <button type="submit" class="btn btn-error">Hapus</button>
      </form>
    </div>
  </label>
</label>
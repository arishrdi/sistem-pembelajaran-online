@props(['materi'])

<button class="btn btn-circle btn-ghost">
  <label for="modal-hapus-{{$materi->id_materi}}" class="tooltip" data-tip="Hapus">
    <span class="material-symbols-outlined">
      delete
    </span>
  </label>
</button>
<input type="checkbox" id="modal-hapus-{{$materi->id_materi}}" class="modal-toggle" />
<label for="modal-hapus-{{$materi->id_materi}}" class="modal cursor-pointer">
  <label class="modal-box relative" for="">
    <label for="modal-hapus-{{$materi->id_materi}}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Hapus materi: {{$materi->judul_materi}} ?</h3>
    <div class="modal-action">
      <form action="{{route('materi-delete', ['materi' => $materi->id_materi])}}" method="POST">
        @method('DELETE')
        @csrf
        <label for="modal-hapus-{{$materi->id_materi}}" class="btn btn-ghost">Batal</label>
        <button type="submit" class="btn btn-error">Hapus</button>
      </form>
    </div>
  </label>
</label>
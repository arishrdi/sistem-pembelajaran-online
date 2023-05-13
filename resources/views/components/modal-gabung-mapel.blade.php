<label for="modal-gabung" class="btn btn-ghost gap-2 text-primary font-bold">
  <span class="material-symbols-outlined">
    add
  </span>
  Gabung mapel
</label>
<input type="checkbox" id="modal-gabung" class="modal-toggle" />
<label for="modal-gabung" class="modal cursor-pointer">
  <label class="modal-box relative" for="">
    <label for="modal-gabung" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Gabung Mata Pelajaran</h3>
    <form action="{{route('gabung')}}" method="POST">
      @csrf
      <label class="label mt-3">
        <span class="label-text-alt">Kode mata pelajaran</span>
      </label>
      <input type="text" name="kode" class="input input-secondary w-full" placeholder="Masukkan kode mapel">
      <div class="modal-action">
        <label for="modal-gabung" class="btn btn-ghost">Batal</label>
        <button type="submit" class="btn btn-primary">Gabung</button>
      </div>
    </form>
  </label>
</label>
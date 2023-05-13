@props(['id', 'nama'])

<label for="modal-hapus-{{$id}}" class="btn btn-error btn-sm">
  Hapus
</label>
<input type="checkbox" id="modal-hapus-{{$id}}" class="modal-toggle" />
<label for="modal-hapus-{{$id}}" class="modal cursor-pointer">
  <label class="modal-box relative" for="">
    <label for="modal-hapus-{{$id}}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Hapus : {{$nama}} ?</h3>
    <div class="modal-action">
      {{$slot}}
      <label for="modal-hapus-{{$id}}" class="btn btn-ghost">Batal</label>
      <button type="submit" class="btn btn-error">Hapus</button>
      </form>
    </div>
  </label>
</label>
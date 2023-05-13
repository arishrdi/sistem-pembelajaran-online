@php
$role = ['admin', 'guru', 'siswa']
@endphp
<button class="btn btn-circle btn-ghost">
  <label for="modal-tambah" class="tooltip tooltip-bottom" data-tip="Tambah user">
    <span class="material-symbols-outlined">
      add
    </span>
  </label>
</button>
<input type="checkbox" id="modal-tambah" class="modal-toggle" />
<label for="modal-tambah" class="modal cursor-pointer">
  <label class="modal-box relative" for="">
    <label for="modal-tambah" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
    <h3 class="text-lg font-bold">Tambah User </h3>
    <div>
      <form action="{{route('siswa-store')}}" method="POST">
      {{-- <form action" method="POST"> --}}
        @csrf

        <label class="label mt-3">
          <span class="label-text-alt">Nama</span>
        </label>
        <input type="text" name="name" class="input input-secondary w-full" placeholder="Masukkan nama">

        <label class="label mt-3">
          <span class="label-text-alt">E-mail</span>
        </label>
        <input type="email" name="email" class="input input-secondary w-full" placeholder="Masukkan e-email">

        {{-- <label class="label mt-3">
          <span class="label-text-alt">Password</span>
        </label>
        <input type="password" name="password" class="input input-secondary w-full" placeholder="Masukkan password"> --}}

        <label class="label mt-3">
          <span class="label-text-alt">Role</span>
        </label>
        <select name="tipe" class="select select-bordered select-secondary w-full">
          <option selected disabled>Pilih role</option>
          @foreach ($role as $item)
          <option value="{{$item}}">{{$item}}</option>
          @endforeach
        </select>

        <div class="modal-action">
          <label for="modal-tambah" class="btn btn-ghost">Batal</label>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </label>
</label>
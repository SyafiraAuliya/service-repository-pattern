{{-- @extends('layouts.app') --}}
{{-- @section('content') --}}

<h2>tambah data</h2>
<form action="/siswa/store" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama">
    </div>
    <br>
    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" class="form-control" id="jurusan" name="jurusan">
    </div>
    <br>
    <input type="submit" />
</form>
{{-- @endsection --}}
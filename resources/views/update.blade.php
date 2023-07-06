<h2>edit data</h2>
<form action="/siswa/edit{{ $result [0]['id'] }}"  method="POST">
    @csrf
    <div>
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $result [0]['nama'] }}">
    </div>
    <br>
    <div class>
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $result [0]['jurusan'] }}">
    </div>
    <br>
    <input type="submit" />
</form>
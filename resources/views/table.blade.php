
@section('content')
    <h2>data siswa</h2>

    <table border="1">
        <thead>
            <tr>
                <th scope="col">Nama</th>
                <th scope="col">Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $result as $data)
                <tr>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jurusan }}</td>
                    <td>
                        <a href="/siswa/update{{ $data['id'] }}">edit</a>
                        <a href="/siswa/delete{{ $data['id'] }}">hapus</a>
                    </td>
                </tr>
          @endforeach
        </tbody>
    </table>
{{-- @endsection --}}
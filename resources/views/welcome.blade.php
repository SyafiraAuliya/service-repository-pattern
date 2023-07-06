<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <title>CRUD | tambah</title>
    </head>
    <body class="antialiased">
    <div class="container mt-4">
        @extends('layout.app')
        @section('content')
            <h2>data siswa</h2>
        
            <a href="{{ route('siswa.create') }}" class="btn btn-primary">tambah data</a>
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $data)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->kelas }}</td>
                            <td>
                                <a href="{{ route('siswa.edit', $data->id) }}" class="btn btn-sm">edit</a>
                                <form action="{{ route('siswa.destroy', $data->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endsection
    </div>
    </body>
</html>

<?php

namespace App\Repositories;

use App\Models\Siswa;

class SiswaRepository
{   
    protected $siswa;
    public function __construct(Siswa $siswa) {
        $this->siswa = $siswa;
    }

    public function save($data)
    {
        $siswa = new  $this->siswa;

        $siswa->nama = $data['nama'];
        $siswa->jurusan = $data['jurusan'];

        $siswa->save();

        return $siswa->fresh();
    }

    public function getAll()
    {
        return $this->siswa->get();
    }

    public function getById(int $id)
    {
        return $this->siswa->where('id', $id)->get();
    }

    public function create($data)
    {
        return Siswa::create($data);
    }

    public function update($data, $id)
    {
        $siswa = $this->siswa->find($id);

        $siswa->nama = $data['nama'];
        $siswa->jurusan = $data['jurusan'];

        $siswa->update();

        return $siswa;
    }

    public function delete($id)
    {
        $siswa = $this->siswa->find($id);
        $siswa->delete();

        return $siswa;
    }
}
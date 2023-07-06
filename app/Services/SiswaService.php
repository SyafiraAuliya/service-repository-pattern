<?php
namespace App\Services;

use App\Repositories\SiswaRepository;

// class SiswaService 
// {
//     protected $siswaRepository;

//     public function __construct(SiswaRepository $siswaRepository)
//     {
//         $this->siswaRepository = $siswaRepository;
//     }

//     public function getAll()
//     {
//         return $this->siswaRepository->getAll();
//     }

//     public function getById($id)
//     {
//         return $this->siswaRepository->getById($id);
//     }

//     public function create($data)
//     {
//         return $this->siswaRepository->create($data);
//     }

//     public function update($id, $data)
//     {
//         return $this->siswaRepository->update($id, $data);
//     }

//     public function delete($id)
//     {
//         $this->siswaRepository->delete($id);
//     }
// }
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class SiswaService
{
    protected $siswaRepository;

    public function __construct(SiswaRepository $siswaRepository)
    {
        $this->siswaRepository = $siswaRepository;
    }

    public function saveSiswaData ($data) {
        $validator = Validator::make($data, [
            'nama'=>'required',
            'jurusan' => 'required'
        ]);
        if ($validator->fails()){
            throw new InvalidArgumentException($validator->errors()->first());
        }
        $result = $this->siswaRepository->save($data);

        return $result;
    }

    public function getAll()
    {
     return $this->siswaRepository->getAll();   
    }

    public function getById($id) 
    {
        return $this->siswaRepository->getById($id);
    }

    public function updateSiswa($data, $id)
    {
        $validator = Validator::make($data, [
            'nama' => 'bail | min: 2',
            'jurusan ' => 'bail| max:225'

        ]);
        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        DB::beginTransaction();

        try {
            $siswa = $this->siswaRepository->update($data, $id);
        }catch (Exception $e){
            DB::rollback();
            Log::info($e->getMessage());
        
            throw new InvalidArgumentException("tidak bisa mengupdate post data");
        }

        DB::commit();
        return $siswa;
    }

    public function deleteById($id)
        {
            DB::beginTransaction();

            try{
                $siswa = $this->siswaRepository->delete($id);
            }catch (Exception $e){
                DB::rollback();
                Log::info($e->getMessage());
            
                throw new InvalidArgumentException('tidak dapat menghapus data');
            }
            DB::commit();
            return $siswa;
        }
        
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\SiswaService;
class SiswaController extends Controller
{
    protected $siswaService;
    public function __construct (SiswaService $siswaService)
    {
        $this->siswaService = $siswaService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
            $result = ['status' => 200];
    
            try {
                $result['data']= $this->siswaService->getAll(); 
            }catch (Exception $e){
                $result = [
                    'status' => 500,
                    'error' => $e->getMessage()
                ];
            }
            return view ('table', [
                'result' =>  $result['data']
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'nama',
            'jurusan',
        ]);

        $result = ['status' => 200];

        try {
            $result['data'] = $this->siswaService->saveSiswaData($data);
        } catch (Exception $e) {
            $result = [
                'status'=>500,
                'error' => $e->getMessage()
            ];
        }
        return redirect('/siswa/index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->siswaService->getById($id);
        }catch (Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return view('update', [
            'result'=>$result['data']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
     //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'nama',
            'jurusan'
        ]);
        $result = ['status' => 200];

        try{
            $result['data'] = $this->siswaService->updateSiswa($data, $id);
        }catch (Exception $e){
            $result = [
                'status'=> 500,
                'error' => $e->getMessage()
            ];
        }
            return redirect('/siswa/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->siswaService->deleteById($id);
        }catch(Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
            return redirect('/siswa/index');
    }

}

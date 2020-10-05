<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        //$pegawais = \App\Pegawai::all();
        $qRecord = Pegawai::orderBy('nip','ASC')->paginate(10);
        return $qRecord->toJson();
    }
 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip'           => 'required',
            'nama_pegawai'  => 'required',
            'alamat'        => 'required',
        ]);
        $project = Pegawai::create([
            'nip'           => $validatedData['nip'],
            'nama_pegawai'  => $validatedData['nama_pegawai'],
            'alamat'        => $validatedData['alamat'],
        ]);
        $msg = [
            'success' => true,
            'message' => 'Record has been added successfully.'
        ];
        return response()->json($msg);
    }
 
    public function getPegawai($id) // for edit and show
    {
        $pegawai = Pegawai::find($id);
        return $pegawai->toJson();
    }
 
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nip'           => 'required',
            'nama_pegawai'  => 'required',
            'alamat'        => 'required',
        ]);
        $pegawai = Pegawai::find($id);
        $pegawai->nip           = $validatedData['nip'];
        $pegawai->nama_pegawai  = $validatedData['nama_pegawai'];
        $pegawai->alamat        = $validatedData['alamat'];
        $pegawai->save();
        $msg = [
            'success' => true,
            'message' => 'Record has been updated successfully.'
        ];
        return response()->json($msg);
    }
 
    public function delete($id)
    {
        $pegawai = Pegawai::find($id);
        if(!empty($pegawai)){
            $pegawai->delete();
            $msg = [
                'success' => true,
                'message' => 'Record has been removed successfully.'
            ];
            return response()->json($msg);
        } else {
            $msg = [
                'success' => false,
                'message' => 'Some problems occured, please try again.'
            ];
            return response()->json($msg);
        }
    }
    
}

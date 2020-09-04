<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Kelas;

class SiswaController extends Controller
{
    public function index() {
        $siswas = Siswa::paginate(10);

        $kelas = Kelas::all();
        
        return view('siswa.index', [
            'siswas' => $siswas,
            'kelas' => $kelas,
        ]);
    }

    public function create() {
        
        $siswa = new Siswa();
        
        $siswa->nis = request('nis');
        $siswa->nama_siswa = request('nama_siswa');
        $siswa->jenis_kelamin = request('jenis_kelamin');
        $siswa->kelas_id = request('kelas_id');
        $siswa->status = request('status');
        $siswa->tahun_masuk = request('tahun_masuk');

        try {
            $save = $siswa->save();
    
            if ($save) {
                return response()->json(["title" => "Berhasil", "text" => "Data Ditambahkan", "type" => "success"]);
            } else {
                return response()->json(["title" => "Gagal", "text" => "Data Gagal Ditambahkan", "type" => "error"]);
            }
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                return response()->json(["title" => "Gagal", "text" => "NIS tidak boleh sama", "type" => "info"]);
            } else {
                return response()->json(["title" => "Gagal", "text" => "Data Gagal Ditambahkan", "type" => "error"]);
            }
        }
    }

    public function destroy($nis) {
        $siswa = Siswa::where('nis', $nis);
        $hapus = $siswa->delete();
        
        if ($hapus) {
            return response()->json(["title" => "Berhasil", "text" => "Data Dihapus", "type" => "success"]);
        } else {
            return response()->json(["title" => "Gagal", "text" => "Data Gagal Dihapus", "type" => "error"]);
        }
    }

    public function edit($nis) {
        $siswa = Siswa::where('nis', $nis)->get();
        $kelas = Kelas::all();

        return view('siswa.edit', [
            'siswa' => $siswa,
            'kelas' => $kelas
        ]);
    }

    public function update(Request $request) {
        Siswa::where('nis', $request->nis)->update([
            'nama_siswa' => $request->nama_siswa,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id' => $request->kelas_id,
            'status' => $request->status,
            'tahun_masuk' => $request->tahun_masuk
        ]);

        return response()->json(["title" => "Berhasil", "text" => "Data DiUpdate", "type" => "success", "route" => route('siswa.index')]);
    }
}

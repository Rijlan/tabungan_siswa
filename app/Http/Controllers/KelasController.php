<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller
{
    public function index() {
        $kelas = Kelas::all();
        $kelas1 = Kelas::all();

        return view('kelas.index', [
            'kelas' => $kelas,
            'kelas1' => $kelas1
        ]);
    }

    public function create() {
        $kelas = new Kelas();

        $kelas->kelas = request('kelas');
        $save = $kelas->save();

        if ($save) {
            return response()->json(["title" => "Berhasil", "text" => "Data Ditambahkan", "type" => "success"]);
        } else {
            return response()->json(["title" => "Gagal", "text" => "Data Gagal Ditambahkan", "type" => "error"]);
        }
    }

    public function destroy($id) {
        $kelas = Kelas::where('id', $id);
        $hapus = $kelas->delete();

        if ($hapus) {
            return response()->json(["title" => "Berhasil", "text" => "Data Dihapus", "type" => "success", "route" => route('kelas.index')]);
        } else {
            return response()->json(["title" => "Gagal", "text" => "Data Gagal Dihapus", "type" => "error", "route" => route('kelas.index')]);
        }
    }

    public function edit($id) {
        $kelas = Kelas::where('id', $id)->first();

        return view('kelas.edit', [
            'kelas' => $kelas,
        ]);
    }

    public function update(Request $request) {
        $update = Kelas::where('id', $request->id)->update([
            'kelas' => $request->kelas
        ]);

        if ($update) {
            return response()->json(["title" => "Berhasil", "text" => "Data DiUpdate", "type" => "success", "route" => route('kelas.index')]);
        } else {
            return response()->json(["title" => "Gagal", "text" => "Data Gagal DiUpdate", "type" => "error", "route" => route('kelas.index')]);
        }
    }
}

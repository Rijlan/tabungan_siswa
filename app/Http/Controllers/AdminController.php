<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Siswa;
use App\Kelas;
use App\Tabungan;
use Hash;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index() {
        $siswa = Siswa::all();
        $siswa = $siswa->count();

        $kelas = Kelas::all();
        $kelas = $kelas->count();

        $setor = Tabungan::sum('setor');
        $tarik = Tabungan::sum('tarik');
        $total = $setor-$tarik;

        return view('admin.index', [
            'siswa' => $siswa,
            'kelas' => $kelas,
            'setor' => number_format($setor),
            'tarik' => number_format($tarik),
            'total' => number_format($total),
        ]);
    }

    public function show() {

        $admins = Admin::all();

        return view('admin.show', [
            'admins' => $admins
        ]);
    }

    public function create() {
        
        $admin = new Admin();

        if (request('password') == request('password2')) {
            try {
                $admin->nama = request('nama');
                $admin->email = request('email');
                $admin->password =  Hash::make(request('password'));
                $admin->level = request('level');
                $save = $admin->save();

                if ($save) {
                    return response()->json(["title" => "Berhasil", "text" => "Data Ditambahkan", "type" => "success"]);
                } else {
                    return response()->json(["title" => "Gagal", "text" => "Data Gagal Ditambahkan", "type" => "error"]);
                }
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) {
                    return response()->json(["title" => "Gagal", "text" => "Email sudah terdaftar", "type" => "info"]);
                }
            }
        } else {
            return response()->json(["title" => "Error", "text" => "Password harus sama", "type" => "info"]);
        }
    }

    public function destroy($id) {
        $admin = Admin::where('id', $id);
        $hapus = $admin->delete();

        if ($hapus) {
            return response()->json(["title" => "Berhasil", "text" => "Data Dihapus", "type" => "success"]);
        } else {
            return response()->json(["title" => "Gagal", "text" => "Data Gagal Dihapus", "type" => "error"]);
        }
    }

    public function edit($id) {
        $admin = Admin::where('id', $id)->first();

        return view('admin.edit', [
            'admin' => $admin,
        ]);
    }

    public function update(Request $request) {

        if ($request->password == $request->password2) {

            Admin::where('id', $request->id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
                'level' => $request->level
            ]);

            return response()->json(["title" => "Berhasil", "text" => "Data DiUpdate", "type" => "success", "route" => route('admin.show')]);
        } else {
            return response()->json(["title" => "Error", "text" => "Password harus sama", "type" => "info", "route" => route('admin.show')]);
        }
    }
}

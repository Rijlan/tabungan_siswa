<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tabungan;
use App\Siswa;
use App\Profile;

class TabunganController extends Controller
{
    // Setor
    public function setor_index() {
        $tabungan = Tabungan::where('transaksi', 'S')->orderBy('tanggal', 'DESC')->paginate(10);
        $jumlah = Tabungan::sum('setor');

        return view('tabungan.setor.index', [
            'tabungan' => $tabungan,
            'jumlah' => $jumlah
        ]);
    }

    public function setor_create() {
        $siswa = Siswa::select('nis', 'nama_siswa')->get();

        return view('tabungan.setor.create', [
            'siswa' => $siswa
        ]);
    }
    // End Setor

    // Tarik
    public function tarik_index() {
        $tabungan = Tabungan::where('transaksi', 'T')->orderBy('tanggal', 'DESC')->paginate(10);
        $jumlah = Tabungan::sum('tarik');

        return view('tabungan.tarik.index', [
            'tabungan' => $tabungan,
            'jumlah' => $jumlah
        ]);
    }

    public function tarik_create() {
        $siswa = Siswa::select('nis', 'nama_siswa')->get();

        return view('tabungan.tarik.create', [
            'siswa' => $siswa
        ]);
    }
    // End Tarik

    public function getSaldo($nis) {
        $setor = Tabungan::where('nis', $nis)->sum('setor');
        $tarik = Tabungan::where('nis', $nis)->sum('tarik');

        $jumlah = $setor - $tarik;
        $saldo = number_format($jumlah);

        return response()->json(['success' => 'true', 'saldo' => $saldo]);
    }

    public function store() {
        $tabungan = new Tabungan();

        if (request('transaksi') == 'S') {
            $tabungan->nis = request('nis');
            $tabungan->setor = request('setor');
            $tabungan->tarik = 0;
            $tabungan->tanggal = date("Y-m-d");
            $tabungan->transaksi = "S";
            $tabungan->petugas = request('petugas');

            $store = $tabungan->save();

            if ($store) {
                return response()->json(["title" => "Berhasil", "text" => "Data Ditambahkan", "type" => "success", "route" => route('setor.index')]);
            } else {
                return response()->json(["title" => "Gagal", "text" => "Data Gagal Ditambahkan", "type" => "error", "route" => route('setor.index')]);
            }
        } else if (request('transaksi') == 'T') {
            $tabungan->nis = request('nis');
            $tabungan->setor = 0;
            $tabungan->tarik = request('tarik');
            $tabungan->tanggal = date("Y-m-d");
            $tabungan->transaksi = "T";
            $tabungan->petugas = request('petugas');

            $store = $tabungan->save();

            if ($store) {
                return response()->json(["title" => "Berhasil", "text" => "Data Ditambahkan", "type" => "success", "route" => route('tarik.index')]);
            } else {
                return response()->json(["title" => "Gagal", "text" => "Data Gagal Ditambahkan", "type" => "error", "route" => route('tarik.index')]);
            }
        }
    }

    public function destroy($id) {
        $cek = Tabungan::where('id', $id)->get();

        foreach ($cek as $c) {
            global $transaksi;
            $transaksi = $c->transaksi;
        }

        $tabungan = Tabungan::where('id', $id);

        if ($transaksi == 'S') {
            $hapus = $tabungan->delete();

            if ($hapus) {
                return response()->json(["title" => "Berhasil", "text" => "Data Dihapus", "type" => "success", "route" => route('setor.index')]);
            } else {
                return response()->json(["title" => "Gagal", "text" => "Data Gagal Dihapus", "type" => "error", "route" => route('setor.index')]);
            }
        } else if ($transaksi == 'T') {
            $hapus = $tabungan->delete();

            if ($hapus) {
                return response()->json(["title" => "Berhasil", "text" => "Data Dihapus", "type" => "success", "route" => route('tarik.index')]);
            } else {
                return response()->json(["title" => "Gagal", "text" => "Data Gagal Dihapus", "type" => "error", "route" => route('tarik.index')]);
            }
        }
    }

    // Info
    public function info_index() {
        return view('tabungan.info.index');
    }

    public function getInfo() {
        $start = request('start-date');
        $end = request('end-date');

        $result = Tabungan::whereBetween('tanggal', [$start, $end]);

        $setor = $result->sum('setor');
        $tarik = $result->sum('tarik');
        $saldo = $setor - $tarik;
        
        return view('tabungan.info.show', [
            'start' => $start,
            'end' => $end,
            'setor' => $setor,
            'tarik' => $tarik,
            'saldo' => $saldo
        ]);
    }

    public function index() {
        $siswa = Siswa::select('nis', 'nama_siswa')->get();

        return view('tabungan.index', [
            'siswa' => $siswa
        ]);
    }

    public function show() {
        $tabungan = Tabungan::where('nis', request('nis'))->orderBy('tanggal', 'DESC')->get();
        $setor = $tabungan->sum('setor');
        $tarik = $tabungan->sum('tarik');
        $saldo = $setor - $tarik;

        return view('tabungan.show', [
            'tabungan' => $tabungan,
            'setor' => $setor,
            'tarik' => $tarik,
            'saldo' => $saldo,
        ]);
    }

    public function laporan() {
        return view('tabungan.laporan.index');
    }

    public function print() {
        $start = request('start-date');
        $end = request('end-date');

        $result = Tabungan::whereBetween('tanggal', [$start, $end])->orderBy('tanggal', 'DESC')->get();
        $setor = $result->sum('setor');
        $tarik = $result->sum('tarik');

        $total_setor = Tabungan::sum('setor');
        $total_tarik = Tabungan::sum('tarik');
        $saldo = $total_setor - $total_tarik;

        $profile = Profile::first();

        return view('tabungan.laporan.print', [
            'start' => $start,
            'end' => $end,
            'result' => $result,
            'setor' => $setor,
            'tarik' => $tarik,
            'saldo' => $saldo,
            'profile' => $profile
        ]);
    }
}

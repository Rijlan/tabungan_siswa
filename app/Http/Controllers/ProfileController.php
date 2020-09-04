<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function index() {
        $profile = Profile::first();

        return view('profile.index', [
            'profile' => $profile
        ]);
    }

    public function create() {
        $profile = new Profile();

        $profile->nama_sekolah = request('nama_sekolah');
        $profile->alamat = request('alamat');
        $profile->akreditasi = request('akreditasi');

        $save = $profile->save();

        if ($save) {
            return redirect(route('profile.index'))->with('mssg', 'Profile Berhasil dibuat');
        } else {
            return redirect(route('profile.index'))->with('mssg', 'Profile Gagal dibuat');
        }
    }

    public function destroy($id) {
        $profile = Profile::findOrFail($id);
        $delete = $profile->delete();

        if ($delete) {
            return redirect(route('profile.index'))->with('mssg', 'Profile Berhasil dihapus');
        } else {
            return redirect(route('profile.index'))->with('mssg', 'Profile Gagal dihapus');
        }
    }

    public function update(Request $request) {
        Profile::where('id', $request->id)->update([
            'nama_sekolah' => $request->nama_sekolah,
            'alamat' => $request->alamat,
            'akreditasi' => $request->akreditasi
        ]);

        return redirect(route('profile.index'))->with('mssg', 'Profile Berhasil diupdate');
    }
}

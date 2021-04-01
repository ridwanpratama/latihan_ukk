<?php

namespace App\Http\Controllers\Admin;

use App\Ppdb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Ppdb::all();
        return view('admin.siswa.index', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Ppdb::find($id);
        return view('admin.siswa.edit',compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $data = Ppdb::find($id);
        $data->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,

        ]);

        return redirect()->route('siswa.index');
    }

    public function destroy($id)
    {
        $siswa = Ppdb::find($id);
        $siswa->delete();
        return redirect('siswa');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Ppdb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProsesController extends Controller
{
    public function proses()
    {
        $data = Ppdb::where('status', '=', 'proses')->get();
        return view('admin.status.proses', compact('data'));
    }

    public function terima($id)
    {
        $data = Ppdb::find($id);
        $data->update([
            'status' => 'diterima'
        ]);

        return back();
    }

    public function tolak($id)
    {
        $data = Ppdb::find($id);
        $data->update([
            'status' => 'ditolak'
        ]);

        return back();
    }

    public function diterima()
    {
        $data = Ppdb::where('status', '=', 'diterima')->get();
        return view('admin.status.diterima', compact('data'));
    }

    public function ditolak()
    {
        $data = Ppdb::where('status', '=', 'ditolak')->get();
        return view('admin.status.ditolak', compact('data'));
    }
}

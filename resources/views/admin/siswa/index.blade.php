@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('PPDB SMK Wikrama') }}</div>

                    <div class="card-body">
                        <table class="table table-responsive" id="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nis</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Asal Sekolah</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($siswa as $item)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $item->nis }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->jk }}</td>
                                        <td>{{ $item->tempat_lahir }}</td>
                                        <td>{{ $item->tanggal_lahir }}</td>
                                        <th>{{ $item->alamat }}</th>
                                        <th>{{ $item->asal_sekolah }}</th>
                                        <th>{{ $item->kelas }}</th>
                                        <th>{{ $item->jurusan }}</th>
                                        <th>
                                            <form action="{{ route('siswa.destroy', [$item->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm my-1"
                                                    onclick="return confirm('Apakah anda yakin ingin menghapus siswa: {{ $item->nama }}?')">Hapus</button>
                                                <a href="{{ route('siswa.edit', [$item->id]) }}"
                                                    class="btn btn-warning btn-sm">Ubah</a>
                                            </form>
                                        </th>
                                    </tr>
                                @empty
                                    Tidak ada data
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin-lte.main')

@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Nilai</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @include('partial.alert')
        <div class="card">
            <div class="card-header header-primary">Nilai</div>

            <div class="card-body">
                @if(Auth::user()->role_id != 1 && Auth::user()->role_id != 4 && Auth::user()->role_id != 5)
                <p><a href="{{ route('nilai.create') }}" class="btn btn-sm btn-primary">Buat</a></p>
                @endif
                <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Guru Pengajar</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Tugas</th>
                            <th scope="col">UTS</th>
                            <th scope="col">UAS</th>
                            <th scope="col">KKM</th>
                            <th scope="col">Status</th>
                            @if(Auth::user()->role_id != 1 && Auth::user()->role_id != 4 && Auth::user()->role_id != 5)
                            <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->siswa->nis }}</td>
                                <td>{{ $data->siswa->nama }}</td>
                                <td>{{ ucwords($data->mapel->name) }}</td>
                                @php
                                    $guru = App\Guru::where('mapel_id', $data->mapel_id)->first();     
                                @endphp
                                <td>{{ !empty($guru) ? $guru->nama : 'Data guru belum ada' }}</td>
                                <td>{{ $data->kelas->name }}</td>
                                <td>{{ $data->tugas }}</td>
                                <td>{{ $data->uts }}</td>
                                <td>{{ $data->uas }}</td>
                                <td>{{ $data->kkm }}</td>
                                <td>{{ $data->status() }}</td>
                                @if(Auth::user()->role_id != 1 && Auth::user()->role_id != 4 && Auth::user()->role_id != 5)
                                <td>
                                    @include('partial.action', ['data' => $data, 'route'=>'nilai'])
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
</div>
@include('partial.dataTable')
@endsection

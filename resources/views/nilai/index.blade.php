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
                <p><a href="{{ route('nilai.create') }}" class="btn btn-sm btn-primary">Buat</a></p>
                <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Kelas</th>
                            {{-- <th scope="col">Guru Pengajar</th> --}}
                            <th scope="col">Tugas</th>
                            <th scope="col">UTS</th>
                            <th scope="col">UAS</th>
                            <th scope="col">KKM</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->siswa->nis }}</td>
                                <td>{{ $data->siswa->nama }}</td>
                                <td>{{ ucwords($data->mapel->name) }}</td>
                                {{-- <td>{{ App\Guru::where('mapel_id', $data->mapel_id)->first()->nama }}</td> --}}
                                <td>{{ $data->kelas->name }}</td>
                                <td>{{ $data->tugas }}</td>
                                <td>{{ $data->uts }}</td>
                                <td>{{ $data->uas }}</td>
                                <td>{{ $data->kkm }}</td>
                                <td>{{ $data->status() }}</td>
                                <td>
                                    @include('partial.action', ['data' => $data, 'route'=>'nilai'])
                                </td>
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

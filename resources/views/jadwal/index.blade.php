@extends('layouts.admin-lte.main')

@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Jadwal</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @include('partial.alert')
        <div class="card">
            <div class="card-header header-primary">Jadwal</div>

            <div class="card-body">
                @if(Auth::user()->role_id != 3 && Auth::user()->role_id != 2 && Auth::user()->role_id != 4)
                <p><a href="{{ route('jadwal.create') }}" class="btn btn-sm btn-primary">Buat</a></p>
                @endif
                <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Hari</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Selesai</th>
                            <th scope="col">Guru</th>
                            @if(Auth::user()->role_id != 3 && Auth::user()->role_id != 2 && Auth::user()->role_id != 4)
                            <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $data)
                            <tr>
                                <td>{{ ucwords($data->hari) }}</td>
                                <td>{{ ucwords($data->kelas->name) }}</td>
                                <td>{{ ucwords($data->mapel->name) }}</td>
                                <td>{{ $data->jam_mulai }}</td>
                                <td>{{ $data->jam_selesai }}</td>
                                <td>{{ ucwords($data->guru->nama) }}</td>
                                @if(Auth::user()->role_id != 3 && Auth::user()->role_id != 2 && Auth::user()->role_id != 4)
                                <td>
                                    @include('partial.action', ['data' => $data, 'route'=>'jadwal'])
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

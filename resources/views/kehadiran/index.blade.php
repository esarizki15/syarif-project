@extends('layouts.admin-lte.main')

@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Nilai Kehadiran</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @include('partial.alert')
        <div class="card">
            <div class="card-header header-primary">Nilai Kehadiran</div>

            <div class="card-body">
                @if(Auth::user()->role_id != 1)
                <p><a href="{{ route('kehadiran.create') }}" class="btn btn-sm btn-primary">Buat</a></p>
                @endif
                <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Sakit</th>
                            <th scope="col">Izin</th>
                            <th scope="col">Tanpa Keterangan</th>
                            @if(Auth::user()->role_id != 1)
                            <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kehadiran as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->siswa->nis }}</td>
                                <td>{{ $data->siswa->nama }}</td>
                                <td>{{ $data->kelas->name }}</td>
                                <td>{{ $data->semester->nama_semester }}</td>
                                {{-- <td>{{ ucwords($data->name) }}</td> --}}
                                <td>{{ $data->sakit }}</td>
                                <td>{{ $data->izin }}</td>
                                <td>{{ $data->tanpa_keterangan }}</td>
                                @if(Auth::user()->role_id != 1)
                                <td>
                                    @include('partial.action', ['data' => $data, 'route'=>'kehadiran'])
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

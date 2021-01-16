@extends('layouts.admin-lte.main')

@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Siswa</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @include('partial.alert')
        <div class="card">
            <div class="card-header header-primary">Siswa</div>

            <div class="card-body">
                @if(Auth::user()->role_id != 5)
                <p><a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary">Buat</a></p>
                @endif
                <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Hp</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Nama Wali</th>
                            @if(Auth::user()->role_id != 5)
                            <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $data)
                            <tr>
                                <td><img src="{{ asset('img/' . $data->foto) }}" alt="none" style="max-width: -webkit-fill-available;
                                    max-height: 200px;"></td>
                                <td>{{ strtoupper($data->nis) }}</td>
                                <td>{{ strtoupper($data->nama) }}</td>
                                <td>{{ strtoupper($data->jenis_kelamin) }}</td>
                                <td>{{ strtoupper($data->kelas->name) }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->hp }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ strtoupper($data->nama_orang_tua) }}</td>
                                @if(Auth::user()->role_id != 5)
                                <td>
                                    @include('partial.action', ['data' => $data, 'route'=>'siswa'])
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

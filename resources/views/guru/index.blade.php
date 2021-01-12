@extends('layouts.admin-lte.main')

@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Guru</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @include('partial.alert')
        <div class="card">
            <div class="card-header header-primary">Guru</div>

            <div class="card-body">
                <p><a href="{{ route('guru.create') }}" class="btn btn-sm btn-primary">Buat</a></p>
                <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Mata Pelajaran</th>
                            <th scope="col">Email</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guru as $data)
                            <tr>
                                <td><img src="{{ asset('img/' . $data->foto) }}" alt="none" style="max-width: -webkit-fill-available;
                                    max-height: 200px;"></td>
                                <td>{{ strtoupper($data->nip) }}</td>
                                <td>{{ strtoupper($data->nama) }}</td>
                                <td>{{ strtoupper($data->jenis_kelamin) }}</td>
                                <td>{{ strtoupper($data->mapel->name) }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->hp }}</td>
                                <td>
                                    @include('partial.action', ['data' => $data, 'route'=>'guru'])
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

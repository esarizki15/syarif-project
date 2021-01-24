@extends('layouts.admin-lte.main')

@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Semester</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @include('partial.alert')
        <div class="card">
            <div class="card-header header-primary">Semester</div>

            <div class="card-body">
                <p><a href="{{ route('semester.create') }}" class="btn btn-sm btn-primary">Buat</a></p>
                <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                        {{-- <th scope="col">Kode Semester</th> --}}
                        <th scope="col">Nama Semester</th>
                        <th scope="col">Nama Tahun Ajar</th>
                        {{-- <th scope="col">Nama Tahun Pelajaran</th> --}}
                        <th scope="col">Semester</th>
                        <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($semester as $data)
                            <tr>
                                {{-- <td>{{ $data->kode_semester }}</td> --}}
                                <td>{{ $data->nama_semester }}</td>
                                <td>{{ $data->nama_tahun_ajar }}</td>
                                {{-- <td>{{ $data->nama_tahun_pelajaran }}</td> --}}
                                <td>{{ $data->semester }}</td>
                                <td>
                                    @include('partial.action', ['data' => $data, 'route'=>'semester'])
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

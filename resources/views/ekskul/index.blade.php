@extends('layouts.admin-lte.main')

@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Ekstrakurikuler</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @include('partial.alert')
        <div class="card">
            <div class="card-header header-primary">Ekstrakurikuler</div>

            <div class="card-body">
                <p><a href="{{ route('ekskul.create') }}" class="btn btn-sm btn-primary">Buat</a></p>
                <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Nama Singkat</th>
                            <th scope="col">Jumlah Peminat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ekskul as $data)
                            <tr>
                                <td>{{ ucwords($data->name) }}</td>
                                <td>{{ strtoupper($data->nama_singkat) }}</td>
                                <td>{{ $data->siswas->count() }}</td>
                                <td>
                                    @include('partial.action', ['data' => $data, 'route'=>'ekskul'])
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

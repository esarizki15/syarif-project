@extends('layouts.admin-lte.main')

@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Raport</li>
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
                            <th scope="col">NIS</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Link Download</th>
                            <th scope="col">Status Download</th>
                            <th scope="col">Izin Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $data)
                            <tr>
                                <td>{{ $data->siswa->nis }}</td>
                                <td>{{ ucwords($data->siswa->nama) }}</td>
                                <td><a href="{{ route('raport.show', $data->id) }}">Download</a></td>
                                <td>{{ $data->getStatusDownload() }}</td>
                                <td>
                                    <form method="POST" action="{{ route('raport.update', $data->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <input type="hidden" name="status" value="{{ $data->getReverseStatus() }}">
                                        <button class="btn btn-xs @if($data->status == 0)btn-success @else btn-red @endif">{{ $data->getIzinDownload() }}</button>
                                    </form>
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

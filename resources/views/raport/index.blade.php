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
                <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Tahun Pelajaran</th>
                            <th scope="col">Link Download</th>
                            <th scope="col">Status Download</th>
                            @if(Auth::user()->role_id != 5 && Auth::user()->role_id != 4 && Auth::user()->role_id != 2)
                            <th scope="col">Izin Download</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $data)
                            <tr>
                                <td>{{ $data->siswa->nis }}</td>
                                <td>{{ ucwords($data->siswa->nama) }}</td>
                                <td>{{ $data->semester->nama_semester }}</td>
                                <td><a @if($data->status == 1) target="_blank" href="{{ route('raport.show', $data->id) }}" @else href="#" @endif>Download</a></td>
                                <td>{{ $data->getStatusDownload() }}</td>
                                @if(Auth::user()->role_id != 5 && Auth::user()->role_id != 4 && Auth::user()->role_id != 2)
                                <td>
                                    <form method="POST" action="{{ route('raport.update', $data->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <input type="hidden" name="status" value="{{ $data->getReverseStatus() }}">
                                        <button class="btn btn-xs @if($data->status == 0)btn-success @else btn-red @endif">{{ $data->getIzinDownload() }}</button>
                                    </form>
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

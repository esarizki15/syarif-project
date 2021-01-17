@extends('layouts.admin-lte.main')

@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Nilai Sikap</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        @include('partial.alert')
        <div class="card">
            <div class="card-header header-primary">Nilai Sikap</div>

            <div class="card-body">
                @if(Auth::user()->role_id != 1)
                <p><a href="{{ route('nilai-sikap.create') }}" class="btn btn-sm btn-primary">Buat</a></p>
                @endif
                <table class="table table-hover display nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Akhlak</th>
                            <th scope="col">Kerajinan</th>
                            <th scope="col">Kedisiplinan</th>
                            <th scope="col">Kerapihan dan Kebersihan</th>
                            <th scope="col">Keterangan</th>
                            @if(Auth::user()->role_id != 1)
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
                                <td>{{ $data->kelas->name }}</td>
                                <td>{{ $data->semester->nama_semester }}</td>
                                {{-- <td>{{ ucwords($data->name) }}</td> --}}
                                <td>{{ $data->akhlak }}</td>
                                <td>{{ $data->kerajinan }}</td>
                                <td>{{ $data->kedisiplinan }}</td>
                                <td>{{ $data->kebersihan_dan_kerapihan }}</td>
                                <td>{!! $data->keterangan !!}</td>
                                @if(Auth::user()->role_id != 1)
                                <td>
                                    @include('partial.action', ['data' => $data, 'route'=>'nilai-sikap'])
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

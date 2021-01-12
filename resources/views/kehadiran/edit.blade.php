@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('kehadiran.index') }}">Nilai Kehadiran</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">Nilai Kehadiran</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('kehadiran.update', $kehadiran->id) }}">
                    @method('put')
                    @csrf
                    
                    <x-select globalAttribute="siswa_id" label="Siswa" customAttribute="required">
                        @foreach ($siswa as $data)
                            <option value="{{ $data->id }}" @if($kehadiran->siswa_id == $data->id) selected @endif>{{ $data->nama }}</option>
                        @endforeach
                    </x-select>
                    
                    <x-select globalAttribute="kelas_id" label="Kelas" customAttribute="required">
                        @foreach ($kelas as $data)
                            <option value="{{ $data->id }}" @if($kehadiran->kelas_id == $data->id) selected @endif>{{ $data->name }}</option>
                        @endforeach
                    </x-select>
                    
                    <x-select globalAttribute="semester_id" label="Semester" customAttribute="required">
                        @foreach ($semester as $data)
                            <option value="{{ $data->id }}" @if($kehadiran->semester_id == $data->id) selected @endif>{{ $data->nama_semester }}</option>
                        @endforeach
                    </x-select>

                    <x-input type="number" globalAttribute="sakit" :defaultValue="$kehadiran->sakit" customAttribute="required" />

                    <x-input type="number" globalAttribute="izin" :defaultValue="$kehadiran->izin" customAttribute="required" />

                    <x-input type="number" globalAttribute="tanpa_keterangan" :defaultValue="$kehadiran->tanpa_keterangan" label="Tanpa Keterangan" customAttribute="required" />
                    
                    <x-submit-button label="Update" />
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

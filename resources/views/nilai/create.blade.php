@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('nilai.index') }}">Nilai</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">Nilai</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('nilai.store') }}">
                    @csrf
                    
                    <x-select globalAttribute="siswa_id" label="Siswa" customAttribute="required">
                        @foreach ($siswa as $data)
                            <option value="{{ $data->id }}" @if(old('siswa_id') == $data->id) selected @endif>{{ $data->nama }}</option>
                        @endforeach
                    </x-select>
                    
                    <x-select globalAttribute="kelas_id" label="Kelas" customAttribute="required">
                        @foreach ($kelas as $data)
                            <option value="{{ $data->id }}" @if(old('kelas_id') == $data->id) selected @endif>{{ $data->name }}</option>
                        @endforeach
                    </x-select>
                    
                    <x-select globalAttribute="mapel_id" label="Mapel" customAttribute="required">
                        @foreach ($mapel as $data)
                            <option value="{{ $data->id }}" @if(old('mapel_id') == $data->id) selected @endif>{{ $data->name }}</option>
                        @endforeach
                    </x-select>
                    
                    <x-select globalAttribute="semester_id" label="Semester" customAttribute="required">
                        @foreach ($semester as $data)
                            <option value="{{ $data->id }}" @if(old('semester_id') == $data->id) selected @endif>{{ $data->nama_semester }}</option>
                        @endforeach
                    </x-select>

                    <x-input type="number" globalAttribute="kkm" :defaultValue="old('kkm')" label="KKM" customAttribute="required" />

                    <x-input type="number" globalAttribute="tugas" :defaultValue="old('tugas')" />

                    <x-input type="number" globalAttribute="uts" :defaultValue="old('uts')" label="UTS" />

                    <x-input type="number" globalAttribute="uas" :defaultValue="old('uas')" label="UAS" />
{{-- 
                    <x-input globalAttribute="predikat" :defaultValue="old('predikat')" /> --}}

                    <x-submit-button />
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

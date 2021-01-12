@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('nilai.index') }}">Nilai</a></li>
<li class="breadcrumb-item active">Edit</li>
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
                <form method="POST" action="{{ route('nilai.update', $nilai->id) }}">
                    @method('put')
                    @csrf
                    
                    <x-select globalAttribute="siswa_id" label="Siswa" customAttribute="required">
                        @foreach ($siswa as $data)
                            <option value="{{ $data->id }}" @if($nilai->siswa_id == $data->id) selected @endif>{{ $data->nama }}</option>
                        @endforeach
                    </x-select>
                    
                    <x-select globalAttribute="kelas_id" label="Kelas" customAttribute="required">
                        @foreach ($kelas as $data)
                            <option value="{{ $data->id }}" @if($nilai->kelas_id == $data->id) selected @endif>{{ $data->name }}</option>
                        @endforeach
                    </x-select>
                    
                    <x-select globalAttribute="mapel_id" label="Mapel" customAttribute="required">
                        @foreach ($mapel as $data)
                            <option value="{{ $data->id }}" @if($nilai->mapel_id == $data->id) selected @endif>{{ $data->name }}</option>
                        @endforeach
                    </x-select>
                    
                    <x-select globalAttribute="semester_id" label="Semester" customAttribute="required">
                        @foreach ($semester as $data)
                            <option value="{{ $data->id }}" @if($nilai->semester_id == $data->id) selected @endif>{{ $data->nama_semester }}</option>
                        @endforeach
                    </x-select>

                    <x-input type="number" globalAttribute="kkm" :defaultValue="$nilai->kkm" label="KKM" customAttribute="required" />

                    <x-input type="number" globalAttribute="tugas" :defaultValue="$nilai->tugas" />

                    <x-input type="number" globalAttribute="uts" :defaultValue="$nilai->uts" label="UTS" />

                    <x-input type="number" globalAttribute="uas" :defaultValue="$nilai->uas" label="UAS" />

                    <x-input globalAttribute="predikat" :defaultValue="$nilai->predikat" />

                    <x-submit-button label="Update" />
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

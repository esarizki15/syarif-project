@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('nilai-ekskul.index') }}">Nilai Ekskul</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">Nilai Ekskul</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('nilai-ekskul.store') }}">
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
                    
                    <x-select globalAttribute="ekskul_id" label="Ekskul" customAttribute="required">
                        @foreach ($ekskul as $data)
                            <option value="{{ $data->id }}" @if(old('ekskul_id') == $data->id) selected @endif>{{ $data->name }}</option>
                        @endforeach
                    </x-select>
                    
                    <x-select globalAttribute="semester_id" label="Semester" customAttribute="required">
                        @foreach ($semester as $data)
                            <option value="{{ $data->id }}" @if(old('semester_id') == $data->id) selected @endif>{{ $data->nama_semester }}</option>
                        @endforeach
                    </x-select>

                    <x-input type="number" globalAttribute="nilai" :defaultValue="old('nilai')" customAttribute="required" />

                    <x-submit-button />
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('nilai-sikap.index') }}">Nilai Sikap</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">Nilai Sikap</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('nilai-sikap.update', $nilai->id) }}">
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
                    
                    <x-select globalAttribute="semester_id" label="Semester" customAttribute="required">
                        @foreach ($semester as $data)
                            <option value="{{ $data->id }}" @if($nilai->semester_id == $data->id) selected @endif>{{ $data->nama_semester }}</option>
                        @endforeach
                    </x-select>

                    <x-input globalAttribute="akhlak" :defaultValue="$nilai->akhlak" />

                    <x-input globalAttribute="kerajinan" :defaultValue="$nilai->kerajinan" />

                    <x-input globalAttribute="kedisiplinan" :defaultValue="$nilai->kedisiplinan" />

                    <x-input globalAttribute="kebersihan_dan_kerapihan" :defaultValue="$nilai->kebersihan_dan_kerapihan" label="Kebersihan dan Kerapihan" />

                    <x-text-area globalAttribute="keterangan" :defaultValue="$nilai->keterangan" />
                    
                    <x-submit-button />
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

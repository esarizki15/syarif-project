@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">Jadwal</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('jadwal.update', $jadwal->id) }}">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col col-md-6 px-3">
                            <x-select globalAttribute="hari" label="Hari" :isStack="true" customAttribute="required">
                                @foreach ($hari as $data)
                                    <option value="{{ $data }}" @if($jadwal->hari == $data) selected @endif>{{ ucwords($data) }}</option>
                                @endforeach
                            </x-select>

                            <x-select globalAttribute="kelas_id" label="Kelas" :isStack="true" customAttribute="required">
                                @foreach ($kelas as $data)
                                    <option value="{{ $data->id }}" @if($jadwal->kelas_id == $data->id) selected @endif>{{ strtoupper($data->name) }}</option>
                                @endforeach
                            </x-select>

                            <x-select globalAttribute="mapel_id" label="Mata Pelajaran" :isStack="true" customAttribute="required">
                                @foreach ($mapel as $data)
                                    <option value="{{ $data->id }}" @if($jadwal->mapel_id == $data->id) selected @endif>{{ strtoupper($data->name) }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        <div class="col col-md-6 px-3">
                            <x-input type="time" globalAttribute="jam_mulai" :defaultValue="$jadwal->jam_mulai" label="Jam Mulai" customAttribute="required" :isStack="true" />
                            
                            <x-input type="time" globalAttribute="jam_selesai" :defaultValue="$jadwal->jam_selesai" label="Jam Selesai" customAttribute="required" :isStack="true" />

                            <x-select globalAttribute="guru_id" label="Guru" :isStack="true" customAttribute="required">
                                @foreach ($guru as $data)
                                    <option value="{{ $data->id }}" @if($jadwal->guru_id == $data->id) selected @endif>{{ $data->nama }}</option>
                                @endforeach
                            </x-select>

                            <div class="row">
                                <div class="col" style="text-align: right;">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

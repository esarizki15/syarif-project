@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('guru.index') }}">Guru</a></li>
<li class="breadcrumb-item active">Edit</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
            <div class="card-header">Guru</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('guru.update', $guru->id) }}"  enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="row">
                        <div class="col col-md-6 px-3">
                            <x-input globalAttribute="nip" :defaultValue="$guru->nip" customAttribute="required" isStack="{{ true }}" />
                            
                            <x-input globalAttribute="nama" :defaultValue="$guru->nama" customAttribute="required" label="Nama guru" isStack="{{ true }}" />
                            
                            <x-input globalAttribute="tempat_lahir" label="Tempat Lahir" :defaultValue="$guru->tempat_lahir" customAttribute="required" isStack="{{ true }}" />
                        
                            <x-input type="date" globalAttribute="tanggal_lahir" label="Tanggal Lahir" :defaultValue="$guru->tanggal_lahir" customAttribute="required" isStack="{{ true }}" />
                            
                            <x-input globalAttribute="email" type="email" :defaultValue="$guru->email" customAttribute="required" isStack="{{ true }}" />
                        </div>
                        <div class="col col-md-6 px-3">
                            <x-select globalAttribute="jenis_kelamin" :isStack="true" label="Jenis Kelamin" customAttribute="required">
                                <option value="l" @if($guru->jenis_kelamin == 'l') selected @endif>L</option>
                                <option value="p" @if($guru->jenis_kelamin == 'p') selected @endif>P</option>
                            </x-select>

                            <x-select globalAttribute="mapel_id" label="Mata Pelajaran" :isStack="true" customAttribute="required">
                                @foreach ($mapel as $data)
                                    <option value="{{ $data->id }}" @if($guru->mapel_id == $data->id) selected @endif>{{ $data->name }}</option>
                                @endforeach
                            </x-select>

                            <x-input globalAttribute="hp" :defaultValue="$guru->hp" customAttribute="required" label="No. Handphone" isStack="{{ true }}" />

                            <x-input globalAttribute="jenjang_pendidikan" :defaultValue="$guru->jenjang_pendidikan" customAttribute="required" label="Jenjang Pendidikan" isStack="{{ true }}" />

                            <x-input type="file" globalAttribute="foto" :defaultValue="$guru->foto" label="Foto" isStack="{{ true }}" />

                            <div class="form-group row">
                                <div class="col">
                                    <img src="{{ asset('img/' . $guru->foto) }}" alt="none" style="max-width: -webkit-fill-available;
                                    max-height: 200px;">
                                </div>
                            </div>

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

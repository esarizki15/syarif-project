@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('siswa.index') }}">Siswa</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
            <div class="card-header">Siswa</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('siswa.store') }}"  enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col col-md-6 px-3">
                            <x-input globalAttribute="nis" :defaultValue="old('nis')" customAttribute="required" isStack="{{ true }}" />
                            
                            <x-input globalAttribute="nama" :defaultValue="old('nama')" customAttribute="required" label="Nama Siswa" isStack="{{ true }}" />
                           
                            <x-input globalAttribute="tempat_lahir" label="Tempat Lahir" :defaultValue="old('tempat_lahir')" customAttribute="required" isStack="{{ true }}" />
                            
                            <x-input type="date" globalAttribute="tanggal_lahir" label="Tanggal Lahir" :defaultValue="old('tanggal_lahir')" customAttribute="required" isStack="{{ true }}" />
                            
                            <x-input globalAttribute="nama_orang_tua" label="Nama Orang Tua" :defaultValue="old('nama_orang_tua')" customAttribute="required" isStack="{{ true }}" />
                            
                            <x-input globalAttribute="email" type="email" :defaultValue="old('email')" customAttribute="required" isStack="{{ true }}" />
                        </div>
                        <div class="col col-md-6 px-3">
                            <x-select globalAttribute="jenis_kelamin" :isStack="true" label="Jenis Kelamin" customAttribute="required">
                                <option value="l" @if(old('jenis_kelamin') == 'l') selected @endif>L</option>
                                <option value="p" @if(old('jenis_kelamin') == 'p') selected @endif>P</option>
                            </x-select>

                            <x-select globalAttribute="kelas_id" label="Kelas" :isStack="true" customAttribute="required">
                                @foreach ($kelas as $data)
                                    <option value="{{ $data->id }}" @if(old('kelas_id') == $data->id) selected @endif>{{ $data->name }}</option>
                                @endforeach
                            </x-select>

                            <x-select globalAttribute="ekskul_id" label="Ekstrakurikuler" :isStack="true" customAttribute="required">
                                @foreach ($ekskul as $data)
                                    <option value="{{ $data->id }}" @if(old('ekskul_id') == $data->id) selected @endif>{{ $data->name }}</option>
                                @endforeach
                            </x-select>

                            <x-input globalAttribute="hp" :defaultValue="old('hp')" customAttribute="required" label="No. Handphone" isStack="{{ true }}" />

                            <x-input globalAttribute="alamat" :defaultValue="old('alamat')" customAttribute="required" label="Alamat" isStack="{{ true }}" />
                            
                            <x-input type="file" globalAttribute="foto" :defaultValue="old('foto')" label="Foto" isStack="{{ true }}" />

                            <div class="row">
                                <div class="col" style="text-align: right;">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
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

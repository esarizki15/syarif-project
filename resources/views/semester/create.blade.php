@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('semester.index') }}">Semester</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">Semester</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('semester.store') }}">
                    @csrf

                    {{-- <x-input globalAttribute="kode_semester" label="Kode Semester" :defaultValue="old('kode_semester')" customAttribute="required" /> --}}

                    <x-input globalAttribute="nama_semester" label="Nama Semester" :defaultValue="old('nama_semester')" customAttribute="required" />

                    <x-input globalAttribute="nama_tahun_ajar" label="Nama Tahun Ajaran" :defaultValue="old('nama_tahun_ajar')" customAttribute="required" />

                    {{-- <x-input globalAttribute="nama_tahun_pelajaran" label="Nama Tahun Pelajaranan" :defaultValue="old('nama_tahun_pelajaran')" customAttribute="required" /> --}}

                    <x-input type="number" globalAttribute="semester" :defaultValue="old('semester')" customAttribute="required" />
                    
                    <x-submit-button />
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

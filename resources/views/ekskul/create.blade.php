@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('ekskul.index') }}">Ekstrakurikuler</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">Ekstrakurikuler</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('ekskul.store') }}">
                    @csrf
                    <x-input globalAttribute="name" :defaultValue="old('name')" customAttribute="required" />
                    
                    <x-input globalAttribute="nama_singkat" label="Nama Singkat" :defaultValue="old('nama_singkat')" customAttribute="required" />
                    
                    <x-submit-button />
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('mapel.index') }}">Mapel</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">Mapel</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('mapel.update', $mapel->id) }}">
                    @method('PUT')
                    @csrf
                    {{-- <x-input globalAttribute="kode" :defaultValue="$mapel->kode" customAttribute="required" /> --}}
                    
                    <x-input globalAttribute="name" :defaultValue="$mapel->name" customAttribute="required" />
                    
                    <x-submit-button label="Update" />
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

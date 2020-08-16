@extends('layouts.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item active">Profile</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-content-center">
      <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">Profile</div>
                    <div class="col-6" style="text-align: end;">
                        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @include('partial.alert')
                <div class="row">
                    <div class="col-6">Nama</div>
                    <div class="col-6">{{ $user->name }}</div>
                </div>
                <div class="row">
                    <div class="col-6">Email</div>
                    <div class="col-6">{{ $user->email }}</div>
                </div>
                <div class="row">
                    <div class="col-6">Role</div>
                    <div class="col-6">{{ $user->role->name }}</div>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('script')
@include('partial.dataTable')
@endsection

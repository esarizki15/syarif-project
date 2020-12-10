@extends('layouts.admin-lte.main')
@section('title')
    
@endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></li>
<li class="breadcrumb-item active">Create</li>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
            <div class="card-header">User</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('user.store') }}">
                    @csrf

                    <x-input globalAttribute="name" :defaultValue="old('name')" customAttribute="required" />
                    
                    <x-input globalAttribute="email" type="email" label="E-Mail Address" :defaultValue="old('email')" customAttribute="required" />
                    
                    <x-select globalAttribute="role_id" label="Role" customAttribute="required">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if(old('role_id') == $role->id) selected @endif>{{ $role->name }}</option>
                        @endforeach
                    </x-select>
                    
                    <x-input globalAttribute="password" type="password" label="Password" :defaultValue="old('password')" customAttribute="required" />

                    <x-submit-button />
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

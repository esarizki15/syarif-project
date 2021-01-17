@extends('layouts.admin-lte.main')

@section('content')
<div class="container">
    @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 5)
    @include('partial.dashboard_info')
    @endif
    <div class="row">
        <div class="col"></div>
    </div>
    @forelse ($pengumuman as $data)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data->judul }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! $data->isi !!}
                </div>
            </div>
        </div>
    </div>    
    @empty
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    @endforelse
</div>
@endsection

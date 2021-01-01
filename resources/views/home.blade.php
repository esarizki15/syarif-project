@extends('layouts.admin-lte.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                <h3>{{ App\User::where('role_id', 2)->count() }}</h3>

                <p>Siswa</p>
                </div>
                <div class="icon">
                <i class="ion ion-person"></i>
                </div>
                @if(Auth::user()->role_id == 1)
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                <h3>{{ App\User::where('role_id', 3)->count() }}</h3>

                <p>Guru</p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
                @if(Auth::user()->role_id == 1)
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                @endif
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>-</h3>
                <p>Kelas</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              @if(Auth::user()->role_id == 1)
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @endif
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>4</h3>

                <p>Mapel</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              @if(Auth::user()->role_id == 1)
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              @endif
            </div>
          </div>
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

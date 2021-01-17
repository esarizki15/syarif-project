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
            <h3>{{ App\Kelas::count() }}</h3>
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
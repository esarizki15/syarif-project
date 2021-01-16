<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="{{url('/admin-lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        @guest
      
        @else    
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
              <img src="{{url('/admin-lte/dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('profile.index') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        @endguest
        
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link {{ (request()->is('login')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-sign-in-alt"></i>
                <p>
                    Login
                </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link {{ (request()->is('register*')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-key"></i>
                <p>
                    Register
                </p>
                </a>
            </li>
          @else
            <li class="nav-item">
              <a href="{{ route('home') }}" class="nav-link {{ (request()->is('home')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-archway"></i>
                <p>
                  Home
                </p>
              </a>
            </li>
            @if(Auth::user()->role->id == 1)
            <li class="nav-item">
              <a href="{{ route('pengumuman.index') }}" class="nav-link {{ (request()->is('pengumuman*')) ? 'active' : '' }}">
                <i class="nav-icon fa fa-briefcase"></i>
                <p>
                  Pengumuman
                </p>
              </a>
            </li>
            @endif

              @if (Auth::user()->role->id == 1 || Auth::user()->role->id == 2 || Auth::user()->role->id == 3 || Auth::user()->role->id == 4)
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Master
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  @if (Auth::user()->role->id == 1)
                  <li class="nav-item">
                    <a href="{{ route('siswa.index') }}" class="nav-link {{ (request()->is('siswa*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Siswa
                      </p>
                    </a>
                  </li>
                  @endif
                  @if (Auth::user()->role->id == 1)
                  <li class="nav-item">
                    <a href="{{ route('guru.index') }}" class="nav-link {{ (request()->is('guru*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Guru
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('wali-kelas.index') }}" class="nav-link {{ (request()->is('wali-kelas*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Wali Kelas
                      </p>
                    </a>
                  </li>
                  @endif
                  @if (Auth::user()->role->id == 1)
                  <li class="nav-item">
                    <a href="{{ route('kelas.index') }}" class="nav-link {{ (request()->is('kelas*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Kelas
                      </p>
                    </a>
                  </li>
                  @endif
                  <li class="nav-item">
                    <a href="{{ route('jadwal.index') }}" class="nav-link {{ (request()->is('jadwal*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Jadwal
                      </p>
                    </a>
                  </li>
                  @if (Auth::user()->role->id == 1)
                  <li class="nav-item">
                    <a href="{{ route('mapel.index') }}" class="nav-link {{ (request()->is('mapel*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Mapel
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('semester.index') }}" class="nav-link {{ (request()->is('semester*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Semester
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('ekskul.index') }}" class="nav-link {{ (request()->is('ekskul*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Ekstrakurikuler
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('user*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        User
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('role.index') }}" class="nav-link {{ (request()->is('role*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Role</p>
                    </a>
                  </li>
                  @endif
                </ul>
              </li>
              @endif 
              @if (Auth::user()->role->id == 1 || Auth::user()->role->id == 2 || Auth::user()->role->id == 3 || Auth::user()->role->id == 4)
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-star"></i>
                  <p>
                    Data Nilai
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="{{ route('nilai.index') }}" class="nav-link {{ (request()->is('nilai/*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Tugas
                      </p>
                    </a>
                  </li>
                  @if(Auth::user()->role->id == 1 || Auth::user()->role->id == 4)
                  <li class="nav-item">
                    <a href="{{ route('nilai-ekskul.index') }}" class="nav-link {{ (request()->is('nilai-ekskul*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Ekskul
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('nilai-sikap.index') }}" class="nav-link {{ (request()->is('nilai-sikap*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Sikap
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('kehadiran.index') }}" class="nav-link {{ (request()->is('kehadiran*')) ? 'active' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Kehadiran
                      </p>
                    </a>
                  </li>
                  @endif
                </ul>
              </li>
              @endif
              @if (Auth::user()->role->id == 1 || Auth::user()->role->id == 2 || Auth::user()->role->id == 4) 
              <li class="nav-item">
                <a href="{{ route('raport.index') }}" class="nav-link {{ (request()->is('raport*')) ? 'active' : '' }}">
                  <i class="far fa-file nav-icon"></i>
                  <p>
                   Raport
                  </p>
                </a>
              </li>
              @endif
          @endguest
        </ul>
        @auth
        <ul class="profile-panel nav nav-pills nav-sidebar flex-column  mt-3 pb-3 pt-3 mb-3" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('profile.index') }}" class="nav-link {{ (request()->is('profile*')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
        </ul>    
        @endauth
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
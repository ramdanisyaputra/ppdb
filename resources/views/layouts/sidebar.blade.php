<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true" class="ml-4">
                        <span>
                            {{ Auth::guard(session()->get('role'))->user()->nama }}
                            <span class="user-level">{{session()->get('role') == 'peserta' ? 'Peserta' : (session()->get('role') == 'admin' ? 'Administrator' : 'Panitia')}}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{route('change_password.index')}}">
                                    <span class="link-collapse">Change Password</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="link-collapse">Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ request()->is('home*') ? 'active' : '' }}">
                    <a href="{{route('home')}}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p> 
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Pengaturan</h4>
                </li>
                @if(session()->get('role') == 'admin')
                <li class="nav-item {{ request()->is('sekolah*') ? 'active' : '' }}">
                    <a href="{{route('sekolah.index')}}">
                        <i class="fas fa-school"></i>
                        <p>Sekolah</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('panitia*') ? 'active submenu' : '' }}  {{ request()->is('admin*') ? 'active submenu' : '' }}">
                    <a data-toggle="collapse" href="#base">
                        <i class="fas fa-users"></i>
                        <p>Akun</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('panitia*') ? 'show' : '' }}  {{ request()->is('admin*') ? 'show' : '' }}" id="base">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('admin*') ? 'active' : '' }}">
                                <a href="{{route('admin.index')}}">
                                    <span class="sub-item">Admin</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('panitia*') ? 'active' : '' }}">
                                <a href="{{route('panitia.index')}}">
                                    <span class="sub-item">Panitia</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{ request()->is('tes*') ? 'active' : '' }}">
                    <a href="{{route('tes.index')}}">
                        <i class="fas fa-book"></i>
                        <p>Tes</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('nilai-tes*') ? 'active' : '' }}">
                    <a href="{{route('nilai_tes.index')}}">
                        <i class="fas fa-graduation-cap"></i>
                        <p>Nilai Tes</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('pendaftar*') ? 'active' : '' }}">
                    <a href="{{route('pendaftar.index')}}">
                        <i class="fas fa-list"></i>
                        <p>Data Pendaftar</p>
                    </a>
                </li>
                @elseif(session()->get('role') == 'panitia')
                <li class="nav-item {{ request()->is('tes*') ? 'active' : '' }}">
                    <a href="{{route('tes.index')}}">
                        <i class="fas fa-book"></i>
                        <p>Tes</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('nilai-tes*') ? 'active' : '' }}">
                    <a href="{{route('nilai_tes.index')}}">
                        <i class="fas fa-graduation-cap"></i>
                        <p>Nilai Tes</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('pendaftar*') ? 'active' : '' }}">
                    <a href="{{route('pendaftar.index')}}">
                        <i class="fas fa-list"></i>
                        <p>Data Pendaftar</p>
                    </a>
                </li>
                @else
                <li class="nav-item {{ request()->is('profil*') ? 'active' : '' }}">
                    <a href="{{route('profil.index')}}">
                        <i class="fas fa-address-card"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('peserta-tes*') ? 'active' : '' }}">
                    <a href="{{route('peserta_tes.index')}}">
                        <i class="fas fa-list"></i>
                        <p>Tes</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('pernyataan*') ? 'active' : '' }}">
                    <a href="{{route('pernyataan.index')}}">
                        <i class="fas fa-file-contract"></i>
                        <p>Surat Pernyataan</p>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
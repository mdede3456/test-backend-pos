<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        <img src="{{asset(Auth()->user()->photo)}}" class="avatar-sm rounded-circle mr-2" alt="TEST" />
        <img src="{{asset(Auth()->user()->photo)}}" class="avatar-xs rounded-circle mr-2" alt="TEST" />

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">{{Auth()->user()->name}}</h6>
            <span class="pro-user-desc">Admin</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                <a href="{{route('admin.profile')}}" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>Edit Profile</span>
                </a>

             
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <!--- Sidemenu -->
        <div id="sidebar-menu" class="slimscroll-menu">
            <ul class="metismenu" id="menu-bar">
                <li class="menu-title">Menu Utama</li>

                <li {{ request()->is('admin-mdh/dashboard') ? 'class=mm-active' : '' }} >
                    <a href="{{route('admin.dashboard')}}">
                        <i data-feather="home"></i> 
                        <span> Dashboard </span>
                    </a>
                </li>
                <li {{ request()->is('admin-mdh/pengaturan*') ? 'class=mm-active' : '' }}>
                    <a href="{{route('settings')}}">
                        <i data-feather="settings"></i>
                        <span> Pengaturan </span>
                    </a>
                </li>
                <li {{ request()->is('admin-mdh/pemberitahuan*') ? 'class=mm-active' : '' }}>
                    <a href="{{route('admin.notif')}}">
                        <i data-feather="bell"></i>
                        <span> Pemberitahuan </span>
                    </a>
                </li>
                <li class="menu-title">Toko</li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="user"></i>
                        <span> Data Admin </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.admin')}}">Daftar Admin</a>
                        </li>
                        <li>
                            <a href="{{route('admin.create')}}">Tambah Admin</a>
                        </li> 
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="users"></i>
                        <span> Data Pengguna </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.owner')}}">Daftar Owner</a>
                        </li>
                        <li>
                            <a href="{{route('admin.kasir')}}">Daftar Kasir</a>
                        </li> 
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i data-feather="award"></i>
                        <span> Data Toko </span>
                        <span class="menu-arrow"></span>
                    </a>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li>
                            <a href="{{route('admin.store_pending')}}">Perlu Ditinjau</a>
                        </li>
                        <li>
                            <a href="{{route('admin.store_active')}}">Toko Aktif</a>
                        </li> 
                        <li>
                            <a href="{{route('admin.cabang')}}">Data Cabang</a>
                        </li> 
                        <li>
                            <a href="{{route('admin.create_store')}}">Tambah Toko</a>
                        </li> 
                    </ul>
                </li>

                 
 
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
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
                <a href="{{route('kasir.profile')}}" class="dropdown-item notify-item">
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

                <li {{ request()->is('kasir-app/dashboard') ? 'class=mm-active' : '' }} >
                    <a href="{{route('kasir.dashboard')}}">
                        <i data-feather="home"></i> 
                        <span> Dashboard </span>
                    </a>
                </li>
              
                <li {{ request()->is('kasir-app/pemberitahuan*') ? 'class=mm-active' : '' }}>
                    <a href="{{route('kasir.notif')}}">
                        <i data-feather="bell"></i>
                        <span> Pemberitahuan </span>
                    </a>
                </li> 
 
            </ul>
        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->

</div>
 <!-- Topbar Start -->
 <div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
     <div class="container-fluid">
         <!-- LOGO -->
         <a href="index.html" class="navbar-brand mr-0 mr-md-2 logo">
             <span class="logo-lg">
                 <img src="{{asset('assets/images/logo.png')}}" alt="" height="24" />
                 <span class="d-inline h5 ml-1 text-logo">TEST POS</span>
             </span>
             <span class="logo-sm">
                 <img src="{{asset('assets/images/logo.png')}}" alt="" height="24">
             </span>
         </a>

         <ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
             <li class="">
                 <button class="button-menu-mobile open-left disable-btn">
                     <i data-feather="menu" class="menu-icon"></i>
                     <i data-feather="x" class="close-icon"></i>
                 </button>
             </li>
         </ul>

         <ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
             <li class="d-none d-sm-block">
                 <div class="app-search">
                     <form>
                         <div class="input-group">
                             <input type="text" class="form-control" placeholder="Cari Sesuatu Disini...">
                             <span data-feather="search"></span>
                         </div>
                     </form>
                 </div>
             </li>

           
             <li class="dropdown notification-list" data-toggle="tooltip" data-placement="left" title="{{count($notif)}} notifikasi baru">
                 <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                     <i data-feather="bell"></i>
                     <span class="noti-icon-badge"></span>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                     <!-- item-->
                     <div class="dropdown-item noti-title border-bottom">
                         <h5 class="m-0 font-size-16">
                             <span class="float-right">
                                 <a href="" class="text-dark">
                                     <small>Tandai telah dibaca semua</small>
                                 </a>
                             </span>Pemberitahuan
                         </h5>
                     </div>

                     <div class="slimscroll noti-scroll">

                         <!-- item-->
                         @foreach ($notif as $n)
                         <a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
                             <div class="notify-icon bg-primary"><i data-feather="bell"></i></div>
                             <p class="notify-details">{{$n->name}}.
                                 <small class="text-muted">{{$n->description}}</small>
                                 <small class="text-muted">{{$n->created_at}}</small>
                             </p>
                         </a>
                         @endforeach


                     </div>

                     <!-- All-->
                     <a href="{{route('owner.notif')}}" class="dropdown-item text-center text-primary notify-item notify-all border-top"> Lihat Semua
                         <i class="fi-arrow-right"></i>
                     </a>

                 </div>
             </li>

             <li class="dropdown notification-list" data-toggle="tooltip" data-placement="left" title="Keluar Dari Aplikasi">
                 <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link right-bar-toggle">
                     <i data-feather="log-out"></i>
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                 </form>
             </li>

            
         </ul>
     </div>

 </div>
 <!-- end Topbar -->
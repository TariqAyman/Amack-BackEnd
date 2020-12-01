<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('lte/img/logo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Amack</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('lte/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link @if($current === 'dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview @if(in_array($current,['dive-entries','taxons', 'dive-activities','day-times','dive-sites','seasons', 'equipments'])) menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-swimmer"></i>
                        <p>
                            Diving Sites
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('dive-sites.index')}}"
                               class="nav-link @if($current === 'dive-sites') active @endif">
                                <i class="fas fa-location-arrow nav-icon"></i>
                                <p>Sites</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('taxons.index')}}"
                               class="nav-link @if($current === 'taxons') active @endif">
                                <i class="fas fa-code-branch nav-icon"></i>
                                <p>Taxons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dive-activities.index')}}"
                               class="nav-link @if($current === 'dive-activities') active @endif">
                                <i class="fas fa-snowboarding nav-icon"></i>
                                <p>Activities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('dive-entries.index')}}"
                               class="nav-link @if($current === 'dive-entries') active @endif">
                                <i class="fas fa-person-booth nav-icon"></i>
                                <p>Entries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('day-times.index')}}"
                               class="nav-link @if($current === 'day-times') active @endif">
                                <i class="far fa-clock nav-icon"></i>
                                <p>Day Times</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('seasons.index')}}"
                               class="nav-link @if($current === 'seasons') active @endif">
                                <i class="fas fa-umbrella nav-icon"></i>
                                <p>Seasons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('equipments.index')}}"
                               class="nav-link @if($current === 'equipments') active @endif">
                                <i class="fas fa-toolbox nav-icon"></i>
                                <p>Equipments</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview  @if($current === 'schools' || $current === 'courses') menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Schools & Courses
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('schools.index')}}"
                               class="nav-link @if($current === 'schools') active @endif">
                                <i class="fas fa-school nav-icon"></i>
                                <p>Schools</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('courses.index')}}"
                               class="nav-link @if($current === 'courses') active @endif">
                                <i class="fas fa-graduation-cap nav-icon"></i>
                                <p>Courses</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview @if($current === 'cities' || $current === 'countries') menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Geo
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('countries.index')}}"
                               class="nav-link @if($current === 'countries') active @endif">
                                <i class="fas fa-flag nav-icon"></i>
                                <p>Countries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('cities.index')}}"
                               class="nav-link @if($current === 'cities') active @endif">
                                <i class="fas fa-city nav-icon"></i>
                                <p>Cities</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview @if($current === 'centers' || $current === 'staff') menu-open @endif">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Centers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('centers.index')}}"
                               class="nav-link @if($current === 'centers') active @endif">
                                <i class="fas fa-place-of-worship nav-icon"></i>
                                <p>Centers</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('centers.index')}}"
                               class="nav-link @if($current === 'staff') active @endif">
                                <i class="fas fa-city nav-icon"></i>
                                <p>Staff</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('admins.index')}}" class="nav-link @if($current === 'admins') active @endif">
                        <i class="nav-icon fas  fa-user-shield"></i>
                        <p>
                            Admins
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link  @if($current === 'users') active @endif">
                        <i class="nav-icon fas  fa-user"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

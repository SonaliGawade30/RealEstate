<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo-dark.png') }}" alt="" height="17" />
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admin/images/logo-sm.png') }}" alt="" height="22" />
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admin/images/logo-light.png') }}" alt="" height="17" />
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title">
                    <span data-key="t-menu">Menu</span>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('dashboard') }}" >
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Dashboard</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Masters</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                       {{-- <li class="nav-item">
                                <a href="{{ route('wards.index') }}" class="nav-link" data-key="t-horizontal">Wards</a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('zones.index') }}" class="nav-link" data-key="t-horizontal">Zones</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('property-type.index') }}" class="nav-link" data-key="t-horizontal">Property Type</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('type-of-use.index') }}" class="nav-link" data-key="t-horizontal">Type Of Use</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sources.index') }}" class="nav-link" data-key="t-horizontal">Sources</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('religions.index') }}" class="nav-link" data-key="t-horizontal">Religions</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('rules.index') }}" class="nav-link" data-key="t-horizontal">Rules</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('biling-types.index') }}" class="nav-link" data-key="t-horizontal">Biling Types</a>
                            </li>
                        </ul>
                    </div>
                </li>

               <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Party</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('party-registration.index') }}" class="nav-link" data-key="t-horizontal">Party Registration</a>
                            </li>
                        </ul>
                    </div>
                </li> 

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Property</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('property-registration.create') }}" class="nav-link" data-key="t-horizontal">Add Property Registration</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('property-registration.index') }}" class="nav-link" data-key="t-horizontal">Property Registration List</a>
                            </li>
                        </ul>
                    </div>
                </li> 

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Application For Rent</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('application-for-rents.index') }}" class="nav-link" data-key="t-horizontal">Application Rent List </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('application-for-rental-properties.index') }}" class="nav-link" data-key="t-horizontal"> Rental Properties List </a>
                            </li>
                        </ul>
                    </div>
                </li> 

                @canany(['users.view', 'roles.view'])
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">User Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarLayouts">
                        <ul class="nav nav-sm flex-column">
                            @can('users.view')
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link" data-key="t-horizontal">Users</a>
                                </li>
                            @endcan
                            @can('roles.view')
                                <li class="nav-item">
                                    <a href="{{ route('roles.index') }}" class="nav-link" data-key="t-horizontal">Roles</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>
                @endcan

            </ul>
        </div>
    </div>

    <div class="sidebar-background"></div>
</div>


<div class="vertical-overlay"></div>

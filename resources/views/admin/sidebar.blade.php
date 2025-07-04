<div id="sidebar_color" class="">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-store"></i>
            </div>
            <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Dashboard -->
        <li class="nav-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="fas fa-home"></i>
                <span>{{ __('admin.dash') }}</span>
            </a>
        </li>

        <hr class="sidebar-divider my-0">

        <!-- Orders -->
        <li class="nav-item {{ request()->routeIs('admin.all_orders') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.all_orders') }}">
                <i class="fas fa-receipt"></i>
                <span>{{ __('admin.orders') }}</span>
            </a>
        </li>

        <hr class="sidebar-divider my-0">

        <!-- Contact Us -->
        <li class="nav-item {{ request()->routeIs('admin.all_contacts') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.all_contacts') }}">
                <i class="fas fa-envelope-open-text"></i>
                <span>{{ __('front.conactUs') }}</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Categories -->
        <li class="nav-item {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
                aria-expanded="{{ request()->routeIs('admin.category.*') ? 'true' : 'false' }}" aria-controls="collapseCategory">
                <i class="fas fa-folder-open"></i>
                <span>{{ __('admin.cat') }}</span>
            </a>
            <div id="collapseCategory" class="collapse {{ request()->routeIs('admin.category.*') ? 'show' : '' }}"
                aria-labelledby="headingCategory" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.category.index') ? 'active' : '' }}" href="{{ route('admin.category.index') }}">{{ __('admin.all') }}</a>
                    <a class="collapse-item {{ request()->routeIs('admin.category.create') ? 'active' : '' }}" href="{{ route('admin.category.create') }}">{{ __('admin.add') }}</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Services -->
        <li class="nav-item {{ request()->routeIs('admin.service.*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseService"
                aria-expanded="{{ request()->routeIs('admin.service.*') ? 'true' : 'false' }}" aria-controls="collapseService">
                <i class="fas fa-tools"></i>
                <span>{{ __('admin.service') }}</span>
            </a>
            <div id="collapseService" class="collapse {{ request()->routeIs('admin.service.*') ? 'show' : '' }}"
                aria-labelledby="headingService" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.service.index') ? 'active' : '' }}" href="{{ route('admin.service.index') }}">{{ __('admin.all') }}</a>
                    <a class="collapse-item {{ request()->routeIs('admin.service.create') ? 'active' : '' }}" href="{{ route('admin.service.create') }}">{{ __('admin.add') }}</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Custom Fields -->
        <li class="nav-item {{ request()->routeIs('admin.custome_fields.*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFields"
                aria-expanded="{{ request()->routeIs('admin.custome_fields.*') ? 'true' : 'false' }}" aria-controls="collapseFields">
                <i class="fas fa-sliders-h"></i>
                <span>{{ __('admin.fields') }}</span>
            </a>
            <div id="collapseFields" class="collapse {{ request()->routeIs('admin.custome_fields.*') ? 'show' : '' }}"
                aria-labelledby="headingFields" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item {{ request()->routeIs('admin.custome_fields.index') ? 'active' : '' }}" href="{{ route('admin.custome_fields.index') }}">{{ __('admin.all') }}</a>
                    <a class="collapse-item {{ request()->routeIs('admin.custome_fields.create') ? 'active' : '' }}" href="{{ route('admin.custome_fields.create') }}">{{ __('admin.add') }}</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
</div>
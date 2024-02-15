<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}"> <img alt="image" src="/admin/assets/img/logo.png"
                    class="header-logo" /> <span class="logo-name">Otika</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown {{ request()->routeIs('admin.categories.index') ? 'active' : '' }}">
                <a href="{{ route('admin.categories.index') }}" class="nav-link"><i
                        data-feather="minus-square"></i><span>Categories</span></a>
            </li>
            <li class="dropdown {{ request()->routeIs('admin.posts.index') ? 'active' : '' }}">
                <a href="{{ route('admin.posts.index') }}" class="nav-link"><i
                        data-feather="book"></i><span>Posts</span></a>
            </li>
            <li class="dropdown {{ request()->routeIs('admin.tags.index') ? 'active' : '' }}">
                <a href="{{ route('admin.tags.index') }}" class="nav-link"><i
                        data-feather="tag"></i><span>Tags</span></a>
            </li>
        </ul>
    </aside>
</div>

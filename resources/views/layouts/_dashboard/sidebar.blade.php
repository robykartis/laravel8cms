<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link {{ set_active('dashboard.index') }}" href="{{ route('dashboard.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                {{ trans('dashboard.link.dashboard') }}
            </a>
            <div class="sb-sidenav-menu-heading">{{ trans('dashboard.menu.master') }}</div>
            {{-- Link Post --}}
            <a class="nav-link {{ set_active(['posts.index', 'posts.create', 'posts.show', 'posts.edit']) }}"
                href="{{ route('posts.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="far fa-newspaper"></i>
                </div>
                {{ trans('dashboard.menu.post') }}
            </a>
            {{-- Link Category --}}
            <a class="nav-link {{ set_active(['categories.index', 'categories.create', 'categories.edit', 'categories.show']) }}"
                href="{{ route('categories.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-bookmark"></i>
                </div>
                {{ trans('dashboard.menu.category') }}
            </a>

            <a class="nav-link {{ set_active(['tags.index', 'tags.create', 'tags.edit']) }}"
                href="{{ route('tags.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-tags"></i>
                </div>
                {{ trans('dashboard.menu.tags') }}
            </a>
            <div class="sb-sidenav-menu-heading"> {{ trans('dashboard.menu.user_permission') }}</div>
            <a class="nav-link" href="#">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-user"></i>
                </div>
                {{ trans('dashboard.menu.user') }}
            </a>
            {{-- Links:Roles --}}
            <a class="nav-link {{ set_active(['roles.index', 'roles.show']) }}" href="{{ route('roles.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                {{ trans('dashboard.menu.role') }}
            </a>
            <div class="sb-sidenav-menu-heading"> {{ trans('dashboard.menu.setting') }}</div>
            <a class="nav-link {{ set_active(['filemanager.index']) }}" href="{{ route('filemanager.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-photo-video"></i>
                </div>
                File manager
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small"> {{ trans('dashboard.label.logged_in_as') }}</div>
        <!-- show username -->
    </div>
</nav>

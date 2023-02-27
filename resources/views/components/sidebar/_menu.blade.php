<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
    <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5" data-kt-scroll-activate="true" data-kt-scroll-dependencies="#kt_app_sidebar_logo">
        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">
            <div class="menu-item">
                <a class="menu-link {{ Request::is('home') ? 'active' : '' }}" href="/home">
                    <span class="menu-icon">
                        <i class="bi bi-grid fs-3"></i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </div>
            <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Request::is('admin/user*','admin/role*','admin/permission*') ? 'here show' : '' }}">
                <span class="menu-link">
                    <span class="menu-icon">
                        <i class="bi bi-people fs-3"></i>
                    </span>
                    <span class="menu-title">Pengguna</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion">
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('admin/user*') ? 'active' : '' }}" href="/admin/user">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">User</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('admin/role*') ? 'active' : '' }}" href="/admin/role">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Role</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link {{ Request::is('admin/permission*') ? 'active' : '' }}" href="/admin/permission">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Permission</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ Request::is('admin/halte*') ? 'active' : '' }}" href="/admin/halte">
                    <span class="menu-icon">
                        <i class="bi bi-geo-alt fs-3"></i>
                    </span>
                    <span class="menu-title">Halte</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ Request::is('admin/armada*') ? 'active' : '' }}" href="/admin/armada">
                    <span class="menu-icon">
                        <i class="bi bi-bus-front fs-3"></i>
                    </span>
                    <span class="menu-title">Armada</span>
                </a>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ Request::is('admin/promo*') ? 'active' : '' }}" href="/admin/promo">
                    <span class="menu-icon">
                        <i class="bi bi-badge-ad fs-3"></i>
                    </span>
                    <span class="menu-title">Promo</span>
                </a>
            </div>
        </div>
    </div>
</div>

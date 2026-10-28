<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="admin-menu-label">Menu</li>
        <li class="nav-item {{ request()->is('admin', 'admin/') ? 'active' : '' }}">
            <a class="nav-link {{ request()->is('admin') || request()->is('admin/') ? 'active' : '' }}" href="{{ route('admin.index') }}">
                <span class="menu-title">Artikel</span>
                <i class="mdi mdi-file-document-outline menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ request()->is('admin/bph') ? 'active' : '' }}">
            <a class="nav-link {{ request()->is('admin/bph') ? 'active' : '' }}" href="/admin/bph">
                <span class="menu-title">BPH</span>
                <i class="mdi mdi-shield-outline menu-icon"></i>
            </a>
        </li>
        <li class="nav-item {{ request()->is('admin/kominfo', 'admin/syiar', 'admin/kemuslimahan', 'admin/psdm', 'admin/kwu', 'admin/minatbakat') ? 'active' : '' }}">
            <a class="nav-link {{ request()->is('admin/kominfo', 'admin/syiar', 'admin/kemuslimahan', 'admin/psdm', 'admin/kwu', 'admin/minatbakat') ? 'active' : '' }}"
                data-bs-toggle="collapse" href="#ui-basic"
                aria-expanded="{{ request()->is('admin/kominfo', 'admin/syiar', 'admin/kemuslimahan', 'admin/psdm', 'admin/kwu', 'admin/minatbakat') ? 'true' : 'false' }}"
                aria-controls="ui-basic">
                <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                <span class="menu-title">Departemen</span>
                <i class="mdi mdi-chevron-down department-chevron" aria-hidden="true"></i>

            </a>
            <div class="collapse {{ request()->is('admin/kominfo', 'admin/syiar', 'admin/kemuslimahan', 'admin/psdm', 'admin/kwu', 'admin/minatbakat') ? 'show' : '' }}" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{ request()->is('admin/kominfo') ? 'active' : '' }}" href="/admin/kominfo">Kominfo</a></li>
                    <li class="nav-item"> <a class="nav-link {{ request()->is('admin/syiar') ? 'active' : '' }}" href="/admin/syiar">Syiar</a></li>
                    <li class="nav-item"> <a class="nav-link {{ request()->is('admin/kemuslimahan') ? 'active' : '' }}" href="/admin/kemuslimahan">Kemuslimahan</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link {{ request()->is('admin/psdm') ? 'active' : '' }}" href="/admin/psdm">PSDM</a></li>
                    <li class="nav-item"> <a class="nav-link {{ request()->is('admin/kwu') ? 'active' : '' }}" href="/admin/kwu">KWU</a></li>
                    <li class="nav-item"> <a class="nav-link {{ request()->is('admin/minatbakat') ? 'active' : '' }}" href="/admin/minatbakat">Minat & Bakat</a></li>
                </ul>
            </div>
        </li>

    </ul>
</nav>

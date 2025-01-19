<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class='{{ Request::is('dashboard') ? 'active' : '' }}'>
                        <a class="nav-link"
                            href="{{ url('dashboard') }}">Dashboard</a>
                    </li>

                </ul>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ Request::is('jurusan') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('jurusan') }}"><i class="far fa-square"></i> <span>Jurusan</span></a>
            </li>
            <li class="{{ Request::is('student') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('student') }}"><i class="far fa-square"></i> <span>Pendaftaran</span></a>
            </li>
            <li class="{{ Request::is('user') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('user') }}"><i class="far fa-square"></i> <span>Pengguna</span></a>
            </li>

            <li class="nav-item dropdown {{ $type_menu === 'report' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Laporan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('report_student') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('report_student') }}">Laporan Pendaftaran Siswa</a>
                    </li>
                   
                </ul>
            </li>

            <li class="nav-item dropdown {{ $type_menu === 'settings' ? 'active' : '' }}">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('blog') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('blog') }}">Blog</a>
                    </li>
                    <li class="{{ Request::is('info') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('info') }}">Info</a>
                    </li>
                    <li class="{{ Request::is('slider') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('slider') }}">Slider</a>
                    </li>
                    <li class="{{ Request::is('tentang') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('tentang') }}">Tentang</a>
                    </li>
                    <li class="{{ Request::is('params') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('params') }}">Params</a>
                    </li>
                </ul>
            </li>

        </ul>


    </aside>
</div>

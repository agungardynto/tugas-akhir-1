        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/avatar.png') }}" alt="User Image" style="width: 40px; height: 40px; border-radius: 100%">
                    </div>
                    <div class="info d-flex align-items-end">
                        <a href="/admin" class="d-block">Alexanderianto</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                        @foreach ($menus as $menu)
                        <li class="nav-item">
                            <a href="{{ route($menu['route']) }}" class="nav-link @yield($menu['is_active'])">
                                <i class="nav-icon {{ $menu['icon'] }}"></i>
                                <p>{{ $menu['name'] }}</p>
                            </a>
                        </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Keluar</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

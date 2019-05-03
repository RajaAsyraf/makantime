<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::route()->getName() == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Orang Ajak</span></a>
            </li>
            @auth
            <li class="nav-item {{ Request::route()->getName() == 'invitation.create' ? 'active' : '' }}">
                <a href="{{ route('invitation.create') }}" class="nav-link"><i class="fas fa-fire"></i><span>Ajak Orang</span></a>
            </li>
            <li class="nav-item {{ Request::route()->getName() == 'group.index' ? 'active' : '' }}">
                <a href="{{ route('group.index') }}" class="nav-link"><i class="fas fa-fire"></i><span>Geng Makan</span></a>
            </li>
            @endauth
        </ul>
    </div>
</nav>
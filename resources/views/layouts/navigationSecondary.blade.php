<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item {{ request()->is('invitation*') ? 'active' : '' }} dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-ticket-alt"></i><span>Invitation</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item {{ request()->is('invitation') ? 'active' : '' }}"><a href="{{ route('invitation.index') }}" class="nav-link">All</a></li>
                    <li class="nav-item {{ request()->is('invitation/create') ? 'active' : '' }}"><a href="{{ route('invitation.create') }}" class="nav-link">Create</a></li>
                    <li class="nav-item {{ request()->is('invitation/archived') ? 'active' : '' }}"><a href="{{ route('invitation.create') }}" class="nav-link">Archived</a></li>
                </ul>
            </li>
            @auth
            <li class="nav-item {{ request()->is('group*') ? 'active' : '' }} dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-users"></i><span>Group</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item {{ request()->is('group') ? 'active' : '' }}"><a href="{{ route('group.index') }}" class="nav-link">All</a></li>
                    <li class="nav-item {{ request()->is('group/create') ? 'active' : '' }}"><a href="{{ route('group.create') }}" class="nav-link">Create</a></li>
                </ul>
            </li>
            @endauth
        </ul>
    </div>
</nav>
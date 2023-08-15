<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @if (Auth::user()->role == 'SuperAdmin')
            <li class="nav-item nav-category">Admins</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users') }}">
                    <i class="menu-icon  mdi mdi-account-circle-outline"></i>
                    <span class="menu-title"> Admins </span>
                </a>
            </li>
            <li class="nav-item nav-category">Plants</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('plant') }}">
                    <i class="menu-icon mdi mdi-chart-pie"></i>
                    <span class="menu-title"> Plants </span>
                </a>
            </li>
            <li class="nav-item nav-category">Trainers</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('trainer.index') }}">
                    <i class="menu-icon mdi mdi-account-multiple-plus"></i>
                    <span class="menu-title">Trainer</span>
                </a>
            </li>
        @else
            <li class="nav-item nav-category">Gate</li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('attendance.signIn') }}">
                    <i class="menu-icon mdi mdi-login"></i>
                    <span class="menu-title">Entry Gate </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('attendance.signOut') }}">
                    <i class="menu-icon mdi mdi-logout"></i>
                    <span class="menu-title">Exit Gate</span>
                </a>
            </li>
        @endif

    </ul>
</nav>

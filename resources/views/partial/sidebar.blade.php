<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    {{-- <div class="user-info">
        <div class="image">
            <img src="{{ asset('assets/backend/images/user.png') }}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="{{ Request::is('/') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="">
                <a href="">
                    <i class="material-icons">label</i>
                    <span>Register</span>
                </a>
            </li>
            <li class="">
                <a href="">
                    <i class="material-icons">label</i>
                    <span>Login</span>
                </a>
            </li>
            
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; {{ date('Y') }} <a href="javascript:void(0);">Grocery Shop</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
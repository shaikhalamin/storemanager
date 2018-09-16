<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
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
    </div>

    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>

            @if(Request::is('admin*'))
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>DASHBOARD</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">trending_up</i>
                        <span>SALES</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);">
                                <span>New Invoice</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span>Invoice List</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span>Daily Sales</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="javascript:void(0);">
                                <span>Monthly Sales</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::is('admin/category/*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">storage</i>
                        <span>PRODUCT CATEGORY</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('admin.createcategory') }}">
                                <span>New Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categorylist') }}">
                                <span>Category List</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{ Request::is('admin/product/*') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">storage</i>
                        <span>PRODUCTS</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ route('admin.createproduct') }}">
                                <span>New Product</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span>Products List</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">widgets</i>
                        <span>CRM</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);">
                                <span>Add Client</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span>Client List</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span>Add Supplier</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span>Supplier List</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">person</i>
                        <span>USER MANAGEMENT</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);">
                                <span>Add new user</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span>User List</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span>Manage Permission</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">attach_money</i>
                        <span>CASH MANAGEMENT</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);">
                                <span>Expense</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span>Income</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <span>Due</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">home</i>
                        <span>COMPANY INFORMATION</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);">
                                <span>Mange Comanpy</span>
                            </a>
                        </li>
                    </ul>
                </li>
                
                <li class="header">SYSTEM</li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons">input</i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endif

            @if(Request::is('client*'))
                <li class="{{ Request::is('client/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('client.dashboard') }}">
                        <i class="material-icons">dashboard</i>
                        <span>Dashboard</span>
                    </a>
                </li>
            @endif
            

        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; {{ date('Y') }} <a href="javascript:void(0);">{{ config('app.name') }}</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>


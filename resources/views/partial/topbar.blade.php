<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand active" href="{{ url('/') }}">{{ config('app.name') }}
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- Call Search -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">settings</i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Login</a></li>
                        <li><a href="javascript:void(0);"><i class="material-icons">person</i>Register</a></li>
                    </ul>
                </li>
                <!-- #END# Call Search -->
            </ul>
        </div>
    </div>
</nav>
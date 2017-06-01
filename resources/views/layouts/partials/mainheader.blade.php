<!-- Main Header -->
<header class="main-header">

    <!-- Header Navbar -->
    <nav class="navbar banner-api navbar-static-top" role="navigation">
        <div class="navbar-inner">
            <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo@1x.png') }}" alt="GRC">
                </a>
            </div>

            <div class="navbar-collapse collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav navbar-left">

                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle drop-admin-actions font-bold" data-toggle="dropdown" role="button" aria-expanded="false">
                            Actions <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/') }}">Index</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ url('/getCombined') }}">Load Users+Tasks</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ url('/getUsersData') }}">Load Users</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ url('/getTodosData') }}">Load Tasks</a>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li>
                                <a href="{{ url('/user-history') }}">History</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </nav>

</header>
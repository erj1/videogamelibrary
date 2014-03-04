<nav class="navbar navbar-inverse" role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navigation</span>
            </button>
        </div>
        
        <div class="collapse navbar-collapse" id="navbar-collapse-01">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="/">Home</a></li>
                
                <li class="dropdown">
                    <a href="{{ url('platform') }}" class="dropdown-toggle" data-toggle="dropdown">
                        Platforms <b class="caret"></b>
                    </a>
                    <span class="dropdown-arrow"></span>
                    <ul class="dropdown-menu">
                        <li>{{ HTML::linkAction('PlatformController@index', 'All Platforms') }}</li>
                        @foreach($navPlatforms as $platformId => $platformName)
                            <li>{{ HTML::linkAction(
                                'PlatformController@show',
                                $platformName,
                                ['platformId' => $platformId]
                            ) }}</li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="/about-us">About Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Manage <b class="caret"></b>
                        </a>
                        <span class="dropdown-arrow"></span>
                        <ul class="dropdown-menu">
                            <li><a href="{{ url('admin/platform') }}">Platforms</a></li>
                            <li>{{ HTML::linkAction('AdminGameController@index', 'Games') }}</li>
                        </ul>
                    </li>
                    
                    <li><a href="{{ url('account') }}">Account</a></li>
                    <li><a href="{{ url('logout') }}">LogOut</a></li>
                @else
                    <li><a href="/login">Login</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->

</nav><!-- /navbar -->
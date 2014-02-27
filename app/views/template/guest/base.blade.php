<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Video Game Library</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Loading Bootstrap -->
        <link href="/css/bootstrap.css" rel="stylesheet">

        <!-- Loading Flat UI -->
        <link href="/css/flat-ui.css" rel="stylesheet">
        <link href="/css/application.css" rel="stylesheet">

        <link rel="shortcut icon" href="/images/favicon.ico">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
        <!--[if lt IE 9]>
          <script src="/js/html5shiv.js"></script>
          <script src="/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">

            <div class="container-fluid">
                
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
                            <li><a href="{{ url('account') }}">Account</a></li>
                            <li><a href="{{ url('logout') }}">LogOut</a></li>
                        @else
                            <li><a href="/login">Login</a></li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav><!-- /navbar -->

        <div class="container-fluid">
            
            <div class="row">
                
                {{-- Sidebar --}}
                <div id="sidebar" class="col-sm-3 col-md-2">
                    <a href="https://twitter.com/ericrjones1">
                        <img src="/images/presenters/eric.jpeg" class="img-circle">
                    </a>
                </div>

                {{-- Content --}}
                <div id="content" class="col-sm-9 col-md-10">
                    @yield('content')
                </div>

            </div>
        </div>
    
        {{-- Load JS --}}
        <script src="/js/jquery-1.8.3.min.js"></script>
        <script src="/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/js/jquery.ui.touch-punch.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/bootstrap-select.js"></script>
        <script src="/js/bootstrap-switch.js"></script>
        <script src="/js/flatui-checkbox.js"></script>
        <script src="/js/flatui-radio.js"></script>
        <script src="/js/jquery.tagsinput.js"></script>
        <script src="/js/jquery.placeholder.js"></script>
    </body>
</html>
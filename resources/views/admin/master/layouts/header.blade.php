<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><span>{{ __('Store Management') }}</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                    <a href="{!! route('language', ['en']) !!}"> {{__('English')}}</a>
                    <a href="{!! route('language', ['vi']) !!}"> {{__('Vietnamese')}}</a>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
                            <use xlink:href="#stroked-male-user"></use>
                        </svg> {{ __('Admin') }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><svg class="glyph stroked male-user">
                                    <use xlink:href="#stroked-male-user"></use>
                                </svg>{{ __('Information') }}</a></li>
                        <li><a href="#"><svg class="glyph stroked cancel">
                                    <use xlink:href="#stroked-cancel"></use>
                                </svg> {{ __('Logout') }}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><span>{{ __('Store Management') }}</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="{!! route('language', ['en']) !!}"> {{__('English')}}</a>
                    <a href="{!! route('language', ['vi']) !!}"> {{__('Vietnamese')}}</a>
                    <a href="#">
                        {{ Auth::user()->fullname }}
                    </a>
                    <div class="logout">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            <button href="#">
                                {{ __('Logout') }}
                            </button>
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<nav class="p-6 bg-white flex justify-between">
    <ul class="flex items-center">
        <li>
            <a href="/" class="p-3">Home</a>
        </li> 
        <li>
            <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
        </li>
        <li>
            <a href="{{ route('posts') }}" class="p-3">Post</a>
        </li>
        <li>
            <a href="/about" class="p-3">@lang('nav.About')</a>
        </li>    
        <li class="dropdown pl-3">
            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown">
                {{ __('Language') }}
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a href="/lang/my" class="p-3 dropdown-item">{{ Lang::get('Myanmar') }}</a>
                </li>
                <li>
                    <a href="/lang/en" class="p-3 dropdown-item">@lang('English')</a>
                </li>
            </ul>
        </li>
    </ul>
    <ul class="flex items-center">
        @auth
            <li>
                <a href="" class="p-3">{{ auth()->user()->name }}</a>
            </li> 
            <li>
                <form action="{{ route('logout') }}" method="POST" class="p-3 inline">
                    @csrf
                    <button type="submit">
                        Logout
                    </button>
                </form>
            </li>
        @endauth
        @guest
            <li>
                <a href="{{ route('login') }}" class="p-3">Login</a>
            </li>
            <li>
                <a href="{{ route('register') }}" class="p-3">Register</a>
            </li>
        @endguest
    </ul>
</nav>
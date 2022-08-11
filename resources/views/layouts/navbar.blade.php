<nav class="p-6 bg-white flex justify-between">
    <ul class="flex items-center">
        <li>
            <a href="" class="p-3">Home</a>
        </li> 
        <li>
            <a href="" class="p-3">Dashboard</a>
        </li>
        <li>
            <a href="" class="p-3">Post</a>
        </li>
    </ul>
    <ul class="flex items-center">
        @auth
            <li>
                <a href="" class="p-3">{{ auth()->user()->name }}</a>
            </li> 
            <li>
                <a href="" class="p-3">Logout</a>
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
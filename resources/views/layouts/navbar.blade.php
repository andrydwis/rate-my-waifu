<nav class="navbar  navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('root.index')}}">RMW</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('root.index')}}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('my-waifu.index')}}">My Waifu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('waifu.index')}}">Waifu List</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        Waifu Rank
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('waifu.top-love')}}">Top Love Waifu</a></li>
                        <li><a class="dropdown-item" href="{{route('waifu.top-meh')}}">Top Meh Waifu</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{route('waifu.random')}}">Random Waifu</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('root.news')}}">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('root.about')}}">About</a>
                </li>
            </ul>
            @guest
            <a href="{{route('login')}}" class="btn btn-outline-light">Login</a>
            @else
            <form class="d-flex" action="{{route('logout')}}" method="post">
                @csrf
                <button class="btn btn-outline-light" type="submit">Logout</button>
            </form>
            @endguest
        </div>
    </div>
</nav>
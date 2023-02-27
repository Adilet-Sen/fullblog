<nav class="navbar navbar-expand-md  navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/category/it">It</a>
                </li>
                @foreach($menus->toTree() as $menu)
                    @if(!$menu->children)
                    <li class="nav-item">
                        <a class="nav-link" href="/category/{{$menu->slug}}">{{$menu->name}}</a>
                    </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="/category" id="dropdown04" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">{{$menu->name}}</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                        @foreach ($menu->children as $item)
                                <a class="dropdown-item" href="/category/{{$item->slug}}">{{ $item->name }}</a>
                        @endforeach
                            </div>
                        </li>
                    @endif

                @endforeach
                <li class="nav-item">
                    <a class="nav-link active" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

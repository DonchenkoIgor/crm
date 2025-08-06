@auth()
    <header class="header">
        <header class="topbar">
            <div class="left">
                <button id="burgerBtn" class="burger-btn">
                    <span id="burgerIcon">&#9776;</span>
                </button>
            </div>

            <div class="right">
                <span class="user-name">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                <form action="{{route('logout')}}" method="post" style="display:inline">
                    @csrf
                    <button class="logout-btn" title="Exit">X</button>
                </form>
            </div>
        </header>

        <nav id="navPanel" class="nav-panel">
            <a href="/dashboard">Main</a>
            <a href="#">Tasks</a>
            <a href="#">In progress</a>
            <a href="#">Completed</a>
            @can('manage-managers')
                <a href="{{route('managers.index')}}">Managers</a>
            @endcanany
        </nav>
    </header>
@endauth

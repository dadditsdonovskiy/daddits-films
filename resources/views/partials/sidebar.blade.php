<div class="col-auto px-0">
    <div id="sidebar" class="collapse collapse-horizontal show border-end vh-100 shadow-sm">
        <div id="sidebar-nav" class="list-group border-0 rounded-0">
            <div class="p-2">
                <h4>Dashboard</h4>
            </div>
            <form class="d-flex p-2">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
            <ul class="list-group d-flex p-2">
                <li class="list-group-item"><a href="#" class="text-decoration-none text-black">
                        Dashboard</a></li>
                <li class="list-group-item {{ (request()->is('user')) ? 'active' : '' }}">
                    <a href="{{route('users.index')}}"
                                                class="text-decoration-none text-black">Users</a>
                </li>
                <li class="list-group-item {{ (request()->is('film')) ? 'active' : '' }}">
                    <a href="{{route('films.index')}}"
                                                class="text-decoration-none text-black">Films</a>
                </li>
                <li class="list-group-item {{ (request()->is('director')) ? 'active' : '' }}">
                    <a href="{{route('directors.index')}}"
                       class="text-decoration-none text-black">Directors</a>
                </li>
              </ul>
        </div>
    </div>
</div>

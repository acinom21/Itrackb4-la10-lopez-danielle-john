<nav class="navbar navbar-expand navbar-light bg-light rounded mb-3 px-3">
    <div class="container-fluid p-0">
        <span class="navbar-brand mb-0 h6 text-muted">Menu</span>

        <ul class="nav nav-pills">
            {{-- D1/D2: routeIs() checks the current route NAME.
                 D3: 'books.show' had to be added here — keeps this marked on
                     a detail page like /books/3.
                 D4: nothing else changed — routeIs('books.index') already
                     matches /books?genre=Classical&year=1954 the same as
                     /books, since a query string never affects which route
                     matched. --}}
            <li class="nav-item">
                <a href="{{ route('books.index') }}"
                   class="nav-link {{ (request()->routeIs('books.index') || request()->routeIs('books.show')) ? 'active' : '' }}">
                    All Books
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('books.feature') }}"
                   class="nav-link {{ request()->routeIs('books.feature') ? 'active' : '' }}">
                    Featured
                </a>
            </li>
        </ul>
    </div>
</nav>
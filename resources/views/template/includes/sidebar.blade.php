<nav class="sidebar sidebar-offcanvas border border-bottom border-black border-3 mt-0" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="profile" />
          <span class="login-status online"></span>
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="mb-2 fw-bold text-black">{{ Auth::user()->name }}</span>
          <span class="text-secondary text-small fw-semibold">{{ Auth::user()->role }}</span>
        </div>
        <i class="mdi mdi-bookmark-check nav-profile-badge"></i>
      </a>
    </li>

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('admin.dashboard')}}">
        <span class="menu-title fw-semibold">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>

    <!-- Category -->
    <li class="nav-item {{ request()->routeIs('category') || request()->routeIs('category.create') ? 'active' : '' }}">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title fw-semibold">Category</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link fw-medium" href="{{ route('category')}}">List Category</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Books -->
    <li class="nav-item {{ request()->routeIs('book') || request()->routeIs('book.create') ? 'active' : '' }}">
      <a class="nav-link" data-bs-toggle="collapse" href="#book" aria-expanded="false" aria-controls="book">
        <span class="menu-title fw-semibold">Books</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="book">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link fw-medium" href="{{ route('book')}}">Book List</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="{{ route('book.create')}}">Add Book</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Borrowing -->
    <li class="nav-item {{ request()->routeIs('borrowing.unreturned') || request()->routeIs('borrowing.returned') || request()->routeIs('borrowing.all') ? 'active' : '' }}">
      <a class="nav-link" data-bs-toggle="collapse" href="#borrowing" aria-expanded="false" aria-controls="borrowing">
        <span class="menu-title fw-semibold">Borrowing</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="borrowing">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link fw-medium" href="{{ route('borrowing.unreturned')}}">Active Borrower</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="{{ route('borrowing.returned')}}">Returned</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-medium" href="{{ route('borrowing.all')}}">All Borrowings</a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</nav>

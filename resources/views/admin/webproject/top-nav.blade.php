<nav class="navbar navbar-expand navbar-light bg-white border-bottom">
    <div class="collapse navbar-collapse">
      {{ ucwords(str_replace('-', ' ', $slug)) }}
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="{{ route('admin.webproject.index') }}" class="nav-link">
            <i class="fas fa-users"></i> Go back to All Courses
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('website.webproject.detail', ['slug' => $slug]) }}" target="_blank" class="nav-link">
            <i class="fas fa-user-plus"></i> Visit Course
          </a>
        </li>
      </ul>
    </div>
  </nav>
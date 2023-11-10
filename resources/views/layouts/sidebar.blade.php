  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #12212f !important">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="BharatQ" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light" style="text-decoration: none">LMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="text-decoration: none">Abbas Haider</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Students
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('students.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students List</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Catogories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('add.category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('add.book')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Books
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('books.view')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Books</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('add.book')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Books</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('checkout.bookForm')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Checkout
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('settings')}}" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
          <li class="nav-header">USER MANAGEMENT</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('list.user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                My Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-3">
                <h4>@yield('pageTitle')</h4>
            </div>
            <div class="row justify-content-between">
              @if (session()->has('success'))
              <span class="alert alert-success">{{ session('success') }}</span>
            @endif
            @if (session()->has('error'))
                <span class="alert alert-danger">{{ session('error') }}</span>
            @endif
            @if (Route::currentRouteName() !== 'home')
            <div class="col-md-6 d-flex">
                <a onclick="history.back()" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back
                </a>
            </div>
          @endif

                <div class="col-md-6 d-flex justify-content-end">
                  @yield('pageActionBtn')
                </div>
            </div>
        </div>
    </div>
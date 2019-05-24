<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{ route('admin.dashboard') }}">{{ env('APP_NAME') }}</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="index.html">St</a>
  </div>
  <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ Request::route()->getName() == 'admin.dashboard' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>
      <!-- @if(Auth::user()->can('manage-users'))
      <li class="menu-header">Users</li>
      <li class="{{ Request::route()->getName() == 'admin.users' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.users') }}"><i class="fa fa-users"></i> <span>Users</span></a></li>
     @endif -->
        <li class="nav-item dropdown {{ Request::route()->getName() == 'admin.packages' ? ' active' : '' }} {{ Request::route()->getName() == 'admin.add-package' ? ' active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-box-open"></i><span>Packages</span></a>
                <ul class="dropdown-menu">
                        <li class="{{ Request::route()->getName() == 'admin.add-package' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.add-package') }}">Add New</a></li>
                        <li class="{{ Request::route()->getName() == 'admin.packages' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.packages') }}">View All</a></li>
                </ul>
        </li>
        <li class="nav-item dropdown {{ Request::route()->getName() == 'admin.bookings' ? ' active' : '' }} {{ Request::route()->getName() == 'admin.add-booking' ? ' active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-calendar-check"></i><span>Bookings</span></a>
                <ul class="dropdown-menu">
                        <li class="{{ Request::route()->getName() == 'admin.add-booking' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.add-booking') }}">Add New</a></li>
                        <li class="{{ Request::route()->getName() == 'admin.bookings' ? ' active' : '' }}"><a class="nav-link" href="{{ route('admin.bookings') }}">View All</a></li>
                </ul>
        </li>

    </ul>
</aside>


  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{ (new \App\Helpers\GeneralFunction)->generalParameterValue('logo') }}" alt="{{ (new \App\Helpers\GeneralFunction)->generalParameterValue('website_name') }} Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ (new \App\Helpers\GeneralFunction)->generalParameterValue('website_name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard.index') }}" class="nav-link {{ ((new \App\Helpers\GeneralFunction)->slug('Dashboard') == (new \App\Helpers\GeneralFunction)->slug($title)) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          @foreach((new \App\Helpers\GeneralFunction)->sidebarMenu() as $menu)
            @if(count($menu->child) > 0)
              <li class="nav-item {{ ((new \App\Helpers\GeneralFunction)->slug($menu->name) == (new \App\Helpers\GeneralFunction)->slug($parent)) ? 'menu-open' : '' }}">
              <!-- <li class="nav-item"> -->
                <a href="#" class="nav-link {{ ((new \App\Helpers\GeneralFunction)->slug($menu->name) == (new \App\Helpers\GeneralFunction)->slug($parent)) ? 'active' : '' }}">
                {!! $menu->icon !!}
                  <p>
                    {{ $menu->name }}
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  @foreach($menu->child as $child)
                  <li class="nav-item">
                      <a class="nav-link {{ ((new \App\Helpers\GeneralFunction)->slug($child->name) == (new \App\Helpers\GeneralFunction)->slug($title)) ? 'active' : '' }}" href="{{ $child->link_url }}">
                          <i class="far fa-circle nav-icon"></i>
                          <p>{{ $child->name }}</p>
                      </a>
                  </li>
                  @endforeach
                </ul>
              </li>
            @else
              <li class="nav-item">
                <a href="{{ $menu->link_url }}" class="nav-link {{ ((new \App\Helpers\GeneralFunction)->slug($menu->name) == (new \App\Helpers\GeneralFunction)->slug($title)) ? 'active' : '' }}">
                  {!! $menu->icon !!}
                  <p>
                    {{ $menu->name }}
                  </p>
                </a>
              </li>
            @endif
          @endforeach
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
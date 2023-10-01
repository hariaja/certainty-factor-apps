      <!-- Header Content -->
      <div class="content-header">
        <!-- Left Section -->
        <div class="space-x-1">
          <!-- Logo -->
          <a class="link-fx fw-bold" href="index.html">
            <i class="fa fa-fire text-primary"></i>
            <span class="fs-4 text-dual">code</span><span class="fs-4 text-primary">base</span>
          </a>
          <!-- END Logo -->
        </div>
        <!-- END Left Section -->

        <!-- Middle Section -->
        <div class="d-none d-lg-block">
          <!-- Header Navigation -->
          <!-- Desktop Navigation, mobile navigation can be found in #sidebar -->
          @include('users.partials.navigation')
          <!-- END Header Navigation -->
        </div>
        <!-- END Middle Section -->

        <!-- Right Section -->
        <div class="space-x-1">
          <div class="d-flex align-items-center">

            <!-- User Dropdown -->
            <div class="dropdown d-inline-block ms-2">
              <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle" src="{{ me()->getUserAvatar() }}" alt="Header Avatar" style="width: 21px;" />
                <span class="d-none d-sm-inline-block ms-2">{{ me()->name }}</span>
                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                  <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ me()->getUserAvatar() }}" alt="">
                  <p class="mt-2 mb-0 fw-medium">{{ me()->name }}</p>
                  <p class="mb-0 text-muted fs-sm fw-medium">{{ isRoleName() }}</p>
                </div>
                <div class="p-2">
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('users.users.show', me()->uuid) }}">
                    <span class="fs-sm fw-medium">{{ trans('Profile') }}</span>
                  </a>
                  <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('users.users.password', me()->uuid) }}">
                    <span class="fs-sm fw-medium">{{ trans('Ubah Kata Sandi') }}</span>
                  </a>
                </div>
                <div role="separator" class="dropdown-divider m-0"></div>
                <div class="p-2">
                  <a class="dropdown-item d-flex align-items-center justify-content-between text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <span class="fs-sm fw-medium">{{ trans('Keluar Aplikasi') }}</span>
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </div>
            </div>
            <!-- END User Dropdown -->
          </div>

          <!-- Toggle Sidebar -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
            <i class="fa fa-fw fa-bars"></i>
          </button>
          <!-- END Toggle Sidebar -->
        </div>
        <!-- END Right Section -->
      </div>
      <!-- END Header Content -->

      <!-- Header Search -->
      <div id="page-header-search" class="overlay-header bg-body-extra-light">
        <div class="content-header">
          <form class="w-100" action="bd_search.html" method="POST">
            <div class="input-group">
              <!-- Close Search Section -->
              <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
              <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                <i class="fa fa-fw fa-times"></i>
              </button>
              <!-- END Close Search Section -->
              <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
              <button type="submit" class="btn btn-secondary">
                <i class="fa fa-fw fa-search"></i>
              </button>
            </div>
          </form>
        </div>
      </div>
      <!-- END Header Search -->

      <!-- Header Loader -->
      <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
      <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header">
          <div class="w-100 text-center">
            <i class="far fa-sun fa-spin text-white"></i>
          </div>
        </div>
      </div>
      <!-- END Header Loader -->

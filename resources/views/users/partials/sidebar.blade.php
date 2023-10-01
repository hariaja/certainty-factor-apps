<nav id="sidebar">
  <!-- Sidebar Content -->
  <div class="sidebar-content">
    <!-- Side Header -->
    <div class="content-header justify-content-lg-center bg-black-10">
      <!-- Logo -->
      <div>
        <span class="smini-visible fw-bold tracking-wide fs-lg">
          c<span class="text-primary">b</span>
        </span>
        <a class="link-fx fw-bold tracking-wide mx-auto" href="index.html">
          <span class="smini-hidden">
            <i class="fa fa-fire text-primary"></i>
            <span class="fs-4 text-dual">code</span><span class="fs-4 text-primary">base</span>
          </span>
        </a>
      </div>
      <!-- END Logo -->

      <!-- Options -->
      <div>
        <!-- Close Sidebar, Visible only on mobile screens -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <button type="button" class="btn btn-sm btn-alt-danger d-lg-none" data-toggle="layout" data-action="sidebar_close">
          <i class="fa fa-fw fa-times"></i>
        </button>
        <!-- END Close Sidebar -->
      </div>
      <!-- END Options -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
      <!-- Side Main Navigation -->
      <div class="content-side content-side-full">
        <!-- Mobile navigation, desktop navigation can be found in #page-header If you would like to use the same navigation in both mobiles and desktops, you can use exactly the same markup inside sidebar and header navigation ul lists -->
        @include('users.partials.navigation')
      </div>
      <!-- END Side Main Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
  </div>
  <!-- Sidebar Content -->
</nav>

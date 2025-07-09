<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="d-flex align-items-center justify-content-between">
                <!-- Logo -->
                <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center" style="transition: opacity 0.3s ease-in-out;">
                    <img src="<?= base_url('images/logotmmin-sm.png') ?>" class="mr-2 logo" alt="logo" style="height: 80px;" />
                </div>

                <!-- Navbar Toggler -->
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize" id="sidebar-toggle">
                        <span class="icon-menu"></span>
                    </button>
                </div>
            </div>
            <script>
                document.getElementById('sidebar-toggle').addEventListener('click', function() {
                    var logo = document.querySelector('.logo');
                    var navbar = document.querySelector('.navbar-brand-wrapper');

                    navbar.classList.toggle('sidebar-collapsed');

                    if (navbar.classList.contains('sidebar-collapsed')) {
                        logo.style.opacity = 0;
                    } else {
                        logo.style.opacity = 1;
                    }
                });
            </script>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('dashboard') ?>">
                            <i class="mdi mdi-view-dashboard mdi-24px"></i>
                            <span class="menu-title ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('part') ?>"> <!-- Pastikan route ini ada -->
                            <i class="mdi mdi-video-input-component mdi-24px"></i>
                            <span class="menu-title ml-3">Part</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('users') ?>">
                            <i class="mdi mdi-camera-account mdi-24px"></i>
                            <span class="menu-title ml-3">User</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('logout') ?>">
                            <i class="mdi mdi-logout mdi-24px"></i>
                            <span class="menu-title ml-3">Logout</span>
                        </a>
                    </li>
                </ul>

            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
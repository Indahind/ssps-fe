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
                // Inline JavaScript untuk toggle logo
                document.getElementById('sidebar-toggle').addEventListener('click', function() {
                    var logo = document.querySelector('.logo');
                    var navbar = document.querySelector('.navbar-brand-wrapper');

                    // Toggle kelas sidebar-collapsed untuk mengubah opasitas logo
                    navbar.classList.toggle('sidebar-collapsed');

                    if (navbar.classList.contains('sidebar-collapsed')) {
                        logo.style.opacity = 0; // Logo sembunyi
                    } else {
                        logo.style.opacity = 1; // Logo tampil
                    }
                });
            </script>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('index.php/dashboard') ?>">
                            <i class="mdi mdi-view-dashboard mdi-24px"></i>
                            <span class="menu-title ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('index.php/camera') ?>">
                            <i class="mdi mdi-camera mdi-24px"></i>
                            <span class="menu-title ml-3">Camera</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('index.php/model') ?>">
                            <i class="mdi mdi-file mdi-24px"></i>
                            <span class="menu-title ml-3">Model</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('index.php/solution') ?>">
                            <i class="mdi mdi-library mdi-24px"></i>
                            <span class="menu-title ml-3">Solution</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('index.php/use') ?>">
                            <i class="mdi mdi-microsoft mdi-24px"></i>
                            <span class="menu-title ml-3">Solution Transaction</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">
                            <i class="mdi mdi-logout mdi-24px"></i>
                            <span class="menu-title ml-3">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>SSPS | Login</title>

  <!-- your CSS -->
  <link rel="stylesheet" href="<?= base_url('vendors/feather/feather.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('vendors/ti-icons/css/themify-icons.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('vendors/css/vendor.bundle.base.css') ?>" />
  <link rel="stylesheet" href="<?= base_url('css/vertical-layout-light/style.css') ?>" />
  <link rel="shortcut icon" href="<?= base_url('images/favicon.png') ?>" />
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?= base_url('images/logotmmin-sm.png') ?>" alt="logo" />
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>

              <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                  <?= session()->getFlashdata('error') ?>
                </div>
              <?php endif; ?>

              <!-- add novalidate to disable default UI -->
              <form id="loginForm" class="pt-3" method="post" action="<?= base_url('login/authenticate') ?>" novalidate>
                <?= csrf_field() ?>

                <div class="form-group">
                  <input
                    type="text"
                    name="username"
                    id="username"
                    class="form-control form-control-lg"
                    placeholder="Username"
                    autocomplete="username"
                    required
                  />
                </div>
                <div class="form-group">
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control form-control-lg"
                    placeholder="Password"
                    autocomplete="current-password"
                    required
                  />
                </div>
                <div class="mt-3">
                  <button
                    type="submit"
                    class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"
                  >
                    LOG IN
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- your vendor scripts -->
  <script src="<?= base_url('vendors/js/vendor.bundle.base.js') ?>"></script>
  <script src="<?= base_url('js/off-canvas.js') ?>"></script>
  <script src="<?= base_url('js/hoverable-collapse.js') ?>"></script>
  <script src="<?= base_url('js/template.js') ?>"></script>
  <script src="<?= base_url('js/settings.js') ?>"></script>
  <script src="<?= base_url('js/todolist.js') ?>"></script>

  <script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('loginForm');
    const username = document.getElementById('username');
    const password = document.getElementById('password');

    // 1) Attach invalid event to each field to set custom message
    username.addEventListener('invalid', function () {
      this.setCustomValidity('Please fill in your username.');
    });
    password.addEventListener('invalid', function () {
      this.setCustomValidity('Please fill in your password.');
    });

    // 2) On input, clear the message so browser will revalidate
    [username, password].forEach(input =>
      input.addEventListener('input', function () {
        this.setCustomValidity('');
      })
    );

    // 3) On submit, if form is invalid, prevent submission and focus first invalid
    form.addEventListener('submit', function (e) {
      if (!form.checkValidity()) {
        e.preventDefault();
        form.querySelector(':invalid').focus();
      }
    });
  });
  </script>
</body>
</html>

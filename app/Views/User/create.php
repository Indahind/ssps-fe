<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create User</h4>

        <!-- Show server-side validation errors -->
        <?php if (session()->getFlashdata('errors')): ?>
          <div class="alert alert-danger">
            <ul>
              <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <!-- NO novalidate here, so browser will show UI -->
        <form
          id="createUserForm"
          action="<?= site_url('users/store') ?>"
          method="post"
        >
          <?= csrf_field() ?>

          <div class="form-group">
            <label for="MNOREG">No Reg</label>
            <input
              type="text"
              id="MNOREG"
              name="MNOREG"
              class="form-control"
              value="<?= old('MNOREG') ?>"
              required
              oninvalid="this.setCustomValidity('Please fill in the No Reg.')"
              oninput="this.setCustomValidity('')"
            />
          </div>

          <div class="form-group">
            <label for="MUSERNAME">Username</label>
            <input
              type="text"
              id="MUSERNAME"
              name="MUSERNAME"
              class="form-control"
              value="<?= old('MUSERNAME') ?>"
              required
              oninvalid="this.setCustomValidity('Please fill in the Username.')"
              oninput="this.setCustomValidity('')"
            />
          </div>

          <div class="form-group">
            <label for="MNAMA">Nama</label>
            <input
              type="text"
              id="MNAMA"
              name="MNAMA"
              class="form-control"
              value="<?= old('MNAMA') ?>"
              required
              oninvalid="this.setCustomValidity('Please fill in the Nama.')"
              oninput="this.setCustomValidity('')"
            />
          </div>

          <div class="form-group">
            <label for="MPASWORD">Password</label>
            <input
              type="password"
              id="MPASWORD"
              name="MPASWORD"
              class="form-control"
              required
              oninvalid="this.setCustomValidity('Please fill in the Password.')"
              oninput="this.setCustomValidity('')"
            />
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
          <a href="<?= site_url('users') ?>" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->include('layouts/footer') ?>

<script>
  document
    .getElementById('createUserForm')
    .addEventListener('submit', function (e) {
      if (!this.checkValidity()) {
        e.preventDefault();
        const firstBad = this.querySelector(':invalid');
        firstBad.focus();
        firstBad.reportValidity(); // show your custom message
      }
    });
</script>

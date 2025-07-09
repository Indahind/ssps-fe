<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">
  <div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update User</h4>

        <!-- Server‐side validation errors -->
        <?php if (session()->getFlashdata('errors')): ?>
          <div class="alert alert-danger">
            <ul>
              <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
          <div class="alert alert-danger">
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <form
          id="updateUserForm"
          action="<?= site_url('users/update/' . $user['MNOREG']) ?>"
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
              value="<?= esc($user['MNOREG']) ?>"
              readonly
            />
          </div>

          <div class="form-group">
            <label for="MUSERNAME">Username</label>
            <input
              type="text"
              id="MUSERNAME"
              name="MUSERNAME"
              class="form-control"
              value="<?= esc($user['MUSERNAME']) ?>"
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
              value="<?= esc($user['MNAMA']) ?>"
              required
              oninvalid="this.setCustomValidity('Please fill in the Nama.')"
              oninput="this.setCustomValidity('')"
            />
          </div>

          <div class="form-group">
            <label for="MPASWORD">Password <small>(leave blank if unchanged)</small></label>
            <input
              type="password"
              id="MPASWORD"
              name="MPASWORD"
              class="form-control"
              placeholder="••••••••"
            />
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
          <a href="<?= site_url('users') ?>" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->include('layouts/footer') ?>

<script>
  document
    .getElementById('updateUserForm')
    .addEventListener('submit', function (e) {
      if (!this.checkValidity()) {
        e.preventDefault();
        const firstBad = this.querySelector(':invalid');
        firstBad.focus();
        firstBad.reportValidity();
      }
    });
</script>

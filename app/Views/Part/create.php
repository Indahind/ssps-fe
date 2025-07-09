<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Part</h4>

        <!-- Server‐side validation errors (if any) -->
        <?php if (session()->getFlashdata('errors')): ?>
          <div class="alert alert-danger">
            <ul>
              <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <form
          id="addPartForm"
          method="POST"
          action="<?= base_url('part/store') ?>"
          class="form-sample"
        >
          <?= csrf_field() ?>

          <div class="row">
            <!-- Part ID (read-only) -->
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Part ID</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    name="MPARTNO"
                    class="form-control"
                    value="<?= esc($nextMPARTNO) ?>"
                    readonly
                  />
                </div>
              </div>
            </div>

            <!-- Part Name -->
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Part Name</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    id="MPARTNAME"
                    name="MPARTNAME"
                    class="form-control"
                    required
                    oninvalid="this.setCustomValidity('Please fill in the Part Name.')"
                    oninput="this.setCustomValidity('')"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <!-- Supplier Name -->
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Supplier Name</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    id="NSUPPLIERPARTNAME"
                    name="NSUPPLIERPARTNAME"
                    class="form-control"
                    required
                    oninvalid="this.setCustomValidity('Please fill in the Supplier Name.')"
                    oninput="this.setCustomValidity('')"
                  />
                </div>
              </div>
            </div>
            <!-- Status -->
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status</label>
                <div class="col-sm-9">
                  <input
                    type="text"
                    name="NSTATUS"
                    class="form-control"
                    value="ACTIVE"
                    readonly
                  />
                </div>
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Save</button>
          <a href="<?= base_url('part') ?>" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>

<?= $this->include('layouts/footer') ?>

<script>
  document
    .getElementById('addPartForm')
    .addEventListener('submit', function (e) {
      if (!this.checkValidity()) {
        e.preventDefault();
        const firstBad = this.querySelector(':invalid');
        firstBad.focus();
        firstBad.reportValidity();
      }
    });
</script>

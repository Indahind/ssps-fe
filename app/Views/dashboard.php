<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <h2>Selamat datang, <?= esc(session()->get('nama')) ?>!</h2>
    <div class="row mt-4">
      <!-- Summary Cards -->
      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-primary text-white">
          <div class="card-body">
            <h4 class="mb-2">Total Kamera</h4>
            <h2>5</h2>
            <i class="mdi mdi-cctv mdi-36px float-right"></i>
          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-success text-white">
          <div class="card-body">
            <h4 class="mb-2">Total Model</h4>
            <h2>3</h2>
            <i class="mdi mdi-puzzle mdi-36px float-right"></i>
          </div>
        </div>
      </div>

      <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-warning text-white">
          <div class="card-body">
            <h4 class="mb-2">Total Solution</h4>
            <h2>2</h2>
            <i class="mdi mdi-lightbulb-on mdi-36px float-right"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Activity Table -->
    <div class="row mt-5">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Aktivitas Terbaru</h4>
            <div class="table-responsive">
              <table id="dashboardTable" class="table table-striped">
                <thead>
                  <tr>
                    <th>Waktu</th>
                    <th>Aksi</th>
                    <th>Nama Item</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>2025-05-06 09:00</td>
                    <td>Tambah Kamera</td>
                    <td>PRIUS CCTV-3</td>
                    <td>RTSP: rtsp://example.com</td>
                  </tr>
                  <tr>
                    <td>2025-05-05 15:30</td>
                    <td>Edit Model</td>
                    <td>Face Detection</td>
                    <td>Model diperbarui</td>
                  </tr>
                  <tr>
                    <td>2025-05-04 10:10</td>
                    <td>Hapus Solution</td>
                    <td>Security Alert</td>
                    <td>Dihapus oleh admin</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#dashboardTable').DataTable();
  });
</script>

<?= $this->include('layouts/footer') ?>

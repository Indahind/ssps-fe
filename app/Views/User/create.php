<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah User</h4>

                <form action="<?= site_url('users/store') ?>" method="post">
                    <div class="form-group">
                        <label>No Reg</label>
                        <input type="text" name="MNOREG" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="MUSERNAME" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="MNAMA" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="MPASWORD" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= site_url('users') ?>" class="btn btn-secondary">Batal</a>
                </form>

            </div>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>

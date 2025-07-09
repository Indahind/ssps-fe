<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail User</h4>

                <table class="table">
                    <tr>
                        <th>No Reg</th>
                        <td><?= esc($user['MNOREG']) ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td><?= esc($user['MUSERNAME']) ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td><?= esc($user['MNAMA']) ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <?= $user['NSTATUS'] === 'ACTIVE' ? '<span class="badge badge-success">ACTIVE</span>' : '<span class="badge badge-secondary">INACTIVE</span>' ?>
                        </td>
                    </tr>
                </table>

                <a href="<?= site_url('users') ?>" class="btn btn-secondary mt-3">Back to List</a>

            </div>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>

<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User List</h4>

                <!-- Tombol Tambah User -->
                <a href="<?= site_url('users/create') ?>" class="btn btn-primary mb-3">Add New User</a>

                <table id="userList" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No Reg</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= esc($user['MNOREG']) ?></td>
                                <td><?= esc($user['MUSERNAME']) ?></td>
                                <td><?= esc($user['MNAMA']) ?></td>
                                <td>
                                    <?php if ($user['NSTATUS'] === 'ACTIVE'): ?>
                                        <span class="badge badge-success">ACTIVE</span>
                                    <?php else: ?>
                                        <span class="badge badge-secondary">INACTIVE</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?= site_url('users/show/' . $user['MNOREG']) ?>" title="Detail">
                                        <i class="mdi mdi-eye mdi-24px"></i>
                                    </a>
                                    <a href="<?= site_url('users/edit/' . $user['MNOREG']) ?>" title="Edit">
                                        <i class="mdi mdi-grease-pencil mdi-24px"></i>
                                    </a>
                                    <a href="<?= site_url('users/delete/' . $user['MNOREG']) ?>" title="Nonaktifkan" onclick="return confirm('Yakin ingin menonaktifkan user ini?');">
                                        <i class="mdi mdi-delete mdi-24px"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#userList').DataTable();
    });
</script>

<?= $this->include('layouts/footer') ?>

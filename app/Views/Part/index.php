<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Part List</h4>

                <!-- Link ke halaman create -->
                <a href="<?= site_url('part/create') ?>" class="btn btn-primary mb-3">Add New Part</a>

                <table id="partList" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Part ID</th>
                            <th>Part Name</th>
                            <th>Supplier Nama</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($parts as $part): ?>
                            <tr>
                                <td><?= esc($part['MPARTNO']) ?></td>
                                <td><?= esc($part['MPARTNAME']) ?></td>
                                <td><?= esc($part['NSUPPLIERPARTNAME']) ?></td>
                                <td>
                                        <span class="badge badge-success">ACTIVE</span>
                                    
                                </td>
                                <td>

                                    <a href="<?= site_url('part/show/' . $part['MPARTNO']) ?>" title="Detail">
                                        <i class="mdi mdi-eye mdi-24px"></i>
                                    </a>

                                    <a href="<?= site_url('part/edit/' . $part['MPARTNO']) ?>" title="Update">
                                        <i class="mdi mdi-grease-pencil mdi-24px"></i>
                                    </a>

                                    <a href="<?= site_url('part/delete/' . $part['MPARTNO']) ?>" title="Delete" onclick="return confirm('Are you sure you want to delete this part?');">
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
    $(document).ready(function() {
        $('#partList').DataTable();
    });
</script>

<?= $this->include('layouts/footer') ?>
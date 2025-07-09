<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Part</h4>

                <table class="table">
                    <tr>
                        <th>Part ID</th>
                        <td><?= esc($part['MPARTNO']) ?></td>
                    </tr>
                    <tr>
                        <th>Part Name</th>
                        <td><?= esc($part['MPARTNAME']) ?></td>
                    </tr>
                    <tr>
                        <th>Supplier Name</th>
                        <td><?= esc($part['NSUPPLIERPARTNAME']) ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?= esc($part['NSTATUS']) ?></td>
                    </tr>
                </table>

                <a href="<?= site_url('part') ?>" class="btn btn-secondary mt-3">Back to List</a>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layouts/footer') ?>

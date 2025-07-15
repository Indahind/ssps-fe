<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="content">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Part List</h4>

                <!-- Display success message if available -->
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <!-- Display error message if available -->
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('errors') ?>
                    </div>
                <?php endif; ?>

                <!-- Link to create a new part -->
                <a href="<?= site_url('part/create') ?>" class="btn btn-primary mb-3">Add New Part</a>

                <table id="partList" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Part ID</th>
                            <th>Part Name</th>
                            <th>Supplier Name</th> 
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($parts as $part): ?>
                            <tr>
                                <td><?= esc($part['MPARTNO']) ?></td>
                                <td><?= esc($part['MPARTNAME']) ?></td>
                                <td><?= esc($part['SUPPLIERNAME']) ?></td> 
                                <td>
                                    <span class="badge <?= $part['NSTATUS'] == 'ACTIVE' ? 'badge-success' : 'badge-danger' ?>">
                                        <?= esc($part['NSTATUS']) ?>
                                    </span>
                                </td>
                                <td>
                                    <!-- Action Buttons with proper alignment -->
                                    <div class="action-buttons">
                                        <a href="<?= site_url('part/show/' . $part['MPARTNO']) ?>" title="Detail">
                                            <i class="mdi mdi-eye mdi-24px"></i>
                                        </a>
                                        <a href="<?= site_url('part/edit/' . $part['MPARTNO']) ?>" title="Update">
                                            <i class="mdi mdi-grease-pencil mdi-24px"></i>
                                        </a>
                                        <!-- Toggle Status with Switch -->
                                        <a href="javascript:void(0);" title="Toggle Status">
                                            <label class="switch">
                                                <!-- Dynamically set checked based on NSTATUS value -->
                                                <input type="checkbox" class="status-toggle" <?= $part['NSTATUS'] == 'ACTIVE' ? 'checked' : '' ?> data-part-id="<?= esc($part['MPARTNO']) ?>" onchange="toggleStatus(this)">
                                                <span class="slider round"></span>
                                            </label>
                                        </a>
                                    </div>
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

    function toggleStatus(checkbox) {
        var partId = $(checkbox).data('part-id');
        var currentStatus = checkbox.checked ? 'ACTIVE' : 'INACTIVE';

        // Update the status in the database
        if (confirm(`Are you sure you want to change the status to ${currentStatus}?`)) {
            // Redirect to the delete function for status update
            window.location.href = '<?= site_url('part/delete/') ?>/' + partId;
        } else {
            // Revert the checkbox state if the user cancels
            checkbox.checked = !checkbox.checked;
        }
    }
</script>

<?= $this->include('layouts/footer') ?>

<!-- CSS for the Toggle Switch -->
<style>
/* Styling for the switch container */
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
}

/* Hide the default checkbox */
.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

/* Styling for the slider (toggle switch) */
.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: 0.4s;
    border-radius: 34px;
}

/* Circle that moves inside the slider */
.slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    border-radius: 50%;
    background-color: white;
    transition: 0.4s;
    top: 4px;
    left: 4px;
}

/* When the checkbox is checked (ACTIVE state) */
input:checked + .slider {
    background-color: #4CAF50; /* Green for ACTIVE */
}

/* Move the circle to the right when checked */
input:checked + .slider:before {
    transform: translateX(26px); /* Move to the right */
}

/* Round the slider when the checkbox is checked */
.slider.round {
    border-radius: 34px;
}

/* Round the circle inside the slider */
.slider.round:before {
    border-radius: 50%;
}

/* Color when unchecked (INACTIVE state) */
input:checked + .slider {
    background-color: #F44336; /* Red for INACTIVE */
}

/* Action buttons' alignment */
.action-buttons {
    display: flex;
    align-items: center;
    gap: 10px; /* Adds space between the icons */
}
</style>

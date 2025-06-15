<?php $this->load->view('layouts/header'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Part</h4>
                <form method="POST" action="<?= base_url('index.php/part/create') ?>" class="form-sample">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Part ID</label>
                                <div class="col-sm-9">
                                    <input type="text" name="MPARTID" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Part Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="MPARTNAME" class="form-control" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Quantity</label>
                                <div class="col-sm-9">
                                    <input type="number" name="NQTY" class="form-control" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="text" name="NSTATUS" class="form-control" required />
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="<?= base_url('index.php/part') ?>" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('layouts/footer'); ?>

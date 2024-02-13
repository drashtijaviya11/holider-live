<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<style>
.btn-primary{
    background-color: #108eb1d4;;
}
.dropdown-menu{
    left: 100%;
    top: 0%;
}
</style>
<div class="container">
<div class="row mt-3">
    <div class=" d-flex justify-content-center">
        <div class="dropdown">
            <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="providerDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Provider
            </button>
            <div class="dropdown-menu" aria-labelledby="providerDropdown">
                <a class="dropdown-item" href="<?= base_url('provider/provider_list'); ?>">List Provider</a>
                <a class="dropdown-item" href="<?= base_url('provider/add_provider'); ?>">Add Provider</a>
                <a class="dropdown-item" href="<?= base_url('admin/offer_add_form'); ?>">Add offer</a>
                <!-- Add more items or customize as needed -->
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class=" d-flex justify-content-center">
        <div class="dropdown">
            <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="affilatorDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Affilator
            </button>
            <div class="dropdown-menu" aria-labelledby="affilatorDropdown">
                <a class="dropdown-item" href="<?= base_url('affilator/affilator_list'); ?>">List Affilator</a>
                <a class="dropdown-item" href="<?= base_url('affilator/add_affilator'); ?>">Add Affilator</a>
                <!-- Add more items or customize as needed -->
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class=" d-flex justify-content-center">
        <div class="dropdown">
            <button class="btn btn-primary btn-block dropdown-toggle" type="button" id="offerDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Offer
            </button>
            <div class="dropdown-menu" aria-labelledby="offerDropdown">
                <a class="dropdown-item" href="<?= base_url('offer'); ?>">List Offer</a>
                <a class="dropdown-item" href="<?= base_url('admin/offer_add_form'); ?>">Add Offer</a>
                <!-- Add more items or customize as needed -->
            </div>
        </div>
    </div>
</div>

    <!-- <div class="row mt-3">
        <div class="col-12 d-flex justify-content-center">
            <a href="<?= base_url('admin/dashboard'); ?>" class="btn btn-primary btn-block"><?= lang('add_offer'); ?></a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 d-flex justify-content-center">
            <a href="<?= base_url('admin/add_new_user'); ?>" class="btn btn-primary btn-block"><?= lang('add user'); ?></a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12 d-flex justify-content-center">
            <a href="<?= base_url('admin/viewUser'); ?>" class="btn btn-primary btn-block"><?= lang('view user'); ?></a>
        </div>
    </div> -->
</div>



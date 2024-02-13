        <!-- ================================Dashboard csss start================================ -->
        <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
        <!-- -------- -------- -------- -------- end -------- -------------------- -------------- -->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="card-container">
    <div class="card">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="test1" role="tabpanel">
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="dashboard_hello"><?= lang('hello,');?></span>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <span class="dashboard_username"><?= $this->session->userdata('userAuth')['name'];?></span>
                    </div>  
                </div>
                <div class="row mt-3 balance_area">
                    <div class="col-12">
                        <span class="balance_text"><?=  lang('your_balance_is'); ?><sapn class="my_balance_class"> $<?= $this->session->userdata('userAuth')['balance'];?></span>, ...</span>
                    </div>
                    <div class="row mt-3">
                    <div class="col-12">
                        <button class="learn_more_btn"><?= lang('learn_more');?></button>
                    </div>

                </div>
                </div>
                <div class="row mt-3 list_of_dashboard_row">
                    <div class="col-12">
                        <span class="list_of_dashboard"><?=  lang('my_account'); ?></span>
                    </div>
                </div>

                <div class="row mt-3 list_of_dashboard_row">
                    <div class="col-12">
                        <span class="list_of_dashboard"><?=  lang('my_vouchers'); ?></span>
                    </div>
                </div>

                <div class="row mt-3 list_of_dashboard_row">
                    <div class="col-12">
                        <span class="list_of_dashboard"><?=  lang('how _it_works ?'); ?></span>
                    </div>
                </div>

                <div class="row mt-3 list_of_dashboard_row">
                    <div class="col-12">
                        <span class="list_of_dashboard"><?=  lang('my_commissions'); ?></span>
                    </div>
                </div>
                <div class="row mt-3 comission_link">
                    <div class="col-12">
                        <span class="comission_link_list"><?=  lang('commission_link'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
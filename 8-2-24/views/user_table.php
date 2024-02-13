
<style>
.temp{
    /* border: 1px solid #010101 !important;
    border-radius: 0px !important; */
}
    .whatsapp{
    background-color: #055c7491;
    padding: 5px;
    font-weight: bold;
}
    @media (max-width: 767px) {
        table {
            font-size: 10px;
        }
    }
</style>
<div class="card-container">
    <div class="card">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="test1" role="tabpanel">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center whatsapp"><?= lang('all_users'); ?></div>
                        <hr>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><?= lang('name'); ?></th>
                                    <th><?= lang('username'); ?></th>
                                    <th><?= lang('mobile'); ?></th>
                                    <th><?= lang('type'); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user) { ?>
                                    <tr>
                                        <td><?= $user['name']; ?></td>
                                        <td><?= $user['username']; ?></td>
                                        <td><?= $user['phone']; ?></td>
                                        <td><?= $user['type']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
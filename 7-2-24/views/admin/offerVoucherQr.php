<style>
    img{
        height: 100px;
    }
</style>
<table>
    <thead>
        <tr>
            <th>Offer Id</th>
            <th>Qr Image</th>
            <th>status</th>
            <th>Created</th>
            <th>Expiry Date</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if(!empty($offerVoucher)){
        foreach($offerVoucher as $of_Voucher) { ?>
            <tr>
                <td><?= $of_Voucher['offer_id'] ?></td>
                <td><img src="<?= base_url().$of_Voucher['qr_image'] ?>" alt=""></td>
                <td><?= $of_Voucher['status'] ?></td>
                <td><?= date('d-m-Y', strtotime($of_Voucher['purchase_date'])) ?></td>
                <td><?= date('d-m-Y', strtotime($of_Voucher['expire_date'])) ?></td>
            </tr>
        <?php } } else { ?>
            <tr><td colspan="5" class="text-center">No Voucher Found</td></tr>
        <?php } ?>
    </tbody>
</table>
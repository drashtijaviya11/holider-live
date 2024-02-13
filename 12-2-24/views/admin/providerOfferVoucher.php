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
            <th>Price</th>
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
				<td><?php echo ($of_Voucher['status'] == 'reedem') ? 'Redeemed' : 'Not Redeemed'; ?></td>
                <td><?= getCurrencySymbol($of_Voucher['currency_type']).$of_Voucher['price'] ?></td>
                <td><?= date('d-m-Y', strtotime($of_Voucher['purchase_date'])) ?></td>
                <td><?= date('d-m-Y', strtotime($of_Voucher['expire_date'])) ?></td>
            </tr>
        <?php } } else { ?>
            <tr><td colspan="6" class="text-center">No Voucher Found</td></tr>
        <?php } ?>
    </tbody>
</table>
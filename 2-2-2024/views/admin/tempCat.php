
<?php if(!empty($category)){ $i=0;
    foreach($category as $category_data){?>

            <td><?= $category_data['id'] ?></td>
            <td><?= $category_data['category_name'] ?></td>
            <td><a  class="btn btn-success temp" style="margin: 0;" onclick="edit_category(<?= $category_data['id'] ?>)"><i class="bi bi-pencil-square"></i><a onclick="categoriesTranslationModal(<?= $category_data['id'] ?>)" class="btn btn-success">
                                <!-- <img src="<?= base_url(); ?>img/item_button_translate.png" alt="" class="power_img"> -->
                                <i class="bi bi-translate"></i></td>
            <td><a  class="btn btn-danger temp1" onclick="delete_category(<?= $category_data['id'] ?>)"><i class="bi bi-trash3"></i></td>

   <?php } 
  }else{ ?>
    <tr>
        <td>Data Not Found</td>
    </tr>
  <?php } ?>
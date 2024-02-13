<?php if(!empty($testimonial)){ 
    foreach($testimonial as $testimonial_data){?>
            <td><?= $testimonial_data['heading'] ?></td>
            <td><?= $testimonial_data['name'] ?></td>
			<td><?= $testimonial_data['content'] ?></td>
			<td>
			<?php
			if (!empty($testimonial_data['photo'])) {
				$images = json_decode($testimonial_data['photo'], true);
				if ($images !== null) {
					foreach ($images as $image) {
						// Display each image
				?>
						<img class="imgFile" src="<?= base_url() . $image ?>" alt="">
				<?php
					}
				}
			}
			?>
			</td>
			<td>
				<a href="javascript:void(0)" onclick="edit_testimonial(<?= $testimonial_data['id'] ?>)" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
				<a onclick="openItemTranslationModal(<?= $testimonial_data['id'] ?>)" class="btn btn-success">
					<!-- <img src="<?= base_url(); ?>img/item_button_translate.png" alt="" class="power_img"> -->
					<i class="bi bi-translate"></i>
				</a>
			</td>
			<td>
				<a href="javascript:void(0)" onclick="delete_testimonial(<?= $testimonial_data['id'] ?>)" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
			</td>
   <?php } 
  } ?>

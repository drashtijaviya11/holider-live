<style>
.position-absolute{
    position:absolute !important;
}
    </style>

<div class="faq-container">

    <div class="faq-sec position-relative">
        <div class="faq-main-img">
            <img src="<?php echo base_url(); ?>assets/images/New Caledonia.jpg" alt="">
        </div>
        <div class="bg-faq position-absolute"></div>
        <div class="faq-text position-absolute">
            <button class="head-faq"><?= lang('faq'); ?></button>
            <div class="faq-content">
                <div class="l-faq-rec"></div>
                <div class="fc-text">
                    <p><?= lang('this_is_a_great_site_for'); ?></p>
                </div>
                <div class="r-faq-rec"></div>
            </div>
        </div>
    </div>

    <div class="all-faq">
        <div class="faq-detail-section">
            <h1><?= lang('help_center'); ?></h1>
            <h2><?= lang('how_can_we_help_you'); ?></h2>
            <p><?= lang('this_is_a_great_site_for'); ?></p>
        </div>

        <div class="faq-q">
            <div class="all-q">
			<?php $i =1 ; foreach($faqs as $faq) {  ?>
                <div class="question-box" data-index="<?= $faq['id']; ?>">
                    <div class="question">
                        <span><?= $faq['question'] ; ?></span>
                    </div>
                    <div class="ans">
                        <p><?= $faq['answer'] ; ?></p>
                    </div>
                </div>
				<?php } ?>
                <!-- <div class="question-box" data-index="2">
                    <div class="question">
                        <span>02. how to start preparing for a traveler's life?</span>
                    </div>
                    <div class="ans">
                        <p>This is a great site for everything around the home, and it also has useful information. You can see the best products in each category, and they even back up the information they are giving you.</p>
                    </div>
                </div>
                <div class="question-box" data-index="3">
                    <div class="question">
                        <span>03. how to start preparing for a traveler's life?</span>
                    </div>
                    <div class="ans">
                        <p>This is a great site for everything around the home, and it also has useful information. You can see the best products in each category, and they even back up the information they are giving you.</p>
                    </div>
                </div>
                <div class="question-box" data-index="4">
                    <div class="question">
                        <span>04. how to start preparing for a traveler's life?</span>
                    </div>
                    <div class="ans">
                        <p>This is a great site for everything around the home, and it also has useful information. You can see the best products in each category, and they even back up the information they are giving you.</p>
                    </div>
                </div>
                <div class="question-box" data-index="4">
                    <div class="question">
                        <span>05. how to start preparing for a traveler's life?</span>
                    </div>
                    <div class="ans">
                        <p>This is a great site for everything around the home, and it also has useful information. You can see the best products in each category, and they even back up the information they are giving you.</p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

</div>


<script>
const questionBoxes = document.querySelectorAll('.question-box');

questionBoxes.forEach((box) => {
    box.addEventListener('click', () => {
        // Toggle current answer
        const ans = box.querySelector('.ans');
        ans.style.display = ans.style.display === 'none' ? 'block' : 'none';
        
        // Close other answers
        questionBoxes.forEach((otherBox) => {
            if (otherBox !== box) {
                otherBox.querySelector('.ans').style.display = 'none';
            }
        });
    });
});
</script>


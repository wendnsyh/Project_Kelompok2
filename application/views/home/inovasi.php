<div class="container mt-5">
    <h2 class="text-center mb-4">FAQ Warga</h2>
    <div class="accordion" id="faqAccordion">
        <?php foreach ($faqs as $key => $faq) : ?>
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeading<?php echo $key; ?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse<?php echo $key; ?>" aria-expanded="false" aria-controls="faqCollapse<?php echo $key; ?>">
                        <?php echo $faq['question']; ?>
                    </button>
                </h2>
                <div id="faqCollapse<?php echo $key; ?>" class="accordion-collapse collapse" aria-labelledby="faqHeading<?php echo $key; ?>" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        <?php if (!empty($faq['image'])) : ?>
                            <div class="text-center mb-3">
                                <img src="<?php echo base_url('uploads/faq/') . $faq['image']; ?>" alt="FAQ Image" class="img-fluid" style="max-width: 150px;">
                            </div>
                        <?php endif; ?>
                        <?php echo $faq['answer']; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
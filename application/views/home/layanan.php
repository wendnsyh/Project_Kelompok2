<div class="container mt-5" id="Kritik">
    <div class="section-title text-center">
        <h2>FORM PENGADUAN</h2>
    </div>
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <form action="<?php echo base_url('pengaduan/send'); ?>" method="post" role="form" class="php-email-form">
        <div class="row">
            <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
        </div>
        <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
        </div>
        <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <div class="text-center"><button type="submit">Send Message</button></div>
    </form>
</div>
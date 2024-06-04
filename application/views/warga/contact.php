<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

        <div class="section-title text-center">
            <h2>KONTAK KAMI</h2>
        </div>

        <div class="row mt-1">
            <div class="col-lg-4">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4><b>Location:</b></h4>
                        <p>BSD Sektor XIV Blok C1/1, Jl. Letnan Sutopo BSD Serpong Lengkong Gudang Timur, Rw. Mekar
                            Jaya, Kec. Serpong, Kota Tangerang Selatan, Banten 15311</p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4><b>Email:</b></h4>
                        <p>kelurahanserpong@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4><b>No Telepon:</b></h4>
                        <p>0857-7971-4550</p>
                    </div>

                    <div class="sosmed">
                        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>


        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <div class="container mt-5">
            <div class="section-title text-center">
                <h2>FORM PENGADUAN</h2>
            </div>
            <form action="<?php echo base_url('pengaduan/send'); ?>" method="post" role="form" class="php-email-form">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                            required>
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

    </div>

    </div>
</section><!-- End Contact Section -->
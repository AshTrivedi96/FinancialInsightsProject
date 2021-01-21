 <footer id="footer">
    <div class="container">
      <h3>Financial Insights</h3>
      <p>MAKE YOUR MONEY GROW.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Financial Insights</span></strong>. All Rights Reserved
      </div>
      
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url();?>stock_assets/assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>stock_assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url();?>stock_assets/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url();?>stock_assets/assets/vendor/php-email-form/validate.js"></script>
  <script src="<?php echo base_url();?>stock_assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url();?>stock_assets/assets/vendor/venobox/venobox.min.js"></script>
  <script src="<?php echo base_url();?>stock_assets/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>stock_assets/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url();?>stock_assets/assets/js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/javascript.util/0.12.12/javascript.util.min.js" integrity="sha512-oHBLR38hkpOtf4dW75gdfO7VhEKg2fsitvHZYHZjObc4BPKou2PGenyxA5ZJ8CCqWytBx5wpiSqwVEBy84b7tw==" crossorigin="anonymous"></script>
<?php if(!empty( $this->session->flashdata('error'))): ?>
  <script type="text/javascript">
  
    swal('error','<?php echo $this->session->flashdata('error'); ?>','error');
  </script>
<?php endif; ?>
<?php if(!empty( $this->session->flashdata('success'))): ?>
  <script type="text/javascript">
  
    swal('success','<?php echo $this->session->flashdata('success'); ?>','success');
  </script>
<?php endif; ?>


</body>

</html>
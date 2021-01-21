 <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
   <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

     <!-- Slide 1 -->
     <div class="carousel-item active">
       <div class="carousel-container">
         <h2 class="animate__animated animate__fadeInDown"> HERE TO HELP YOU INVEST<span> WISELY.</span></h2>
         <p class="animate__animated fanimate__adeInUp">Tell us your investment interest and let us do the research to help you create a profitable portfolio.</p>
         <p class="animate__animated fanimate__adeInUp">Let's grow together. </p>
         <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
       </div>
     </div>

     <!-- Slide 2 -->
     <div class="carousel-item">
       <div class="carousel-container">
         <h2 class="animate__animated animate__fadeInDown">INVESTMENT PROBLEMS MADE EASY.</h2>
         <p class="animate__animated animate__fadeInUp">Checkout top Gainer, Loser and highly traded stocks of the day. Take a peek at some of our Top Picks. </p>
         <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
       </div>
     </div>

     <!-- Slide 3 -->
     <div class="carousel-item">
       <div class="carousel-container">
         <h2 class="animate__animated animate__fadeInDown">Sequi ea ut et est quaerat</h2>
         <p class="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
         <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
       </div>
     </div>

     <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>

     <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
       <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>

   </div>

   <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
     <defs>
       <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
     </defs>
     <g class="wave1">
       <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
     </g>
     <g class="wave2">
       <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
     </g>
     <g class="wave3">
       <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
     </g>
   </svg>

 </section><!-- End Hero -->

 <main id="main">


   <!-- ======= About Section ======= -->
   <?php
    $news = Stock_home::getNews();

    foreach ($news as $key => $value) {
    ?>
       <section id="about" class="about">
         <div class="container">

           <div class="section-title" data-aos="zoom-out">
             <h2>Article</h2>
             <p><a href="<?php echo $value->link; ?>"><?php echo $value->title; ?></a></p>
           </div>

           <div class="row">
             <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0" data-aos="fade-right">
               <p><?php echo $value->summary; ?><a href="<?php echo $value->link; ?>">Read more...</a></p>
             </div>
             <div class="col-lg-6 order-1 order-lg-2 text-center">
               <?php
                if (isset($value->image)) { ?>
                 <img src="<?php echo $value->image; ?>" alt="" style="width: 50%;" data-aos="fade-left">
               <?php } ?>
             </div>
           </div>
         </div>
       </section><!-- End Features Section -->
   <?php
    }
    ?>

   <!-- End F.A.Q Section -->
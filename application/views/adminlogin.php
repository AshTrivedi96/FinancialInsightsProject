

<main id="main">

    <section class="inner-page" style="padding: 150px 0">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mt-3">
        <div class="section-title " data-aos="zoom-out">
          <h2>Admin</h2>
          <p>Login</p>
        </div>
        <div class="col-lg-12">
        <div class="row" >

          <div class="col-lg-12  " data-aos="fade-left" style="padding-top: 50px" >

            <form action="<?php echo base_url(); ?>index.php/admin_stock/logincheck" method="post" >
             
                <div class=" form-group">
                  <input type="text" name="username" class="form-control mb-4" id="name" placeholder="Email/Username" data-rule="minlen:4" data-msg="Please enter at least 4 chars" autocomplete="off"  />
                  
                  <input type="password" class="form-control mb-4" name="password" id="email" placeholder="Password" data-rule="email" data-msg="Please enter a valid email" autocomplete="off"  />

                  <input type="submit" name="submit" id="login" value="Sign In">
                  
                </div>
            
        
            </form>

          </div>
       

        </div>
      </div>
    </div>
         <div class="col-lg-8" >
          <img src="<?php echo base_url();?>stock_assets/assets/img/login.png" style= " height: 400px;width: 550px;float: right;">
        </div>
      </div>
    </div>
  </section>
</main>

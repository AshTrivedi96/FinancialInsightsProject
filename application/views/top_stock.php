
<main id="main">

    <section class="inner-page" style="padding: 150px 0">
      <div class="container">
      	
      	<div class="section-title" data-aos="zoom-out">
          <h2>Stocks</h2>
          <p>Trading</p>
        </div>

        <table class="table table-striped " id="" data-aos="zoom-out">
            <thead>
              
              <th>Ticker</th>
              <th>Name</th>
              <th>Market</th>
              <th>Locale</th>
              <th>Currency</th> 
            </thead>
            <tbody>
              
          <?php $i=1; foreach ($trading as $key => $value): ?>
            <tr>
              
            <td><?php echo $value['ticker'] ?></td> 
            <td><?php echo $value['name'] ?></td> 
            <td><?php echo $value['market'] ?></td> 
            <td><?php echo $value['locale'] ?></td> 
            <td><?php echo $value['currency'] ?></td> 
              
            </tr>

          <?php $i++; endforeach ?>
            


            </tbody>
        </table>

          <div class="section-title mt-5" data-aos="zoom-out">
          <h2>Stocks</h2>
          <p>Short Term</p>
        </div>

        <table class="table table-striped " id="" data-aos="zoom-out">
            <thead>
              
              <th>Ticker</th>
              <th>Name</th>
              <th>Market</th>
              <th>Locale</th>
              <th>Currency</th> 
            </thead>
            <tbody>
              
          <?php $i=1; foreach ($short_term as $key => $value): ?>
            <tr>
              
            <td><?php echo $value['ticker'] ?></td> 
            <td><?php echo $value['name'] ?></td> 
            <td><?php echo $value['market'] ?></td> 
            <td><?php echo $value['locale'] ?></td> 
            <td><?php echo $value['currency'] ?></td> 
              
            </tr>

          <?php $i++; endforeach ?>
            


            </tbody>
        </table>
        
          <div class="section-title mt-5" data-aos="zoom-out">
          <h2>Stocks</h2>
          <p>Long Term</p>
        </div>

        <table class="table table-striped  " id="" data-aos="zoom-out">
            <thead>
              
              <th>Ticker</th>
              <th>Name</th>
              <th>Market</th>
              <th>Locale</th>
              <th>Currency</th> 
            </thead>
            <tbody>
              
          <?php $i=1; foreach ($long_term as $key => $value): ?>
            <tr>
              
            <td><?php echo $value['ticker'] ?></td> 
            <td><?php echo $value['name'] ?></td> 
            <td><?php echo $value['market'] ?></td> 
            <td><?php echo $value['locale'] ?></td> 
            <td><?php echo $value['currency'] ?></td> 
              
            </tr>

          <?php $i++; endforeach ?>
            


            </tbody>
        </table>
        

      </div>
  </section>
</main>
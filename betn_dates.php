<?php include("../test/DB_Connect/header.php"); ?>
<div class="d-flex justify-content-center">
        <form action="" method="post">
                <div class="row justify-content-center"> 
                              <div class="col-md-6 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date1", "date1",""); ?> </div>
                              <div class="col-md-6 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date2", "date2",""); ?> </div>
                </div>
              <div class="row justify-content-center">  <?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","custom_rake_dist","data-toggle='tooltip' data-placement='bottom' title='Custom Rake Distribution'"); ?></div>
         </form>
</div>
<!--  Start of rake distribution -->
<div class="container qty_despatch justify-content-center">
<div class="row">
<div class="col-lg-6"><?php include("packages/lump_rake_dist.php"); ?></div>
<div class="col-lg-6"><?php include("packages/fines_rake_dist.php"); ?></div>
</div>
</div>

   <!-- End of Rake Distribution -->

<div class="container-fluid qty_despatch justify-content-center">
<div class="row">
<div class="col-lg-6"><?php include("packages/rake_l_qty.php"); ?> </div>
<div class="col-lg-6"><?php include("packages/rake_f_qty.php"); ?> </div>
</div>
</div>
<!-- End of Qty Despatch Section -->

<!-- Total Rakes and Total Quantity -->
<div class="container-fluid qty_despatch justify-content-center">
<div class="row">
<div class="col-lg-6"><?php include("packages/total_rake_dist.php"); ?> </div>
<div class="col-lg-6"><?php include("packages/rake_total_qty.php"); ?> </div>
</div>
</div>
<!-- Total Production and Stock Increase/ Decrease -->
<div class="container-fluid qty_despatch justify-content-center">
<div class="row">
<div class="col-lg-6"><?php include("packages/prod_desp_stock.php"); ?> </div>
<div class="col-lg-6"><?php include("packages/rake_ldg_time.php"); ?> </div>
</div>
</div>

 </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="myapp.js"></script>
  </body>
</html>
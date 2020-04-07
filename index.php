<?php
include_once ("../test/DB_Connect/components.php");
include_once ("../test/DB_Connect/operation.php");

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/fe77521a69.js" crossorigin="anonymous"></script>
    <title>PPC Data Management & Reporting System!</title>
  </head>
  <body>
  <?php include("../test/DB_Connect/nav.php"); ?>
 <main>
 <div class="container text-center">
 <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-database"></i>PPC Data Management & Reporting System!</h1>
 
 <form action="" method="post">
<div class="d-flex justify-content-center">
<div class="row"> 
<div class="col-md-6 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date1", "date1",""); ?> </div>
<div class="col-md-6 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date2", "date2",""); ?> </div>
</div></div>
<?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","mth_despatch","data-toggle='tooltip' data-placement='bottom' title='Monthly Despatch Qty'"); ?>
</form>


 <form action="" method="post">
<div class="d-flex justify-content-center">
<div class="row"> 
<div class="col-md-6 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date1", "date1",""); ?> </div>
<div class="col-md-6 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date2", "date2",""); ?> </div>
</div></div>
<?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","custom_rake_dist","data-toggle='tooltip' data-placement='bottom' title='Custom Rake Distribution'"); ?>
</form>
</div>
<!--  Start of rake distribution -->
<div class="container-fluid qty_despatch justify-content-center">
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

<!-- Rake loading Time -->
<div class="col-lg-8"></div>



 </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="myapp.js"></script>
  </body>
</html>
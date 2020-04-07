<?php
include_once ("../test/DB_Connect/components.php");
include_once ("../test/DB_Connect/mth_operation.php");

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
  
 <main>
 <?php include("../test/DB_Connect/nav.php"); ?>
 <div class="container text-center">
 <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-database"></i>PPC Data Management & Reporting System!</h1>
 </div>
 <form action="" method="post">
<div class="d-flex justify-content-center">
<div class="row"> 
<div class="col-md-12 input-group" ><?php inputElement("","text","yyyymm", "yymm",""); ?> </div>
</div>
<?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","on_mth_mines","data-toggle='tooltip' data-placement='bottom' title='Monthly Despatch Qty'"); ?>
</div>
</form>



<div class="col-lg-12"><?php include("packages/on_mth_mines_despatch.php"); ?> </div>
<div class="col-lg-12"><?php include("packages/on_mth_mines_production.php"); ?> </div>
<div class="col-lg-12"><?php include("packages/on_mth_mines_romob.php"); ?> </div>
 </main>
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="myapp.js"></script>
  </body>
</html>
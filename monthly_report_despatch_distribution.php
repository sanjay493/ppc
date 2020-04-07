<?php
include_once ("../test/DB_Connect/components.php");
include_once ("../test/DB_Connect/mth_operation.php");
include_once("../test/packages/on_mth_Iron_ore_despatch_distribution.php");

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
<div class="col-md-12 input-group" ><?php inputElement("","text","yyyymm", "yymm",""); ?> </div>
</div>
<?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","monthly_report_despatch_distribution","data-toggle='tooltip' data-placement='bottom' title='Monthly Despatch Qty'"); ?>
</div>
</form>
<div class="rake_dist">
<h4 class="text-center"> Monthly Despatch Distribution Plant Wise</h4>

<?php 
if(isset($_POST['monthly_report_despatch_distribution']))
      {
        
        $cust =array("BSL", "DSP", "RSP","ISP", "BSP","SALE");
        $yymm =textboxValue('yymm');
        for($i=0; $i<=5; $i++){
       plantdistribution($yymm,$cust[$i]);
        }
      }?>
</div>




  



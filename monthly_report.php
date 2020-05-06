<?php
include_once ("../test/DB_Connect/operation.php");

include_once("../test/packages/on_mth_Iron_ore_despatch_distribution.php");

?>
<?php include("../test/DB_Connect/header.php"); ?>
 <form action="" method="post">
<div class="d-flex justify-content-center">
<div class="row"> 
<div class="col-md-12 input-group" ><?php inputElement("","text","YYYYMM", "yymm",""); ?> </div>
</div>
<?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","on_mth_mines","data-toggle='tooltip' data-placement='bottom' title='Monthly Despatch Qty'"); ?>
</div>
</form>
<?php
if(isset($_POST['on_mth_mines'])){
$yymm =textboxValue('yymm');}
else {$yymm = '20203';}

$monthNum = (int)substr($yymm,4,2); 
// Create date object to store the DateTime format 
$dateObj = DateTime::createFromFormat('!m', $monthNum); 
// Store the month name to variable 
$monthName = $dateObj->format('F');      
// Display output 
?>
<div class="col-lg-12"><?php include("packages/on_mth_mines_production.php"); ?> </div>
<div class="col-lg-12"><?php include("packages/on_mth_mines_despatch.php"); ?> </div>
<div class="col-lg-12"><?php include("packages/on_mth_mines_romob.php"); ?> </div>
<div class="col-lg-12"><?php include("packages/on_mth_mines_flux.php"); ?> </div>


<div class="container-fluid">
<h4 class="text-center"> Monthly Despatch Distribution Plant Wise</h4>

<?php
        $cust =array("BSL", "DSP", "RSP","ISP", "BSP","SALE");
        $yymm =textboxValue('yymm');
        for($i=0; $i<=5; $i++){
       plantdistribution($yymm,$cust[$i]);
        }
  ?>
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
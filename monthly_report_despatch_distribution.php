<?php
include_once("../test/packages/on_mth_Iron_ore_despatch_distribution.php");
?>

<?php include("../test/DB_Connect/header.php"); ?>
<div>
<div class="container">
   <form action="" method="post">
<div class="row justify-content-center">
 <div class="col-md-6" ><?php inputElement("","text","YYYYMM", "yymm",""); ?> </div>
 <div class="col-md-6" ><?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","monthly_report_despatch_distribution","data-toggle='tooltip' data-placement='bottom' title='Monthly Despatch Qty'"); ?>
</div></div>
</form>
</div>

<div class="container-fluid">
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
</div>
    </main>
</body>
</html>

  



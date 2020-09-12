<?php include("../test/DB_Connect/header.php"); 
include_once ("../test/DB_Connect/operation.php");

           include_once("../test/packages/on_mth_Iron_ore_despatch_distribution.php");
           include_once("../test/packages/on_mth_Iron_ore_despatch_distribution_all.php");


?>



<!--  Monthly Rake Loading Time -->
<div class="container qty_despatch justify-content-center">




<div class="d-flex justify-content-center">
        <form action="" method="post">
                <div class="row justify-content-center"> 
                              <div class="col-md-6 input-group" ><?php inputElement("","text","yyyymm1", "yyyymm1",""); ?> </div>
                              <div class="col-md-6 input-group" ><?php inputElement("","text","yyyymm2", "yyyymm2",""); ?> </div>
                              <div class="col-md-6 input-group" ><?php inputElement("","text","plant1", "plant1",""); ?> </div>
                </div>
              <div class="row justify-content-center">  <?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","mth_cust_desp","data-toggle='tooltip' data-placement='bottom' title='Monthly Customer Despatch'"); ?></div>
         </form>
</div>

<?php
if(isset($_POST['mth_cust_desp'])){
  $yymm1 = textboxValue('yyyymm1');
    $yymm2 = textboxValue('yyyymm2');
   $cust = textboxValue('plant1');

   if($yymm2==""){
    $yymm2=(int)date('Ym');
  }
  $months= month_list( $yymm1,$yymm2);

   for($i=0; $i<COUNT($months); $i++){
     if($cust==""){
    plantdistribution_all($months[$i]);
     }else{
      plantdistribution($months[$i],$cust);
     }
     }
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
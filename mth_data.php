<?php include("../test/DB_Connect/header.php"); ?>



<!--  Monthly Rake Loading Time -->
<div class="container qty_despatch justify-content-center">

<?php
 include("packages/rake_ldg_time_mth.php");
 
$yymm_list="'201704','201705','201706','201707','201708','201709','201710','201711','201712','201801','201802','201803'";
$yymm_list1="'201804','201805','201806','201807','201808','201809','201810','201811','201812','201901','201902','201903'";
$yymm_list2="'201904','201905','201906','201907','201908','201909','201910','201911','201912','202001','202002','202003'";
$yymm_list3="'202004','202005','202006','202007','202008','202009','202010','202011','202012','202101','202102','202103'";
$yymm1='201704';
$yymm2='201803';
$yymm3='201804';
$yymm4='201903';
$yymm5='201904';
$yymm6='202003';
$yymm7='202004';
$yymm8='202103';

?>
<div><?php rake_time_mth($yymm7, $yymm8, $yymm_list3); ?></div>
<div><?php rake_time_mth($yymm5, $yymm6, $yymm_list2); ?></div>

<div><?php rake_time_mth($yymm3, $yymm4, $yymm_list1); ?></div>
<div><?php rake_time_mth($yymm1, $yymm2, $yymm_list); ?></div>

<div class="d-flex justify-content-center">
        <form action="" method="post">
                <div class="row justify-content-center"> 
                              <div class="col-md-6 input-group" ><?php inputElement("","text","yyyymm1", "yyyymm1",""); ?> </div>
                              <div class="col-md-6 input-group" ><?php inputElement("","text","yyyymm2", "yyyymm2",""); ?> </div>
                              <div class="col-md-6 input-group" ><?php inputElement("","text","mines1", "mines1",""); ?> </div>
                </div>
              <div class="row justify-content-center">  <?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","custom_mth","data-toggle='tooltip' data-placement='bottom' title='Custom Rake Distribution'"); ?></div>
         </form>
</div>

<div class="col-lg-12"><?php include("packages/prod_desp_stock_mth.php"); ?></div>

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
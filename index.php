


<?php
include("../test/DB_Connect/header.php"); 




$result1=maxDaily("unit, rpt_date, MAX(dept_lump+lump_darea+lump_p) as maxItem", "u_pr_dly");
$result2=maxDaily("unit, rpt_date, MAX(dept_fines+fines_darea+fines_p) as maxItem", "u_pr_dly");
$result3=maxDaily("unit, rpt_date, MAX(dept_lump+lump_darea+lump_p+dept_fines+fines_darea+fines_p) as maxItem", "u_pr_dly");
$result4=maxDaily("unit, rpt_date, MAX(l_qty) as maxItem", "mines_desppatch");
$result5=maxDaily("unit, rpt_date, MAX(f_qty) as maxItem", "mines_desppatch");
$result6=maxDaily("unit, rpt_date, MAX(l_qty+f_qty) as maxItem", "mines_desppatch");
$result7=maxDaily("unit, rpt_date, MAX(drill) as maxItem", "u_pr_dly");
$result8=maxDaily("unit, rpt_date, MAX(dept_rm+cont_rm_fg+cont_rm_darea+cont_rm_p) as maxItem", "u_pr_dly");
$result9=maxDaily("unit, rpt_date, MAX(dept_ob+cont_ob_fg+cont_ob_darea+cont_ob_p) as maxItem", "u_pr_dly");
$result10=maxDaily("unit, rpt_date, MAX(dept_rm+cont_rm_fg+cont_rm_darea+cont_rm_p+dept_ob+cont_ob_fg+cont_ob_darea+cont_ob_p) as maxItem", "u_pr_dly");


$comm_list1="'L','F','RM','OB','DR'";
$comm_list2="'L','F'";
$result_mth1=maxMthly("u_pr_mth",$comm_list1);
$result_mth2=maxMthly( "u_ds_mth", $comm_list2);
$mines=array("Kiriburu", "Meghahatuburu","Bolani", "Barsua","Taldih","Kalta","Gua","Chiria");




?>
<div class="container-fluid justify-content-center">
<div class="row">
<div class="col-lg-4"><?php include("mines_trends.php"); ?> </div>

</div>
</div>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
        
        <div class="carousel-inner">
       <?php  for($i=0; $i<8; $i++){?>
          <div class="carousel-item <?php if($i==0){echo "active";} else{echo " ";}?>">
            
<div class="container">
    <h2><?php echo $mines[$i]; ?></h2>
<div class="row">
 
<div class="legend col-md-2 mt-3 mb-3 pr-1 custom_legend">
                  <div class="lump header">Lists</div>
                  <h4 class="txtvertical textP">Production</h4>
                  <h4 class="txtvertical textD">Despatch</h4>
                  <h4 class="txtvertical textE">Excavation</h4>
                  <div class="lump">Lump</div>
                  <div class="lump">Fines</div>
                  <div class="lump">Total</div>
                  <div class="lump">Lump</div>
                  <div class="lump">Fines</div>
                  <div class="lump">Total</div>
                  <div class="lump">Drill</div>
                  <div class="lump">OB</div>
                  <div class="lump">ROM</div>
                  <div class="lump">Excavation</div>
    </div>
    <div class="legend col-md-2 mt-3 mb-3 pr-1">
                      <div class="lump header">Daily</div>
                        <div class="lump"><?php echo $result1[$i]; ?><br><span><?php echo $result1[$i+8]; ?></span></div>
                        <div class="lump"><?php echo $result2[$i]; ?><br><span><?php echo $result2[$i+8]; ?></span></div>
                        <div class="lump"><?php echo $result3[$i]; ?><br><span><?php echo $result3[$i+8]; ?></span></div>
                        <div class="lump"><?php echo $result4[$i]; ?><br><span><?php echo $result4[$i+8]; ?></span></div>
                        <div class="lump"><?php echo $result5[$i]; ?><br><span><?php echo $result5[$i+8]; ?></span></div>
                        <div class="lump"><?php echo $result6[$i]; ?><br><span><?php echo $result6[$i+8]; ?></span></div>
                        <div class="lump"><?php echo $result7[$i]; ?><br><span><?php echo $result7[$i+8]; ?></span></div>
                        <div class="lump"><?php echo $result8[$i]; ?><br><span><?php echo $result8[$i+8]; ?></span></div>
                        <div class="lump"><?php echo $result9[$i]; ?><br><span><?php echo $result9[$i+8]; ?></span></div>
                        <div class="lump"><?php echo $result10[$i]; ?><br><span><?php echo $result10[$i+8]; ?></span></div>
      </div>
      <div class="legend col-md-2 mt-3 mb-3 pr-1">
                          <div class="lump header">Monthly</div>
                        <div class="lump"><?php echo $result_mth1[0][$i]; ?><br><span><?php echo monthName_yymm($result_mth1[0][$i+8])."-".substr($result_mth1[0][$i+8],0,4); ?></span></div>
                        <div class="lump"><?php echo $result_mth1[1][$i]; ?><br><span><?php echo monthName_yymm($result_mth1[1][$i+8])."-".substr($result_mth1[1][$i+8],0,4);; ?></span></div>
                        <div class="lump">-<br><span>-</span></div>
                        <div class="lump"><?php echo $result_mth2[0][$i]; ?><br><span><?php echo monthName_yymm($result_mth2[0][$i+8])."-".substr($result_mth2[0][$i+8],0,4); ?></span></div>
                        <div class="lump"><?php echo $result_mth2[1][$i]; ?><br><span><?php echo monthName_yymm($result_mth2[1][$i+8])."-".substr($result_mth2[1][$i+8],0,4); ?></span></div>
                        <div class="lump">-<br><span>-</span></div>
                        <div class="lump"><?php echo $result_mth1[4][$i]; ?><br><span><?php echo monthName_yymm($result_mth1[4][$i+8])."-".substr($result_mth1[4][$i+8],0,4); ?></span></div>
                        <div class="lump"><?php echo $result_mth1[3][$i]; ?><br><span><?php echo monthName_yymm($result_mth1[3][$i+8])."-".substr($result_mth1[3][$i+8],0,4); ?></span></div>
                        <div class="lump"><?php echo $result_mth1[2][$i]; ?><br><span><?php echo monthName_yymm($result_mth1[2][$i+8])."-".substr($result_mth1[2][$i+8],0,4); ?></span></div>
                        <div class="lump">-<br><span>-</span></div>
        </div>
 
            <div class="legend col-md-2 mt-3 mb-3 pr-1">
                                <div class="lump header">Fin.Yr</div>
                                <div class="lump">Lump</div>
                                <div class="lump">Fines</div>
                                <div class="lump">Total</div>
                                <div class="lump">Lump</div>
                                <div class="lump">Fines</div>
                                <div class="lump">Total</div>
                                <div class="lump">Drill</div>
                                <div class="lump">OB</div>
                                <div class="lump">ROM</div>
                                <div class="lump">Excavation</div>
                </div>
                <div class="legend col-md-2 mt-3 mb-3 pr-1">
                                    <div class="lump header">Cal Yr</div>
                                    <div class="lump">Lump</div>
                                    <div class="lump">Fines</div>
                                    <div class="lump">Total</div>
                                    <div class="lump">Lump</div>
                                    <div class="lump">Fines</div>
                                    <div class="lump">Total</div>
                                    <div class="lump">Drill</div>
                                    <div class="lump">OB</div>
                                    <div class="lump">ROM</div>
                                    <div class="lump">Excavation</div>
                    </div>

</div>
 </div>
</div>
       <?php }?>
</div>

</div>


 </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="myapp.js"></script>
    <link rel="stylesheet" href="carousel.css">

    <script>


</script>
  </body>
</html>
<?php
$column="lump_darea+lump_p+dept_lump";
$column1="lump_darea+lump_p+dept_lump+fines_darea+fines_p+dept_fines";
$on_date_L=on_date_production("unit, SUM($column) as Total","u_pr_dly", "(CURDATE()-1)");
$weeklyTrend=trend_analysis("unit, SUM($column)/7 as Avg","u_pr_dly", "(CURDATE()-8)","(CURDATE()-1)");
$thirtyDaysTrend=trend_analysis("unit, SUM($column)/30 as Avg","u_pr_dly", "(CURDATE()-31)","(CURDATE()-1)");
$FiftyTwoDaysAvg=trend_analysis("unit, SUM($column)/52 as Avg","u_pr_dly", "(CURDATE()-53)","(CURDATE()-1)");
$MonthlyTrend=trend_analysis("unit, SUM($column)/DAYOFMONTH(CURDATE()-1) as Avg","u_pr_dly", "DATE_FORMAT(CURDATE() ,'%Y-%m-01')","(CURDATE()-1)");
//$LastYrMonthlyTrend=trend_analysis("unit, SUM($column)/DAYOFMONTH(CURDATE()) as Avg","u_pr_dly", "(DATEADD(month, DATEDIFF(month, 0, getdate())-12, 0) + 1)","(DATEADD(month, DATEDIFF(month, 0, getdate())-11, 0) + 1)");
// $lump_Avg= trend_analysis('lump_darea+lump_p+dept_lump');
// $prodn_Avg= trend_analysis('');

$mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");

?>

<div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
        
        <div class="carousel-inner">
       <?php  for($i=0; $i<8; $i++){?>
          <div class="carousel-item <?php if($i==0){echo "active";} else{echo " ";}?>">
          
          
<div class="container md-8">
    <h2><?php echo $mines[$i]; ?></h2>
<div class="row">

         <div class="col-md-5 mt-3 mb-3 pr-1">
                  <div class="lump header">Compare Prodn with </div>
                  <div class="lump">Last 7 Days Avg</div>
                  <div class="lump">Last 30 Days Avg</div>
                  <div class="lump">Last 52 Days Avg</div>
                  <div class="lump">Current Month Avg</div>
                  <div class="lump">Current Month Last Year </div>
                  <div class="lump">Highest Ever</div>
    </div>
    <div class="col-md-3 mt-3 mb-3 pr-1">
                <div class="lump header">On Date</div>
                <div class="lump"><?php echo growth_precentage($on_date_L[$i], $weeklyTrend[$i]); ?></div>
                <div class="lump"><?php echo growth_precentage($on_date_L[$i], $thirtyDaysTrend[$i]); ?></div>
                <div class="lump"><?php echo growth_precentage($on_date_L[$i], $FiftyTwoDaysAvg[$i]); ?></div>
                <div class="lump"><?php echo growth_precentage($on_date_L[$i], $MonthlyTrend[$i]); ?></div>
                <div class="lump"><?php echo growth_precentage($on_date_L[$i], $weeklyTrend[$i]); ?></div>
                <div class="lump"><?php echo growth_precentage($on_date_L[$i], $weeklyTrend[$i]); ?></div>
       </div>
       <div class="col-md-3 mt-3 mb-3 pr-1">
                <div class="lump header">On Monthly</div>
                <div class="lump"><?php echo growth_precentage($on_date_L[$i], $weeklyTrend[$i]); ?></div>
                <div class="lump"><?php echo growth_precentage($on_date_L[$i], $thirtyDaysTrend[$i]); ?></div>
                <div class="lump"><?php echo growth_precentage($on_date_L[$i], $FiftyTwoDaysAvg[$i]); ?></div>
                <div class="lump"><?php echo growth_precentage($on_date_L[$i], $MonthlyTrend[$i]); ?></div>
                <div class="lump"><?php echo growth_precentage($on_date_L[$i], $weeklyTrend[$i]); ?></div>
                <div class="lump"><?php echo growth_precentage($on_date_L[$i], $weeklyTrend[$i]); ?></div>
       </div>

</div>
 </div>
</div>
       <?php }?>

</div>
</div>

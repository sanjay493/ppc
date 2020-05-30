<?php
include_once ("../DB_Connect/components.php");
include_once ("../DB_Connect/operation.php");
include_once ("../DB_Connect/mth_operation.php");

// $date = strtotime(20200415);
// $weekly =strtotime("-7 day", $date);
// $thirty_day=strtotime("-30 day", $date);
// $fifty_two_days=strtotime("-52 day", $date);
// $first_day_mth=strtotime('first day of this month', time());
// $first_date_lastmth = strtotime('first day of previous month', time());
// $last_date_lastmth = strtotime('last day of previous month', time());
// echo date('M d, Y', $date);
// echo date('M d, Y', $weekly);;
// echo date('M d, Y', $thirty_day);
// echo date('M d, Y',$fifty_two_days);
// echo date('M d, Y',$first_day_mth);
// echo date('M d, Y',$first_date_lastmth);
// echo date('M d, Y',$last_date_lastmth);
// echo $last_date_lastmth;

// $sql_date = date("Y-m-d H:i:s",strtotime(str_replace('/','-',$date)));

// $sql_weekly = date ("Y-m-d", strtotime($weekly));

$lump_Avg= trend_analysis('lump_darea+lump_p+dept_lump');
//$prodn_Avg= trend_analysis('lump_darea+lump_p+dept_lump+fines_darea+fines_p+dept_fines');

echo '<tr>';
//if()

echo '<td>></td>';
$mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
$attri=array("WeeklyAvg","ThirtyDaysAvg", "FiftyTwoDaysAvg", "MonthlyAvg");
for($i=0; $i<count($mines); $i++){
  for($j=0; $j<count($attri); $j++){
       if($result[$i][$j]==$mines[$i])
}}


Array ( [0] => Array ( [unit] => BAR [WeeklyAvg] => 277.2857 )
             [1] => Array ( [unit] => BAR [ThirtyDaysAvg] => 26627.8333 ) 
             [2] => Array ( [unit] => BOL [ThirtyDaysAvg] => 94576.7333 ) 
             [3] => Array ( [unit] => KAL [ThirtyDaysAvg] => 6684.5667 ) 
             [4] => Array ( [unit] => KRB [ThirtyDaysAvg] => 37171.0000 ) 
             [5] => Array ( [unit] => MBR [ThirtyDaysAvg] => 34718.7333 ) 
             [6] => Array ( [unit] => TAL [ThirtyDaysAvg] => 13768.9000 ) 
             [7] => Array ( [unit] => BAR [FiftyTwoDaysAvg] => 15362.2115 ) 
             [8] => Array ( [unit] => BOL [FiftyTwoDaysAvg] => 54563.5000 ) 
             [9] => Array ( [unit] => KAL [FiftyTwoDaysAvg] => 3856.4808 ) 
             [10] => Array ( [unit] => KRB [FiftyTwoDaysAvg] => 21444.8077 ) 
             [11] => Array ( [unit] => MBR [FiftyTwoDaysAvg] => 20030.0385 ) 
             [12] => Array ( [unit] => TAL [FiftyTwoDaysAvg] => 7943.5962 ) 
             [13] => Array ( [unit] => BAR [MonthlyAvg] => 221.9091 ) ) >

?>




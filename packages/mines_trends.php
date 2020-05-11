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
$prodn_Avg= trend_analysis('lump_darea+lump_p+dept_lump+fines_darea+fines_p+dept_fines');




?>




<?php

include_once ("../test/DB_Connect/components.php");
include_once ("../test/DB_Connect/operation.php");
?>
<form action="" method="post">
<div class="d-flex justify-content-center">
<div class="row"> 
<div class="col-md-6 input-group" ><?php inputElement("","text","Customer", "cust",""); ?> </div>
<div class="col-md-6 input-group" ><?php inputElement("","text","YYYYMM", "yymm",""); ?> </div>
</div></div>
<?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","test","data-toggle='tooltip' data-placement='bottom' title='Monthly Despatch Qty'"); ?>
</form>

<?php
if(isset($_POST['test'])){
        $cust = 'BSL';
        $yymm ='202003';
        $lyr_mth =strval((int)substr($yymm,0,4)-1).substr($yymm,4,2);
        $lyr_mth =strval((int)substr($yymm,0,4)-1).substr($yymm,4,2);
        if((int)substr($yymm,4,2) <=3){
            $start_mth_cyr =strval((int)substr($yymm,0,4)-1).'04';
            $start_mth_lyr =strval((int)substr($yymm,0,4)-2).'04';
          }
         else{
          $start_mth_cyr =substr($yymm,0,4).'04';
          $start_mth_lyr =strval((int)substr($yymm,0,4)-1).'04';
         }
        $table ="u_ds_plan";
        $column ="SUM(plan_qty) as";
         $condition ="yymm<='$yymm' AND cust='$cust'";
         $condition1= "(yymm>='$start_mth_lyr' AND yymm<='$lyr_mth') AND cust='$cust'";
         $condition2= "(yymm>='$start_mth_cyr' AND yymm<='$yymm') AND cust='$cust'";
         $groupbycondition ="unit, comm";
         $comm=array("L", "F", "LS");
        $result= sqlSelect( $column, $table, $condition2,$groupbycondition, $comm);

    //  print_r($result);
}

function sqlSelect($column, $table, $condition,$groupbycondition,$comm){
  $sql ="SELECT unit, comm, ". $column ." Qty FROM `" . $table . "` WHERE " . $condition." GROUP BY " .$groupbycondition;
  //print_r($sql);
  $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
  $result = mysqli_query($GLOBALS['con'], $sql ); 
  //  8 Iron Ore mines 1 Flux Mines and Total of Iron Ore Mines; Total for flux is also considered 
  $tempArray =array_fill(0, 19,0);
  $comm=$comm;
 //print_r($result);
 if($sql){
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
    //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
          if($row['comm']==$comm[2]){
            $tempArray[18]=+$row['Qty'];  
          }else{
              for ($i=0; $i<=count($comm)-2; $i++){
             // $i=0 for Lump, $i=1 for Fines, $i=2 for Limestone
             if($row['comm']==$comm[$i]){
            for($j=0; $j<=7;$j++){
              if ( $mines[$j]==$row['unit'] ){  
                  $tempArray[$j+$i*9]=+$row['Qty'];  
                  $tempArray[(($i*9)+8)]=+$row['Qty']; 
           }}}}
          }
              }          
}}

else{     echo "Error: " .$sql. "<br>" . $GLOBALS['con']->error; }
print_r($tempArray);
// return $tempArray;


}


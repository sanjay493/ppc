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
<?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","test2","data-toggle='tooltip' data-placement='bottom' title='Monthly Despatch Qty'"); ?>
</form>

<?php
if(isset($_POST['test2'])){
       
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
        $column ="unit, comm, SUM(plan_qty) as";
         $condition ="yymm<='$yymm'";
         $condition1= "(yymm>='$start_mth_lyr' AND yymm<='$lyr_mth')";
         $condition2= "(yymm>='$start_mth_cyr' AND yymm<='$yymm')";
         $groupbycondition ="unit, comm";
         $comm=array("L", "F");
         $comm1  =array("LS");
         $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR","Total");
         $mines1=array("KTR");
        $result= sqlPRDSRM( $column, $table, $condition2,$groupbycondition, $comm1, $mines1);

    //  print_r($result);
}

    //Custom function used for Mines Production, Despatch, ROM & OB & Flux Production & Despatch
    function sqlPRDSRM($column, $table, $condition2,$groupbycondition,$comm, $mines){
      $sql ="SELECT ". $column ." Qty FROM `" . $table . "` WHERE " . $condition2." GROUP BY " .$groupbycondition;
      print_r($sql);
      $result = mysqli_query($GLOBALS['con'], $sql ); 
      //  8 Iron Ore mines 1 Flux Mines and Total of Iron Ore Mines; Total for flux is also considered 
      $tempArray =array_fill(0, count($comm)*count($mines), 0);
      
      if($sql){
     //print_r($result);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
        //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
             
                  for ($i=0; $i<=count($comm)-1; $i++){
                 // $i=0 for Lump, $i=1 for Fines, $i=2 for Limestone
                 if($row['comm']==$comm[$i]){
                for($j=0; $j<=count($mines)-1;$j++){
                  if ( $mines[$j]==$row['unit'] ){  
                      $tempArray[$j+($i*(count($mines)+1))]=+$row['Qty'];      
                      $tempArray[((count($mines)-1)+($i*(count($mines))))]=$tempArray[((count($mines)-1)+($i*(count($mines))))]+$row['Qty'];      
               }}}
              
              }
              }
                  }          
    }
    else{     echo "Error: " . "<br>" . $GLOBALS['con']->error; }
   print_r($tempArray);
    return $tempArray;
    }
    
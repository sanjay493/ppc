<form action="" method="post">
<div class="d-flex justify-content-center">
<div class="row"> 
<div class="col-md-6 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date1", "date1",""); ?> </div>
<div class="col-md-6 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date2", "date2",""); ?> </div>
</div></div>
<?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","mth_despatch","data-toggle='tooltip' data-placement='bottom' title='Monthly Despatch Qty'"); ?>
</form>

<?php




function sqlSelect($column, $table, $condition,$groupbycondition,$comm){
      $sql ="SELECT unit, comm, ". $column ." Qty FROM `" . $table . "` WHERE " . $condition." GROUP BY " .$groupbycondition;
    


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
        $table1 ="u_ds_plan";
        $table2 ="u_ds_mth";
        $column ="unit, comm, SUM(plan_qty) as";
         $condition1 ="yymm='$yymm'";
         $condition2 ="yymm='$lyr_mth'";
         $condition3= "(yymm>='$start_mth_cyr' AND yymm<='$yymm')";
         $condition4= "(yymm>='$start_mth_lyr' AND yymm<='$lyr_mth')";

         $groupbycondition ="unit, comm";
         $comm=array("L", "F");
         $comm1  =array("LS");
         $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR","Total");
         $mines1=array("KTR");
        $results1= sqlPRDSRM( $column, $table1, $condition1,$groupbycondition, $comm, $mines);
        $results2=sqlPRDSRM( $column, $table2, $condition1,$groupbycondition, $comm, $mines);
        $results3=sqlPRDSRM( $column, $table2, $condition2,$groupbycondition, $comm, $mines);
        $results4=sqlPRDSRM( $column, $table1, $condition3,$groupbycondition, $comm, $mines);
        $results5=sqlPRDSRM( $column, $table2, $condition3,$groupbycondition, $comm, $mines);
        $results6=sqlPRDSRM( $column, $table2, $condition4,$groupbycondition, $comm, $mines);
           


           
//Custom Report 1

function getRakeLump(){

    $date1 = textboxValue('date1');
    $date2 = textboxValue('date2');
    $destination =array("BSL","DSP","RSP","ISP", "BSP","SALE");
    $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
    $rake= array_fill(0,6,array_fill(0,8,0));  
    //$l_qty= array_fill(0,6,array_fill(0,8,0));  
  // print_r($rake);
    // print_r($destination);
    // print_r($mines);
    $sql = "SELECT cust, unit, SUM(wg_l/(wg_l+wg_f)) AS l_rakes FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY cust, unit";
    // $sql_l_qty = "SELECT cust, unit,SUM(l_qty) AS l_qty FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY cust, unit";
    // $sql_f_qty = "SELECT cust, unit,SUM(f_qty) AS rakes FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY cust, unit";
   

    $result = mysqli_query( $GLOBALS['con'],  $sql);
    if(mysqli_num_rows($result)>0){
     
       while($row=mysqli_fetch_assoc($result)){
               //echo $row['cust']." " .$row['unit']. " " .$row['rakes']. " <br />";
                for($i=0; $i<=5; $i++){
                  for($j=0; $j<=7;$j++){
                    if ($destination[$i]==$row['cust'] && $mines[$j]==$row['unit']){
                      $rake[$i][$j] =+$row['l_rakes'];
                    }
                  }
                }

            }  
            
            return $rake;     
    }

}


//Fines Rake Function
function getRakeFines(){

  $date1 = textboxValue('date1');
  $date2 = textboxValue('date2');
  $destination =array("BSL","DSP","RSP","ISP", "BSP","SALE");
  $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
  $rake= array_fill(0,6,array_fill(0,8,0));  
  //$l_qty= array_fill(0,6,array_fill(0,8,0));  
// print_r($rake);
  // print_r($destination);
  // print_r($mines);
  $sql = "SELECT cust, unit, SUM(wg_f/(wg_l+wg_f)) AS f_rakes FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY cust, unit";
  // $sql_l_qty = "SELECT cust, unit,SUM(l_qty) AS l_qty FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY cust, unit";
  // $sql_f_qty = "SELECT cust, unit,SUM(f_qty) AS rakes FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY cust, unit";
 

  $result = mysqli_query( $GLOBALS['con'],  $sql);
  if(mysqli_num_rows($result)>0){
   
     while($row=mysqli_fetch_assoc($result)){
             //echo $row['cust']." " .$row['unit']. " " .$row['rakes']. " <br />";
              for($i=0; $i<=5; $i++){
                for($j=0; $j<=7;$j++){
                  if ($destination[$i]==$row['cust'] && $mines[$j]==$row['unit']){
                    $rake[$i][$j] =+$row['f_rakes'];
                  }
                }
              }

          }  
          
          return $rake;     
  }

}





// Rake Lump Quantity fetching
function getLumpDesp(){

    $date1 = textboxValue('date1');
    $date2 = textboxValue('date2');
    $destination =array("BSL","DSP","RSP","ISP", "BSP","SALE");
    $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
   // $rake= array_fill(0,6,array_fill(0,8,0));  
    $l_qty= array_fill(0,6,array_fill(0,8,0));  
  // print_r($rake);
    // print_r($destination);
    // print_r($mines);
    //$sql = "SELECT cust, unit,COUNT(cust) AS rakes FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY cust, unit";
    $sql_l_qty = "SELECT cust, unit, SUM(l_qty) AS l_qty FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY cust, unit";
  //  $sql_f_qty = "SELECT cust, unit,SUM(f_qty) AS rakes FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY cust, unit";
   
    
   // Lump Quantity distribution 
   $result_l_qty = mysqli_query( $GLOBALS['con'],  $sql_l_qty);
   if(mysqli_num_rows($result_l_qty)>0){
    
      while($row_l_qty=mysqli_fetch_assoc($result_l_qty)){
           // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
               for($i=0; $i<=5; $i++){
                 for($j=0; $j<=7;$j++){
                   if ($destination[$i]==$row_l_qty['cust'] && $mines[$j]==$row_l_qty['unit']){
                     $l_qty[$i][$j] =+$row_l_qty['l_qty'];
                   }
                 }
               }

           }  
           
           return $l_qty;     
   }

   

}


//Fines Despatch Quantity 
function getFinesDesp(){

    $date1 = textboxValue('date1');
    $date2 = textboxValue('date2');
    $destination =array("BSL","DSP","RSP","ISP", "BSP","SALE");
    $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
    // $rake= array_fill(0,6,array_fill(0,8,0));  
    $f_qty= array_fill(0,6,array_fill(0,8,0));  
  // print_r($rake);
    // print_r($destination);
    // print_r($mines);
    //$sql = "SELECT cust, unit,COUNT(cust) AS rakes FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY cust, unit";
    //$sql_l_qty = "SELECT cust, unit,SUM(l_qty) AS l_qty FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY cust, unit";
    $sql_f_qty = "SELECT cust, unit,SUM(f_qty) AS f_qty FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY cust, unit";
   

       
   // Fines Quantity distribution 
   $result_f_qty = mysqli_query( $GLOBALS['con'],  $sql_f_qty);
   if(mysqli_num_rows($result_f_qty)>0){
    
      while($row_f_qty=mysqli_fetch_assoc($result_f_qty)){
           // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
               for($i=0; $i<=5; $i++){
                 for($j=0; $j<=7;$j++){
                   if ($destination[$i]==$row_f_qty['cust'] && $mines[$j]==$row_f_qty['unit']){
                     $f_qty[$i][$j] =+$row_f_qty['f_qty'];
                   }
                 }
               }

           }  
           
           return $f_qty;     
   }

   

}



function on_mth_c_distrib(){
  $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR", "Total");
      $cust = 'BSL';
      $yymm = textboxValue('yymm');
      $lyr_mth =strval((int)substr($yymm,0,4)-1).substr($yymm,4,2);
      $romobArray =array_fill(0, 9, array_fill(0,12, 0));
      // Lump  & Fines App for the month
     $sql_mth_l_p ="SELECT unit, comm, plan_qty   FROM u_ds_plan WHERE ( yymm='$yymm' AND cust='$cust') GROUP BY unit,comm";
     $result=mysqli_query($GLOBALS['con'],$sql_mth_l_p);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
        if( $row['comm']=='L'){
               for($j=0; $j<=7;$j++){
                   if ( $mines[$j]==$row['unit'] ){  
                       $romobArray[$j][0] =+$row['plan_qty'];   
                       $romobArray[8][0]=$romobArray[8][0]+$row['plan_qty']; 
                   }}}
                   else{
                    for($j=0; $j<=7;$j++){
                      if ( $mines[$j]==$row['unit'] ){ 
                        $romobArray[$j][6] =+$row['plan_qty'];   
                        $romobArray[8][6]=$romobArray[8][6]+$row['plan_qty']; 
                   }
                    }
                  } }          
    }else{     echo "Error: " . $sql_mth_l_p . "<br>" . $GLOBALS['con']->error; }

    
      // Lump & Fines actual  for the month
    $sql_mth_l ="SELECT unit, comm, act_qty  FROM u_ds_mth WHERE (yymm='$yymm' AND cust='$cust') GROUP BY  unit, comm";
    $result=mysqli_query($GLOBALS['con'],$sql_mth_l);
     if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
        if( $row['comm']=='L'){
          for($j=0; $j<=7;$j++){
              if ( $mines[$j]==$row['unit'] ){  
                  $romobArray[$j][1] =+$row['act_qty'];   
                  $romobArray[8][1]=$romobArray[8][1]+$row['act_qty']; 
              }}}
              else{
               for($j=0; $j<=7;$j++){
                 if ( $mines[$j]==$row['unit'] ){ 
                   $romobArray[$j][7] =+$row['act_qty'];   
                   $romobArray[8][7]=$romobArray[8][7]+$row['act_qty']; 
              }
               }
             } }    
   }else{     echo "Error: " . $sql_mth_l . "<br>" . $GLOBALS['con']->error; }

      // CPLY Cumulative romob 
   $sql_lyr_mth_l ="SELECT unit, comm, act_qty  FROM u_ds_mth WHERE (yymm='$lyr_mth' AND cust='$cust') GROUP BY  unit, comm";
   $result=mysqli_query($GLOBALS['con'],$sql_lyr_mth_l);
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
      //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
      if( $row['comm']=='L'){
        for($j=0; $j<=7;$j++){
            if ( $mines[$j]==$row['unit'] ){  
                $romobArray[$j][2] =+$row['act_qty'];   
                $romobArray[8][2]=$romobArray[8][2]+$row['act_qty']; 
            }}}
            else{
             for($j=0; $j<=7;$j++){
               if ( $mines[$j]==$row['unit'] ){ 
             $romobArray[$j][8] =+$row['act_qty'];   
             $romobArray[8][8]=$romobArray[8][8]+$row['act_qty']; 
            }
          }
           } }           
  }else{
   echo "Error: " . $sql_lyr_mth_l . "<br>" . $GLOBALS['con']->error;
   }
//print_r($romobArray);
 
  // Cumulative App mines wise

          $lyr_mth =strval((int)substr($yymm,0,4)-1).substr($yymm,4,2);
      if((int)substr($yymm,4,2) <=3){
        $start_mth_cyr =strval((int)substr($yymm,0,4)-1).'04';
        $start_mth_lyr =strval((int)substr($yymm,0,4)-2).'04';
      }
     else{
      $start_mth_cyr =substr($yymm,0,4).'04';
      $start_mth_lyr =strval((int)substr($yymm,0,4)-1).'04';
     }
    
      
      // App for the month
     $sql_mth_l_p ="SELECT unit, comm, SUM(plan_qty) as TApp  FROM u_ds_plan WHERE (yymm>='$start_mth_cyr' AND yymm<='$yymm')  AND cust='$cust' GROUP BY unit,comm";
     $result=mysqli_query($GLOBALS['con'],$sql_mth_l_p);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
        if( $row['comm']=='L'){
               for($j=0; $j<=7;$j++){
                   if ( $mines[$j]==$row['unit'] ){  
                       $romobArray[$j][3] =+$row['TApp'];   
                       $romobArray[8][3]=$romobArray[8][3]+$row['TApp']; 
                   }}}
                   else{
                    for($j=0; $j<=7;$j++){
                      if ( $mines[$j]==$row['unit'] ){ 
                    $romobArray[$j][9] =+$row['TApp'];   
                    $romobArray[8][9]=$romobArray[8][9]+$row['TApp']; 
                   }
                    }
                  } }          
    }else{     echo "Error: " . $sql_mth_l_p . "<br>" . $GLOBALS['con']->error; }

    
      // Lump  & Fines & TotalAct for the month
    $sql_mth_l ="SELECT unit, comm, SUM(act_qty) as Cumromob  FROM u_ds_mth WHERE (yymm>='$start_mth_cyr' AND yymm<='$yymm') AND cust='$cust' GROUP BY  unit, comm";
    $result=mysqli_query($GLOBALS['con'],$sql_mth_l);
     if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
        if( $row['comm']=='L'){
          for($j=0; $j<=7;$j++){
              if ( $mines[$j]==$row['unit'] ){  
                  $romobArray[$j][4] =+$row['Cumromob'];   
                  $romobArray[8][4]=$romobArray[8][3]+$row['Cumromob']; 
              }}}
              else{
               for($j=0; $j<=7;$j++){
                 if ( $mines[$j]==$row['unit'] ){ 
               $romobArray[$j][10] =+$row['Cumromob'];   
               $romobArray[8][10]=$romobArray[8][10]+$row['Cumromob']; 
              }
            }
             } }     
   }else{     echo "Error: " . $sql_mth_l . "<br>" . $GLOBALS['con']->error; }

      // CPLY Cumulative romob 
   $sql_lyr_mth_l ="SELECT unit, comm, SUM(act_qty) as cplyromob  FROM u_ds_mth WHERE (yymm>='$start_mth_lyr' AND yymm<='$lyr_mth') AND cust='$cust' GROUP BY  unit, comm";
   $result=mysqli_query($GLOBALS['con'],$sql_lyr_mth_l);
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
      //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
      if( $row['comm']=='L'){
        for($j=0; $j<=7;$j++){
            if ( $mines[$j]==$row['unit'] ){  
                $romobArray[$j][5] =+$row['cplyromob'];   
                $romobArray[8][5]=$romobArray[8][5]+$row['cplyromob']; 
            }}}
            else{
             for($j=0; $j<=7;$j++){
               if ( $mines[$j]==$row['unit'] ){ 
             $romobArray[$j][11] =+$row['cplyromob'];   
             $romobArray[8][11]=$romobArray[8][11]+$row['cplyromob']; 
            }
          }
           } }           
  }else{
   echo "Error: " . $sql_lyr_mth_l . "<br>" . $GLOBALS['con']->error;
   }
//print_r($romobArray);
   return $romobArray;

  }


  // Monthly Despatch Mines wise storing in an Array
##########################################################
 function on_mth_despatch(){

  // No of days calculation from the user input date rage
  $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
      $yymm = textboxValue('yymm');
      $lyr_mth =strval((int)substr($yymm,0,4)-1).substr($yymm,4,2);
      $despatchArray =array_fill(0, 9, array_fill(0,6, 0));
      // Lump  & Fines App for the month
     $sql_mth_l_p ="SELECT unit, comm, SUM(plan_qty) as TApp  FROM u_ds_plan WHERE ( yymm='$yymm') GROUP BY unit,comm";
     $result=mysqli_query($GLOBALS['con'],$sql_mth_l_p);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
        //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
        if( $row['comm']=='L'){
               for($j=0; $j<=7;$j++){
                   if ( $mines[$j]==$row['unit'] ){  
                       $despatchArray[$j][0] =+$row['TApp'];   
                       $despatchArray[8][0]=$despatchArray[8][0]+$row['TApp']; 
                   }}}
                   else{
                    for($j=0; $j<=7;$j++){
                      if ( $mines[$j]==$row['unit'] ){ 
                    $despatchArray[$j][3] =+$row['TApp'];   
                    $despatchArray[8][3]=$despatchArray[8][3]+$row['TApp']; 
                   }
                    }
                  } }          
    }else{     echo "Error: " . $sql_mth_l_p . "<br>" . $GLOBALS['con']->error; }

    
      // Lump  & Fines & TotalAct for the month
    $sql_mth_l ="SELECT unit, comm, SUM(act_qty) as CumDespatch  FROM u_ds_mth WHERE (yymm='$yymm') GROUP BY  unit, comm";
    $result=mysqli_query($GLOBALS['con'],$sql_mth_l);
     if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
        if( $row['comm']=='L'){
          for($j=0; $j<=7;$j++){
              if ( $mines[$j]==$row['unit'] ){  
                  $despatchArray[$j][1] =+$row['CumDespatch'];   
                  $despatchArray[8][1]=$despatchArray[8][1]+$row['CumDespatch']; 
              }}}
              else{
               for($j=0; $j<=7;$j++){
                 if ( $mines[$j]==$row['unit'] ){ 
               $despatchArray[$j][4] =+$row['CumDespatch'];   
               $despatchArray[8][4]=$despatchArray[8][4]+$row['CumDespatch']; 
              }
            }
             } }     
   }else{     echo "Error: " . $sql_mth_l . "<br>" . $GLOBALS['con']->error; }

      // CPLY Cumulative despatch 
   $sql_lyr_mth_l ="SELECT unit, comm, SUM(act_qty) as cplyDespatch  FROM u_ds_mth WHERE (yymm='$lyr_mth') GROUP BY  unit, comm";
   $result=mysqli_query($GLOBALS['con'],$sql_lyr_mth_l);
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
      //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
      if( $row['comm']=='L'){
        for($j=0; $j<=7;$j++){
            if ( $mines[$j]==$row['unit'] ){  
                $despatchArray[$j][2] =+$row['cplyDespatch'];   
                $despatchArray[8][2]=$despatchArray[8][2]+$row['cplyDespatch']; 
            }}}
            else{
             for($j=0; $j<=7;$j++){
               if ( $mines[$j]==$row['unit'] ){ 
             $despatchArray[$j][5] =+$row['cplyDespatch'];   
             $despatchArray[8][5]=$despatchArray[8][5]+$row['cplyDespatch']; 
            }
          }
           } }           
  }else{
   echo "Error: " . $sql_lyr_mth_l . "<br>" . $GLOBALS['con']->error;
   }
//print_r($despatchArray);
   return $despatchArray;
     
  
  }



  // Cumulative Monthly Despatch Mines wise storing in an Array
##########################################################
 function cumulative_despatch(){

  // No of days calculation from the user input date rage
  $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
      $yymm = textboxValue('yymm');
      $lyr_mth =strval((int)substr($yymm,0,4)-1).substr($yymm,4,2);
      if((int)substr($yymm,4,2) <=3){
        $start_mth_cyr =strval((int)substr($yymm,0,4)-1).'04';
        $start_mth_lyr =strval((int)substr($yymm,0,4)-2).'04';
      }
     else{
      $start_mth_cyr =substr($yymm,0,4).'04';
      $start_mth_lyr =strval((int)substr($yymm,0,4)-1).'04';
     }
    //  echo $yymm;
    //   echo $lyr_mth;
    //   echo $start_mth_cyr;
    //   echo $start_mth_lyr;
      $despatchArray =array_fill(0, 9, array_fill(0,6, 0));
      
      // Lump App for the month
     $sql_mth_l_p ="SELECT unit, comm, SUM(plan_qty) as TApp  FROM u_ds_plan WHERE (yymm>='$start_mth_cyr' AND yymm<='$yymm') GROUP BY unit,comm";
     $result=mysqli_query($GLOBALS['con'],$sql_mth_l_p);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
        //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
        if( $row['comm']=='L'){
               for($j=0; $j<=7;$j++){
                   if ( $mines[$j]==$row['unit'] ){  
                       $despatchArray[$j][0] =+$row['TApp'];   
                       $despatchArray[8][0]=$despatchArray[8][0]+$row['TApp']; 
                   }}}
                   else{
                    for($j=0; $j<=7;$j++){
                      if ( $mines[$j]==$row['unit'] ){ 
                    $despatchArray[$j][3] =+$row['TApp'];   
                    $despatchArray[8][3]=$despatchArray[8][3]+$row['TApp']; 
                   }
                    }
                  } }          
    }else{     echo "Error: " . $sql_mth_l_p . "<br>" . $GLOBALS['con']->error; }

    
      // Lump  & Fines & TotalAct for the month
    $sql_mth_l ="SELECT unit, comm, SUM(act_qty) as CumDespatch  FROM u_ds_mth WHERE (yymm>='$start_mth_cyr' AND yymm<='$yymm') GROUP BY  unit, comm";
    $result=mysqli_query($GLOBALS['con'],$sql_mth_l);
     if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
        if( $row['comm']=='L'){
          for($j=0; $j<=7;$j++){
              if ( $mines[$j]==$row['unit'] ){  
                  $despatchArray[$j][1] =+$row['CumDespatch'];   
                  $despatchArray[8][1]=$despatchArray[8][1]+$row['CumDespatch']; 
              }}}
              else{
               for($j=0; $j<=7;$j++){
                 if ( $mines[$j]==$row['unit'] ){ 
               $despatchArray[$j][4] =+$row['CumDespatch'];   
               $despatchArray[8][4]=$despatchArray[8][4]+$row['CumDespatch']; 
              }
            }
             } }     
   }else{     echo "Error: " . $sql_mth_l . "<br>" . $GLOBALS['con']->error; }

      // CPLY Cumulative despatch 
   $sql_lyr_mth_l ="SELECT unit, comm, SUM(act_qty) as cplyDespatch  FROM u_ds_mth WHERE (yymm>='$start_mth_lyr' AND yymm<='$lyr_mth') GROUP BY  unit, comm";
   $result=mysqli_query($GLOBALS['con'],$sql_lyr_mth_l);
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
      //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
      if( $row['comm']=='L'){
        for($j=0; $j<=7;$j++){
            if ( $mines[$j]==$row['unit'] ){  
                $despatchArray[$j][2] =+$row['cplyDespatch'];   
                $despatchArray[8][2]=$despatchArray[8][2]+$row['cplyDespatch']; 
            }}}
            else{
             for($j=0; $j<=7;$j++){
               if ( $mines[$j]==$row['unit'] ){ 
             $despatchArray[$j][5] =+$row['cplyDespatch'];   
             $despatchArray[8][5]=$despatchArray[8][5]+$row['cplyDespatch']; 
            }
          }
           } }           
  }else{
   echo "Error: " . $sql_lyr_mth_l . "<br>" . $GLOBALS['con']->error;
   }
//print_r($despatchArray);
   return $despatchArray;

  }


// Monthly Production Mines wise storing in an Array
##########################################################
function on_mth_production(){
  $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
      $yymm = textboxValue('yymm');
      $lyr_mth =strval((int)substr($yymm,0,4)-1).substr($yymm,4,2);
      $productionArray =array_fill(0, 9, array_fill(0,6, 0));
      // Lump  & Fines App for the month
     $sql_mth_l_p ="SELECT unit, comm, SUM(plan_qty) as TApp  FROM u_pr_plan WHERE ( yymm='$yymm') GROUP BY unit,comm";
     $result=mysqli_query($GLOBALS['con'],$sql_mth_l_p);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
        //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
        if( $row['comm']=='L'){
               for($j=0; $j<=7;$j++){
                   if ( $mines[$j]==$row['unit'] ){  
                       $productionArray[$j][0] =+$row['TApp'];   
                       $productionArray[8][0]=$productionArray[8][0]+$row['TApp']; 
                   }}}
                   else{
                    for($j=0; $j<=7;$j++){
                      if ( $mines[$j]==$row['unit'] ){ 
                    $productionArray[$j][3] =+$row['TApp'];   
                    $productionArray[8][3]=$productionArray[8][3]+$row['TApp']; 
                   }
                    }
                  } }          
    }else{     echo "Error: " . $sql_mth_l_p . "<br>" . $GLOBALS['con']->error; }

    
      // Lump  & Fines & TotalAct for the month
    $sql_mth_l ="SELECT unit, comm, SUM(act_qty) as Cumproduction  FROM u_pr_mth WHERE (yymm='$yymm') GROUP BY  unit, comm";
    $result=mysqli_query($GLOBALS['con'],$sql_mth_l);
     if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
        if( $row['comm']=='L'){
          for($j=0; $j<=7;$j++){
              if ( $mines[$j]==$row['unit'] ){  
                  $productionArray[$j][1] =+$row['Cumproduction'];   
                  $productionArray[8][1]=$productionArray[8][1]+$row['Cumproduction']; 
              }}}
              else{
               for($j=0; $j<=7;$j++){
                 if ( $mines[$j]==$row['unit'] ){ 
               $productionArray[$j][4] =+$row['Cumproduction'];   
               $productionArray[8][4]=$productionArray[8][4]+$row['Cumproduction']; 
              }
            }
             } }     
   }else{     echo "Error: " . $sql_mth_l . "<br>" . $GLOBALS['con']->error; }

      // CPLY Cumulative production 
   $sql_lyr_mth_l ="SELECT unit, comm, SUM(act_qty) as cplyproduction  FROM u_pr_mth WHERE (yymm='$lyr_mth') GROUP BY  unit, comm";
   $result=mysqli_query($GLOBALS['con'],$sql_lyr_mth_l);
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
      //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
      if( $row['comm']=='L'){
        for($j=0; $j<=7;$j++){
            if ( $mines[$j]==$row['unit'] ){  
                $productionArray[$j][2] =+$row['cplyproduction'];   
                $productionArray[8][2]=$productionArray[8][2]+$row['cplyproduction']; 
            }}}
            else{
             for($j=0; $j<=7;$j++){
               if ( $mines[$j]==$row['unit'] ){ 
             $productionArray[$j][5] =+$row['cplyproduction'];   
             $productionArray[8][5]=$productionArray[8][5]+$row['cplyproduction']; 
            }
          }
           } }           
  }else{
   echo "Error: " . $sql_lyr_mth_l . "<br>" . $GLOBALS['con']->error;
   }
//print_r($productionArray);
   return $productionArray;
     
  
  }



  // Cumulative Monthly Production Mines wise storing in an Array
##########################################################
 function cumulative_production(){

  // No of days calculation from the user input date rage
  $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
      $yymm = textboxValue('yymm');
      $lyr_mth =strval((int)substr($yymm,0,4)-1).substr($yymm,4,2);
      if((int)substr($yymm,4,2) <=3){
        $start_mth_cyr =strval((int)substr($yymm,0,4)-1).'04';
        $start_mth_lyr =strval((int)substr($yymm,0,4)-2).'04';
      }
     else{
      $start_mth_cyr =substr($yymm,0,4).'04';
      $start_mth_lyr =strval((int)substr($yymm,0,4)-1).'04';
     }
    //  echo $yymm;
    //   echo $lyr_mth;
    //   echo $start_mth_cyr;
    //   echo $start_mth_lyr;
      $productionArray =array_fill(0, 9, array_fill(0,6, 0));
      
      // Lump App for the month
     $sql_mth_l_p ="SELECT unit, comm, SUM(plan_qty) as TApp  FROM u_pr_plan WHERE (yymm>='$start_mth_cyr' AND yymm<='$yymm') GROUP BY unit,comm";
     $result=mysqli_query($GLOBALS['con'],$sql_mth_l_p);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
        //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
        if( $row['comm']=='L'){
               for($j=0; $j<=7;$j++){
                   if ( $mines[$j]==$row['unit'] ){  
                       $productionArray[$j][0] =+$row['TApp'];   
                       $productionArray[8][0]=$productionArray[8][0]+$row['TApp']; 
                   }}}
                   else{
                    for($j=0; $j<=7;$j++){
                      if ( $mines[$j]==$row['unit'] ){ 
                    $productionArray[$j][3] =+$row['TApp'];   
                    $productionArray[8][3]=$productionArray[8][3]+$row['TApp']; 
                   }
                    }
                  } }          
    }else{     echo "Error: " . $sql_mth_l_p . "<br>" . $GLOBALS['con']->error; }

    
      // Lump  & Fines & TotalAct for the month
    $sql_mth_l ="SELECT unit, comm, SUM(act_qty) as Cumproduction  FROM u_pr_mth WHERE (yymm>='$start_mth_cyr' AND yymm<='$yymm') GROUP BY  unit, comm";
    $result=mysqli_query($GLOBALS['con'],$sql_mth_l);
     if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
        if( $row['comm']=='L'){
          for($j=0; $j<=7;$j++){
              if ( $mines[$j]==$row['unit'] ){  
                  $productionArray[$j][1] =+$row['Cumproduction'];   
                  $productionArray[8][1]=$productionArray[8][1]+$row['Cumproduction']; 
              }}}
              else{
               for($j=0; $j<=7;$j++){
                 if ( $mines[$j]==$row['unit'] ){ 
               $productionArray[$j][4] =+$row['Cumproduction'];   
               $productionArray[8][4]=$productionArray[8][4]+$row['Cumproduction']; 
              }
            }
             } }     
   }else{     echo "Error: " . $sql_mth_l . "<br>" . $GLOBALS['con']->error; }

      // CPLY Cumulative production 
   $sql_lyr_mth_l ="SELECT unit, comm, SUM(act_qty) as cplyproduction  FROM u_pr_mth WHERE (yymm>='$start_mth_lyr' AND yymm<='$lyr_mth') GROUP BY  unit, comm";
   $result=mysqli_query($GLOBALS['con'],$sql_lyr_mth_l);
    if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
      //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
      if( $row['comm']=='L'){
        for($j=0; $j<=7;$j++){
            if ( $mines[$j]==$row['unit'] ){  
                $productionArray[$j][2] =+$row['cplyproduction'];   
                $productionArray[8][2]=$productionArray[8][2]+$row['cplyproduction']; 
            }}}
            else{
             for($j=0; $j<=7;$j++){
               if ( $mines[$j]==$row['unit'] ){ 
             $productionArray[$j][5] =+$row['cplyproduction'];   
             $productionArray[8][5]=$productionArray[8][5]+$row['cplyproduction']; 
            }
          }
           } }           
  }else{
   echo "Error: " . $sql_lyr_mth_l . "<br>" . $GLOBALS['con']->error;
   }
//print_r($productionArray);
   return $productionArray;

  }




  

// Monthly ROM & OB Mines wise storing in an Array
##########################################################
function on_mth_romob(){
    $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
        $yymm = textboxValue('yymm');
        $lyr_mth =strval((int)substr($yymm,0,4)-1).substr($yymm,4,2);
        $romobArray =array_fill(0, 9, array_fill(0,6, 0));
        // Lump  & Fines App for the month
       $sql_mth_l_p ="SELECT unit, comm, SUM(plan_qty) as TApp  FROM u_rm_plan WHERE ( yymm='$yymm') GROUP BY unit,comm";
       $result=mysqli_query($GLOBALS['con'],$sql_mth_l_p);
        if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
          //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
          if( $row['comm']=='L'){
                 for($j=0; $j<=7;$j++){
                     if ( $mines[$j]==$row['unit'] ){  
                         $romobArray[$j][0] =+$row['TApp'];   
                         $romobArray[8][0]=$romobArray[8][0]+$row['TApp']; 
                     }}}
                     else{
                      for($j=0; $j<=7;$j++){
                        if ( $mines[$j]==$row['unit'] ){ 
                      $romobArray[$j][3] =+$row['TApp'];   
                      $romobArray[8][3]=$romobArray[8][3]+$row['TApp']; 
                     }
                      }
                    } }          
      }else{     echo "Error: " . $sql_mth_l_p . "<br>" . $GLOBALS['con']->error; }
  
      
        // Lump  & Fines & TotalAct for the month
      $sql_mth_l ="SELECT unit, comm, SUM(act_qty) as Cumromob  FROM u_rm_mth WHERE (yymm='$yymm') GROUP BY  unit, comm";
      $result=mysqli_query($GLOBALS['con'],$sql_mth_l);
       if(mysqli_num_rows($result)>0){
         while($row=mysqli_fetch_assoc($result)){
          if( $row['comm']=='L'){
            for($j=0; $j<=7;$j++){
                if ( $mines[$j]==$row['unit'] ){  
                    $romobArray[$j][1] =+$row['Cumromob'];   
                    $romobArray[8][1]=$romobArray[8][1]+$row['Cumromob']; 
                }}}
                else{
                 for($j=0; $j<=7;$j++){
                   if ( $mines[$j]==$row['unit'] ){ 
                 $romobArray[$j][4] =+$row['Cumromob'];   
                 $romobArray[8][4]=$romobArray[8][4]+$row['Cumromob']; 
                }
              }
               } }     
     }else{     echo "Error: " . $sql_mth_l . "<br>" . $GLOBALS['con']->error; }
  
        // CPLY Cumulative romob 
     $sql_lyr_mth_l ="SELECT unit, comm, SUM(act_qty) as cplyromob  FROM u_rm_mth WHERE (yymm='$lyr_mth') GROUP BY  unit, comm";
     $result=mysqli_query($GLOBALS['con'],$sql_lyr_mth_l);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
        //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
        if( $row['comm']=='L'){
          for($j=0; $j<=7;$j++){
              if ( $mines[$j]==$row['unit'] ){  
                  $romobArray[$j][2] =+$row['cplyromob'];   
                  $romobArray[8][2]=$romobArray[8][2]+$row['cplyromob']; 
              }}}
              else{
               for($j=0; $j<=7;$j++){
                 if ( $mines[$j]==$row['unit'] ){ 
               $romobArray[$j][5] =+$row['cplyromob'];   
               $romobArray[8][5]=$romobArray[8][5]+$row['cplyromob']; 
              }
            }
             } }           
    }else{
     echo "Error: " . $sql_lyr_mth_l . "<br>" . $GLOBALS['con']->error;
     }
  //print_r($romobArray);
     return $romobArray;
       
    
    }
  
  
  
    // Cumulative Monthly romob Mines wise storing in an Array
  ##########################################################
   function cumulative_romob(){
  
    // No of days calculation from the user input date rage
    $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
        $yymm = textboxValue('yymm');
        $lyr_mth =strval((int)substr($yymm,0,4)-1).substr($yymm,4,2);
        if((int)substr($yymm,4,2) <=3){
          $start_mth_cyr =strval((int)substr($yymm,0,4)-1).'04';
          $start_mth_lyr =strval((int)substr($yymm,0,4)-2).'04';
        }
       else{
        $start_mth_cyr =substr($yymm,0,4).'04';
        $start_mth_lyr =strval((int)substr($yymm,0,4)-1).'04';
       }
      //  echo $yymm;
      //   echo $lyr_mth;
      //   echo $start_mth_cyr;
      //   echo $start_mth_lyr;
        $romobArray =array_fill(0, 9, array_fill(0,6, 0));
        
        // Lump App for the month
       $sql_mth_l_p ="SELECT unit, comm, SUM(plan_qty) as TApp  FROM u_rm_plan WHERE (yymm>='$start_mth_cyr' AND yymm<='$yymm') GROUP BY unit,comm";
       $result=mysqli_query($GLOBALS['con'],$sql_mth_l_p);
        if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
          //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
          if( $row['comm']=='L'){
                 for($j=0; $j<=7;$j++){
                     if ( $mines[$j]==$row['unit'] ){  
                         $romobArray[$j][0] =+$row['TApp'];   
                         $romobArray[8][0]=$romobArray[8][0]+$row['TApp']; 
                     }}}
                     else{
                      for($j=0; $j<=7;$j++){
                        if ( $mines[$j]==$row['unit'] ){ 
                      $romobArray[$j][3] =+$row['TApp'];   
                      $romobArray[8][3]=$romobArray[8][3]+$row['TApp']; 
                     }
                      }
                    } }          
      }else{     echo "Error: " . $sql_mth_l_p . "<br>" . $GLOBALS['con']->error; }
  
      
        // Lump  & Fines & TotalAct for the month
      $sql_mth_l ="SELECT unit, comm, SUM(act_qty) as Cumromob  FROM u_rm_mth WHERE (yymm>='$start_mth_cyr' AND yymm<='$yymm') GROUP BY  unit, comm";
      $result=mysqli_query($GLOBALS['con'],$sql_mth_l);
       if(mysqli_num_rows($result)>0){
         while($row=mysqli_fetch_assoc($result)){
          if( $row['comm']=='L'){
            for($j=0; $j<=7;$j++){
                if ( $mines[$j]==$row['unit'] ){  
                    $romobArray[$j][1] =+$row['Cumromob'];   
                    $romobArray[8][1]=$romobArray[8][1]+$row['Cumromob']; 
                }}}
                else{
                 for($j=0; $j<=7;$j++){
                   if ( $mines[$j]==$row['unit'] ){ 
                 $romobArray[$j][4] =+$row['Cumromob'];   
                 $romobArray[8][4]=$romobArray[8][4]+$row['Cumromob']; 
                }
              }
               } }     
     }else{     echo "Error: " . $sql_mth_l . "<br>" . $GLOBALS['con']->error; }
  
        // CPLY Cumulative romob 
     $sql_lyr_mth_l ="SELECT unit, comm, SUM(act_qty) as cplyromob  FROM u_rm_mth WHERE (yymm>='$start_mth_lyr' AND yymm<='$lyr_mth') GROUP BY  unit, comm";
     $result=mysqli_query($GLOBALS['con'],$sql_lyr_mth_l);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
        //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
        if( $row['comm']=='L'){
          for($j=0; $j<=7;$j++){
              if ( $mines[$j]==$row['unit'] ){  
                  $romobArray[$j][2] =+$row['cplyromob'];   
                  $romobArray[8][2]=$romobArray[8][2]+$row['cplyromob']; 
              }}}
              else{
               for($j=0; $j<=7;$j++){
                 if ( $mines[$j]==$row['unit'] ){ 
               $romobArray[$j][5] =+$row['cplyromob'];   
               $romobArray[8][5]=$romobArray[8][5]+$row['cplyromob']; 
              }
            }
             } }           
    }else{
     echo "Error: " . $sql_lyr_mth_l . "<br>" . $GLOBALS['con']->error;
     }
  //print_r($romobArray);
     return $romobArray;
  
    }



    <i class=\"fas fa-check-circle\"></i><i class=\"fas fa-exclamation-circle\"></i>
    <small>Sir, You Missed me! </small>
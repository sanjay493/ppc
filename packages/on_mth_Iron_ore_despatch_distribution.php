<?php
include_once ("../test/DB_Connect/components.php");
include_once ("../test/DB_Connect/mth_operation.php");

?>



<?php
        function plantdistribution($yymm,$cust){
        $lyr_mth =strval((int)substr($yymm,0,4)-1).substr($yymm,4,2);
        if((int)substr($yymm,4,2) <=3){
            $start_mth_cyr =strval((int)substr($yymm,0,4)-1).'04';
            $start_mth_lyr =strval((int)substr($yymm,0,4)-2).'04';
          }
         else{
          $start_mth_cyr =substr($yymm,0,4).'04';
          $start_mth_lyr =strval((int)substr($yymm,0,4)-1).'04';
         }
         $comm=array("L", "F", "LS");
         ?>




  <table class="table table-sm table-bordered">
   <thead class="thead-dark">
      <tr>
         <th colspan="31"> Customer:: <?php echo $cust; ?> For the Month of <?php echo $yymm; ?></th>
      </tr>
   <tr> 
            <th rowspan="3" class="text-center">Mines</th>
            <th   colspan="10" class="text-center">Lump</th>
            <th   colspan="10" class="text-center">Fines</th>
            <th   colspan="10" class="text-center">Total Lump and Fines</th>
   </tr>
   <tr> 
          
            <th   colspan="5" class="text-center">For the Month</th>
            <th   colspan="5" class="text-center">Till the Month</th>
            <th   colspan="5" class="text-center">For the Month</th>
            <th   colspan="5" class="text-center">Till the Month</th>
            <th   colspan="5" class="text-center">For the Month</th>
            <th   colspan="5" class="text-center">Till the Month</th>
   </tr>
  
   <tr>
            
                <th>APP</th>
                <th>ACT</th>
                <th>%FF</th>
                <th>CPLY</th>
                <th>Growth%</th>
                <th>Cum. APP</th>
                <th>Cum.ACT</th>
                <th>%FF</th>
                <th>CPLY</th>
                <th>Growth%</th>
 
                <th>APP</th>
                <th>ACT</th>
                <th>%FF</th>
                <th>CPLY</th>
                <th>Growth%</th>
                <th>Cum. APP</th>
                <th>Cum.ACT</th>
                <th>%FF</th>
                <th>CPLY</th>
                <th>Growth%</th>

                <th>APP</th>
                <th>ACT</th>
                <th>%FF</th>
                <th>CPLY</th>
                <th>Growth%</th>
                <th>Cum. APP</th>
                <th>Cum.ACT</th>
                <th>%FF</th>
                <th>CPLY</th>
                <th>Growth%</th>
      </tr>
   </thead>
   <tbody>
<?php
  
        $results1= sqlSelect( "SUM(plan_qty) as", "u_ds_plan", "yymm='$yymm' AND cust='$cust'","unit, comm", $comm);
       $results2= sqlSelect( "SUM(act_qty) as", "u_ds_mth", "yymm='$yymm' AND cust='$cust'","unit, comm", $comm);
        $results3= sqlSelect( "SUM(act_qty) as", "u_ds_mth", "yymm='$lyr_mth' AND cust='$cust'","unit, comm", $comm);
        $results4= sqlSelect( "SUM(plan_qty) as", "u_ds_plan", "(yymm>='$start_mth_cyr' AND yymm<='$yymm') AND cust='$cust'","unit, comm", $comm);
        $results5= sqlSelect( "SUM(act_qty) as", "u_ds_mth", "(yymm>='$start_mth_cyr' AND yymm<='$yymm') AND cust='$cust'","unit, comm", $comm);
        $results6= sqlSelect( "SUM(act_qty) as", "u_ds_mth", "(yymm>='$start_mth_lyr' AND yymm<='$lyr_mth') AND cust='$cust'","unit, comm", $comm);
        
           $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR","Total");  
     for($i=0; $i<=8; $i++){
      $j=0;
        echo '<tr>';
        echo '<td>'.$mines[$i].'</td>';
         while($j<=9){
                  echo  '<td>'.$results1[$i+$j].'</td>';
                  echo  '<td>'.$results2[$i+$j].'</td>';
                   if($results1[$i+$j]!==0){
                echo  '<td>'.round(($results2[$i+$j]/$results1[$i+$j])*100,0).'</td>';
                   }else { echo '<td></td>';}
                 echo    '<td>'.$results3[$i+$j].'</td>'; 
                 if($results3[$i+$j]!==0){
                    echo  '<td>'.round((($results2[$i+$j]-$results3[$i+$j])/$results3[$i+$j])*100,0).'</td>';
                       }else { echo '<td></td>';}  
                   

                       echo  '<td>'.$results4[$i+$j].'</td>';
                  echo  '<td>'.$results5[$i+$j].'</td>';
                   if($results1[$i+$j]!==0){
                echo  '<td>'.round(($results5[$i+$j]/$results4[$i+$j])*100,0).'</td>';
                   }else { echo '<td></td>';}
                 echo    '<td>'.$results6[$i+$j].'</td>'; 
                 if($results3[$i+$j]!==0){
                    echo  '<td>'.round((($results5[$i+$j]-$results6[$i+$j])/$results6[$i+$j])*100,0).'</td>';
                       }else { echo '<td></td>';}  
                
                       echo  '<td>'.($results1[$i+$j]+$results4[$i+$j]).'</td>';
                  echo  '<td>'.($results2[$i+$j]+$results5[$i+$j]).'</td>';
                   if(($results1[$i+$j]+$results4[$i+$j])!==0){
                echo  '<td>'.round(($results2[$i+$j]+$results5[$i+$j])/($results1[$i+$j]+$results4[$i+$j])*100,0).'</td>';
                   }else { echo '<td></td>';}
                 echo    '<td>'.($results3[$i+$j]+$results6[$i+$j]).'</td>'; 
                 if($results3[$i+$j]!==0){
                    echo  '<td>'.round(($results2[$i+$j]+$results5[$i+$j]-$results3[$i+$j]-$results6[$i+$j])/($results3[$i+$j]+$results6[$i+$j])*100,0).'</td>';
                       }else { echo '<td></td>';}  

                    $j=$j+9;
                     }
                 echo '</tr>';
             }
      }     
 ?>
                
    </tbody>
   </table>

  



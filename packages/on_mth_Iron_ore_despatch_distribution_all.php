<?php
include_once ("../test/DB_Connect/components.php");
include_once ("../test/DB_Connect/mth_operation.php");

?>



<?php
        function plantdistribution_all($yymm){
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

         $yymm =textboxValue('yymm');

        $monthNum = (int)substr($yymm,4,2); 
        // Create date object to store the DateTime format 
        $dateObj = DateTime::createFromFormat('!m', $monthNum); 
        // Store the month name to variable 
        $monthName = $dateObj->format('F');      
        // Display output 
         ?>




<table class="table table-sm table-bordered table-striped table-hover text-center">
   <thead class="thead">
      <tr>
         <th colspan="31" class="bg-primary"> Customer:: <strong>Mines Total Despatch</strong>&nbsp; &nbsp;  For the Month of   &nbsp; &nbsp;<strong><?php echo $monthName. substr($yymm,0,4) ?><strong></th>
      </tr>
   <tr> 
            <th rowspan="3" class="text-center">Mines</th>
            <th   colspan="10" class="text-center">Lump</th>
            <th   colspan="10" class="text-center">Fines</th>
            <th   colspan="10" class="text-center">Total Lump and Fines</th>
   </tr>
   <tr> 
          
   <th   colspan="5" class="text-center bg-success">For the Month</th>
            <th   colspan="5" class="text-center bg-warning">Till the Month</th>
            <th   colspan="5" class="text-center bg-success">For the Month</th>
            <th   colspan="5" class="text-center bg-warning">Till the Month</th>
            <th   colspan="5" class="text-center bg-success">For the Month</th>
            <th   colspan="5" class="text-center bg-warning">Till the Month</th>
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
  
        $results1= sqlSelect( "SUM(plan_qty) as", "u_ds_plan", "yymm='$yymm' ","unit, comm", $comm);
       $results2= sqlSelect( "SUM(act_qty) as", "u_ds_mth", "yymm='$yymm' ","unit, comm", $comm);
        $results3= sqlSelect( "SUM(act_qty) as", "u_ds_mth", "yymm='$lyr_mth' ","unit, comm", $comm);
        $results4= sqlSelect( "SUM(plan_qty) as", "u_ds_plan", "(yymm>='$start_mth_cyr' AND yymm<='$yymm') ","unit, comm", $comm);
        $results5= sqlSelect( "SUM(act_qty) as", "u_ds_mth", "(yymm>='$start_mth_cyr' AND yymm<='$yymm') ","unit, comm", $comm);
        $results6= sqlSelect( "SUM(act_qty) as", "u_ds_mth", "(yymm>='$start_mth_lyr' AND yymm<='$lyr_mth')","unit, comm", $comm);
        
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
                       if($results6[$i+$j]!==0){
                          echo  '<td>'.round((($results5[$i+$j]-$results6[$i+$j])/$results6[$i+$j])*100,0).'</td>';
                             }else { echo '<td></td>';}   
      
                          $j=$j+9;
                           }
      
                           echo  '<td>'.($results1[$i]+$results1[$i+9]).'</td>';
                           echo  '<td>'.($results2[$i]+$results2[$i+9]).'</td>';
                            if(($results1[$i]+$results1[$i+9])!==0){
                         echo  '<td>'.round((($results2[$i]+$results2[$i+9])/($results1[$i]+$results1[$i+9]))*100,0).'</td>';
                            }else { echo '<td></td>';}
                          echo    '<td>'.($results3[$i]+$results3[$i+9]).'</td>'; 
                          if(($results3[$i]+$results3[$i+9])!==0){
                             echo  '<td>'.round(((($results2[$i]+$results2[$i+9])-($results3[$i]+$results3[$i+9]))/($results3[$i]+$results3[$i+9]))*100,0).'</td>';
                                }else { echo '<td></td>';} 
                                echo  '<td>'.($results4[$i]+$results4[$i+9]).'</td>';
                                echo  '<td>'.($results5[$i]+$results5[$i+9]).'</td>';
                                 if(($results4[$i]+$results4[$i+9])!==0){
                              echo  '<td>'.round((($results5[$i]+$results5[$i+9])/($results4[$i]+$results4[$i+9]))*100,0).'</td>';
                                 }else { echo '<td></td>';}
                               echo    '<td>'.($results6[$i]+$results6[$i+9]).'</td>'; 
                               if(($results6[$i]+$results6[$i+9])!==0){
                                  echo  '<td>'.round(((($results5[$i]+$results5[$i+9])-($results6[$i]+$results6[$i+9]))/($results6[$i]+$results6[$i+9]))*100,0).'</td>';
                                     }else { echo '<td></td>';} 
      
      
      
      
                       echo '</tr>';
                   }
            }     
       ?>
                
    </tbody>
   </table>

  



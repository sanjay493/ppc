

<div class="row justify-content-center">
<div class="d-flex table-data">
   <table class="table table-sm table-bordered table-striped table-hover text-center">
   <thead class="thead">
   <tr>
   <th colspan="12" class="">Monthly  Despatch Performance  for the Month of  <strong><?php echo $monthName. substr($yymm,0,4) ?></strong></th>
   </tr>
   <tr>
   
   <th colspan="5">For the Months</th>
   <th  colspan="5">Till The Months</th>
   </tr>
   <tr class="table-success">
 
   <th></th>
   <th>APP</th>
   <th>ACT</th>
   <th>%FF</th>
   <th>CPLY</th>
   <th>Growth%</th>

   <th>APP</th>
   <th>ACT</th>
   <th>%FF</th>
   <th>CPLY</th>
   <th>Growth%</th>
      </tr>
   </thead>
   <tbody>
<?php 

if(isset($_POST['on_mth_mines'])){
       
        $yymm =textboxValue('yymm');

        $monthNum = (int)substr($yymm,4,2); 
        // Create date object to store the DateTime format 
        $dateObj = DateTime::createFromFormat('!m', $monthNum); 
        // Store the month name to variable 
        $monthName = $dateObj->format('F');      
        // Display output 
        


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
        $table1 ="u_pr_plan";
        $table2 ="u_pr_mth";
        $table3 ="u_ds_plan";
        $table4 ="u_ds_mth";
        $column1 ="unit,  SUM(plan_qty) as";
        $column2 ="unit,  SUM(act_qty) as";
         $condition1 ="yymm='$yymm' AND unit='KTR'";
         $condition2 ="yymm='$lyr_mth' AND unit='KTR'";
         $condition3= "(yymm>='$start_mth_cyr' AND yymm<='$yymm') AND unit='KTR'";
         $condition4= "(yymm>='$start_mth_lyr' AND yymm<='$lyr_mth') AND unit='KTR'";

         $groupbycondition ="unit";
      
        $results1= sqlFlux( $column1, $table1, $condition1,$groupbycondition);
        $results2=sqlFlux( $column2, $table2, $condition1,$groupbycondition);
        $results3=sqlFlux( $column2, $table2, $condition2,$groupbycondition);
        $results4=sqlFlux( $column1, $table1, $condition3,$groupbycondition);
        $results5=sqlFlux( $column2, $table2, $condition3,$groupbycondition);
        $results6=sqlFlux( $column2, $table2, $condition4,$groupbycondition);

        $results11= sqlFlux( $column1, $table3, $condition1,$groupbycondition);
        $results21=sqlFlux( $column2, $table4, $condition1,$groupbycondition);
        $results31=sqlFlux( $column2, $table4, $condition2,$groupbycondition);
        $results41=sqlFlux( $column1, $table3, $condition3,$groupbycondition);
        $results51=sqlFlux( $column2, $table4, $condition3,$groupbycondition);
        $results61=sqlFlux( $column2, $table4, $condition4,$groupbycondition);
           
   //  print_r($results1);
   //  print_r($results2);
   //  print_r($results3);
   //  print_r($results4);
   //  print_r($results5);
   //  print_r($results6);
 
    
       echo '<tr>';
      
                echo  '<td>Production</td>';
                echo  '<td>'.$results1.'</td>';
                echo  '<td>'.$results2.'</td>';
                   if($results1!==0){
                echo  '<td>'.round(($results2[1]/$results1)*100,0).'</td>';
                   }else { echo '<td></td>';}
                 echo    '<td>'.$results3[3].'</td>'; 
                 if($results3!==0){
                    echo  '<td>'.round(((($results2-$results3))/$results3)*100,0).'</td>';
                       }else { echo '<td></td>';}  

                  // Till The Month Calculation
                       
                       echo  '<td>'.$results4.'</td>';
                       echo  '<td>'.$results5.'</td>';
                          if($results4!==0){
                       echo  '<td>'.round(($results5/$results4)*100,0).'</td>';
                          }else { echo '<td></td>';}
                        echo    '<td>'.$results6.'</td>'; 
                        if($results6!==0){
                           echo  '<td>'.round(((($results5-$results6))/$results6)*100,0).'</td>';
                              }else { echo '<td></td>';}  


                 echo '</tr>';
               
         
                 echo '<tr>';
                            
                          echo  '<td>Despatch</td>';
                          echo  '<td>'.$results11.'</td>';
                          echo  '<td>'.$results21.'</td>';
                             if($results11!==0){
                          echo  '<td>'.round(($results21[1]/$results11)*100,0).'</td>';
                             }else { echo '<td></td>';}
                           echo    '<td>'.$results31[3].'</td>'; 
                           if($results31!==0){
                              echo  '<td>'.round(((($results21-$results31))/$results31)*100,0).'</td>';
                                 }else { echo '<td></td>';}  
          
                            // Till The Month Calculation
                                 
                                 echo  '<td>'.$results41.'</td>';
                                 echo  '<td>'.$results51.'</td>';
                                    if($results41!==0){
                                 echo  '<td>'.round(($results51/$results41)*100,0).'</td>';
                                    }else { echo '<td></td>';}
                                  echo    '<td>'.$results61.'</td>'; 
                                  if($results61!==0){
                                     echo  '<td>'.round(((($results51-$results61))/$results61)*100,0).'</td>';
                                        }else { echo '<td></td>';}  
          
          
                           echo '</tr>';
                           echo '<tr></tr>';
                         
}
 ?>
                
    </tbody>
   </table>
  </div>


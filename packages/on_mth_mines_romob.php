

<div class="row justify-content-center">
<div class="d-flex table-data">
   <table class="table table-sm table-bordered table-striped table-hover text-center">
   <thead class="thead">
   <tr>
   <th colspan="12" class="">Monthly  Excavation Performance  for the Month of  <strong><?php echo $monthName. substr($yymm,0,4) ?></strong></th>
   </tr>
   <tr>
   <th rowsapn="">Mines</th>
   <th rowsapn="">Comm</th>
   <th colspan="5">For the Months</th>
   <th  colspan="5">Till The Months</th>
   </tr>
   <tr class="table-success">
   <th></th>
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
        $column1 ="unit, comm, SUM(plan_qty) as";
        $column2 ="unit, comm, SUM(act_qty) as";
         $condition1 ="yymm='$yymm'";
         $condition2 ="yymm='$lyr_mth'";
         $condition3= "(yymm>='$start_mth_cyr' AND yymm<='$yymm')";
         $condition4= "(yymm>='$start_mth_lyr' AND yymm<='$lyr_mth')";

         $groupbycondition ="unit, comm";
         $comm=array("RM", "OB","SG");
         $comm1  =array("LS");
         $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR","Total");
         $mines1=array("KTR");
        $results1= sqlPRDSRM( $column1, $table1, $condition1,$groupbycondition, $comm, $mines);
        $results2=sqlPRDSRM( $column2, $table2, $condition1,$groupbycondition, $comm, $mines);
        $results3=sqlPRDSRM( $column2, $table2, $condition2,$groupbycondition, $comm, $mines);
        $results4=sqlPRDSRM( $column1, $table1, $condition3,$groupbycondition, $comm, $mines);
        $results5=sqlPRDSRM( $column2, $table2, $condition3,$groupbycondition, $comm, $mines);
        $results6=sqlPRDSRM( $column2, $table2, $condition4,$groupbycondition, $comm, $mines);
           
    //print_r($results1);
    // print_r($results2);
   //  print_r($results3);
   //  print_r($results4);
    //print_r($results5);
   //  print_r($results6);
 
     for($i=0; $i<=8; $i++){
       echo '<tr>';
       echo '<td rowspan="5" class="td-bold">'.$mines[$i].'</td>';
             $j=0;
             while($j<=((count($comm)-1)*count($mines))){
                echo '<tr>';
                echo '<td>'.$comm[$j/9].'</td>';
                echo  '<td>'.$results1[($i+$j)].'</td>';
                echo  '<td>'.$results2[($i+$j)].'</td>';
                   if($results1[($i+$j)]!==0){
                echo  '<td>'.round(($results2[($i+$j)]/$results1[($i+$j)])*100,0).'</td>';
                   }else { echo '<td></td>';}
                 echo    '<td>'.$results3[($i+$j)].'</td>'; 
                 if($results3[($i+$j)]!==0){
                    echo  '<td>'.round(((($results2[($i+$j)]-$results3[($i+$j)]))/$results3[($i+$j)])*100,0).'</td>';
                       }else { echo '<td></td>';}  

                  // Till The Month Calculation
                       
                       echo  '<td>'.$results4[($i+$j)].'</td>';
                       echo  '<td>'.$results5[($i+$j)].'</td>';
                          if($results4[($i+$j)]!==0){
                       echo  '<td>'.round(($results5[($i+$j)]/$results4[($i+$j)])*100,0).'</td>';
                          }else { echo '<td></td>';}
                        echo    '<td>'.$results6[($i+$j)].'</td>'; 
                        if($results6[($i+$j)]!==0){
                           echo  '<td>'.round(((($results5[($i+$j)]-$results6[($i+$j)]))/$results6[($i+$j)])*100,0).'</td>';
                              }else { echo '<td></td>';}  


                 echo '</tr>';
                 $j=$j+9;
             }
       // For Mines wise Total 
       echo '<tr class="table-primary">';
       echo '<td>Total</td>';
	   $k=0;
	   $x=0;
	   $y=0;
	   $z=0;
	   $x1=0;
	   $y1=0;
	   $z1=0;
	   while($k<count($comm)){
	   $x +=$results1[$i+($k*(count($mines)))];
	   $y +=$results2[$i+($k*(count($mines)))];
	   $z +=$results3[$i+($k*(count($mines)))];
	   $x1 +=$results4[$i+($k*(count($mines)))];
	   $y1 +=$results5[$i+($k*(count($mines)))];
	   $z1 +=$results6[$i+($k*(count($mines)))];
	   $k++;
	   }
	   
       echo  '<td>'.$x.'</td>';
                echo  '<td>'.$y.'</td>';
                   if($x!==0){
                echo  '<td>'.round((($y)/($x))*100,0).'</td>';
                   }else { echo '<td></td>';}
                 echo    '<td>'.$z.'</td>'; 
                 if($z!==0){
                    echo  '<td>'.round((((($y)-($z)))/($z))*100,0).'</td>';
                       }else { echo '<td></td>';} 

                       echo  '<td>'.$x1.'</td>';
                       echo  '<td>'.$y1.'</td>';
                           if($x1!==0){
                echo  '<td>'.round((($y1)/($x1))*100,0).'</td>';
                   }else { echo '<td></td>';}
                 echo    '<td>'.$z1.'</td>'; 
                 if($z!==0){
                    echo  '<td>'.round((((($y1)-($z1)))/($z1))*100,0).'</td>';
                       }else { echo '<td></td>';}
              echo '</tr>';
}}
 ?>
                
    </tbody>
   </table>
  </div>


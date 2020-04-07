

<div class="row">
<div class="col-lg-6 rake_dist">
<h4 class="text-center"> For The Month Despatch</h4>

<div class="d-flex table-data table-responsive">
   <table class="table table-sm table-dark">
   <thead class="thead-dark">
   <tr class="info">
   
   <th>Mines</th>
   <th>Comm</th>
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
           
    print_r($results1);
    print_r($results2);
    print_r($results3);
    print_r($results4);
    print_r($results5);
    print_r($results6);
 
     for($i=0; $i<=8; $i++){
       echo '<tr>';
       echo '<td rowspan="4">'.$mines[$i].'</td>';
             $j=0;
             while($j<=9){
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
                 $j=$j+9;
                 echo '</tr>';
             }
       // For Mines wise Total 
       echo '<td>Total</td>';
    //    echo  '<td>'.$results1[($i)]+$j)].'</td>';
    //             echo  '<td>'.$results2[($i+$j)].'</td>';
    //                if($results1[($i+$j)]!==0){
    //             echo  '<td>'.round(($results2[($i+$j)]/$results1[($i+$j)])*100,0).'</td>';
    //                }else { echo '<td></td>';}
    //              echo    '<td>'.$results3[($i+$j)].'</td>'; 
    //              if($results3[($i+$j)]!==0){
    //                 echo  '<td>'.round(((($results2[($i+$j)]-$results3[($i+$j)]))/$results3[($i+$j)])*100,0).'</td>';
    //                    }else { echo '<td></td>';} 
              echo '<tr>';
    echo '<tr>';
      
     }}
 ?>
                
    </tbody>
   </table>
   </div>
  </div>


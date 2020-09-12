<?php


?>
<div class="rake_dist">
<h4 class="text-center"> Lump Despatch Quantity</h4>

<div class="d-flex table-data">
   <table class="table table-sm table-bordered">
   <thead class="thead-dark">
   <tr class="table-info">
   <th>Plant</th>
   <th>KBR</th>
   <th>MBR</th>
   <th>BOL</th>
   <th>BAR</th>
   <th>TAL</th>
   <th>KAL</th>
   <th>GUA</th>
   <th>MPR</th>
   <th>Total</th>
   <th>Avg</th>
   </tr>
   </thead>
   <tbody>
<?php 
if(isset($_POST['custom_rake_dist'])){
  $date1 = textboxValue('date1');
    $date2 = textboxValue('date2');
    $destination =array("BSL","DSP","RSP","ISP", "BSP","SALE");
    // No of days calculation from the user input date rage
$daysInt = round(abs(strtotime($date2) - strtotime($date1))/86400)+1;
  

   $table ="mines_desppatch";
   $column1 ="cust, unit, SUM(f_qty) AS qty";
   $column2 ="cust, unit, SUM(l_qty) AS qty";
   $column3 ="cust, unit, SUM(l_qty+f_qty) AS qty";
    $condition ="( rpt_date>='$date1' AND rpt_date<='$date2') ";
    $groupbycondition =" cust, unit";
    $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
 // No of days calculation from the user input date rage
 $daysInt = round(abs(strtotime($date2) - strtotime($date1))/86400)+1;

     $results = getDespQty($column2, $table, $condition, $groupbycondition);
     if(!empty($results)){
     for($i=0; $i<COUNT($destination); $i++){
       echo '<tr>';
       // Display Destination  at start of each row
       echo '<td>'.$destination[$i].'</td>';
       for($j=0; $j<=7;$j++){
            //Display Actual nos of rakes Count in row for each Mines in destination row
               echo '<td>' . round($results[$i][$j],0).' </td>';
                 }
                 // Total Rake for a destination
                 echo '<td class="bg-success">'. round(array_sum($results[$i]),0). '</td>';
                 //Average Rakes for a particular destination , No of Days used to calculating average
                 echo '<td class="table-primary">'. round(array_sum($results[$i])/$daysInt,0). '</td>';
      echo '</tr>';
               } 
     }
     else{
      TextNode("error", "No Data of the selected duration");
     }

 
     echo '<tr class="bg-success">';
     echo '<td> Total </td>';
     $total=0;
     $cavg=array_fill(0,8,0);
     for($j=0; $j<=7;$j++){
       $csum=array_fill(0,8,0);
              for($i=0; $i<COUNT($destination);$i++){
           $csum[$j]=$csum[$j]+$results[$i][$j];
           $total =$total+$results[$i][$j]; 
       }
       $cavg[$j]=round($csum[$j]/$daysInt,0);
       // Display Total no of rakes Mines wise in a row
    echo '<td>'.round($csum[$j],0).'</td>';
         }
         //Total sum of  rakes in last column for destination 
     echo '<td>'.round($total,0).'</td>';
     echo '<td>'.round($total/$daysInt,0).'</td>';

       echo '</tr>';
       echo '<tr class="table-primary">';
       echo '<td> Avg</td>';
       for($j=0; $j<=7;$j++){
         // Average no of rakes Mines wise in a row
         echo '<td>'.round($cavg[$j],0).'</td>';
         
     }
      // Average no of rakes 
     echo '<td>'.round($total/$daysInt,0).'</td>';
     echo '</tr>';
    }
 ?>
                
    </tbody>
   </table>
   </div>
  </div>


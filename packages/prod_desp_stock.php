  
<div class="rake_dist">
<h4 class="text-center"> Production, Despatch, Stock(+/-) </h4>


<div class="d-flex table-data">
   <table class="table table-sm table-bordered">
   <tr>
       <th rowspan='2'>Mines</th>
       <th colspan="3">Lump</th>
       <th></th>
       <th colspan="3">Fines</th>
       </tr>
           <tr>
           <th>Production</th>
           <th>Despatch</th>
           <th>Stock(+/-)</th>
           <th></th>
           <th>Production</th>
           <th>Despatch</th>
           <th>Stock(+/-)</th>
           </tr>
  
<?php 

if(isset($_POST['custom_rake_dist'])){
  $date1 = textboxValue('date1');
    $date2 = textboxValue('date2');
 

    $column1 ="unit, SUM(f_qty) AS qty";
    $column2 ="unit, SUM(l_qty) AS qty";
    $columnpr1 ="unit,  SUM(dept_lump+lump_darea+lump_p) AS qty";
    $columnpr2 ="unit,  SUM(dept_fines+fines_darea+fines_p) AS qty";
     $condition ="( rpt_date>='$date1' AND rpt_date<='$date2') ";
     $groupbycondition ="unit";
     $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
  // No of days calculation from the user input date rage
  $result_lpr=mines_production_decpatch_stock($columnpr1,"u_pr_dly", $condition, "unit");
  $result_fpr=mines_production_decpatch_stock($columnpr2,"u_pr_dly", $condition, "unit");
  $result_lds=mines_production_decpatch_stock($column2,"mines_desppatch", $condition, "unit");
  $result_fds=mines_production_decpatch_stock($column1,"mines_desppatch", $condition,"unit");
              
    
       for($j=0; $j<=7;$j++){
        echo '<tr>';
           echo '<td>'.$mines[$j].'</td>';
            //Display Actual nos of rakes Count in row for each Mines in destination row
               echo '<td>' . round($result_lpr[$j],0).' </td>';
               echo '<td>' . round($result_lds[$j],0).' </td>';
               echo '<td>' . round(($result_lpr[$j]-$result_lds[$j]),0).' </td>';
               echo '<td>-</td>';
               echo '<td>' . round($result_fpr[$j],0).' </td>';
               echo '<td>' . round($result_fds[$j],0).' </td>';
               echo '<td>' . round(($result_fpr[$j]-$result_fds[$j]),0).' </td>';
               echo '</tr>';
                 }
                 // Total 
                 echo '<tr>';
                 echo '<td>Total</td>';
                 echo '<td>' . round(array_sum($result_lpr),0).' </td>';
                 echo '<td>' . round(array_sum($result_lds),0).' </td>';
                 echo '<td>' . round((array_sum($result_lpr)-array_sum($result_lds)),0).' </td>';
                 echo '<td>-</td>';
                 echo '<td>' . round(array_sum($result_fpr),0).' </td>';
                 echo '<td>' . round(array_sum($result_fds),0).' </td>';
                 echo '<td>' . round((array_sum($result_fpr)-array_sum($result_fds)),0).' </td>';
                 echo '</tr>';
      
     }
 ?>
                
    </tbody>
   </table>
   </div>
  </div>


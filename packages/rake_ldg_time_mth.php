<?php  
function rake_time_mth($yymm1, $yymm2, $yymm_list)
{
  $yr =strval((int)substr($yymm1,0,4)).'-'.strval((int)substr($yymm1,0,4)+1);

  ?>
        
<div class="rake_dist">
<h4 class="text-center"> Rake Loading Time Month wise <?php print_r($yr); ?> </h4>


<div class="d-flex table-data">
   <table class="table table-sm table-bordered">
   <thead class="thead-dark">
   <tr class="table-info">
   <th></th>
   <th>KBR</th>
   <th>MBR</th>
   <th>BOL</th>
   <th>BAR</th>
   <th>TAL</th>
   <th>KAL</th>
   <th>GUA</th>
   <th>MPR</th>
   <th>Avg</th>
   <th></th>
   <th>KBR</th>
   <th>MBR</th>
   <th>BOL</th>
   <th>BAR</th>
   <th>TAL</th>
   <th>KAL</th>
   <th>GUA</th>
   <th>MPR</th>
   <th>Total</th>
   </tr>
   </thead>
   <tbody>
<?php 

$months=array("Apr","May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar");
//$yymm_list="'201704','201705','201706','201707','201708','201709','201710','201711','201712','201801','201802','201803'";

$result=mth_rake_ldg($yymm1, $yymm2, $yymm_list);

//print_r($result);
echo '<tr>';
for($i=0; $i<12;$i++){
   $mth_time =0;
$mth_rake =0;
   echo '<td>'.$months[$i].'</td>';
for($j=0; $j<=7;$j++){
 
echo '<td>'.secToHR($result[$i][$j]).'</td>';
  
$mth_time +=$result[$i][$j]*$result[$i][$j+8];


$mth_rake +=$result[$i][$j+8];
//print_r($mth_rake);
}
//print_r(secToHR($mth_time));
//print_r("-");
if($mth_rake!==0){
   echo '<td class="table-primary">'.secToHR($mth_time/$mth_rake).'</td>';
}
else{
echo '<td>-</td>';
}
$t_rakes=0;
echo '<td></td>';
for($j=0; $j<=7;$j++){
 
   echo '<td>'.($result[$i][$j+8]).'</td>';
   $t_rakes+=$result[$i][$j+8];
}
echo '<td class="table-primary">'.$t_rakes.'</td>';




echo '</tr>';
}  
$total_time=0;
   $total_rakes=0;
echo '<tr>';
echo '<td class="table-primary">Avg</td>';
for($j=0; $j<=7;$j++){
   $mines_time=0;
   $mines_rakes=0;
for($i=0; $i<12;$i++){
   $mines_time+=$result[$i][$j]*$result[$i][$j+8];
   $mines_rakes+=$result[$i][$j+8];
   $total_rakes+=$result[$i][$j+8];

   $total_time+=$result[$i][$j]*$result[$i][$j+8];
}
if($mines_rakes!==0){
   echo '<td class="table-primary">'.secToHR($mines_time/$mines_rakes).'</td>';
}else{
   echo '<td class="table-primary">-</td>';
}
}
echo '<td>'.secToHR($total_time/$total_rakes).'</td>';
echo '<td>-</td>';
//Total Rakes Mines Wise for the duration
$total_rakes1=0;
for($j=0; $j<=7;$j++){
      $mines_rakes=0;
for($i=0; $i<12;$i++){
   $mines_rakes+=$result[$i][$j+8];
   $total_rakes1+=$result[$i][$j+8];
   }
   echo '<td class="table-primary">'.$mines_rakes.'</td>';
}
echo '<td class="table-primary">'.$total_rakes1.'</td>';



echo '</tr>';

?>
                
    </tbody>
   </table>
   </div>
  </div>
<?php }?>
<?php
?>

<div class="rake_dist  justify-content-center">
<h4 class="text-center"> Monthly Despatch Distribution Plant Wise</h4>

<div class="d-flex table-data">
   <table class="table table-sm table-bordered">
   <thead class="thead-dark">
   <tr> 
            <th rowspan="3" class="text-center">Mines</th>
            <th   colspan="10" class="text-center">Lump</th>
            <th   colspan="10" class="text-center">Fines</th>
   </tr>
   <tr> 
          
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
      </tr>
   </thead>
   <tbody>
<?php 
if(isset($_POST['on_mth_mines'])){
 
    $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR","Total");

     $results =on_mth_c_distrib();
     for($i=0; $i<=8; $i++){
        echo '<tr>';
        echo '<td>'.$mines[$i].'</td>';
         $j=0;
        while($j<=11){
                echo  '<td>'.$results[$i][$j].'</td>';
                echo  '<td>'.$results[$i][$j+1].'</td>';
                   if($results[$i][$j]!==0){
                echo  '<td>'.round(($results[$i][$j+1]/$results[$i][$j])*100,0).'</td>';
                   }else { echo '<td></td>';}
                 echo    '<td>'.$results[$i][$j+2].'</td>'; 
                 if($results[$i][$j+2]!==0){
                    echo  '<td>'.round((($results[$i][$j+1]-($results[$i][$j+2]))/$results[$i][$j+2])*100,0).'</td>';
                       }else { echo '<td></td>';}  
                   $j=$j+3;
                    } 
                 echo '</tr>';
             }
           }
 ?>
                
    </tbody>
   </table>
   </div>
  </div>



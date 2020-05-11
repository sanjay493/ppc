<?php

          ?> 
        
<div class="rake_dist">
<h4 class="text-center"> Rake Loading Time </h4>


<div class="d-flex table-data">
   <table class="table table-sm table-bordered">
   <thead class="thead-dark">
   <tr class="table-info">
   <th>Mines </th>
   <th>KBR</th>
   <th>MBR</th>
   <th>BOL</th>
   <th>BAR</th>
   <th>TAL</th>
   <th>KAL</th>
   <th>GUA</th>
   <th>MPR</th>
   <th>Avg</th>
   </tr>
   </thead>
   <tbody>
<?php 

if(isset($_POST['custom_rake_dist'])){
  $date1 = textboxValue('date1');
    $date2 = textboxValue('date2');
 
//
          $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR","Avg");
         
     $results =getRakeTime($date1,$date2);
         if(!empty($results)){
       echo '<tr>';
        $sumLdg=0;
        $sumRake =0;
                 echo '<td>Average Loading Time</td>';

       for($j=0; $j<=7;$j++){
               echo '<td>'.secToHR($results[$j]).' </td>';
               $sumLdg+=$results[$j]*$results[$j+8];
               $sumRake+=$results[$j+8];
               
                 }
//print_r($sumLdg);
//print_r($sumRake);
                 // Total Average
                 echo '<td class="bg-success">'. secToHR($sumLdg/$sumRake). '</td>';
      echo '</tr>';
      
     }}
     else{
      TextNode("error", "No Data of the selected duration");
     }

  ?>
                
    </tbody>
   </table>
   </div>
  </div>


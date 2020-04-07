<?php
?>
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
 
    $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR","Total");
    $comm = array("L","F","T");

     $results =on_mth_despatch();
     for($i=0; $i<=8; $i++){
       echo '<tr>';
       echo '<td rowspan="4">'.$mines[$i].'</td>';
             $j=0;
            
             while($j<=3){
                echo '<tr>';
                echo '<td>'.$comm[$j/3].'</td>';
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
                 echo '</tr>';
             }
       // For Mines wise Total 
       echo '<td>'.$comm[2].'</td>';
       echo  '<td>'.($results[$i][0]+$results[$i][3]).'</td>';
       echo  '<td>'.($results[$i][1]+$results[$i][4]).'</td>';
          if(($results[$i][0]+$results[$i][3])!==0){
       echo  '<td>'.round(($results[$i][1]+$results[$i][4])/(($results[$i][0]+$results[$i][3]))*100,0).'</td>';
          }else { echo '<td></td>';}
        echo    '<td>'.($results[$i][2]+$results[$i][5]).'</td>'; 
        if(($results[$i][2]+$results[$i][5])!==0){
           echo  '<td>'.round((($results[$i][1]+$results[$i][4])-($results[$i][2]+$results[$i][5]))/(($results[$i][2]+$results[$i][5]))*100,1).'</td>';
              }else { echo '<td></td>';}  
              echo '<tr>';
    echo '<tr>';
      
     }

 
    }
 ?>
                
    </tbody>
   </table>
   </div>
  </div>


  <div class="col-lg-6 rake_dist">
<h4 class="text-center"> Till The Month Despatch</h4>

<div class="d-flex table-data table-responsive">
   <table class="table table-sm table-dark">
   <thead class="thead-dark">
   <tr class="table-info">
   
   <th>Mines</th>
   <th>Comm</th>
   <th>APP</th>
   <th>ACT</th>
   <th>%FF</th>
   <th>CPLY</th>
   <th>Growth%</th>
      </tr>
   </thead>
   <tbody class="table-hover">
<?php 
if(isset($_POST['on_mth_mines'])){
 
    $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR","Total");
    $comm = array("L","F","T");

     $results =cumulative_despatch();
     for($i=0; $i<=8; $i++){
       echo '<tr>';
       echo '<td rowspan="4">'.$mines[$i].'</td>';
             $j=0;
            
             while($j<=3){
                echo '<tr>';
                echo '<td>'.$comm[$j/3].'</td>';
                echo  '<td>'.$results[$i][$j].'</td>';
                echo  '<td>'.$results[$i][$j+1].'</td>';
                   if($results[$i][$j]!==0){
                echo  '<td>'.round(($results[$i][$j+1]/$results[$i][$j])*100,0).'</td>';
                   }else { echo '<td></td>';}
                 echo    '<td>'.$results[$i][$j+2].'</td>'; 
                 if($results[$i][$j+2]!==0){
                    echo  '<td>'.round((($results[$i][$j+1]-($results[$i][$j+2]))/$results[$i][$j+2])*100,1).'</td>';
                       }else { echo '<td></td>';}  
                 $j=$j+3;
                 echo '</tr>';
             }
       // For Mines wise Total 
       echo '<td>'.$comm[2].'</td>';
       echo  '<td>'.($results[$i][0]+$results[$i][3]).'</td>';
       echo  '<td>'.($results[$i][1]+$results[$i][4]).'</td>';
          if(($results[$i][0]+$results[$i][3])!==0){
       echo  '<td>'.round(($results[$i][1]+$results[$i][4])/(($results[$i][0]+$results[$i][3]))*100,0).'</td>';
          }else { echo '<td></td>';}
        echo    '<td>'.($results[$i][2]+$results[$i][5]).'</td>'; 
        if(($results[$i][2]+$results[$i][5])!==0){
           echo  '<td>'.round((($results[$i][1]+$results[$i][4])-($results[$i][2]+$results[$i][5]))/(($results[$i][2]+$results[$i][5]))*100,1).'</td>';
              }else { echo '<td></td>';}  
              echo '<tr>';
    echo '<tr>';
      
     }
    }
 ?>
                
    </tbody>
   </table>
   </div>
  </div>
</div>
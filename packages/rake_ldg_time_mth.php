
        
<div class="rake_dist">
<h4 class="text-center"> Rake Loading Time Month wise </h4>


<div class="d-flex table-data">
   <table class="table table-sm table-bordered">
   <thead class="thead-dark">
   <tr class="table-info">
   
   </thead>
   <tbody>
<?php 

 
//
          $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR","Avg");
         $months=array("Apr","May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar");
     $sql ="SELECT yymm, unit, ldg_time_sec, rakes FROM u_rake_ldg_time WHERE yymm>='201704' ORDER BY yymm DESC";
     $result = mysqli_query($GLOBALS['con'], $sql ); 
     if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
          for($i=0; $i<=7; $i++){
        if($row['unit']==$mines[$i])
          { if((substr($row['yymm'],5,2))
                echo '<tr>';
                echo '<td>'.$row['yymm'].'</td>'; 
                if($row['rakes']>0){
                echo '<td>'.secToHR($row['ldg_time_sec']/$row['rakes']).'</td>'; 
                }else
                {
                    echo '<td>-</td>'; 
                }}}
       echo '<tr>';
       
     }}

  ?>
                
    </tbody>
   </table>
   </div>
  </div>
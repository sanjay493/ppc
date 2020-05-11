  
<div class="rake_dist">
<h4 class="text-center"> Production, Despatch, Stock(+/-) </h4>


<div class="d-flex table-data">
   <table class="table table-sm table-bordered">
   <tr>
       <th rowspan='1'></th>
       <th colspan="3">Lump</th>
       <th></th>
       <th colspan="3">Fines</th>
       <th></th>

       </tr>
             
<?php 

 if(isset($_POST['custom_mth'])){
 
  $yymm1 = textboxValue('yyyymm1');
    $yymm2 = textboxValue('yyyymm2');
    $mine1 = textboxValue('mines1');
    $start_yr =(int)substr($yymm1,0,4);
    $end_yr =(int)substr($yymm2,0,4);
   
    $dummyMth=month_list($yymm1,$yymm2);
  // print_r($dummyMth);
    

  $result=production_despatch_mth("yymm, comm,act_qty as act_qty","u_pr_mth", "(yymm>='$yymm1' AND yymm<='$yymm2') AND unit='$mine1' AND comm IN('L', 'F' ) ","yymm, comm ","yymm DESC , comm DESC ",$yymm1,$yymm2);
  $result1=production_despatch_mth("yymm, comm, SUM(act_qty) as act_qty","u_ds_mth", "(yymm>='$yymm1' AND yymm<='$yymm2') AND unit='$mine1' AND comm IN('L', 'F' ) ","yymm, comm ","yymm DESC , comm DESC ",$yymm1,$yymm2);
//print_r($result);
$mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
$mines_name=["Kiriburu Iron Ore Mines", "Meghahatuburu Iron Ore Mines","Bolani Ore Mines", "Barsua Iron Mines", "Taldih Iron Mines","Kalta Iron Mines", "Gua Ore Mines","Manoharpur Ore Mines"];
  $i=0;
  echo '<tr class="bg-primary text-white"><td colspan="9">'.$mines_name[array_search($mine1, $mines)].'</td><tr>';
  echo '<tr><td colspan="9">'.monthName_yymm($yymm1).'-'.$start_yr.'____   to____  '.monthName_yymm($yymm2).'-'.$end_yr.'</td><tr>';
  echo '<tr><th></th><th>Production</th><th>Despatch</th> <th>Stock(+/-)</th> <th></th><th>Production</th><th>Despatch</th> <th>Stock(+/-)</th><th></th></tr>';
  while($i<COUNT($result)){
    echo '<tr>';
    $j=1;
    if($result[$i]==0){
      echo '<td>Total</td>';
    }else {
      echo '<td>'.$result[$i].'</td>';
    }
    
    while($j<3){
    echo '<td>'.$result[$i+$j].'</td>';
    echo '<td>'.$result1[$i+$j].'</td>';
    echo '<td>'.($result[$i+$j]-$result1[$i+$j]).'</td>';
    echo '<td></td>';
 $j++;
    }
    $i =$i+3;
    echo '</tr>';
  }
 }

 ?>
                
    </tbody>
   </table>
   </div>
  </div>


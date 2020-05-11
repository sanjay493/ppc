
<div class="rake_dist">
<h4 class="text-center"> Production, Despatch, Stock(+/-) </h4>
<h3 class="validation_msg"></h3>

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

 if(isset($_POST['annual_data'])){
 
  $yyyy1 = textboxValue('yyyy1');
    $yyyy2 = textboxValue('yyyy2');
   $mine1 = textboxValue('mine1');
    // $start_yr =(int)substr($yymm1,0,4);
    // $end_yr =(int)substr($yymm2,0,4);

    if($yyyy2 ==" "){
        $yyyy2 =date("Y");
    }

   
    if($yyyy1<'2013'){
        echo "<h3 class='validation_msg'>we Don't have Data Prior 2013</h3> ";
    }
   
    $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
    $mines_name=["Kiriburu Iron Ore Mines", "Meghahatuburu Iron Ore Mines","Bolani Ore Mines", "Barsua Iron Mines", "Taldih Iron Mines","Kalta Iron Mines", "Gua Ore Mines","Manoharpur Ore Mines"];
    if($mine1==""){
        $mine_name="RMD Iron Ore Mines";
    }else{
        $mine_name=$mines_name[array_search($mine1, $mines)];
    }
    
    echo '<tr class="bg-primary text-white"><td colspan="9">'.$mine_name.'</td><tr>';
    //   $i=0;
  echo '<tr><td colspan="9">' .$yyyy1.'____to____'  .$yyyy2.'</td><tr>';
  echo '<tr><th></th><th>Production</th><th>Despatch</th> <th>Stock(+/-)</th> <th></th><th>Production</th><th>Despatch</th> <th>Stock(+/-)</th><th></th></tr>';
    
$x=$yyyy1+1;
    while($x<=$yyyy2)
    {
        $yymm1 =$yyyy1.'04';
        $yymm2 =$x.'03';

        if($mine1==""){
            $condition="(yymm>='$yymm1' AND yymm<='$yymm2')  AND comm IN('L', 'F' )  GROUP BY comm";
        }else{
            $condition= "(yymm>='$yymm1' AND yymm<='$yymm2') AND unit='$mine1' AND comm IN('L', 'F' )  GROUP BY comm";
        }

  
$result=production_despatch_annual("comm,SUM(act_qty) as act_qty","u_pr_mth", $condition);
$result1=production_despatch_annual("yymm, comm, SUM(act_qty) as act_qty","u_ds_mth", $condition);
//print_r($result);
//print_r($result2);
//   while($i<COUNT($result)){
  echo '<tr>';
//     $j=1;
//     if($result[$i]==0){
//       echo '<td>Total</td>';
//     }else {
       echo '<td>'.$yyyy1.'-'.$x.'</td>';
       echo '<td>'.$result[0].'</td>';
       echo '<td>'.$result1[0].'</td>';
      echo '<td>'.($result[0]-$result1[0]).'</td>';
       echo '<td></td>';
      echo '<td>'.$result[1].'</td>';
       echo '<td>'.$result1[1].'</td>';
       echo '<td>'.($result[1]-$result1[1]).'</td>';
       echo '<td></td>';
//     }
    
//     while($j<3){
//     echo '<td>'.$result[$i+$j].'</td>';
//     echo '<td>'.$result1[$i+$j].'</td>';
//     echo '<td>'.($result[$i+$j]-$result1[$i+$j]).'</td>';
//     echo '<td></td>';
//  $j++;
//     }
//     $i =$i+3;
//     echo '</tr>';

$yyyy1++;
$x++;
}
 }

 ?>
                
    </tbody>
   </table>
   </div>
  </div>


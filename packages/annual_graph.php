
<?php
include_once ("../DB_Connect/operation.php");
include_once ("../DB_Connect/mth_operation.php");
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<?php
  $yyyy1 ='2013';
    $yyyy2 = '2020';
  $dummyArray =array();
$x=$yyyy1+1;
$i=0;
while($x<$yyyy2)
    {   
        $yymm1 =$yyyy1.'04';
        $yymm2 =$x.'03';
              $condition="(yymm>='$yymm1' AND yymm<='$yymm2')  AND comm IN('L', 'F' )  GROUP BY comm";
              $sql= "SELECT comm,SUM(act_qty) as act_qty  FROM u_pr_mth WHERE ". $condition;
               $result = mysqli_query($GLOBALS['con'], $sql ); 
              
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result))
           { $dummyArrayItem = array();
               if($row['comm']=='L'){$dummyArrayItem['lump']=$row['act_qty'];}
              elseif($row['comm']=='F'){$dummyArrayItem['fines']=$row['act_qty'];}
           }
           array_push($dummyArray,$dummyArrayItem);
      }
      //print_r($dummyArray);
      // return $dummyArray;
      $i=$i+2;
      $yyyy1++;
      $x++;
      }

?>

<canvas id="myChart" width="400" height="400"></canvas>

      <script>
      console.log($dummyArray);
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: $dummyArray,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

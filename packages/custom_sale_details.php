<?php


?>
<div class="rake_dist">
<h4 class="text-center">Sale Details Quantity</h4>

<div class="d-flex table-data">
   <table class="table table-sm table-bordered">
   <thead class="thead-dark">
   <tr class="table-info">
   
   </tr>
   </thead>
   <tbody>
<?php 
if(isset($_POST['custom_sale_details'])){
  $date1 = textboxValue('date1');
    $date2 = textboxValue('date2');
    

       
    $condition ="( rpt_date>='$date1' AND rpt_date<='$date2') ";
 
 $sql="select EXTRACT( YEAR_MONTH FROM `rpt_date` ) as mthyear, unit, nature, sum(f_qty) as Qty FROM mines_desppatch WHERE cust ='SALE' AND ".$condition." GROUP BY unit, nature, month(rpt_date) ORDER BY month(rpt_date) DESC";
 $temp_mthyear=0;
 $sub_qty=0;
 //print_r($sql);
     $result = mysqli_query($GLOBALS['con'], $sql ); 
        if(mysqli_num_rows($result)>0){
          while($row=mysqli_fetch_assoc($result)){
           // print_r($row);
            
            if($row["mthyear"]!==$temp_mthyear){
          
          if($temp_mthyear!==0){
            echo '<tr class="bg-success">';
             // Print Month total at the end of each months. it will skip at intial line due to $temp_mthyear =0
            echo '<td colspan="2"> Sub Total</td> <td>'.$sub_qty.'</td></tr>';
         }
         echo '<tr>';
       // Display Month year  at start of row
       echo '<td colspan="3">'.monthName_yymm($row["mthyear"]).'-'.substr($row["mthyear"],0,4).'</td>';
       echo '</tr><tr>';
         
       $temp_mthyear=$row["mthyear"];
               //Display 1st row unit wise destination wise quantity of sale
               echo '<td>'.$row["unit"].' </td>';
               echo '<td>' . $row["nature"].' </td>';
               echo '<td>' . $row["Qty"].' </td>';
               $sub_qty=$sub_qty+$row["Qty"];
               echo '</tr>';
            }else{
            ////Display others rows unit wise destination wise quantity of sale for same Year month 
               echo '<td>'.$row["unit"].' </td>';
               echo '<td>' . $row["nature"].' </td>';
               echo '<td>' . $row["Qty"].' </td>';
               $sub_qty=$sub_qty+$row["Qty"];
               echo '</tr>';
                 }
              
               }
                   
               }
     
     else{
      TextNode("error", "No Data of the selected duration");
     }

 
      echo '</tr>';
    }
 ?>
                
    </tbody>
   </table>
   </div>
  </div>


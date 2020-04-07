<?php 
require_once("conn.php");
require_once("components.php");





  


  function textboxValue($value1){
  
    //echo $GLOBALS['con'];
      $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value1]));
      if(empty($textbox)){
          return 0;
          echo $textbox;
      }else{
          return $textbox;
      }
  }


  
//Custom function used for Despatch Distribution Pages
    function sqlSelect($column, $table, $condition,$groupbycondition,$comm){
      $sql ="SELECT unit, comm, ". $column ." Qty FROM `" . $table . "` WHERE " . $condition." GROUP BY " .$groupbycondition;
     //  print_r($sql);
      $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR","Total");
      $result = mysqli_query($GLOBALS['con'], $sql ); 
      //  8 Iron Ore mines 1 Flux Mines and Total of Iron Ore Mines; Total for flux is also considered 
      $comm=$comm;
      $tempArray =array_fill(0, 19, 0);
      
      if($sql){
     //print_r($result);
      if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
        //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
              if($row['comm']==$comm[2]){
                $tempArray[18]=+$row['Qty'];  
              }else{
                  for ($i=0; $i<=count($comm)-2; $i++){
                 // $i=0 for Lump, $i=1 for Fines, $i=2 for Limestone
                 if($row['comm']==$comm[$i]){
                for($j=0; $j<=8;$j++){
                  if ( $mines[$j]==$row['unit'] ){  
                      $tempArray[$j+$i*9]=+$row['Qty'];      
                      $tempArray[8+($i*9)]=$tempArray[8+($i*9)]+$row['Qty'];      
               }}}
              
              }
              }
                  }          
    }}
    else{     echo "Error: " . "<br>" . $GLOBALS['con']->error; }
  // print_r($tempArray);
    return $tempArray;
    }
    
 //Custom function used for Mines Production, Despatch, ROM & OB & Flux Production & Despatch
 function sqlPRDSRM($column, $table, $condition2,$groupbycondition,$comm, $mines){
  $sql ="SELECT ". $column ." Qty FROM `" . $table . "` WHERE " . $condition2." GROUP BY " .$groupbycondition;
//  print_r($sql);
  $result = mysqli_query($GLOBALS['con'], $sql ); 
  $a = count($comm)*count($mines);
  //  8 Iron Ore mines 1 Flux Mines and Total of Iron Ore Mines; Total for flux is also considered 
  $tempArray =array_fill(0, 18, 0);
  
  if($sql){
    //print_r($result);
     if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
       //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
             if($row['comm']=='L'){
              for($j=0; $j<=7;$j++){
                if ( $mines[$j]==$row['unit'] ){  
                    $tempArray[$j]=+$row['Qty'];      
                    $tempArray[8]=$tempArray[8]+$row['Qty'];      
             }}}else
             {for($j=0; $j<=7;$j++){
              if ( $mines[$j]==$row['unit'] ){  
                  $tempArray[$j+9]=+$row['Qty'];      
                  $tempArray[17]=$tempArray[17]+$row['Qty'];      
           }}}}}    
   }
else{     echo "Error: ".$sql."<br>" . $GLOBALS['con']->error; }
//print_r($tempArray);
return $tempArray;
}



//Fines Despatch Quantity 
function getDespQty($column, $table, $condition, $groupbycondition){

  $date1 = textboxValue('date1');
  $date2 = textboxValue('date2');
  $destination =array("BSL","DSP","RSP","ISP", "BSP","SALE");
  $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
  $qty= array_fill(0,6,array_fill(0,8,0));  
  $sql = "SELECT ".$column." FROM `". $table . "` WHERE " .$condition. "GROUP BY" .$groupbycondition;
$result = mysqli_query( $GLOBALS['con'],  $sql);
if(mysqli_num_rows($result)>0){
  
    while($row=mysqli_fetch_assoc($result)){
            for($i=0; $i<=5; $i++){
              for($j=0; $j<=7;$j++){
                if ($destination[$i]==$row['cust'] && $mines[$j]==$row['unit']){
                  $qty[$i][$j] =+$row['qty'];
                }
              }
            }
        }   
        return $qty;     
}
}
?>




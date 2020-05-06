<?php 
require_once("conn.php");
require_once("components.php");



  
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



function sqlFlux($column, $table, $condition2,$groupbycondition){
  $sql ="SELECT ". $column ." Qty FROM `" . $table . "` WHERE " . $condition2." GROUP BY " .$groupbycondition;
//  print_r($sql);
  $result = mysqli_query($GLOBALS['con'], $sql ); 
  //  8 Iron Ore mines 1 Flux Mines and Total of Iron Ore Mines; Total for flux is also considered 
  $temp=0;
  
  if($sql){
    //print_r($result);
     if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
                    $temp=+$row['Qty'];      
                     
            }    
   }}
else{     echo "Error: ".$sql."<br>" . $GLOBALS['con']->error; }
//print_r($tempArray);
return $temp;
}



//Fines Despatch Quantity 
function getDespQty($column, $table, $condition, $groupbycondition){

  $date1 = textboxValue('date1');
  $date2 = textboxValue('date2');
  $destination =array("BSL","DSP","RSP","ISP", "BSP","PMSB", "ESCL");
  $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
  $qty= array_fill(0,(COUNT($destination)+1),array_fill(0,8,0));  
  $sql = "SELECT ".$column." FROM `". $table . "` WHERE " .$condition. "GROUP BY" .$groupbycondition;
$result = mysqli_query( $GLOBALS['con'],  $sql);
if(mysqli_num_rows($result)>0){
  
    while($row=mysqli_fetch_assoc($result)){
            for($i=0; $i<COUNT($destination); $i++){
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

function mines_production_decpatch_stock($column,$table, $condition, $groupbycondition)
{$desp_Table=array_fill(0,8,0);
  $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
  $sql = "SELECT ".$column." FROM `". $table . "` WHERE " .$condition. "GROUP BY " .$groupbycondition;
  //print_r($sql);
  $result = mysqli_query( $GLOBALS['con'],  $sql);
  //print_r($result);
  if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){

      for($j=0; $j<=7; $j++){
          if($row['unit']==$mines[$j]){
              $desp_Table[$j]=$row['qty'];
          }
      }}  }
     // print_r($desp_Table);
      return $desp_Table;
}

function month_list( $yymm1,$yymm2){
  //print_r($yymm1);
  $start_yr=(int)substr($yymm1,0,4);
  $end_yr=(int)substr($yymm2,0,4);
$start_mth =(int)substr($yymm1,4,2);
$end_mth =(int)substr($yymm2,4,2);

      $yrDiffMth =($end_yr-$start_yr)*12;
      $mthDiff=$end_mth-$start_mth+1;
       $no_of_mth =$yrDiffMth+$mthDiff;
$yr=$start_yr;
$mth=$start_mth;
// print_r($start_yr);
// print_r($end_yr);
// print_r($yr);
// print_r($start_mth);
// print_r($end_mth);
// print_r($mth);

$dummyMth=[];
for($i=0; $i<$no_of_mth; $i++)
{ if(strlen((string)$mth)==1){
  $mth ='0'.strval($mth);
  //print_r($mth);
}
$dummy=strval($yr).strval($mth);
array_push($dummyMth,$dummy);
$mth++;
  if($mth>12){
      $mth=1;
       $yr++;}
  }    
  //print_r($dummyMth);
return $dummyMth;
}


function production_despatch_mth($column2,$table2,$condition3,$groupbycondition,$orderby,$yymm1,$yymm2){
  $sql= "SELECT ".$column2." FROM ".$table2." WHERE ". $condition3." GROUP BY ".$groupbycondition." ORDER BY ".$orderby;
$result = mysqli_query($GLOBALS['con'], $sql ); 

//print_r($sql);
$dummyMth=month_list($yymm1,$yymm2);
//print_r($dummyMth);
$dummyArray=array_fill(0,3*COUNT($dummyMth),0);
//$dummyArray=array();
//print_r($dummyMth);
//print_r("-");
//print_r(3*COUNT($dummyMth));
if(mysqli_num_rows($result)>0){
  while($row=mysqli_fetch_assoc($result)){
       
        $m=0;$a=0;
    while($a<3*COUNT($dummyMth))
     {      
             if($row['yymm']==(string)$dummyMth[$a/3]){
            $dummyArray[$a]=(string)$dummyMth[$a/3];
          //print_r($row['yymm']);
                  if($row['comm']=='L'){
                  $dummyArray[$a+1]+=$row['act_qty'];}
                  else{
                  $dummyArray[$a+2]+=$row['act_qty'];
                }}else{
         //print_r($row['yymm']);
         // print_r('-');
          $dummyArray[$a]=(string)$dummyMth[$a/3];
                  $dummyArray[$a+1]+=0;
                  $dummyArray[$a+2]+=0;
                }
                $a=$a+3;
                $m++;
     }
    

  }
  
}
print_r($dummyArray);
return $dummyArray;
}

?>




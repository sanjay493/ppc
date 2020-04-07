<?php 
require_once("conn.php");
require_once("components.php");



// create button clink

if(isset($_POST['create'])){
    createData();
}


function createData(){
    $md_id = textboxValue('md_id');
    $unit = textboxValue('unit');
    $rpt_date = textboxValue('rpt_date');
    $rake_no = textboxValue('rake_no');
    $raketype = textboxValue('raketype');
    $cust = textboxValue('cust');
    $wg_l = textboxValue('wg_l');
    $wg_f = textboxValue('wg_f');
    $arrival = textboxValue('arrival');
    $placement = textboxValue('placement');
    $lcompletion = textboxValue('lcompletion');
    $ldgtime = textboxValue('ldgtime');
    $l_qty = textboxValue('l_qty');
    $f_qty = textboxValue('f_qty');

    if($rpt_date && $unit && $rake_no && $raketype && $cust && $placement && $lcompletion && $ldgtime){

    $sql = "INSERT INTO mines_desppatch(unit, rpt_date, rake_no, raketype, cust, wg_l, wg_f, arrival, placement, lcompletion, ldgtime, l_qty, f_qty)
                                              VALUES('$unit','$rpt_date', '$rake_no',  '$raketype', '$cust', $wg_l, $wg_f, '$arrival', '$placement', '$lcompletion', '$ldgtime', $l_qty, $f_qty)";
   if(mysqli_query($GLOBALS['con'],$sql)){
       TextNode("success", "Record Successfully Inserted....");
   }else{
    echo "Error: " . $sql . "<br>" . $GLOBALS['con']->error;
   }}
   else{
      TextNode("error", "Provide Data in textbox");
   }
}




//get data from database

function getData(){
    
    $sql = "SELECT * FROM mines_desppatch ORDER BY rpt_date DESC LIMIT 10";

    $result = mysqli_query($GLOBALS['con'], $sql);
    if(mysqli_num_rows($result)>0){
     return $result;
    }
}


function getCustomData(){
  //echo trim($_POST['date1']);
  //echo trim($_POST['date2']);

    $date1 = textboxValue('date1');
    $date2 = textboxValue('date2');
   $unit = textboxValue('unit');
    $sql = "SELECT * FROM mines_desppatch WHERE (rpt_date>='$date1' AND rpt_date<='$date2') AND unit='$unit'";
   
    //echo $sql;
    $result = mysqli_query($GLOBALS['con'], $sql);
    if(!mysqli_query($GLOBALS['con'],$sql))
   {
   echo "Error: " . $sql . "<br>" . $GLOBALS['con']->error;
  }
      //echo $result;
     return $result;

}




//rake Loading Time Average
function getRakeTime(){

  $date1 = textboxValue('date1');
  $date2 = textboxValue('date2');
  $ldg_time = array_fill(0,16,0);
   $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
   $sql_ldg_time = "SELECT unit, SUM(hour(ldgtime) * 3600 + (minute(ldgtime) * 60) + second(ldgtime)) as TotalTime,
    COUNT(cust) as rakes FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY unit";
 // Lump Quantity distribution 
 $result_ldg_time = mysqli_query( $GLOBALS['con'],  $sql_ldg_time);
 if(mysqli_num_rows($result_ldg_time)>0){
    while($row_ldg_time=mysqli_fetch_assoc($result_ldg_time)){
    //      // echo $row_l_qty['cust']." " .$row_l_qty['unit']. " " .$row_l_qty['l_qty']. " <br />";
           for($j=0; $j<=7;$j++){
               if ( $mines[$j]==$row_ldg_time['unit']){
                    $ldg_time[$j] =+$row_ldg_time['TotalTime'];   
                    $ldg_time[$j+8] =+$row_ldg_time['rakes'];   
                    //$ldg_time[16] = $ldg_time[16]+$row_ldg_time['rakes'];  
               }
               
           }
          
         }          
         //print_r($ldg_time);
        return $ldg_time; 
        //return $result_ldg_time;
 }

   }

//update data
function updateData(){
    $md_id =textboxValue('md_id');
    $unit = textboxValue('unit');
    $rpt_date = textboxValue('rpt_date');
    $rake_no = textboxValue('rake_no');
    $raketype = textboxValue('raketype');
    $cust = textboxValue('cust');
    $wg_l = textboxValue('wg_l');
    $wg_f = textboxValue('wg_f');
    $arrival = textboxValue('arrival');
    $placement = textboxValue('placement');
    $lcompletion = textboxValue('lcompletion');
    $ldgtime = textboxValue('ldgtime');
    $l_qty = textboxValue('l_qty');
    $f_qty = textboxValue('f_qty');

    if($rpt_date && $unit && $rake_no && $raketype && $cust && $placement && $lcompletion && $ldgtime){

        $sql = "
        UPDATE mines_desppatch SET unit= '$unit', rpt_date='$rpt_date', rake_no= '$rake_no', raketype='$raketype',cust= '$cust', wg_l=$wg_l, wg_f=$wg_f, arrival='$arrival', placement='$placement', lcompletion='$lcompletion', ldgtime= '$ldgtime', l_qty=$l_qty, f_qty=$f_qty WHERE md_id=$md_id
            ";
          print_r($sql);
            if(mysqli_query($GLOBALS['con'], $sql)){
                TextNode("success", "Data Successfully updated..");
            }   else{
                echo "Error: " . $sql . "<br>" . $GLOBALS['con']->error;
                TextNode("error: ","Unable to update data");
            }                                 
      }
       else{
          TextNode("error", "Select Data using Edit icon");
       }
    }


//messages
function TextNode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}

function secToHR($seconds) {
  $hours = floor($seconds / 3600);
  $minutes = floor(($seconds / 60) % 60);
  $seconds = $seconds % 60;
  return "$hours:$minutes:$seconds";
}


//Updating Monthly Despatch Quantity 
if(isset($_POST['mth_despatch'])){
  // No of days calculation from the user input date rage
  
      $date1 = textboxValue('date1');
      $date2 = textboxValue('date2');
     
     $sql_temp_l ="INSERT INTO temp_mines_desp(rpt_date,unit,cust,comm,act_qty) SELECT rpt_date,unit,cust,'L',l_qty from mines_desppatch WHERE (rpt_date>='$date1' AND rpt_date<='$date2')";
     if(mysqli_query($GLOBALS['con'],$sql_temp_l)){TextNode("success", "Lump Despatch data Record Successfully Inserted..in Temp Table..");
    }else{
     echo "Error: " . $sql_temp_l . "<br>" . $GLOBALS['con']->error;
     }
   $sql_temp_f ="INSERT INTO temp_mines_desp(rpt_date,unit,cust,comm,act_qty) SELECT rpt_date,unit,cust,'F',f_qty from mines_desppatch WHERE (rpt_date>='$date1' AND rpt_date<='$date2')";
     if(mysqli_query($GLOBALS['con'],$sql_temp_f)){TextNode("success", "Fines Despatch data  Record Successfully Inserted...n Temp Table.");
     }else{
      echo "Error: " . $sql_temp_f . "<br>" . $GLOBALS['con']->error;
     }
   $sql_mth_desp = "INSERT INTO u_ds_mth(yymm, unit, cust, comm, act_qty) SELECT EXTRACT( YEAR_MONTH FROM `rpt_date` ) as mthyear, unit, cust, comm, SUM(act_qty) FROM temp_mines_desp GROUP by unit, cust,comm";
   //$sql_mth_desp .= "SELECT EXTRACT( YEAR_MONTH FROM `rpt_date` ) as mthyear, unit, cust, SUM(f_qty) FROM mines_desppatch GROUP by unit, cust ORDER by mthyear";
   
   if(mysqli_query($GLOBALS['con'],$sql_mth_desp)){
    TextNode("success", " Lump & Fines Record Successfully Inserted..u_ds_mth Table..");
}else{
 echo "Error: " . $sql_mth_desp . "<br>" . $GLOBALS['con']->error;
}
$sql_delete ="DELETE FROM temp_mines_desp";
if(mysqli_query($GLOBALS['con'],$sql_delete)){
  TextNode("success", " Data from Temporary Table has been deleted.....");
}else{
echo "Error: " . $sql_delete . "<br>" . $GLOBALS['con']->error;
}}


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


  

   function getRakeTotal($column, $table, $condition, $groupbycondition){
                  
                $destination =array("BSL","DSP","RSP","ISP", "BSP","SALE");
                $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
                $rake= array_fill(0,6,array_fill(0,8,0));  

                $sql = "SELECT ".$column." FROM `". $table . "` WHERE " .$condition. "GROUP BY" .$groupbycondition;
               // print_r($sql);

                $result = mysqli_query( $GLOBALS['con'],  $sql);
                if(mysqli_num_rows($result)>0){

                while($row=mysqli_fetch_assoc($result)){
                        //echo $row['cust']." " .$row['unit']. " " .$row['rakes']. " <br />";
                          for($i=0; $i<=5; $i++){
                            for($j=0; $j<=7;$j++){
                              if ($destination[$i]==$row['cust'] && $mines[$j]==$row['unit']){
                                $rake[$i][$j] =+$row['rakes'];
                              }
                            }
                          }

                      }  
      
     //print_r($rake);     
      return $rake;     
}

}








 
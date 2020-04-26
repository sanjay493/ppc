<?php 
require_once("conn.php");
require_once("components.php");



// Add Daily Rake Despatch  used in  rake_add.php

if(isset($_POST['create'])){
    createData();
}


function createData(){
  $md_id =textboxValue('md_id');
  $unit = textboxValue('unit');
  $rpt_date = textboxValue('rpt_date');
  $rake_no = textboxValue('rake_no');
  $raketype = textboxValue('raketype');
  $wg_l = textboxValue('wg_l');
  $wg_f = textboxValue('wg_f');
  $cust = textboxValue('cust');
  $nature = textboxValue('nature');
  $arrival = textboxValue('arrival');
  $placement = textboxValue('placement');
  $lcompletion = textboxValue('lcompletion');
  $ldgtime = textboxValue('ldgtime');
  $l_qty = textboxValue('l_qty');
  $f_qty = textboxValue('f_qty');
  $rr_no = textboxValue('rr_no');
    

    if($rpt_date && $unit && $rake_no && $raketype && $cust && $placement && $lcompletion && $ldgtime){

    $sql = "INSERT INTO mines_desppatch(unit, rpt_date, rake_no, raketype, cust, wg_l, wg_f, arrival, placement, lcompletion, ldgtime, l_qty, f_qty, rr_no, nature)
                                              VALUES('$unit','$rpt_date', '$rake_no',  '$raketype', '$cust', $wg_l, $wg_f, '$arrival', '$placement', '$lcompletion', '$ldgtime', $l_qty, $f_qty, $rr_no, $nature)";
   if(mysqli_query($GLOBALS['con'],$sql)){
       TextNode("success", "Record Successfully Inserted....");
   }else{
    echo "Error: " . $sql . "<br>" . $GLOBALS['con']->error;
   }}
   else{
      TextNode("error", "Provide Data in textbox");
   }
}

// Add Daily Production Report Iron and Flux Both  used in  mines_production.php

if(isset($_POST['addProdn'])){
  addProdn();
}


function addProdn(){
  $id = textboxValue('id');
  $unit = textboxValue('unit');
  $rpt_date = textboxValue('rpt_date');
  $dept_rm = textboxValue('dept_rm');
  $cont_rm_fg = textboxValue('cont_rm_fg');
  $dept_ob = textboxValue('dept_ob');
  $cont_ob_fg = textboxValue('cont_ob_fg');
  $cont_rm_darea = textboxValue('cont_rm_darea');
  $cont_ob_darea = textboxValue('cont_ob_darea');
  $lump_darea = textboxValue('lump_darea');
  $fines_darea = textboxValue('fines_darea');
  $cont_rm_p = textboxValue('cont_rm_p');
  $cont_ob_p = textboxValue('cont_ob_p');
  $lump_p = textboxValue('lump_p');
  $fines_p = textboxValue('fines_p');
  $screen_input = textboxValue('screen_input');
    $dept_lump = textboxValue('dept_lump');
    $dept_fines = textboxValue('dept_fines');
    $drill = textboxValue('drill');
    $bin_lump_stock = textboxValue('bin_lump_stock');
    $bin_fines_stock = textboxValue('bin_fines_stock');
    $ground_lump_stock = textboxValue('ground_lump_stock');
    $ground_fines_stock = textboxValue('ground_fines_stock');

  if($rpt_date && $unit){

  $sql = "INSERT INTO u_pr_dly(unit, rpt_date, dept_rm, cont_rm_fg, dept_ob, cont_ob_fg, screen_input, dept_lump, dept_fines, cont_rm_darea, cont_ob_darea, lump_darea, fines_darea, cont_rm_p , cont_ob_p, lump_p, fines_p, drill, bin_lump_stock, bin_fines_stock, ground_lump_stock,ground_fines_stock)
                                            VALUES('$unit','$rpt_date', $dept_rm,$cont_rm_fg, $dept_ob, $cont_ob_fg, $screen_input,  $dept_lump, $dept_fines, $cont_rm_darea, $cont_ob_darea, $lump_darea, $fines_darea, $cont_rm_p, $cont_ob_p, $lump_p, $fines_p, $drill, $bin_lump_stock, $bin_fines_stock, $ground_lump_stock, $ground_fines_stock)";
 if(mysqli_query($GLOBALS['con'],$sql)){
     TextNode("success", "Record Successfully Inserted....");
 }else{
  echo "error" . $sql . "<br>" . $GLOBALS['con']->error;
 }}
 else{
    TextNode("error", "Provide Data in textbox");
 }
}

// Used to retrieve last 10 Production data used at mines_production.php 
function getProductionData(){
    
  $sql = "SELECT * FROM u_pr_dly ORDER BY rpt_date DESC LIMIT 10";

  $result = mysqli_query($GLOBALS['con'], $sql);
  if(mysqli_num_rows($result)>0){
   return $result;
  }
}

// Used to retrieve Custom Production data as per user input used at mines_custom_production.php
// it will be used to modify Production of the selected range

function getCustomProductionData(){
  $date1 = textboxValue('date1');
  $date2 = textboxValue('date2');
 $unit = textboxValue('unit');
 
  $sql = "SELECT * FROM u_pr_dly WHERE (rpt_date>='$date1' AND rpt_date<='$date2') ORDER BY id DESC";
 
  //echo $sql;
  $result = mysqli_query($GLOBALS['con'], $sql);
  if(!mysqli_query($GLOBALS['con'],$sql))
 {
 echo "Error: " . $sql . "<br>" . $GLOBALS['con']->error;
}
    //echo $result;
   return $result;

   // Used to updated modified Production data
}
if(isset($_POST['updateProduction'])){
updateProduction();
}


//update  Production  data
function updateProduction(){
  $id = textboxValue('id');
  $unit = textboxValue('unit');
  $rpt_date = textboxValue('rpt_date');
  $dept_rm = textboxValue('dept_rm');
  $cont_rm_fg = textboxValue('cont_rm_fg');
  $dept_ob = textboxValue('dept_ob');
  $cont_ob_fg = textboxValue('cont_ob_fg');
  $cont_rm_darea = textboxValue('cont_rm_darea');
  $cont_ob_darea = textboxValue('cont_ob_darea');
  $lump_darea = textboxValue('lump_darea');
  $fines_darea = textboxValue('fines_darea');
  $cont_rm_p = textboxValue('cont_rm_p');
  $cont_ob_p = textboxValue('cont_ob_p');
  $lump_p = textboxValue('lump_p');
  $fines_p = textboxValue('fines_p');
  $screen_input = textboxValue('screen_input');
    $dept_lump = textboxValue('dept_lump');
    $dept_fines = textboxValue('dept_fines');
    $drill = textboxValue('drill');
    $bin_lump_stock = textboxValue('bin_lump_stock');
    $bin_fines_stock = textboxValue('bin_fines_stock');
    $ground_lump_stock = textboxValue('ground_lump_stock');
    $ground_fines_stock = textboxValue('ground_fines_stock');

  if($rpt_date && $unit ){

      $sql = "
      UPDATE u_pr_dly SET unit= '$unit', rpt_date='$rpt_date', dept_rm=$dept_rm, cont_rm_fg=$cont_rm_fg, dept_ob=$dept_ob, cont_ob_fg=$cont_ob_fg, screen_input=$screen_input, dept_lump=$dept_lump, dept_fines=$dept_fines, cont_rm_darea=$cont_rm_darea, cont_ob_darea=$cont_ob_darea, lump_darea=$lump_darea, fines_darea=$fines_darea, cont_rm_p=$cont_rm_p, cont_ob_p=$cont_ob_p, lump_p=$lump_p, fines_p=$fines_p, drill=$drill, bin_lump_stock=$bin_lump_stock, bin_fines_stock=$bin_fines_stock, ground_lump_stock=$ground_lump_stock, ground_fines_stock=$ground_fines_stock WHERE id=$id";
        //print_r($sql);
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



//Get Last 10 Rake Despatch data from database used at rake_add.php

function getData(){
    
    $sql = "SELECT * FROM mines_desppatch ORDER BY rpt_date DESC LIMIT 10";

    $result = mysqli_query($GLOBALS['con'], $sql);
    if(mysqli_num_rows($result)>0){
     return $result;
    }
}

//Get custom Rake Despatch data from database used at mines_custom_despatch.php
function getCustomData(){
  //echo trim($_POST['date1']);
  //echo trim($_POST['date2']);

    $date1 = textboxValue('date1');
    $date2 = textboxValue('date2');
   $unit = textboxValue('unit');
   
    $sql = "SELECT * FROM mines_desppatch WHERE (rpt_date>='$date1' AND rpt_date<='$date2') AND unit='$unit' ORDER BY md_id DESC";
   
    //echo $sql;
    $result = mysqli_query($GLOBALS['con'], $sql);
    if(!mysqli_query($GLOBALS['con'],$sql))
   {
   echo "Error: " . $sql . "<br>" . $GLOBALS['con']->error;
  }
      //echo $result;
     return $result;

}
if(isset($_POST['update'])){
  updateData();
}



//rake Loading Time Average
function getRakeTime($date1,$date2){
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
                 // total loading time in seconds
                    $ldg_time[$j] =+round($row_ldg_time['TotalTime'],0);   
                    //total rakes mines wise
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

//update  Rake Despatch data
function updateData(){
    $md_id =textboxValue('md_id');
    $unit = textboxValue('unit');
    $rpt_date = textboxValue('rpt_date');
    $rake_no = textboxValue('rake_no');
    $raketype = textboxValue('raketype');
    $wg_l = textboxValue('wg_l');
    $wg_f = textboxValue('wg_f');
    $cust = textboxValue('cust');
    $nature = textboxValue('nature');
    $arrival = textboxValue('arrival');
    $placement = textboxValue('placement');
    $lcompletion = textboxValue('lcompletion');
    $ldgtime = textboxValue('ldgtime');
    $l_qty = textboxValue('l_qty');
    $f_qty = textboxValue('f_qty');
    $rr_no = textboxValue('rr_no');
    

    if($rpt_date && $unit && $rake_no && $raketype && $cust && $placement && $lcompletion && $ldgtime){

        $sql = "
        UPDATE mines_desppatch SET unit= '$unit', rpt_date='$rpt_date', rake_no= '$rake_no', raketype='$raketype',cust= '$cust', wg_l=$wg_l, wg_f=$wg_f, arrival='$arrival', placement='$placement', lcompletion='$lcompletion', ldgtime= '$ldgtime', l_qty=$l_qty, f_qty=$f_qty, rr_no='$rr_no', nature='$nature' WHERE md_id=$md_id
            ";
          //print_r($sql);
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
$msg ="";
function TextNode($classname, $msg){
    $element = "<h6 class=\"message $classname\">$msg</h6>";
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
    // Monthly Despatch insertion in Monthly Table from Daily Despatch Table
dly_mth("u_ds_mth","yymm, unit, cust, comm, act_qty","mines_desppatch","EXTRACT( YEAR_MONTH FROM `rpt_date` ) as mthyear, unit, cust, 'L', SUM(l_qty)","(rpt_date>='$date1' AND rpt_date<='$date2') GROUP by unit,cust");
dly_mth("u_ds_mth","yymm, unit, cust, comm, act_qty","mines_desppatch","EXTRACT( YEAR_MONTH FROM `rpt_date` ) as mthyear, unit, cust, 'F', SUM(f_qty)","(rpt_date>='$date1' AND rpt_date<='$date2') GROUP by unit,cust");
     // Monthly Production insertion in Monthly Table from Daily Production Table
dly_mth("u_pr_mth","yymm, unit, comm, act_qty","u_pr_dly","EXTRACT( YEAR_MONTH FROM `rpt_date` ) as mthyear, unit, 'L', SUM(dept_lump+lump_darea+lump_p)","(rpt_date>='$date1' AND rpt_date<='$date2') GROUP by mthyear, unit");
dly_mth("u_pr_mth","yymm, unit, comm, act_qty","u_pr_dly","EXTRACT( YEAR_MONTH FROM `rpt_date` ) as mthyear, unit, 'F', SUM(dept_fines+fines_darea+fines_p)","(rpt_date>='$date1' AND rpt_date<='$date2') GROUP by mthyear, unit");
  //Monthly ROM,  OB & DRILL insertion in Monthly Table from Daily ROM,  OB & DRILL Table
  dly_mth("u_pr_mth","yymm, unit, comm, act_qty","u_pr_dly","EXTRACT( YEAR_MONTH FROM `rpt_date` ) as mthyear, unit, 'RM', SUM(dept_rm+cont_rm_fg+cont_rm_darea+cont_rm_p)","(rpt_date>='$date1' AND rpt_date<='$date2') GROUP by mthyear, unit");
  dly_mth("u_pr_mth","yymm, unit, comm, act_qty","u_pr_dly","EXTRACT( YEAR_MONTH FROM `rpt_date` ) as mthyear, unit, 'OB', SUM(dept_ob+cont_ob_fg+cont_ob_darea+cont_ob_p)","(rpt_date>='$date1' AND rpt_date<='$date2') GROUP by mthyear, unit");
  dly_mth("u_pr_mth","yymm, unit, comm, act_qty","u_pr_dly","EXTRACT( YEAR_MONTH FROM `rpt_date` ) as mthyear, unit, 'DR', SUM(dept_ob+cont_ob_fg+cont_ob_darea+cont_ob_p)","(rpt_date>='$date1' AND rpt_date<='$date2') GROUP by mthyear, unit");
  rake_ldg_time_mth_table($date1,$date2);
}

function dly_mth($mth_table, $mth_table_columns, $dly_table, $dly_table_columns,$conditions){
  $sqlmth_from_dly="INSERT INTO ".$mth_table." (".$mth_table_columns.") SELECT ".$dly_table_columns." FROM ".$dly_table." WHERE ".$conditions;
if(mysqli_query($GLOBALS['con'],$sqlmth_from_dly)){
 TextNode("success", " Lump & Fines Record Successfully Inserted..u_ds_mth Table..");
}else{
echo "Error: " . $sqlmth_from_dly . "<br>" . $GLOBALS['con']->error;
}
}


function rake_ldg_time_mth_table($date1,$date2){
 $sql ="INSERT INTO u_rake_ldg_time (unit, yymm,ldg_time_sec, rakes) SELECT unit, EXTRACT( YEAR_MONTH FROM `rpt_date` ) as mthyear ,SUM(hour(ldgtime) * 3600 + (minute(ldgtime) * 60) + second(ldgtime)) as TotalTime,
 COUNT(cust) as rakes FROM mines_desppatch WHERE ( rpt_date>='$date1' AND rpt_date<='$date2') GROUP BY unit";
if(mysqli_query($GLOBALS['con'],$sql)){
  TextNode("success", " Rakes Record Successfully Inserted..u_rake_ldg_time Table..");
 }else{
 echo "Error: " . $sql . "<br>" . $GLOBALS['con']->error;
 }
}


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


  // Function to Get Rakes as per the user defined conditions

   function getRakeTotal($column, $table, $condition, $groupbycondition){
                  
    $destination =array("BSL","DSP","RSP","ISP", "BSP","PMSB", "ESCL");
    $mines=array("KRB", "MBR","BOL", "BAR","TAL","KAL","GUA","MPR");
                $rake= array_fill(0,(COUNT($destination)+1),array_fill(0,COUNT($mines),0));  

                $sql = "SELECT ".$column." FROM `". $table . "` WHERE " .$condition. "GROUP BY" .$groupbycondition;
               // print_r($sql);

                $result = mysqli_query( $GLOBALS['con'],  $sql);
                if(mysqli_num_rows($result)>0){

                while($row=mysqli_fetch_assoc($result)){
                        //echo $row['cust']." " .$row['unit']. " " .$row['rakes']. " <br />";
                          for($i=0; $i<COUNT($destination); $i++){
                            for($j=0; $j<COUNT($mines);$j++){
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








 
<?php
include_once ("../test/DB_Connect/components.php");
include_once ("../test/DB_Connect/operation.php");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/fe77521a69.js" crossorigin="anonymous"></script>
    <title>PPC Data Management & Reporting System!</title>
  </head>
  <body>
  <?php include("../test/DB_Connect/nav.php"); ?>
 <main>
 <div class="container text-center">
 <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-database"></i>PPC Data Management & Reporting System!</h1>
 <div class="d-flex justify-content-center">
 <form action="" method="post" class="">
      <div class="row py-2 justify-content-center">
               <div class="col-md-2 input-group" hidden><?php inputElement("","text","ID", "md_id",""); ?> </div>
                <div class="col-md-4 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date", "rpt_date",""); ?> </div>
                <div class="col-md-4 input-group" ><?php inputElement("","text","Mines", "unit",""); ?> </div>
    </div>
    <div class="row py-2">
                <div class="col-md-3 input-group" ><?php inputElement("","text","Rake No", "rake_no",""); ?></div>
                <div class="col-md-3 input-group" ><?php inputElement("","text","Rake Type", "raketype",""); ?> </div>
                <div class="col-md-3 input-group"><?php inputElement("","text","Wgs Lump", "wg_l",""); ?></div>
              <div class="col-md-3 input-group"> <?php inputElement("","text","Wgs Fines", "wg_f",""); ?> </div>
      </div>
      <div class="row py-2">
                <div class="col-md-3 input-group"><?php inputElement("","text","Arrival", "arrival",""); ?></div>
                <div class="col-md-3 input-group" ><?php inputElement("","text","Placement", "placement",""); ?> </div>
                <div class="col-md-3 input-group" ><?php inputElement("","text","Completion", "lcompletion",""); ?></div>
              <div class="col-md-3 input-group"> <?php inputElement("","text","Loading Time", "ldgtime",""); ?> </div>
      </div>
      <div class="row py-2">
                <div class="col-md-3 input-group" ><?php inputElement("","text","Destination", "cust",""); ?></div>
                <div class="col-md-3 input-group"><?php inputElement("","text","Lump Qty", "l_qty",""); ?> </div>
                <div class="col-md-3 input-group"><?php inputElement("","text","Fines Qty", "f_qty",""); ?></div>
      </div>
  <div class="d-flex justify-content-center">
 
  <?php buttonElement("btn-create","btn btn-light","<i class ='fas fa-pen-alt'></i>","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
  </div>

 </form>
 </div>
 <div class="container">
 <form action="" method="post">
<div class="d-flex justify-content-center">
<div class="row"> 
<div class="col-md-4 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date1", "date1",""); ?> </div>
<div class="col-md-4 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date2", "date2",""); ?> </div>
<div class="col-md-4 input-group" ><?php inputElement("","text","Mines", "unit",""); ?> </div>
</div>
<?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","custom_report","data-toggle='tooltip' data-placement='bottom' title='Monthly Despatch Qty'"); ?>
</div>
</form>
</div>
 </div>
 <div class="d-flex table-data">
 <table class="table table-striped table-light sm-table">
 <thead class="thead-dark">
 <tr>
 <th>ID</th>
 <th>Date</th>
 <th>Mines</th>
 <th>Rake No</th>
 <th>Rake Type</th>
 <th>Lump Wgs</th>
 <th>Fines Wgs</th>
 <th>Arrival</th>
 <th>Placement</th>
 <th>Completion</th>
 <th>Loading Time</th>
 <th>Destination</th>
 <th>Lump Qty</th>
 <th>Fines Qty</th>
 <th>Action</th>
 </tr>
 </thead>
 <tbody>
 <?php 
if(isset($_POST['custom_report'])){
  $result =getCustomData();
//echo $result;
  if($result){
    while($row=mysqli_fetch_assoc($result)){?>
   <tr>
   <td data-id="<?php echo $row['md_id'];?>"><?php echo $row['md_id']; ?></td>
   <td data-id="<?php echo $row['md_id'];?>"><?php echo $row['rpt_date']; ?></td>
   <td data-id="<?php echo $row['md_id'];?>"><?php echo $row['unit']; ?></td>
   <td data-id="<?php echo $row['md_id'];?>" ><?php echo $row['rake_no']; ?></td>
   <td data-id="<?php echo $row['md_id'];?>"><?php echo $row['raketype']; ?></td>
   <td data-id="<?php echo $row['md_id'];?>"><?php echo $row['wg_l']; ?></td>
   <td data-id="<?php echo $row['md_id'];?>"><?php echo $row['wg_f']; ?></td>
   <td data-id="<?php echo $row['md_id'];?>"><?php echo $row['arrival']; ?></td>
   <td data-id="<?php echo $row['md_id'];?>"><?php echo $row['placement']; ?></td>
   <td data-id="<?php echo $row['md_id'];?>"><?php echo $row['lcompletion']; ?></td>
   <td data-id="<?php echo $row['md_id'];?>"><?php echo $row['ldgtime']; ?></td>
   <td data-id="<?php echo $row['md_id'];?>"><?php echo $row['cust']; ?></td>
   <td data-id="<?php echo $row['md_id'];?>"><?php echo $row['l_qty']; ?></td>
   <td data-id="<?php echo $row['md_id'];?>"><?php echo $row['f_qty']; ?></td>
   <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['md_id'];?>"></i></td>
   
   </tr>


    <?php
    }
  }
}
 ?>
 </tbody>
 </table>
 </div>
 
 </div>
 
 
 </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="myapp.js"></script>
  </body>
</html>

<?php include("../test/DB_Connect/header.php"); ?>
<div class="container">
<form action="" method="POST" >
<div class="row py-2 justify-content-center">
<div class="col-md-2 input-group" hidden><?php inputElement("","text","ID", "id",""); ?> </div>
<div class="col-md-4 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date*", "rpt_date",""); ?> </div>
<div class="col-md-4 input-group" ><?php inputElement1(); ?></i></div>
</div>

  <div id="dept_mines">
  <h5 id="dept_area">F & G Area Mining</h5>
  <div class="form-row justify-content-center space-between">
  <div class="col-md-3 input-group" ><?php inputElement("","int","Dept. ROM", "dept_rm",""); ?> </div>
  <div class="col-md-3 input-group" ><?php inputElement("","int","Dept. OB", "dept_ob",""); ?> </div>
  <div class="col-md-3 input-group" ><?php inputElement("","int","Cont ROM F & G Area", "cont_rm_fg",""); ?> </div>
  <div class="col-md-3 input-group" ><?php inputElement("","int","Cont OB F & G Area", "cont_ob_fg",""); ?> </div>
</div></div>

<div id="div_darea">
<h5> D Area Contractual</h5>
  <div class="form-row">
  <div class="col-md-3 input-group" ><?php inputElement("","int","Cont. ROM D Area", "cont_rm_darea",""); ?> </div>
  <div class="col-md-3 input-group" ><?php inputElement("","int","Cont. OB D Area", "cont_ob_darea",""); ?> </div>
  <div class="col-md-3 input-group" ><?php inputElement("","int","Lump Prodn D Area", "lump_darea",""); ?> </div>
  <div class="col-md-3 input-group" ><?php inputElement("","int","Cont. Fines Prodn D Area", "fines_darea",""); ?> </div>
       </div></div>
  <div id="div_p">
<h5 id="contp">Panposh Contractual</h5>
  <div class="form-row">
  <div class="col-md-3 input-group" ><?php inputElement("","int","Cont. ROM Panpos", "cont_rm_p",""); ?> </div>
  <div class="col-md-3 input-group" ><?php inputElement("","int","Cont. OB Panpos", "cont_ob_p",""); ?> </div>
  <div class="col-md-3 input-group" ><?php inputElement("","int","Cont. Lump Production Panpos", "lump_p",""); ?> </div>
  <div class="col-md-3 input-group" ><?php inputElement("","int","Cont. Fines Production Panpos", "fines_p",""); ?> </div>
</div>
  </div>
  <div id="screen">
<h5> Departmental Screening</h5>
<div class="form-row">
<div class="col-md-3 input-group" ><?php inputElement("","int","Enter Screen Input", "screen_input",""); ?> </div>
  <div class="col-md-3 input-group" ><?php inputElement("","int","Dept Lump Production", "dept_lump",""); ?> </div>
  <div class="col-md-3 input-group" ><?php inputElement("","int","Dept Fines Production", "dept_fines",""); ?> </div>
  <div class="col-md-3 input-group" ><?php inputElement("","int","Drill", "drill",""); ?> </div>
   </div></div>
  
  <div class="form-row">
    <div class="col-md-3 input-group" ><?php inputElement("","int","Bin Lump Stock", "bin_lump_stock",""); ?> </div>
    <div class="col-md-3 input-group" ><?php inputElement("","int","Bin Fines Stock", "bin_fines_stock",""); ?> </div>
    <div class="col-md-3 input-group" ><?php inputElement("","int","Ground Lump Stock", "ground_lump_stock",""); ?> </div>
    <div class="col-md-3 input-group" ><?php inputElement("","int","ground Lump Stock", "ground_fines_stock",""); ?> </div>
   </div>

  <hr>
  <div class="form-row  justify-content-center">
<div class="form-group"><button type="submit" name="updateProduction" class="btn btn-primary">Update Record</button></div>
</div>
</form>
</div>

<div class="container">
 <form action="" method="post">
<div class="d-flex justify-content-center">
<div class="col-md-3 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date1", "date1",""); ?> </div>
<div class="col-md-3 input-group" ><?php inputElement("<i class='fas fa-calendar-day'></i>","date","Date2", "date2",""); ?> </div>
<div class="col-md-4 input-group" ><?php inputElement1(); ?></i></div>
<?php buttonElement("btn-create","btn btn-primary","<i class ='fas fa-train'></i>","custom_production_report","data-toggle='tooltip' data-placement='bottom' title='Mines Production Data'"); ?>
</div>
</form>
</div>

<div class="d-flex table-data">
 <table class="table table-striped table-light sm-table">
 <thead class="thead-dark">
 <tr>
 <th>ID</th>
 <th>Date</th>
 <th>Mines</th>
 <th style="display:none;" >Dept ROM</th>
 <th style="display:none;">Cont ROM F&G</th>
 <th style="display:none;">Dept OB</th>
 <th style="display:none;">Cont ROM F&G</th>
 <th style="display:none;">D Area ROM</th>
 <th style="display:none;">D Area OB</th>
 <th style="display:none;">Lump Darea</th>
 <th style="display:none;">Fines Darea</th>
 <th style="display:none;">Panpos ROM</th>
 <th style="display:none;">Panpos OB</th>
 <th style="display:none;">Lump Panpos</th>
 <th style="display:none;">Fines Panpos</>
<th  style="display:none;">Screen Input</th>
<th  style="display:none;">Dept Lump</th>
<th  style="display:none;">Dept Fines</>
 <th>Total ROM</th>
 <th>Total OB</th>
 <th>Total Lump</th>
 <th>Total Fines</th>
 <th>Drill</th>
 <th>Bin Lump Stock</th>
 <th>Bin Fines Stock</th>
 <th>Ground Lump Stock</th>
 <th>Ground Fines Stock</th>
 <th>Action</th>
 </tr>
 </thead>
 <tbody>
 <?php 
if(isset($_POST['custom_production_report'])){
  $result =getCustomProductionData();
  $trom=0;
  if($result){
    while($row=mysqli_fetch_assoc($result)){
    ?>
   <tr>
   <td data-id="<?php echo $row['id'];?>"><?php echo $row['id']; ?></td>
   <td data-id="<?php echo $row['id'];?>"><?php echo $row['rpt_date']; ?></td>
   <td data-id="<?php echo $row['id'];?>"><?php echo $row['unit']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['dept_rm']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['cont_rm_fg']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['dept_ob']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['cont_ob_fg']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['cont_rm_darea']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['cont_ob_darea']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['lump_darea']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['fines_darea']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['cont_rm_p']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['cont_ob_p']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['lump_p']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['fines_p']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['screen_input']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['dept_lump']; ?></td>
   <td style="display:none;" data-id="<?php echo $row['id'];?>"><?php echo $row['dept_fines']; ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo ($row['dept_rm'] +$row['cont_rm_fg']+$row['cont_rm_darea']+$row['cont_rm_p']); ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo ($row['dept_ob'] +$row['cont_ob_fg']+$row['cont_ob_darea']+$row['cont_ob_p']); ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo ($row['dept_lump'] +$row['lump_darea']+$row['lump_p']); ?></td>
  <td data-id="<?php echo $row['id']; ?>"><?php echo ($row['dept_fines'] +$row['fines_darea']+$row['fines_p']); ?></td>
  <td data-id="<?php echo $row['id'];?>"><?php echo $row['drill']; ?></td>
  <td data-id="<?php echo $row['id'];?>"><?php echo $row['bin_lump_stock']; ?></td>
   <td data-id="<?php echo $row['id'];?>"><?php echo $row['bin_fines_stock']; ?></td>
   <td data-id="<?php echo $row['id'];?>"><?php echo $row['ground_lump_stock']; ?></td>
   <td data-id="<?php echo $row['id'];?>"><?php echo $row['ground_fines_stock']; ?></td>
   <td><i class="fas fa-edit prodnedit" data-id="<?php echo $row['id'];?>"></i></td>
   </tr>
    <?php
    }
  }
}
 ?>
 </tbody>
 </table>
 </div>
 </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="myapp.js"></script>
    <script src="txtboxToggle.js"></script>
  </body>

</html>